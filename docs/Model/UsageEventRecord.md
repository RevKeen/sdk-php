# # UsageEventRecord

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Usage event ID |
**merchant_id** | **string** | Owning merchant ID |
**customer_id** | **string** | Customer ID |
**subscription_id** | **string** | Subscription ID |
**meter_id** | **string** | Meter ID |
**quantity** | **float** | Event quantity |
**event_time** | **\DateTime** | Event timestamp (ISO 8601) |
**idempotency_key** | **string** | Deduplication key |
**external_id** | **string** | External event identifier |
**source** | **string** | Ingestion source |
**metadata** | **array<string,mixed>** | Arbitrary event metadata |
**properties** | **array<string,mixed>** | Arbitrary event properties used for filtering/aggregation |
**ingestion_timestamp** | **\DateTime** | When the event was ingested (ISO 8601) |
**created_at** | **\DateTime** | Creation timestamp (ISO 8601) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
