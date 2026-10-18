<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class ApiErrorFactory
{
    private const IDEMPOTENCY_CONFLICT_CODES = [
        'idempotency_conflict',
        'idempotency_key_conflict',
        'idempotency_key_reused',
        'idempotency_key_mismatch',
        'idempotency_mismatch',
    ];

    public static function fromResponse(
        ResponseInterface $response,
        ?RequestInterface $request = null,
        int $attempts = 1
    ): ApiError {
        $raw_body = (string) $response->getBody();
        $decoded = self::decodeObject($raw_body);
        $envelope = isset($decoded['error']) && is_array($decoded['error'])
            ? $decoded['error']
            : $decoded;

        $machine_code = self::firstString($envelope, ['code', 'error_code'])
            ?? self::firstString($decoded, ['code', 'error_code'])
            ?? 'unknown_error';
        $message = self::firstString($envelope, ['message', 'detail', 'error_description'])
            ?? self::firstString($decoded, ['message', 'detail', 'error_description'])
            ?? (isset($decoded['error']) && is_string($decoded['error']) ? $decoded['error'] : null)
            ?? sprintf('HTTP %d', $response->getStatusCode());

        $response_headers = $response->getHeaders();
        self::addBodyIdentifier(
            $response_headers,
            'x-request-id',
            self::firstString($envelope, ['request_id', 'requestId'])
                ?? self::firstString($decoded, ['request_id', 'requestId'])
        );
        self::addBodyIdentifier(
            $response_headers,
            'x-trace-id',
            self::firstString($envelope, ['trace_id', 'traceId'])
                ?? self::firstString($decoded, ['trace_id', 'traceId'])
        );
        self::addBodyIdentifier(
            $response_headers,
            'x-correlation-id',
            self::firstString($envelope, ['correlation_id', 'correlationId'])
                ?? self::firstString($decoded, ['correlation_id', 'correlationId'])
        );

        $class = self::classFor($response->getStatusCode(), $machine_code, $envelope, $decoded);

        return new $class(
            $message,
            $response->getStatusCode(),
            $machine_code,
            $raw_body,
            $response_headers,
            $request !== null ? $request->getHeaders() : [],
            $attempts
        );
    }

    public static function fromThrowable(\Throwable $failure, int $attempts = 1): ApiError
    {
        if ($failure instanceof ApiError) {
            return $failure;
        }

        $response = method_exists($failure, 'getResponse') ? $failure->getResponse() : null;
        $request = method_exists($failure, 'getRequest') ? $failure->getRequest() : null;
        if ($response instanceof ResponseInterface) {
            return self::fromResponse(
                $response,
                $request instanceof RequestInterface ? $request : null,
                $attempts
            );
        }

        return new FallbackException(
            $failure->getMessage(),
            0,
            'unknown_error',
            null,
            [],
            $request instanceof RequestInterface ? $request->getHeaders() : [],
            $attempts
        );
    }

    /** @return class-string<ApiError> */
    private static function classFor(int $status, ?string $machine_code, array $envelope, array $decoded): string
    {
        if ($status === 401) {
            return AuthenticationException::class;
        }
        if ($status === 403) {
            return AuthorizationException::class;
        }
        if ($status === 400 || $status === 422) {
            return ValidationException::class;
        }
        if ($status === 404) {
            return NotFoundException::class;
        }
        if ($status === 429) {
            return RateLimitException::class;
        }
        if ($status === 409) {
            $type = self::firstString($envelope, ['type']) ?? self::firstString($decoded, ['type']);
            $normalized_code = strtolower($machine_code ?? '');
            $normalized_type = strtolower($type ?? '');
            return in_array($normalized_code, self::IDEMPOTENCY_CONFLICT_CODES, true)
                || $normalized_type === 'idempotency_error'
                ? IdempotencyConflictException::class
                : ConflictException::class;
        }
        if ($status >= 500 && $status <= 599) {
            return ServerException::class;
        }

        return FallbackException::class;
    }

    /** @return array<string, mixed> */
    private static function decodeObject(string $raw_body): array
    {
        if ($raw_body === '') {
            return [];
        }

        try {
            $decoded = json_decode($raw_body, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $ignored) {
            return [];
        }

        return is_array($decoded) ? $decoded : [];
    }

    /** @param string[] $keys */
    private static function firstString(array $source, array $keys): ?string
    {
        foreach ($keys as $key) {
            if (isset($source[$key]) && is_string($source[$key]) && $source[$key] !== '') {
                return $source[$key];
            }
        }

        return null;
    }

    private static function addBodyIdentifier(array &$headers, string $name, ?string $value): void
    {
        if ($value === null || self::hasHeader($headers, $name)) {
            return;
        }

        $headers[$name] = [$value];
    }

    private static function hasHeader(array $headers, string $name): bool
    {
        foreach ($headers as $header => $_values) {
            if (strcasecmp((string) $header, $name) === 0) {
                return true;
            }
        }

        return false;
    }
}
