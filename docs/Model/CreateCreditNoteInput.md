# # CreateCreditNoteInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**invoice_id** | **string** | The ID of the invoice to issue a credit note for |
**amount_minor** | **int** | Amount to credit in minor units (cents). Capped at 2,000,000,000 to stay below the 32-bit integer ceiling of the underlying DB column. |
**tax_amount_minor** | **int** | Tax portion of the credit in minor units (cents). For UK/EU VAT compliance. Capped at 2,000,000,000. | [optional]
**credit_method** | **string** | How the credit should be applied | [optional] [default to 'refund_to_payment_method']
**reason** | **string** | Reason for the credit note | [optional]
**reason_code** | **string** | Standardized reason code | [optional]
**cancel_subscription** | **bool** | Whether to cancel the associated subscription after issuing | [optional] [default to false]
**is_prorated** | **bool** | Whether this credit note represents a prorated amount | [optional]
**proration_days_total** | **int** | Total days in the billing period (for prorated credits). Constrained to 1–366. | [optional]
**proration_days_unused** | **int** | Unused days in the billing period (for prorated credits). Must be &lt;&#x3D; proration_days_total. Constrained to 0–366. | [optional]
**idempotency_key** | **string** | Idempotency key to prevent duplicate credit notes | [optional]
**metadata** | **array<string,mixed>** | Arbitrary key-value metadata | [optional]
**auto_route** | **bool** | When true, automatically trigger the process-credit-note task for multi-gateway reversal routing. Response will include gateway_operations array. Always combine with &#x60;idempotency_key&#x60; to avoid duplicate gateway operations. | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
