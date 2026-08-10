# # UpdateSubscriptionItemInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**quantity** | **int** | Item quantity | [optional]
**description** | **string** | Item description | [optional]
**unit_amount_minor** | **int** | Unit price in cents | [optional]
**fulfillment_type** | **string** | Determines if orders are created on renewal | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**price_id** | **string** | Swap the item onto another Price. Allowed only when the new Price shares the same meter_id (fail closed otherwise). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
