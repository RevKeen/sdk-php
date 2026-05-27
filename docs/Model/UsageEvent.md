# # UsageEvent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Event name matching a meter&#39;s event_name |
**customer_id** | **string** | RevKeen customer ID | [optional]
**external_customer_id** | **string** | Your external customer identifier | [optional]
**subscription_id** | **string** | Subscription ID to attribute usage to | [optional]
**meter_id** | **string** | Direct meter ID (alternative to event name matching) | [optional]
**quantity** | **float** | Event quantity (default: 1) | [optional] [default to 1]
**timestamp** | **string** | ISO 8601 timestamp (default: now) | [optional]
**idempotency_key** | **string** | Unique key for deduplication | [optional]
**metadata** | **array<string,mixed>** | Arbitrary properties for filtering and aggregation | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
