# # PaymentIntent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Public payment intent ID (pi_xxx) |
**object** | **string** | Object type |
**amount** | **int** | Amount in cents |
**amount_capturable** | **int** | Amount that can be captured (for manual capture) |
**amount_received** | **int** | Amount actually received |
**currency** | **string** | Three-letter ISO currency code |
**customer** | **string** | Customer ID |
**description** | **string** | Description for merchant reference | [optional]
**last_payment_error** | [**\RevKeen\Model\PaymentIntentLastPaymentError**](PaymentIntentLastPaymentError.md) |  | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**next_action** | [**\RevKeen\Model\PaymentIntentNextAction**](PaymentIntentNextAction.md) |  | [optional]
**payment_method** | **string** | Payment method ID | [optional]
**receipt_email** | **string** | Email for receipt | [optional]
**statement_descriptor** | **string** | Statement descriptor | [optional]
**statement_descriptor_suffix** | **string** | Statement descriptor suffix | [optional]
**status** | **string** | Payment intent status. requires_payment_method: Needs payment method. requires_confirmation: Ready to confirm. requires_action: Requires customer action (3DS). processing: Being processed. succeeded: Payment complete. canceled: Canceled. |
**capture_method** | **string** | Capture method. automatic: Capture immediately on confirmation. manual: Authorize then capture separately. |
**client_secret** | **string** | Client secret for frontend confirmation |
**canceled_at** | **\DateTime** | When the intent was canceled | [optional]
**cancellation_reason** | **string** | Why the intent was canceled | [optional]
**created** | **int** | Unix timestamp of creation |
**livemode** | **bool** | Whether in live mode |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
