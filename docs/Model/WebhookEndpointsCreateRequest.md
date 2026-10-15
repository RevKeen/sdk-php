# WebhookEndpointsCreateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**url** | **string** | The URL to receive webhook POST requests. Must be HTTPS in production. |
**enabled_events** | **string[]** | Event types to subscribe to: &#x60;*&#x60; for every event, an event name (e.g. &#x60;invoice.paid&#x60;), or a prefix wildcard (e.g. &#x60;invoice.*&#x60;). Unknown names are rejected with 400 invalid_event_type; duplicates are removed. At least one event is required. |
**description** | **string** | Optional human-readable description (max 500 characters) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
