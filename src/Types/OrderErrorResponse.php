<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Error response returned when an order operation fails.
 */
class OrderErrorResponse extends JsonSerializableType
{
    /**
     * @var OrderErrorResponseError $error
     */
    #[JsonProperty('error')]
    public OrderErrorResponseError $error;

    /**
     * @param array{
     *   error: OrderErrorResponseError,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
