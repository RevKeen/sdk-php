# # UpdateProductRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** |  | [optional]
**description** | **string** |  | [optional]
**amount_minor** | **int** |  | [optional]
**currency** | **string** |  | [optional]
**interval** | **string** |  | [optional]
**interval_count** | **int** |  | [optional]
**trial_days** | **int** |  | [optional]
**is_active** | **bool** |  | [optional]
**is_archived** | **bool** |  | [optional]
**fulfillment_type** | **string** | Fulfillment type for the product. | [optional]
**billing_anchor_rule** | **string** | How billing dates are calculated. same_day: Bill on same day as start. day_of_month: Bill on specific day (1-31). last_day: Bill on last day of month. | [optional]
**billing_anchor_day** | **int** |  | [optional]
**first_charge_behavior** | **string** | When first payment is collected. immediate: Charge on start. next_anchor: Charge on first scheduled date. prorate: Prorate until first date. | [optional]
**end_behavior** | **string** | How subscription ends. until_canceled: Runs forever. fixed_payments: Ends after N billing cycles. | [optional]
**max_payments** | **int** |  | [optional]
**metadata** | **array<string,mixed>** | Arbitrary key-value metadata for the product | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
