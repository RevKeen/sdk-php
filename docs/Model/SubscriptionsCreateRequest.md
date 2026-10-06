# SubscriptionsCreateRequest

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
**currency** | **string** | Defaults to the price&#39;s currency | [optional]
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
**payment_rail** | **string** | How the subscription is collected. &#x60;direct_debit&#x60; needs &#x60;mandateId&#x60; and a GBP price, and cannot be combined with &#x60;paymentMethodId&#x60;. It is available to signed-in team members and OAuth apps; API keys are refused with 403. | [optional]
**mandate_id** | **string** | An active Direct Debit mandate belonging to this customer. Only with &#x60;paymentRail: direct_debit&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
