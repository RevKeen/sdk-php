# # SubscriptionsCreateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**customer_id** | **string** |  |
**business_id** | **string** |  | [optional]
**product_id** | **string** |  | [optional]
**plan_id** | **string** |  | [optional]
**price_id** | **string** |  | [optional]
**payment_method_id** | **string** |  | [optional]
**start_date** | **string** |  | [optional]
**currency** | **string** |  | [optional] [default to 'USD']
**quantity** | **int** |  | [optional] [default to 1]
**trial_end** | **\DateTime** |  | [optional]
**billing_anchor_day** | **int** |  | [optional]
**pause_at_period_end** | **bool** |  | [optional]
**cancel_at_period_end** | **bool** |  | [optional]
**billing_starts_on** | **\DateTime** |  | [optional]
**billing_end_strategy** | **string** |  | [optional]
**billing_ends_on** | **\DateTime** |  | [optional]
**billing_max_cycles** | **int** |  | [optional]
**proration_mode** | **string** |  | [optional]
**metadata** | **array<string,mixed>** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
