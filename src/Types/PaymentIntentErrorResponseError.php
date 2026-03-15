<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PaymentIntentErrorResponseError extends JsonSerializableType
{
    /**
     * @var string $type Error type (api_error, invalid_request_error, etc.)
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $code Error code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var string $message Human-readable error message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?string $param Parameter that caused the error
     */
    #[JsonProperty('param')]
    public ?string $param;

    /**
     * @param array{
     *   type: string,
     *   code: string,
     *   message: string,
     *   param?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->code = $values['code'];
        $this->message = $values['message'];
        $this->param = $values['param'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
