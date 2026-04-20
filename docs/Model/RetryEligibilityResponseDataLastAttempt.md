# # RetryEligibilityResponseDataLastAttempt

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the payment attempt |
**public_id** | **string** | External reference ID (payatt_xxx format). Used as order_id in gateway requests. |
**gateway_order_id** | **string** | Order ID sent to the processor. Format: payatt_&lt;public_id&gt;. Primary correlation key for webhook mapping. |
**gateway_transaction_id** | **string** | Processor-assigned transaction reference. |
**payment_id** | **string** | Logical payment (PaymentIntent) this attempt belongs to |
**invoice_id** | **string** | Associated invoice ID |
**subscription_id** | **string** | Associated subscription ID |
**checkout_session_id** | **string** | Associated checkout session ID |
**billing_run_id** | **string** | Billing run ID for batch reconciliation |
**gateway** | **string** | Name of the payment processor that handled this attempt |
**gateway_code** | **string** | Processor-returned response code |
**gateway_message** | **string** | Processor-returned response message |
**category** | **string** | Normalized error category for the payment attempt |
**severity** | **string** | Severity level for logging/monitoring |
**retryability** | **string** | Retry behavior recommendation. retry_now: Safe to retry immediately. retry_later: Retry after delay. do_not_retry: Hard decline, don&#39;t retry. |
**customer_action** | **string** | Recommended action for the customer |
**merchant_action** | **string** | Recommended action for the merchant |
**subscription_directive** | **string** | Directive for subscription handling after decline |
**safe_customer_message_key** | **string** | Template key for customer-facing message |
**decline_type** | **string** | Decline classification. soft: May succeed on retry. hard: Will not succeed on retry. |
**attempt_status** | **string** | Final outcome status of the attempt |
**amount_cents** | **int** | Payment amount in cents |
**currency** | **string** | Three-letter ISO currency code |
**payment_method_last4** | **string** | Last 4 digits of card |
**payment_method_brand** | **string** | Card brand (visa, mastercard, etc.) |
**attempt_number** | **int** | Attempt sequence number (1 &#x3D; first attempt) |
**retry_attempt_number** | **int** | Legacy retry attempt number |
**max_retry_attempts** | **int** | Maximum retry attempts allowed |
**next_retry_at** | **\DateTime** | Next scheduled retry timestamp |
**is_scheduled_retry** | **bool** | Whether this was a scheduled retry |
**is_manual_retry** | **bool** | Whether this was a manual retry |
**created_at** | **\DateTime** | When the attempt was created |
**updated_at** | **\DateTime** | When the attempt was last updated |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
