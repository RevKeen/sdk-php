# RecordInvoicePaymentRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**mode** | **string** | Record a payment the customer made outside RevKeen (bank transfer, cash, cheque). RevKeen does not collect any money in this mode. |
**payment_method** | **string** | How the customer paid. Required. |
**reference** | **string** | Your reference for the payment (cheque number, bank transfer id, receipt number). Required. It is stored on the payment record. |
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Amount received, in minor units of the invoice currency (for example pence). Required, a positive integer, never defaulted. It cannot exceed the invoice total less what is already paid. A smaller amount records a partial payment and moves the invoice to partially_paid. |
**notes** | **string** | Free-text note about the payment. Stored on the payment record. | [optional]
**paid_at** | **\DateTime** | When the money was received (ISO 8601). Defaults to now. It cannot be in the future. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
