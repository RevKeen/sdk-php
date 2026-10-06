<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

use RevKeen\ApiException;

/**
 * Base class for structured RevKeen API failures.
 *
 * This remains catch-compatible with the generated ApiException while adding
 * stable machine-readable metadata shared by every failure subclass.
 */
class ApiError extends ApiException
{
    private ?RateLimit $rate_limit = null;

    public function __construct(
        string $message,
        int $status_code,
        private readonly ?string $machine_code,
        private readonly ?string $raw_body,
        array $response_headers = [],
        array $request_headers = [],
        private readonly int $attempts = 1
    ) {
        if ($attempts < 1) {
            throw new \InvalidArgumentException('attempts must be at least 1.');
        }

        parent::__construct(
            $message,
            $status_code,
            $response_headers,
            $raw_body,
            $request_headers
        );

    }

    public function getStatusCode(): int
    {
        return (int) $this->getCode();
    }

    public function getMachineCode(): ?string
    {
        return $this->machine_code;
    }

    public function getRawBody(): ?string
    {
        return $this->raw_body;
    }

    public function getAttempts(): int
    {
        return $this->attempts;
    }

    /**
     * Rate-limit headers observed on the response, if any. Always returns a
     * RateLimit, so getRateLimit()->getRetryAfterSeconds() is safe to read on
     * every failure.
     */
    public function getRateLimit(): RateLimit
    {
        if ($this->rate_limit === null) {
            $headers = $this->getResponseHeaders();
            $this->rate_limit = is_array($headers) ? RateLimit::fromHeaders($headers) : RateLimit::absent();
        }

        return $this->rate_limit;
    }

}
