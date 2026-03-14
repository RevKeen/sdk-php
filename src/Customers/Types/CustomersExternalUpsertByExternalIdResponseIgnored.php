<?php

namespace RevKeen\Customers\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomersExternalUpsertByExternalIdResponseIgnored extends JsonSerializableType
{
    /**
     * @var bool $ignored
     */
    #[JsonProperty('ignored')]
    public bool $ignored;

    /**
     * @var value-of<CustomersExternalUpsertByExternalIdResponseIgnoredReason> $reason
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
     * @param array{
     *   ignored: bool,
     *   reason: value-of<CustomersExternalUpsertByExternalIdResponseIgnoredReason>,
     *   storedTimestamp: string,
     *   incomingTimestamp: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ignored = $values['ignored'];
        $this->reason = $values['reason'];
        $this->storedTimestamp = $values['storedTimestamp'];
        $this->incomingTimestamp = $values['incomingTimestamp'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
