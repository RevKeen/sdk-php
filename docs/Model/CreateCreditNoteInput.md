# # CreateCreditNoteInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**invoice_id** | **string** | The ID of the invoice to issue a credit note for |
**amount_minor** | **float** | Amount to credit in cents |
**tax_amount_minor** | **float** | Tax portion of the credit in cents (for UK/EU VAT compliance) | [optional]
**credit_method** | **string** | How the credit should be applied | [optional] [default to 'refund_to_payment_method']
**reason** | **string** | Reason for the credit note | [optional]
**reason_code** | **string** | Standardized reason code | [optional]
**cancel_subscription** | **bool** | Whether to cancel the associated subscription after issuing | [optional] [default to false]
**is_prorated** | **bool** | Whether this credit note represents a prorated amount | [optional]
**proration_days_total** | **float** | Total days in the billing period (for prorated credits) | [optional]
**proration_days_unused** | **float** | Unused days in the billing period (for prorated credits) | [optional]
**idempotency_key** | **string** | Idempotency key to prevent duplicate credit notes | [optional]
**metadata** | **array<string,mixed>** | Arbitrary key-value metadata | [optional]
**auto_route** | **bool** | When true, automatically trigger the process-credit-note task for multi-gateway reversal routing. Response will include gateway_operations array. | [optional] [default to false]
**customer_present** | **bool** | For terminal (card-present) transactions: whether the customer is physically at the terminal. Defaults to false in API context. | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
