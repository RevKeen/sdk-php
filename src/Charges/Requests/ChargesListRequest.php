<?php

namespace RevKeen\Charges\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Charges\Types\ChargesListRequestStatus;
use DateTime;

class ChargesListRequest extends JsonSerializableType
{
    /**
     * @var ?int $page Page number
     */
    public ?int $page;

    /**
     * @var ?int $limit Maximum number of results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?string $customerId Filter by customer UUID
     */
    public ?string $customerId;

    /**
     * @var ?value-of<ChargesListRequestStatus> $status Filter by charge status
     */
    public ?string $status;

    /**
     * @var ?DateTime $createdGte Filter charges created on or after this date
     */
    public ?DateTime $createdGte;

    /**
     * @var ?DateTime $createdLte Filter charges created on or before this date
     */
    public ?DateTime $createdLte;

    /**
     * @param array{
     *   page?: ?int,
     *   limit?: ?int,
     *   customerId?: ?string,
     *   status?: ?value-of<ChargesListRequestStatus>,
     *   createdGte?: ?DateTime,
     *   createdLte?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->createdGte = $values['createdGte'] ?? null;
        $this->createdLte = $values['createdLte'] ?? null;
    }
}
