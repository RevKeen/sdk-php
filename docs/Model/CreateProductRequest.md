# # CreateProductRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**product_id** | **string** |  |
**name** | **string** |  |
**description** | **string** |  | [optional]
**kind** | **string** |  |
**pricing_model** | **string** |  |
**amount_minor** | **int** |  |
**currency** | **string** |  | [optional] [default to 'USD']
**interval** | **string** |  | [optional]
**interval_count** | **int** |  | [optional]
**trial_days** | **int** |  | [optional]
**usage_meter_id** | **string** |  | [optional]
**slug** | **string** |  | [optional]
**fulfillment_type** | **string** | Fulfillment type for the product. Defaults to &#39;none&#39; (service). | [optional] [default to 'none']
**billing_anchor_rule** | **string** | How billing dates are calculated. same_day: Bill on same day as start. day_of_month: Bill on specific day (1-31). last_day: Bill on last day of month. | [optional]
**billing_anchor_day** | **int** | Day of month (1-31) when billing_anchor_rule is &#39;day_of_month&#39; | [optional]
**first_charge_behavior** | **string** | When first payment is collected. immediate: Charge on start. next_anchor: Charge on first scheduled date. prorate: Prorate until first date. | [optional]
**end_behavior** | **string** | How subscription ends. until_canceled: Runs forever. fixed_payments: Ends after N billing cycles. | [optional]
**max_payments** | **int** | Max billing cycles when end_behavior is &#39;fixed_payments&#39; | [optional]
**metadata** | **array<string,mixed>** | Arbitrary key-value metadata for the product | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
