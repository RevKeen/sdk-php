<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class DryRunResultDataItem extends JsonSerializableType
{
    /**
     * @var float $index
     */
    #[JsonProperty('index')]
    public float $index;

    /**
     * @var value-of<DryRunResultDataItemStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DryRunResultDataItemValidationDetails $validationDetails
     */
    #[JsonProperty('validationDetails')]
    public DryRunResultDataItemValidationDetails $validationDetails;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   index: float,
     *   status: value-of<DryRunResultDataItemStatus>,
     *   validationDetails: DryRunResultDataItemValidationDetails,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->index = $values['index'];
        $this->status = $values['status'];
        $this->validationDetails = $values['validationDetails'];
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
