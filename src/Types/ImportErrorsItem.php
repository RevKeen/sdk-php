<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ImportErrorsItem extends JsonSerializableType
{
    /**
     * @var int $row Row number (1-based)
     */
    #[JsonProperty('row')]
    public int $row;

    /**
     * @var ?string $field Field that caused the error
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var string $message Error message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   row: int,
     *   message: string,
     *   field?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->row = $values['row'];
        $this->field = $values['field'] ?? null;
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
