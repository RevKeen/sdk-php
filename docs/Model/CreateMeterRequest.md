# # CreateMeterRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Human-readable meter name |
**event_name** | **string** | Event name to match against |
**aggregation** | **string** | Aggregation method | [optional] [default to 'count']
**slug** | **string** | URL-safe identifier | [optional]
**description** | **string** | Meter description | [optional]
**value_key** | **string** | Property key for sum/max/last aggregations | [optional]
**filter_conditions** | **array<string,mixed>[]** | Filter conditions for matching events | [optional]
**unique_count_key** | **string** | Property key for count_unique aggregation | [optional]
**unit_name** | **string** | Display unit name | [optional]
**carry_forward** | **bool** | Carry forward last value across periods | [optional]
**metadata** | **array<string,mixed>** | Arbitrary key-value metadata | [optional]
**alert_thresholds** | **float[]** | Threshold percentages that trigger usage.threshold.reached webhooks. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
