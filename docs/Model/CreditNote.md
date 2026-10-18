# CreditNote

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**credit_note_number** | **string** |  |
**invoice_id** | **string** | The invoice this credit note is for |
**customer_id** | **string** |  |
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Credit amount in cents |
**tax_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Tax portion of the credit in cents |
**currency** | **string** |  |
**credit_method** | **string** |  |
**reason** | **string** |  |
**reason_code** | **string** |  |
**status** | **string** |  |
**refund_id** | **string** | Associated refund ID if credit method is refund_to_payment_method |
**subscription_id** | **string** |  |
**subscription_canceled** | **bool** |  |
**is_prorated** | **bool** |  |
**pdf_url** | **string** |  |
**issued_at** | **\DateTime** |  |
**created_at** | **\DateTime** |  |
**updated_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
