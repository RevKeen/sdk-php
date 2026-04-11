<?php

namespace RevKeen\Imports\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Imports\Types\CreateImportRequestResourceType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use RevKeen\Imports\Types\CreateImportRequestOnDuplicate;

class CreateImportRequest extends JsonSerializableType
{
    /**
     * @var value-of<CreateImportRequestResourceType> $resourceType The type of resource to import.
     */
    #[JsonProperty('resource_type')]
    public string $resourceType;

    /**
     * @var ?string $fileUrl URL to the CSV file to import (if not using multipart upload)
     */
    #[JsonProperty('file_url')]
    public ?string $fileUrl;

    /**
     * @var ?array<string, mixed> $columnMapping Map CSV column names to resource fields (e.g., { 'Email Address': 'email', 'Full Name': 'name' })
     */
    #[JsonProperty('column_mapping'), ArrayType(['string' => 'mixed'])]
    public ?array $columnMapping;

    /**
     * @var ?value-of<CreateImportRequestOnDuplicate> $onDuplicate Behavior when a duplicate record is found. skip: ignore the row. update: merge new data. error: fail the row.
     */
    #[JsonProperty('on_duplicate')]
    public ?string $onDuplicate;

    /**
     * @param array{
     *   resourceType: value-of<CreateImportRequestResourceType>,
     *   fileUrl?: ?string,
     *   columnMapping?: ?array<string, mixed>,
     *   onDuplicate?: ?value-of<CreateImportRequestOnDuplicate>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resourceType = $values['resourceType'];
        $this->fileUrl = $values['fileUrl'] ?? null;
        $this->columnMapping = $values['columnMapping'] ?? null;
        $this->onDuplicate = $values['onDuplicate'] ?? null;
    }
}
