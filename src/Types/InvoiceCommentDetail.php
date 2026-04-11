<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * An invoice comment with extended author details including name, email, and avatar.
 */
class InvoiceCommentDetail extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $invoiceId
     */
    #[JsonProperty('invoiceId')]
    public string $invoiceId;

    /**
     * @var ?string $userId
     */
    #[JsonProperty('userId')]
    public ?string $userId;

    /**
     * @var string $content
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @var bool $isInternal
     */
    #[JsonProperty('isInternal')]
    public bool $isInternal;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('createdAt')]
    public string $createdAt;

    /**
     * @var ?string $updatedAt
     */
    #[JsonProperty('updatedAt')]
    public ?string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   invoiceId: string,
     *   content: string,
     *   isInternal: bool,
     *   createdAt: string,
     *   userId?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->invoiceId = $values['invoiceId'];
        $this->userId = $values['userId'] ?? null;
        $this->content = $values['content'];
        $this->isInternal = $values['isInternal'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
