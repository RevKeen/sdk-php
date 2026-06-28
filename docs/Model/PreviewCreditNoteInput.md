# # PreviewCreditNoteInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**invoice_id** | **string** | Invoice to preview a credit note against. |
**amount_minor** | **int** | Proposed credit amount in cents. The preview validates that this does not exceed the invoice&#39;s outstanding creditable amount. |
**tax_amount_minor** | **int** | Proposed tax portion of the credit in cents. | [optional]
**credit_method** | **string** | Planned credit method. Defaults to refund_to_payment_method. | [optional]
**reason_code** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
