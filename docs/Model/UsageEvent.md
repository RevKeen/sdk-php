# # UsageEvent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Event name matching a meter&#39;s event_name |
**customer_id** | **string** | RevKeen customer ID. Prefer external_customer_id unless your system already stores RevKeen customer UUIDs. | [optional]
**external_customer_id** | **string** | Your external customer identifier. Recommended attribution field; unknown values fail rather than creating orphan usage. | [optional]
**subscription_id** | **string** | Subscription ID to attribute usage to. Usage is assumed to share the subscription currency; RevKeen does not perform FX conversion in metering. | [optional]
**meter_id** | **string** | Direct meter ID (alternative to event name matching) | [optional]
**quantity** | **float** | Event quantity (default: 1). For percentage-priced meters, send the signed transaction amount in the subscription currency&#39;s minor units. | [optional] [default to 1]
**timestamp** | **string** | ISO 8601 timestamp (default: now) | [optional]
**idempotency_key** | **string** | Merchant-scoped deduplication key. Reusing the same key returns duplicate status and does not create another billable event. | [optional]
**metadata** | **array<string,mixed>** | Arbitrary properties for filtering and aggregation | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
