# # PaymentMethod

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the payment method |
**object** | **string** | Object type, always &#39;payment_method&#39; |
**public_id** | **string** | Public ID visible in API responses (pm_xxx format) |
**type** | **string** | The type of payment method |
**status** | **string** | The status of the payment method |
**customer_id** | **string** | ID of the customer this payment method belongs to |
**is_default** | **bool** | Whether this is the customer&#39;s default payment method |
**card** | [**\RevKeen\Model\CardDetails**](CardDetails.md) |  |
**us_bank_account** | [**\RevKeen\Model\BankAccountDetails**](BankAccountDetails.md) |  |
**billing_details** | [**\RevKeen\Model\BillingDetails**](BillingDetails.md) |  |
**metadata** | **array<string,mixed>** | Custom metadata attached to the payment method |
**created_at** | **\DateTime** | When the payment method was created |
**updated_at** | **\DateTime** | When the payment method was last updated |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
