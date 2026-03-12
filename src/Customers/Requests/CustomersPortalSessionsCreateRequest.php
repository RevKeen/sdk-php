<?php

namespace RevKeen\Customers\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomersPortalSessionsCreateRequest extends JsonSerializableType
{
    /**
     * @var ?string $returnUrl URL to redirect after portal session ends
     */
    #[JsonProperty('return_url')]
    public ?string $returnUrl;

    /**
     * @param array{
     *   returnUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->returnUrl = $values['returnUrl'] ?? null;
    }
}
