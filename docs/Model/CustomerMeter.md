# # CustomerMeter

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**object** | **string** |  |
**customer_id** | **string** |  |
**meter_id** | **string** |  |
**meter_name** | **string** |  |
**meter_event_name** | **string** | The &#x60;event_name&#x60; the merchant&#39;s code posts to /v2/usage-events for this meter. |
**aggregation** | **string** | How quantities are aggregated. Typical values: &#x60;sum&#x60;, &#x60;count&#x60;, &#x60;max&#x60;, &#x60;unique&#x60;. |
**unit_name** | **string** | Human-readable unit for display (e.g. &#x60;tokens&#x60;, &#x60;requests&#x60;, &#x60;GB&#x60;). Merchant-configurable. |
**total_quantity** | **float** | Aggregate across all usage events for this (customer, meter) pair. The aggregation function applied matches the meter&#39;s &#x60;aggregation&#x60; field. |
**event_count** | **int** | Number of &#x60;usage_events&#x60; rows that contributed to the aggregate. Diagnostic — not the aggregate itself. |
**last_event_at** | **\DateTime** | Timestamp of the most recent usage event. Null if no events have been recorded. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
