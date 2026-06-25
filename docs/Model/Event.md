# # Event

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique event identifier |
**object** | **string** | Object type |
**type** | **string** | Event type (e.g., invoice.paid, payment.succeeded) |
**data** | [**\RevKeen\Model\EventData**](EventData.md) |  |
**request** | [**\RevKeen\Model\EventRequest**](EventRequest.md) |  |
**pending_webhooks** | **int** | Number of webhooks still pending delivery for this event |
**api_version** | **string** | API version used to render this event |
**livemode** | **bool** | Whether this event was produced in live mode |
**created** | **int** | Unix timestamp when the event was created |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
