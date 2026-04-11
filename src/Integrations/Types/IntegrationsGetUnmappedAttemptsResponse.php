<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class IntegrationsGetUnmappedAttemptsResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<IntegrationsGetUnmappedAttemptsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([IntegrationsGetUnmappedAttemptsResponseDataItem::class])]
    public array $data;

    /**
     * @var float $totalCount
     */
    #[JsonProperty('totalCount')]
    public float $totalCount;

    /**
     * @param array{
     *   success: bool,
     *   data: array<IntegrationsGetUnmappedAttemptsResponseDataItem>,
     *   totalCount: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->data = $values['data'];
        $this->totalCount = $values['totalCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
