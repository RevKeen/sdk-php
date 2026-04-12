<?php

namespace RevKeen\Exports\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Exports\Types\CreateExportRequestResourceType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Exports\Types\CreateExportRequestFormat;
use RevKeen\Core\Types\ArrayType;
use RevKeen\Exports\Types\CreateExportRequestColumnSet;

class CreateExportRequest extends JsonSerializableType
{
    /**
     * @var value-of<CreateExportRequestResourceType> $resourceType The type of resource to export.
     */
    #[JsonProperty('resource_type')]
    public string $resourceType;

    /**
     * @var ?value-of<CreateExportRequestFormat> $format Output file format. csv: Comma-separated values. xlsx: Excel workbook.
     */
    #[JsonProperty('format')]
    public ?string $format;

    /**
     * @var ?array<string, mixed> $filters Filters to apply (e.g., { status: 'paid', created_gte: '2024-01-01' })
     */
    #[JsonProperty('filters'), ArrayType(['string' => 'mixed'])]
    public ?array $filters;

    /**
     * @var ?value-of<CreateExportRequestColumnSet> $columnSet Column set to include. standard: common fields. full: all fields. minimal: IDs and key fields only.
     */
    #[JsonProperty('column_set')]
    public ?string $columnSet;

    /**
     * @param array{
     *   resourceType: value-of<CreateExportRequestResourceType>,
     *   format?: ?value-of<CreateExportRequestFormat>,
     *   filters?: ?array<string, mixed>,
     *   columnSet?: ?value-of<CreateExportRequestColumnSet>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resourceType = $values['resourceType'];
        $this->format = $values['format'] ?? null;
        $this->filters = $values['filters'] ?? null;
        $this->columnSet = $values['columnSet'] ?? null;
    }
}
