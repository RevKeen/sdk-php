# # CreateSubscriptionItemInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**product_id** | **string** | Product UUID to link to this item | [optional]
**price_id** | **string** | Price UUID to link to this item | [optional]
**description** | **string** | Item description | [optional]
**quantity** | **int** | Item quantity | [optional] [default to 1]
**currency** | **string** | ISO 4217 currency code |
**unit_amount_minor** | **int** | Unit price in cents |
**fulfillment_type** | **string** | Determines if orders are created on renewal | [optional] [default to 'none']
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
