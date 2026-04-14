# # Dispute

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the dispute |
**public_id** | **string** | Public-facing dispute identifier |
**payment_id** | **string** | The original payment ID this dispute is for (alias for parent_transaction_id) |
**parent_transaction_id** | **string** | Parent transaction ID in unified transaction model. Same as payment_id for disputes. |
**gateway** | **string** | Payment gateway that processed the original transaction |
**gateway_dispute_id** | **string** | Dispute identifier assigned by the payment gateway |
**gateway_transaction_id** | **string** | Original transaction identifier from the payment gateway |
**amount_minor** | **float** | Disputed amount in cents |
**currency** | **string** | Three-letter ISO 4217 currency code |
**reason_code** | **string** | Card network reason code |
**reason** | **string** | Human-readable reason for the dispute |
**network_reason_code** | **string** | Card network-specific reason code |
**network_reason_description** | **string** | Card network-specific reason description |
**customer_name** | **string** | Name of the customer who filed the dispute |
**card_brand** | **string** | Card brand used for the original payment |
**card_last4** | **string** | Last four digits of the card used for the original payment |
**evidence_due_by** | **string** | Deadline for submitting evidence to contest the dispute |
**evidence_submitted** | **bool** | Whether evidence has been submitted for this dispute |
**evidence_submitted_at** | **string** | Timestamp when evidence was submitted |
**status** | **string** | Current status of the dispute lifecycle |
**resolution** | **string** | Final resolution outcome of the dispute |
**resolved_at** | **string** | Timestamp when the dispute was resolved |
**disputed_at** | **string** | Timestamp when the dispute was filed |
**created_at** | **string** | Timestamp when the dispute record was created |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
