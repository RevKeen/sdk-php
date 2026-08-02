# # InvoicesCreateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**customer_uuid** | **string** |  |
**invoice_number** | **string** |  | [optional]
**total_minor** | **int** |  |
**currency** | **string** |  | [optional] [default to 'USD']
**due_date** | **string** |  | [optional]
**status** | **string** |  | [optional]
**custom_fields** | **array<string,mixed>** | Key-value pairs for custom fields | [optional]
**subscription_terms** | [**\RevKeen\Model\SubscriptionTerms**](SubscriptionTerms.md) |  | [optional]
**allowed_methods** | **string[]** | Restrict checkout payment methods for this invoice. When set, narrows available rails for checkout sessions created against this invoice. Omit to use merchant default. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
