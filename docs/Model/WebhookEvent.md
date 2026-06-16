# # WebhookEvent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique event identifier |
**type** | **string** | Event type using dot notation (e.g., &#x60;payment.succeeded&#x60;) |
**created** | **int** | Unix timestamp when the event was created |
**livemode** | **bool** | Whether this event occurred in live mode | [optional]
**data** | [**\RevKeen\Model\WebhookEventData**](WebhookEventData.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
