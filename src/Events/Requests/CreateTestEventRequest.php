<?php

namespace RevKeen\Events\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Events\Types\CreateTestEventRequestType;
use RevKeen\Core\Json\JsonProperty;

class CreateTestEventRequest extends JsonSerializableType
{
    /**
     * @var value-of<CreateTestEventRequestType> $type The type of test event to create
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<CreateTestEventRequestType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
    }
}
