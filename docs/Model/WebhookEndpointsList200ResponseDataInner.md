# # WebhookEndpointsList200ResponseDataInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the webhook endpoint |
**url** | **string** | The URL that receives webhook POST requests |
**description** | **string** | Optional human-readable description |
**enabled_events** | **string[]** | Event types this endpoint subscribes to |
**status** | **string** | Whether the endpoint is currently receiving events |
**circuit_breaker_state** | **string** | Circuit breaker status. Opens after repeated delivery failures. |
**total_deliveries** | **float** | Total number of delivery attempts |
**successful_deliveries** | **float** | Number of successful deliveries |
**failed_deliveries** | **float** | Number of failed deliveries |
**last_delivery_at** | **string** | Timestamp of the most recent delivery attempt |
**created_at** | **string** | When the endpoint was created |
**updated_at** | **string** | When the endpoint was last modified |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
