<?php

namespace RevKeen\Comms\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class CommsMessagesListRequest extends JsonSerializableType
{
    /**
     * @var ?float $limit Maximum number of results (1-100)
     */
    public ?float $limit;

    /**
     * @var ?float $offset Number of results to skip
     */
    public ?float $offset;

    /**
     * @param array{
     *   limit?: ?float,
     *   offset?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
