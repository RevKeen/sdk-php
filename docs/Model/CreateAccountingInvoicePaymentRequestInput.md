# # CreateAccountingInvoicePaymentRequestInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**provider** | **string** |  |
**connection_id** | **string** |  |
**provider_account_id** | **string** |  |
**external_invoice** | [**\RevKeen\Model\CreateAccountingInvoicePaymentRequestInputExternalInvoice**](CreateAccountingInvoicePaymentRequestInputExternalInvoice.md) |  |
**external_customer** | [**\RevKeen\Model\CreateAccountingInvoicePaymentRequestInputExternalCustomer**](CreateAccountingInvoicePaymentRequestInputExternalCustomer.md) |  | [optional]
**amount_due_minor** | **int** |  |
**total_amount_minor** | **int** |  | [optional]
**amount_paid_minor** | **int** |  | [optional]
**currency** | **string** |  |
**checkout** | [**\RevKeen\Model\CreateAccountingInvoicePaymentRequestInputCheckout**](CreateAccountingInvoicePaymentRequestInputCheckout.md) |  | [optional]
**payload_fingerprint** | **string** |  | [optional]
**provider_metadata** | **array<string,mixed>** |  | [optional]
**safe_provider_invoice_snapshot** | **array<string,mixed>** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
