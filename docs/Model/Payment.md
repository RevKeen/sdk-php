# # Payment

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the payment |
**object** | **string** | Object type |
**invoice_id** | **string** | Associated invoice ID | [optional]
**customer_id** | **string** | Customer ID | [optional]
**status** | **string** | Payment status. pending: Processing. authorized: Funds reserved. captured/succeeded: Funds collected. failed: Payment failed. voided: Canceled before capture. refunded/partially_refunded: Returned to customer. |
**currency** | **string** | Three-letter ISO currency code |
**amount** | **int** | Payment amount in cents |
**amount_captured** | **int** | Amount captured in cents (for auth-capture flow) | [optional]
**amount_refunded** | **int** | Amount refunded in cents | [optional] [default to 0]
**gateway** | **string** | Name of the payment processor that handled this payment | [optional]
**gateway_transaction_id** | **string** | Processor&#39;s transaction reference | [optional]
**gateway_response_code** | **string** | Normalized response code from the processor | [optional]
**gateway_response_text** | **string** | Human-readable response message from the processor | [optional]
**payment_method_type** | **string** | Payment method type (card, ach, wallet) | [optional]
**card_brand** | **string** | Card brand (visa, mastercard, etc.) | [optional]
**card_last_four** | **string** | Last 4 digits of card | [optional]
**payment_channel** | **string** | Payment channel. card_present: terminal/POS payment. card_not_present: online or recurring payment. bank_transfer: ACH/direct debit. manual: manually recorded. | [optional]
**entry_mode** | **string** | Card entry mode for card-present (terminal) payments. null for online payments. | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**created_at** | **\DateTime** |  |
**updated_at** | **\DateTime** |  |
**authorized_at** | **\DateTime** |  | [optional]
**captured_at** | **\DateTime** |  | [optional]
**voided_at** | **\DateTime** |  | [optional]
**refunded_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
