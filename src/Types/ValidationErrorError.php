<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ValidationErrorError extends JsonSerializableType
{
    /**
     * @var value-of<ValidationErrorErrorType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<ValidationErrorErrorCode> $code
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
     * @var ?ValidationErrorErrorDetails $details
     */
    #[JsonProperty('details')]
    public ?ValidationErrorErrorDetails $details;

    /**
     * @var ?string $requestId
     */
    #[JsonProperty('request_id')]
    public ?string $requestId;

    /**
     * @param array{
     *   type: value-of<ValidationErrorErrorType>,
     *   code: value-of<ValidationErrorErrorCode>,
     *   message: string,
     *   param?: ?string,
     *   details?: ?ValidationErrorErrorDetails,
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
        $this->details = $values['details'] ?? null;
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
