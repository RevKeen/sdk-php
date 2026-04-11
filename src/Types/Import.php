<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

/**
 * An async data import job. Upload a CSV file to create records in bulk. Poll GET /v2/imports/:id for status and error details.
 */
class Import extends JsonSerializableType
{
    /**
     * @var string $id Unique import job ID
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<ImportObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var value-of<ImportStatus> $status Import job status. pending: queued. validating: checking data. processing: creating records. completed: all rows imported. completed_with_errors: some rows failed. failed: import aborted.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<ImportResourceType> $resourceType The type of resource to import.
     */
    #[JsonProperty('resource_type')]
    public string $resourceType;

    /**
     * @var ?int $totalRows Total rows in the uploaded file
     */
    #[JsonProperty('total_rows')]
    public ?int $totalRows;

    /**
     * @var ?int $processedRows Number of rows processed so far
     */
    #[JsonProperty('processed_rows')]
    public ?int $processedRows;

    /**
     * @var ?int $successCount Number of rows successfully imported
     */
    #[JsonProperty('success_count')]
    public ?int $successCount;

    /**
     * @var ?int $errorCount Number of rows that failed
     */
    #[JsonProperty('error_count')]
    public ?int $errorCount;

    /**
     * @var ?array<ImportErrorsItem> $errors Detailed error information for failed rows
     */
    #[JsonProperty('errors'), ArrayType([ImportErrorsItem::class])]
    public ?array $errors;

    /**
     * @var DateTime $createdAt When the import was created (ISO 8601)
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?DateTime $completedAt When the import completed (ISO 8601)
     */
    #[JsonProperty('completed_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<ImportObject>,
     *   status: value-of<ImportStatus>,
     *   resourceType: value-of<ImportResourceType>,
     *   createdAt: DateTime,
     *   totalRows?: ?int,
     *   processedRows?: ?int,
     *   successCount?: ?int,
     *   errorCount?: ?int,
     *   errors?: ?array<ImportErrorsItem>,
     *   completedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->status = $values['status'];
        $this->resourceType = $values['resourceType'];
        $this->totalRows = $values['totalRows'] ?? null;
        $this->processedRows = $values['processedRows'] ?? null;
        $this->successCount = $values['successCount'] ?? null;
        $this->errorCount = $values['errorCount'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->completedAt = $values['completedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
