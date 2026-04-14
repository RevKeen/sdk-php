<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A portal session URL that redirects the customer to their self-service billing portal.
 */
class CustomerPortalSessionCreateResponse extends JsonSerializableType
{
    /**
     * @var CustomerPortalSessionCreateResponseData $data
     */
    #[JsonProperty('data')]
    public CustomerPortalSessionCreateResponseData $data;

    /**
     * @param array{
     *   data: CustomerPortalSessionCreateResponseData,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
