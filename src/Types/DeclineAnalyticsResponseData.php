<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class DeclineAnalyticsResponseData extends JsonSerializableType
{
    /**
     * @var int $totalAttempts
     */
    #[JsonProperty('total_attempts')]
    public int $totalAttempts;

    /**
     * @var int $approvedCount
     */
    #[JsonProperty('approved_count')]
    public int $approvedCount;

    /**
     * @var int $declinedCount
     */
    #[JsonProperty('declined_count')]
    public int $declinedCount;

    /**
     * @var float $approvalRate
     */
    #[JsonProperty('approval_rate')]
    public float $approvalRate;

    /**
     * @var int $softDeclineCount
     */
    #[JsonProperty('soft_decline_count')]
    public int $softDeclineCount;

    /**
     * @var int $hardDeclineCount
     */
    #[JsonProperty('hard_decline_count')]
    public int $hardDeclineCount;

    /**
     * @var array<DeclineAnalyticsResponseDataTopDeclineCategoriesItem> $topDeclineCategories
     */
    #[JsonProperty('top_decline_categories'), ArrayType([DeclineAnalyticsResponseDataTopDeclineCategoriesItem::class])]
    public array $topDeclineCategories;

    /**
     * @var array<string, DeclineAnalyticsResponseDataByGatewayValue> $byGateway Breakdown by gateway
     */
    #[JsonProperty('by_gateway'), ArrayType(['string' => DeclineAnalyticsResponseDataByGatewayValue::class])]
    public array $byGateway;

    /**
     * @param array{
     *   totalAttempts: int,
     *   approvedCount: int,
     *   declinedCount: int,
     *   approvalRate: float,
     *   softDeclineCount: int,
     *   hardDeclineCount: int,
     *   topDeclineCategories: array<DeclineAnalyticsResponseDataTopDeclineCategoriesItem>,
     *   byGateway: array<string, DeclineAnalyticsResponseDataByGatewayValue>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalAttempts = $values['totalAttempts'];
        $this->approvedCount = $values['approvedCount'];
        $this->declinedCount = $values['declinedCount'];
        $this->approvalRate = $values['approvalRate'];
        $this->softDeclineCount = $values['softDeclineCount'];
        $this->hardDeclineCount = $values['hardDeclineCount'];
        $this->topDeclineCategories = $values['topDeclineCategories'];
        $this->byGateway = $values['byGateway'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
