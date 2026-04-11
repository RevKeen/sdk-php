<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

/**
 * An async data export job. Create an export, poll for completion, then download the file via the presigned URL.
 */
class Export extends JsonSerializableType
{
    /**
     * @var string $id Unique export job ID
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<ExportObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var value-of<ExportStatus> $status Export job status. pending: queued. processing: generating file. completed: ready for download. failed: export failed.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<ExportResourceType> $resourceType The type of resource to export.
     */
    #[JsonProperty('resource_type')]
    public string $resourceType;

    /**
     * @var value-of<ExportFormat> $format Output file format. csv: Comma-separated values. xlsx: Excel workbook.
     */
    #[JsonProperty('format')]
    public string $format;

    /**
     * @var ?string $downloadUrl Presigned download URL (available when status is 'completed'). Expires after 1 hour.
     */
    #[JsonProperty('download_url')]
    public ?string $downloadUrl;

    /**
     * @var ?int $totalRows Total rows exported (available when completed)
     */
    #[JsonProperty('total_rows')]
    public ?int $totalRows;

    /**
     * @var ?int $fileSizeBytes File size in bytes (available when completed)
     */
    #[JsonProperty('file_size_bytes')]
    public ?int $fileSizeBytes;

    /**
     * @var ?string $errorMessage Error message (if status is 'failed')
     */
    #[JsonProperty('error_message')]
    public ?string $errorMessage;

    /**
     * @var DateTime $createdAt When the export was requested (ISO 8601)
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?DateTime $completedAt When the export completed (ISO 8601)
     */
    #[JsonProperty('completed_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<ExportObject>,
     *   status: value-of<ExportStatus>,
     *   resourceType: value-of<ExportResourceType>,
     *   format: value-of<ExportFormat>,
     *   createdAt: DateTime,
     *   downloadUrl?: ?string,
     *   totalRows?: ?int,
     *   fileSizeBytes?: ?int,
     *   errorMessage?: ?string,
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
        $this->format = $values['format'];
        $this->downloadUrl = $values['downloadUrl'] ?? null;
        $this->totalRows = $values['totalRows'] ?? null;
        $this->fileSizeBytes = $values['fileSizeBytes'] ?? null;
        $this->errorMessage = $values['errorMessage'] ?? null;
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
