# # CreditNotePreview

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**object** | **string** |  |
**invoice_id** | **string** |  |
**proposed_amount_minor** | **int** |  |
**proposed_tax_amount_minor** | **int** |  |
**currency** | **string** |  |
**invoice** | [**\RevKeen\Model\CreditNotePreviewInvoice**](CreditNotePreviewInvoice.md) |  |
**after_credit** | [**\RevKeen\Model\CreditNotePreviewAfterCredit**](CreditNotePreviewAfterCredit.md) |  |
**exceeds_max_creditable** | **bool** | True if &#x60;amount_minor&#x60; exceeds the invoice&#39;s remaining creditable amount. A real create call would be rejected. |
**credit_method** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
