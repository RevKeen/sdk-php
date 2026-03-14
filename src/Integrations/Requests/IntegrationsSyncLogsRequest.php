<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Integrations\Types\IntegrationsSyncLogsRequestStatus;
use RevKeen\Integrations\Types\IntegrationsSyncLogsRequestJobType;
use RevKeen\Integrations\Types\IntegrationsSyncLogsRequestLatestOnly;

class IntegrationsSyncLogsRequest extends JsonSerializableType
{
    /**
     * @var ?string $integrationId
     */
    public ?string $integrationId;

    /**
     * @var ?string $resourceType
     */
    public ?string $resourceType;

    /**
     * @var ?value-of<IntegrationsSyncLogsRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?value-of<IntegrationsSyncLogsRequestJobType> $jobType
     */
    public ?string $jobType;

    /**
     * @var ?string $createdAfter
     */
    public ?string $createdAfter;

    /**
     * @var ?string $createdBefore
     */
    public ?string $createdBefore;

    /**
     * @var ?string $limit
     */
    public ?string $limit;

    /**
     * @var ?string $offset
     */
    public ?string $offset;

    /**
     * @var ?value-of<IntegrationsSyncLogsRequestLatestOnly> $latestOnly
     */
    public ?string $latestOnly;

    /**
     * @param array{
     *   integrationId?: ?string,
     *   resourceType?: ?string,
     *   status?: ?value-of<IntegrationsSyncLogsRequestStatus>,
     *   jobType?: ?value-of<IntegrationsSyncLogsRequestJobType>,
     *   createdAfter?: ?string,
     *   createdBefore?: ?string,
     *   limit?: ?string,
     *   offset?: ?string,
     *   latestOnly?: ?value-of<IntegrationsSyncLogsRequestLatestOnly>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->integrationId = $values['integrationId'] ?? null;
        $this->resourceType = $values['resourceType'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->jobType = $values['jobType'] ?? null;
        $this->createdAfter = $values['createdAfter'] ?? null;
        $this->createdBefore = $values['createdBefore'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->latestOnly = $values['latestOnly'] ?? null;
    }
}
