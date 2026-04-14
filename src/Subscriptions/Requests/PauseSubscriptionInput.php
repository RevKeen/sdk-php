<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Subscriptions\Types\PauseSubscriptionInputBehavior;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class PauseSubscriptionInput extends JsonSerializableType
{
    /**
     * @var ?value-of<PauseSubscriptionInputBehavior> $behavior How to handle invoices during the pause period
     */
    #[JsonProperty('behavior')]
    public ?string $behavior;

    /**
     * @var ?DateTime $resumesAt ISO 8601 date when the subscription should automatically resume. If not provided, subscription stays paused until manually resumed.
     */
    #[JsonProperty('resumes_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $resumesAt;

    /**
     * @param array{
     *   behavior?: ?value-of<PauseSubscriptionInputBehavior>,
     *   resumesAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->behavior = $values['behavior'] ?? null;
        $this->resumesAt = $values['resumesAt'] ?? null;
    }
}
