# # CreditNote

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique credit note identifier |
**credit_note_number** | **string** | Sequential credit note number for accounting reference |
**invoice_id** | **string** | ID of the invoice this credit note applies to |
**customer_id** | **string** | ID of the customer who received the credit |
**amount_minor** | **int** | Credit amount in minor units (cents) |
**tax_amount_minor** | **int** | Tax portion of the credit in minor units |
**currency** | **string** | Three-letter ISO 4217 currency code |
**status** | **string** | Credit note status: draft, issued, or void |
**reason** | **string** | Human-readable reason for the credit |
**reason_code** | **string** | Machine-readable reason code (e.g., billing_error, customer_request) |
**credit_method** | **string** | How the credit is applied: refund_to_payment_method, customer_balance, or external |
**pdf_url** | **string** | URL to the credit note PDF document |
**issued_at** | **string** | When the credit note was issued (ISO 8601) |
**created_at** | **string** | When the credit note was created (ISO 8601) |
**updated_at** | **string** | When the credit note was last updated (ISO 8601) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
