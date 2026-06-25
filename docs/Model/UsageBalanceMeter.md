# # UsageBalanceMeter

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**meter_id** | **string** | Meter ID |
**meter_name** | **string** | Meter display name |
**price_name** | **string** | Attached price display name |
**unit_name** | **string** | Unit display name |
**billing_scheme** | **string** | Pricing scheme used for estimated charges: per_unit, tiered, or percentage |
**tiers_mode** | **string** | Tier mode when billing_scheme is tiered |
**unit_amount_minor** | **float** | Per-unit amount in minor currency units when applicable |
**package_size** | **float** | Package size when package-style metered pricing is configured |
**percentage_rate_bps** | **float** | Percentage rate in basis points when billing_scheme is percentage. 70 &#x3D; 0.7%. |
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
**last_event_at** | **string** | Most recent usage event timestamp in the current billing period |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
