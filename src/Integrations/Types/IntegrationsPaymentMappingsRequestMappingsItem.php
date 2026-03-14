<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsPaymentMappingsRequestMappingsItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $revkeenMethod
     */
    #[JsonProperty('revkeenMethod')]
    public string $revkeenMethod;

    /**
     * @var string $practiceHubMethodId
     */
    #[JsonProperty('practiceHubMethodId')]
    public string $practiceHubMethodId;

    /**
     * @param array{
     *   id: string,
     *   revkeenMethod: string,
     *   practiceHubMethodId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->revkeenMethod = $values['revkeenMethod'];
        $this->practiceHubMethodId = $values['practiceHubMethodId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
