# # CreatePaymentIntentRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **int** | Amount in cents. Must be greater than 0. |
**currency** | **string** | Three-letter ISO currency code. Defaults to USD. | [optional] [default to 'USD']
**customer** | **string** | Customer ID to charge |
**payment_method** | **string** | Payment method ID. If not provided, status will be requires_payment_method. | [optional]
**capture_method** | **string** | Capture method. Defaults to automatic. | [optional] [default to 'automatic']
**description** | **string** | Description for merchant reference | [optional]
**statement_descriptor** | **string** | Statement descriptor shown on customer&#39;s statement | [optional]
**statement_descriptor_suffix** | **string** | Statement descriptor suffix | [optional]
**receipt_email** | **string** | Email to send receipt to | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**gateway_merchant_id** | **string** | Specific gateway merchant ID for multi-MID setups (NMI) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
