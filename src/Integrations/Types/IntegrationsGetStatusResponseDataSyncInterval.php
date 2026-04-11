<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class IntegrationsGetStatusResponseDataSyncInterval extends JsonSerializableType
{
    /**
     * @var bool $hasRepeatableJob
     */
    #[JsonProperty('hasRepeatableJob')]
    public bool $hasRepeatableJob;

    /**
     * @var ?float $intervalMs
     */
    #[JsonProperty('intervalMs')]
    public ?float $intervalMs;

    /**
     * @var ?DateTime $nextRun
     */
    #[JsonProperty('nextRun'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextRun;

    /**
     * @param array{
     *   hasRepeatableJob: bool,
     *   intervalMs?: ?float,
     *   nextRun?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->hasRepeatableJob = $values['hasRepeatableJob'];
        $this->intervalMs = $values['intervalMs'] ?? null;
        $this->nextRun = $values['nextRun'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
