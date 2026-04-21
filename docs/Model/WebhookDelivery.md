# # WebhookDelivery

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**object** | **string** |  |
**endpoint_id** | **string** |  |
**event_id** | **string** | The event this delivery attempted to send. |
**event_type** | **string** |  |
**status** | **string** | Delivery state. pending: queued or retrying. succeeded: 2xx response received. failed: last attempt failed, may retry based on attempts/max_attempts. dead_lettered: max attempts exhausted, will not retry automatically. |
**attempts** | **int** |  |
**max_attempts** | **int** |  |
**last_status_code** | **int** | HTTP status code returned on the last attempt. |
**last_error** | **string** | Truncated error message from the last failed attempt. |
**last_error_code** | **string** |  |
**last_duration_ms** | **int** |  |
**last_attempt_at** | **\DateTime** |  |
**next_retry_at** | **\DateTime** |  |
**delivered_at** | **\DateTime** |  |
**dead_lettered_at** | **\DateTime** |  |
**dead_letter_reason** | **string** |  |
**created_at** | **\DateTime** |  |
**updated_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
