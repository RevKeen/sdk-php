# # TerminalPayment

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for this terminal payment attempt |
**invoice_id** | **string** | Associated invoice ID, or null for walk-in/ad-hoc payments |
**device_id** | **string** | The terminal device that processed (or is processing) this payment |
**type** | **string** | Transaction type. sale: original charge. refund: money returned. void: pre-settlement cancellation. |
**status** | **string** | Payment lifecycle status. requested: command sent, awaiting card. in_progress: terminal processing. approved: payment succeeded. declined: issuer declined. cancelled: merchant cancelled. error: terminal error. timed_out: no response within 3 minutes. |
**amount_minor** | **float** | Amount in minor units (e.g., pence for GBP, cents for USD) |
**currency** | **string** | ISO 4217 currency code |
**reference** | **string** | Payment reference (invoice number or custom reference) |
**terminal_serial** | **string** | Serial number of the PAX terminal that processed this payment |
**uti** | **string** | Unique Transaction Identifier from the terminal |
**auth_code** | **string** | Authorization code from the payment processor. Present when approved. |
**response_code** | **string** | Terminal response code. &#39;00&#39; indicates approval. |
**rrn** | **string** | Retrieval Reference Number for settlement reconciliation |
**card_scheme** | **string** | Card network (e.g., VISA, MASTERCARD, AMEX) |
**masked_pan** | **string** | Masked card number — only the last 4 digits are visible |
**entry_mode** | **string** | How the card was read: contactless (NFC tap), emv_chip (chip insert), magnetic_stripe (swipe), manual_entry (keyed), or fallback (chip-to-swipe) |
**error_message** | **string** | Human-readable error message when status is error or timed_out |
**created_at** | **string** | ISO 8601 timestamp when the payment was initiated |
**completed_at** | **string** | ISO 8601 timestamp when the terminal returned a result, or null if still in progress |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
