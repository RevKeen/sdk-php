<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

use GuzzleHttp\ClientInterface;
use RevKeen\Configuration;

final class ClientFactory
{
    public static function configuration(Environment $environment): Configuration
    {
        return (new Configuration())->setHost($environment->value);
    }

    public static function configurationForCustomBaseUrl(string $base_url): Configuration
    {
        if (filter_var($base_url, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Custom RevKeen base URL must be an absolute URL.');
        }

        $parts = parse_url($base_url);
        if ($parts === false || !isset($parts['host'])) {
            throw new \InvalidArgumentException('Custom RevKeen base URL must include a host.');
        }

        $scheme = strtolower($parts['scheme'] ?? '');
        if ($scheme !== 'http' && $scheme !== 'https') {
            throw new \InvalidArgumentException('Custom RevKeen base URL must use HTTP or HTTPS.');
        }

        if (array_key_exists('query', $parts) || array_key_exists('fragment', $parts)) {
            throw new \InvalidArgumentException('Custom RevKeen base URL must not include a query or fragment.');
        }

        return (new Configuration())->setHost(rtrim($base_url, '/'));
    }

    public static function wrap(ClientInterface $client, Configuration $config): ClientInterface
    {
        if ($client instanceof RetryingClient) {
            return $client;
        }

        return new RetryingClient(
            $client,
            $config->getConnectTimeoutSeconds(),
            $config->getReadTimeoutSeconds(),
            new RetryPolicy(max_attempts: $config->getMaxAttempts())
        );
    }

    /** @return array<string, mixed> */
    public static function requestOptions(?RequestOptions $request_options, bool $operation_is_idempotent): array
    {
        return [
            RetryingClient::OPTION_REQUEST_OPTIONS => $request_options ?? new RequestOptions(),
            RetryingClient::OPTION_OPERATION_IDEMPOTENT => $operation_is_idempotent,
            RetryingClient::OPTION_STRUCTURED_ERRORS => true,
        ];
    }

    public static function assertApiKeyCapability(Configuration $config, string $resource_path): void
    {
        if ($config->getApiKeyKind() !== ApiKeyKind::PUBLISHABLE) {
            return;
        }

        foreach (['/cart', '/cart-sessions', '/storefront'] as $allowed_prefix) {
            if ($resource_path === $allowed_prefix || str_starts_with($resource_path, $allowed_prefix . '/')) {
                return;
            }
        }

        throw new \LogicException('Publishable API keys are restricted to cart and storefront operations.');
    }
}
