# # Mandate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Mandate ID |
**mandate_ref** | **string** | RevKeen mandate reference (Bacs DDI reference) |
**mandate_reference** | **string** | Human-facing mandate reference |
**customer_id** | **string** | Customer the mandate belongs to |
**status** | **string** | Mandate status |
**account_holder_name** | **string** | Name on the bank account |
**sort_code** | **string** | Masked sort code — never the full value |
**account_number_last4** | **string** | Last 4 digits of the account number |
**bank_name** | **string** | Resolved bank name |
**statement_name** | **string** | Bacs statement descriptor (max 18 chars) | [optional]
**notice_days** | **int** | Advance-notice days applied |
**first_collection_date** | **string** | Earliest collection date (YYYY-MM-DD) | [optional]
**next_collection_date** | **string** | Next scheduled collection date (YYYY-MM-DD) | [optional]
**backup_payment_method_id** | **string** | Recovery fallback card | [optional]
**activated_at** | **string** | When the mandate became active (ISO 8601) | [optional]
**suspended_at** | **string** | When the mandate was suspended (ISO 8601) | [optional]
**cancelled_at** | **string** | When the mandate was cancelled (ISO 8601) | [optional]
**failure_reason** | **string** | Most recent failure reason | [optional]
**mandate_request_id** | **string** | Mandate-request consumed on creation, if any | [optional]
**invoice_id** | **string** | Invoice linked via the mandate-request, if any | [optional]
**created_at** | **string** | Creation timestamp (ISO 8601) | [optional]
**updated_at** | **string** | Last-updated timestamp (ISO 8601) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
