# # CreditNoteLine

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**object** | **string** |  |
**credit_note_id** | **string** |  |
**invoice_line_item_id** | **string** | The invoice line item this credit line applies to, when the credit was scoped to a specific line. Null for invoice-level credits. |
**description** | **string** |  |
**quantity** | **int** |  |
**unit_amount_minor** | **int** | Per-unit credit amount in cents |
**total_amount_minor** | **int** | Total credit for this line in cents |
**metadata** | **array<string,mixed>** |  |
**created_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
