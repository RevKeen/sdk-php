<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * Action required from customer (3DS redirect, etc.)
 */
class SetupIntentNextAction extends JsonSerializableType
{
    /**
     * @var value-of<SetupIntentNextActionType> $type The type of action to take
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?SetupIntentNextActionRedirectToUrl $redirectToUrl Redirect details for 3DS authentication
     */
    #[JsonProperty('redirect_to_url')]
    public ?SetupIntentNextActionRedirectToUrl $redirectToUrl;

    /**
     * @var ?array<string, mixed> $useStripeSdk SDK-specific data for client-side handling
     */
    #[JsonProperty('use_stripe_sdk'), ArrayType(['string' => 'mixed'])]
    public ?array $useStripeSdk;

    /**
     * @param array{
     *   type: value-of<SetupIntentNextActionType>,
     *   redirectToUrl?: ?SetupIntentNextActionRedirectToUrl,
     *   useStripeSdk?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->redirectToUrl = $values['redirectToUrl'] ?? null;
        $this->useStripeSdk = $values['useStripeSdk'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
