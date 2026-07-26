# # Void

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**public_id** | **string** |  |
**payment_id** | **string** | The original payment ID this void is for (alias for parent_transaction_id) |
**parent_transaction_id** | **string** | Parent transaction ID in unified transaction model. |
**order_id** | **string** |  |
**gateway** | **string** | Name of the payment processor that handled this void |
**gateway_void_id** | **string** |  |
**amount_minor** | **float** | Void amount in cents (always full amount of original transaction) |
**currency** | **string** |  |
**reason** | **string** |  |
**reason_code** | **string** |  |
**status** | **string** |  |
**failure_reason** | **string** |  |
**failure_code** | **string** |  |
**voided_at** | **string** |  |
**created_at** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
