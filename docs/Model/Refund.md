# # Refund

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**public_id** | **string** |  |
**payment_id** | **string** | The original payment ID this refund is for (alias for parent_transaction_id) |
**parent_transaction_id** | **string** | Parent transaction ID in unified transaction model. Same as payment_id for refunds. |
**order_id** | **string** |  |
**gateway** | **string** |  |
**gateway_refund_id** | **string** |  |
**amount_minor** | **float** | Refund amount in cents |
**currency** | **string** |  |
**reason** | **string** |  |
**reason_details** | **string** |  |
**status** | **string** |  |
**failure_reason** | **string** |  |
**failure_code** | **string** |  |
**processed_at** | **string** |  |
**created_at** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
