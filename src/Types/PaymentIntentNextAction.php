<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Action required from customer (3DS, etc.)
 */
class PaymentIntentNextAction extends JsonSerializableType
{
    /**
     * @var value-of<PaymentIntentNextActionType> $type Type of action required
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?PaymentIntentNextActionRedirectToUrl $redirectToUrl Present when type is redirect_to_url
     */
    #[JsonProperty('redirect_to_url')]
    public ?PaymentIntentNextActionRedirectToUrl $redirectToUrl;

    /**
     * @param array{
     *   type: value-of<PaymentIntentNextActionType>,
     *   redirectToUrl?: ?PaymentIntentNextActionRedirectToUrl,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->redirectToUrl = $values['redirectToUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
