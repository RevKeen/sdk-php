<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\Union;

/**
 * Error response returned when a usage event operation fails.
 */
class UsageEventError extends JsonSerializableType
{
    /**
     * @var (
     *    string
     *   |UsageEventErrorErrorMessage
     * ) $error
     */
    #[JsonProperty('error'), Union('string', UsageEventErrorErrorMessage::class)]
    public string|UsageEventErrorErrorMessage $error;

    /**
     * @param array{
     *   error: (
     *    string
     *   |UsageEventErrorErrorMessage
     * ),
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
