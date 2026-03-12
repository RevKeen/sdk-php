<?php

namespace RevKeen\SetupIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ConfirmSetupIntentRequest extends JsonSerializableType
{
    /**
     * @var ?string $paymentMethodId ID of the payment method to confirm with
     */
    #[JsonProperty('payment_method_id')]
    public ?string $paymentMethodId;

    /**
     * @var ?string $returnUrl URL to redirect to after 3DS authentication
     */
    #[JsonProperty('return_url')]
    public ?string $returnUrl;

    /**
     * @param array{
     *   paymentMethodId?: ?string,
     *   returnUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentMethodId = $values['paymentMethodId'] ?? null;
        $this->returnUrl = $values['returnUrl'] ?? null;
    }
}
