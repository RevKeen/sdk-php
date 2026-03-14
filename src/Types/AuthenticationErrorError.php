<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AuthenticationErrorError extends JsonSerializableType
{
    /**
     * @var value-of<AuthenticationErrorErrorType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<AuthenticationErrorErrorCode> $code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?string $requestId
     */
    #[JsonProperty('request_id')]
    public ?string $requestId;

    /**
     * @param array{
     *   type: value-of<AuthenticationErrorErrorType>,
     *   code: value-of<AuthenticationErrorErrorCode>,
     *   message: string,
     *   requestId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->code = $values['code'];
        $this->message = $values['message'];
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
