<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsGetProductMappingsResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $externalId
     */
    #[JsonProperty('externalId')]
    public string $externalId;

    /**
     * @var ?string $externalName
     */
    #[JsonProperty('externalName')]
    public ?string $externalName;

    /**
     * @var string $internalId
     */
    #[JsonProperty('internalId')]
    public string $internalId;

    /**
     * @var ?string $productName
     */
    #[JsonProperty('productName')]
    public ?string $productName;

    /**
     * @var ?string $productKind
     */
    #[JsonProperty('productKind')]
    public ?string $productKind;

    /**
     * @var mixed $metadata
     */
    #[JsonProperty('metadata')]
    public mixed $metadata;

    /**
     * @param array{
     *   externalId: string,
     *   internalId: string,
     *   externalName?: ?string,
     *   productName?: ?string,
     *   productKind?: ?string,
     *   metadata?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->externalName = $values['externalName'] ?? null;
        $this->internalId = $values['internalId'];
        $this->productName = $values['productName'] ?? null;
        $this->productKind = $values['productKind'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
