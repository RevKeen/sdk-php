<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class StaleUpdateResponse extends JsonSerializableType
{
    /**
     * @var bool $ignored
     */
    #[JsonProperty('ignored')]
    public bool $ignored;

    /**
     * @var value-of<StaleUpdateResponseReason> $reason
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var string $storedTimestamp
     */
    #[JsonProperty('stored_timestamp')]
    public string $storedTimestamp;

    /**
     * @var string $incomingTimestamp
     */
    #[JsonProperty('incoming_timestamp')]
    public string $incomingTimestamp;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   ignored: bool,
     *   reason: value-of<StaleUpdateResponseReason>,
     *   storedTimestamp: string,
     *   incomingTimestamp: string,
     *   requestId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ignored = $values['ignored'];
        $this->reason = $values['reason'];
        $this->storedTimestamp = $values['storedTimestamp'];
        $this->incomingTimestamp = $values['incomingTimestamp'];
        $this->requestId = $values['requestId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
