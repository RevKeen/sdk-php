<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class SubscriptionsPreviewRenewalRequest extends JsonSerializableType
{
    /**
     * @var ?int $previewCount
     */
    #[JsonProperty('previewCount')]
    public ?int $previewCount;

    /**
     * @param array{
     *   previewCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->previewCount = $values['previewCount'] ?? null;
    }
}
