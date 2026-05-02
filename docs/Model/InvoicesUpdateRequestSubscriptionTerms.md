# # InvoicesUpdateRequestSubscriptionTerms

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**collection_method** | **string** | How to collect payment for recurring invoices |
**start_mode** | **string** | When the subscription billing cycle starts |
**start_date** | **string** | Start date (ISO 8601) — required when start_mode is &#39;specific_date&#39; | [optional]
**duration_type** | **string** | How the subscription duration is determined |
**duration_count** | **int** | Number of billing cycles — required when duration_type is &#39;fixed_cycles&#39; | [optional]
**end_date** | **string** | End date (ISO 8601) — required when duration_type is &#39;end_date&#39; | [optional]
**first_payment_behavior** | **string** | Whether to charge the first cycle immediately or defer to the start date |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
