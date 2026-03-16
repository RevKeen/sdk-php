<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class CustomerPortalSessionCreateResponseData extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $customerId
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @var string $merchantId
     */
    #[JsonProperty('merchantId')]
    public string $merchantId;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var DateTime $expiresAt
     */
    #[JsonProperty('expiresAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $expiresAt;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   id: string,
     *   customerId: string,
     *   merchantId: string,
     *   url: string,
     *   expiresAt: DateTime,
     *   createdAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->customerId = $values['customerId'];
        $this->merchantId = $values['merchantId'];
        $this->url = $values['url'];
        $this->expiresAt = $values['expiresAt'];
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
