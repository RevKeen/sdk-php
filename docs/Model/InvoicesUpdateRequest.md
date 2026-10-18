# InvoicesUpdateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**total_minor** | [**MoneyMinor**](MoneyMinor.md) | Header total in minor units. Accepted only on a draft invoice with no line items; amount_due_minor follows it. | [optional]
**due_date** | **string** |  | [optional]
**allowed_methods** | **string[]** | Update the invoice&#39;s restricted payment methods. Empty array clears restriction (merchant defaults apply); omit to leave unchanged. | [optional]
**subscription_terms** | [**\RevKeen\Model\InvoicesUpdateRequestSubscriptionTerms**](InvoicesUpdateRequestSubscriptionTerms.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
