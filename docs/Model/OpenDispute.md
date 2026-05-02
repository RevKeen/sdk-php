# # OpenDispute

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the dispute |
**public_id** | **string** | Public-facing dispute identifier |
**payment_id** | **string** | The original payment ID this dispute is for |
**parent_transaction_id** | **string** | Parent transaction ID in unified transaction model |
**gateway** | **string** | Payment gateway that processed the original transaction |
**amount_minor** | **float** | Disputed amount in cents |
**currency** | **string** | Three-letter ISO 4217 currency code |
**reason** | **string** | Human-readable reason for the dispute |
**customer_name** | **string** | Name of the customer who filed the dispute |
**card_brand** | **string** | Card brand used for the original payment |
**card_last4** | **string** | Last four digits of the card used for the original payment |
**evidence_due_by** | **string** | Deadline for submitting evidence to contest the dispute |
**days_until_due** | **float** | Number of days remaining until the evidence deadline |
**is_overdue** | **bool** | Whether the evidence submission deadline has passed |
**disputed_at** | **string** | Timestamp when the dispute was filed |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
