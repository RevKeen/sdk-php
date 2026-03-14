<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class NotFoundErrorError extends JsonSerializableType
{
    /**
     * @var value-of<NotFoundErrorErrorType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<NotFoundErrorErrorCode> $code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?string $param
     */
    #[JsonProperty('param')]
    public ?string $param;

    /**
     * @var ?string $requestId
     */
    #[JsonProperty('request_id')]
    public ?string $requestId;

    /**
     * @param array{
     *   type: value-of<NotFoundErrorErrorType>,
     *   code: value-of<NotFoundErrorErrorCode>,
     *   message: string,
     *   param?: ?string,
     *   requestId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->code = $values['code'];
        $this->message = $values['message'];
        $this->param = $values['param'] ?? null;
        $this->requestId = $values['requestId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
