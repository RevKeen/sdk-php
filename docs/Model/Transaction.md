# # Transaction

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the transaction |
**object** | **string** | Object type |
**type** | **string** | Transaction type. sale: original payment. refund: money returned. void: cancel before settlement. capture: capture a previous auth. dispute: chargeback. adjustment: manual correction. |
**status** | **string** | Transaction status. pending: processing. succeeded: completed. failed: declined or errored. voided: canceled. |
**invoice_id** | **string** | Associated invoice ID |
**customer_id** | **string** | Customer ID | [optional]
**parent_transaction_id** | **string** | Parent transaction ID (required for refunds, voids, disputes, adjustments) | [optional]
**currency** | **string** | Three-letter ISO currency code |
**amount** | **int** | Transaction amount in minor units (cents) |
**amount_refunded** | **int** | Amount refunded in minor units | [optional] [default to 0]
**gateway** | **string** | Payment gateway (e.g., &#39;nmi&#39;) | [optional]
**gateway_transaction_id** | **string** | Gateway&#39;s transaction reference | [optional]
**gateway_response_code** | **string** | Gateway response code | [optional]
**gateway_response_text** | **string** | Gateway response message | [optional]
**payment_method_type** | **string** | Payment method type (card, ach, wallet) | [optional]
**card_brand** | **string** | Card brand (visa, mastercard, etc.) | [optional]
**card_last_four** | **string** | Last 4 digits of card | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**created_at** | **\DateTime** | Creation timestamp (ISO 8601) |
**updated_at** | **\DateTime** | Last update timestamp (ISO 8601) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
