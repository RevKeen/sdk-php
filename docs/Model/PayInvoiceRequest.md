# PayInvoiceRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**mode** | **string** | Collect the invoice&#39;s outstanding amount from the customer. The collection is scheduled, not completed: the invoice stays unpaid until the money settles. |
**payment_method** | **string** | How to collect. Required. Only &#x60;direct_debit&#x60; is available; card collection is not available through this operation. |
**reference** | **string** | Your reference for the payment (cheque number, bank transfer id, receipt number). Required. It is stored on the payment record. |
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Amount received, in minor units of the invoice currency (for example pence). Required, a positive integer, never defaulted. It cannot exceed the invoice total less what is already paid. A smaller amount records a partial payment and moves the invoice to partially_paid. |
**notes** | **string** | Free-text note about the payment. Stored on the payment record. | [optional]
**paid_at** | **\DateTime** | When the money was received (ISO 8601). Defaults to now. It cannot be in the future. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
