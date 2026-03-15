<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class RetryEligibilityResponseData extends JsonSerializableType
{
    /**
     * @var bool $shouldRetry Whether the subscription should be retried
     */
    #[JsonProperty('should_retry')]
    public bool $shouldRetry;

    /**
     * @var string $reason Explanation for the retry decision
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var PaymentAttempt $lastAttempt
     */
    #[JsonProperty('last_attempt')]
    public PaymentAttempt $lastAttempt;

    /**
     * @param array{
     *   shouldRetry: bool,
     *   reason: string,
     *   lastAttempt: PaymentAttempt,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->shouldRetry = $values['shouldRetry'];
        $this->reason = $values['reason'];
        $this->lastAttempt = $values['lastAttempt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
