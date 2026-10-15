# WebhookEndpointsUpdateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**url** | **string** | New URL for the endpoint | [optional]
**enabled_events** | **string[]** | Replace the subscribed event types. Event types to subscribe to: &#x60;*&#x60; for every event, an event name (e.g. &#x60;invoice.paid&#x60;), or a prefix wildcard (e.g. &#x60;invoice.*&#x60;). Unknown names are rejected with 400 invalid_event_type; duplicates are removed. | [optional]
**description** | **string** | Update the description | [optional]
**enabled** | **bool** | Enable or disable the endpoint | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
