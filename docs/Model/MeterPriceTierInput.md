# # MeterPriceTierInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**up_to** | **int** | Upper bound of this tier (1-based inclusive). null &#x3D; open-ended final tier. New clients should use this canonical shape; legacy first_unit/last_unit is accepted during the deprecation window. | [optional]
**unit_amount_minor** | **int** | Per-unit price in this tier (minor units). For a sub-penny per-tier rate use &#x60;unit_amount_decimal&#x60;. Optional when &#x60;unit_amount_decimal&#x60; or &#x60;flat_amount_minor&#x60; is supplied. | [optional]
**unit_amount_decimal** | **string** | Exact per-unit rate for this tier in minor units as a decimal string (sub-penny safe, e.g. \&quot;0.0000024\&quot; &#x3D; 0.0000024 pence per token). Takes precedence over &#x60;unit_amount_minor&#x60;. Must be &gt; 0 with at most 12 decimal places. Amounts are rounded per tier with half-up (away from zero) before the tier subtotals are summed. | [optional]
**flat_amount_minor** | **int** | Flat fee for entering this tier (minor units). Always a whole number of minor units — only the per-unit RATE supports sub-penny precision. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
