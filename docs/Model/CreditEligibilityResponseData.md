# CreditEligibilityResponseData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**can_credit** | **bool** | Whether a credit note can be issued for this invoice |
**max_creditable_minor** | [**MoneyMinor**](MoneyMinor.md) | Maximum amount that can be credited in minor units |
**total_credited_minor** | [**MoneyMinor**](MoneyMinor.md) | Total amount already credited against this invoice |
**invoice_total_minor** | [**MoneyMinor**](MoneyMinor.md) | Original invoice total in minor units |
**reason** | **string** | Reason why the invoice cannot be credited, if applicable | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
