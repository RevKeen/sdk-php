# # InvoicesMarginEstimateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_minor** | **int** | Optional amount in minor units. Defaults to the invoice total. | [optional]
**rails** | **string[]** | Rails to estimate. Defaults to invoice allowed_methods or all rails. | [optional]
**card_scheme** | **string** | Single card scheme to estimate for card rail, e.g. visa or mastercard. | [optional]
**card_schemes** | **string[]** | Card schemes to estimate for card rail. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
