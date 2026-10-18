# AccountingInvoicePaymentRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**object** | **string** |  |
**merchant_id** | **string** |  |
**provider** | **string** |  |
**connection_id** | **string** |  |
**provider_account_id** | **string** |  |
**external_invoice_id** | **string** |  |
**external_invoice_number** | **string** |  | [optional]
**external_invoice_status** | **string** |  | [optional]
**external_invoice_url** | **string** |  | [optional]
**external_invoice_issued_at** | **\DateTime** |  | [optional]
**external_invoice_due_at** | **\DateTime** |  | [optional]
**external_invoice_updated_at** | **\DateTime** |  | [optional]
**external_customer_id** | **string** |  | [optional]
**external_customer_reference** | **string** |  | [optional]
**external_customer_name** | **string** |  | [optional]
**external_customer_email** | **string** |  | [optional]
**amount_due_minor** | [**MoneyMinor**](MoneyMinor.md) |  |
**total_amount_minor** | [**MoneyMinor**](MoneyMinor.md) |  | [optional]
**amount_paid_minor** | [**MoneyMinor**](MoneyMinor.md) |  | [optional]
**currency** | **string** |  |
**checkout_session_id** | **string** |  | [optional]
**checkout_url** | **string** |  | [optional]
**checkout_expires_at** | **\DateTime** |  | [optional]
**checkout_success_url** | **string** |  | [optional]
**checkout_cancel_url** | **string** |  | [optional]
**checkout_allowed_methods** | **string[]** |  | [optional]
**status** | **string** |  |
**sync_status** | **string** |  |
**idempotency_key** | **string** |  |
**payload_fingerprint** | **string** |  |
**created_at** | **\DateTime** |  |
**updated_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
