# # Subscription

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Subscription UUID |
**merchant_id** | **string** | Owning merchant UUID |
**customer_id** | **string** | Customer UUID |
**product_id** | **string** | Product UUID | [optional]
**price_id** | **string** | Price UUID | [optional]
**plan_id** | **string** | Plan UUID | [optional]
**status** | **string** | Subscription status |
**quantity** | **int** | Subscribed quantity |
**amount_minor** | **int** | Recurring amount in minor units |
**currency** | **string** | Three-letter ISO currency code |
**billing_interval** | **string** | Billing interval (day, week, month, year) |
**current_period_start** | **\DateTime** | Current period start (ISO 8601) |
**current_period_end** | **\DateTime** | Current period end (ISO 8601) |
**trial_end** | **\DateTime** | Trial end (ISO 8601) | [optional]
**canceled_at** | **\DateTime** | Cancellation timestamp (ISO 8601) | [optional]
**created_at** | **\DateTime** | Creation timestamp (ISO 8601) |
**updated_at** | **\DateTime** | Last update timestamp (ISO 8601) |
**dunning** | [**\RevKeen\Model\SubscriptionDunning**](SubscriptionDunning.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
