<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

use Psr\Http\Message\RequestInterface;

final class RequestContext
{
    private function __construct(
        public readonly string $request_id,
        public readonly string $trace_id
    ) {
    }

    public static function fromRequest(RequestInterface $request, RequestOptions $options): self
    {
        $request_id = $options->request_id ?: trim($request->getHeaderLine('x-request-id'));
        $trace_id = $options->trace_id ?: trim($request->getHeaderLine('x-trace-id'));
        if ($request_id === '') {
            $request_id = self::uuidV4();
        }
        if ($trace_id === '') {
            $trace_id = $request_id;
        }

        return new self($request_id, $trace_id);
    }

    public function apply(RequestInterface $request): RequestInterface
    {
        return $request
            ->withoutHeader('x-correlation-id')
            ->withHeader('x-request-id', $this->request_id)
            ->withHeader('x-trace-id', $this->trace_id);
    }

    private static function uuidV4(): string
    {
        $bytes = random_bytes(16);
        $bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40);
        $bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80);
        $hex = bin2hex($bytes);

        return sprintf(
            '%s-%s-%s-%s-%s',
            substr($hex, 0, 8),
            substr($hex, 8, 4),
            substr($hex, 12, 4),
            substr($hex, 16, 4),
            substr($hex, 20)
        );
    }
}
