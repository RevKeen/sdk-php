# # UsageBalanceMeter

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meter_id** | **string** | Meter ID |
**meter_name** | **string** | Meter display name |
**unit_name** | **string** | Unit display name |
**current_value** | **float** | Aggregated usage in current period |
**included_quantity** | **float** | Units included in plan (0 if pure metered) |
**used_quantity** | **float** | Usage consumed (same as current_value) |
**remaining_included** | **float** | Remaining included units (max 0) |
**overage_quantity** | **float** | Units over allowance (max 0) |
**estimated_amount_minor** | **float** | Estimated charge for overage in minor units |
**total_cost_minor** | **float** | Sum of event cost annotations (null if no cost data) |
**margin_minor** | **float** | Estimated margin: revenue - cost (null if no cost data) |
**currency** | **string** | Currency code |
**period_start** | **string** | Current billing period start (ISO 8601) |
**period_end** | **string** | Current billing period end (ISO 8601) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
