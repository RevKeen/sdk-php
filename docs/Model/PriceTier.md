# # PriceTier

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**up_to** | **int** | Upper bound of this tier (1-based inclusive). &#x60;null&#x60; &#x3D; open-ended catch-all. Only the FINAL tier may set &#x60;up_to: null&#x60;. |
**unit_amount_minor** | **int** | Per-unit charge in minor currency units (cents). May be null if the tier charges only a flat fee, or (REV-6249) when the rate is sub-penny and carried by &#x60;unit_amount_decimal&#x60;. |
**unit_amount_decimal** | **string** | Exact per-unit rate for this tier in minor currency units, as a decimal string (sub-penny safe, e.g. \&quot;0.0000024\&quot;). Takes precedence over &#x60;unit_amount_minor&#x60;, which is null whenever the rate is not a whole number of minor units. Must be &gt; 0 with at most 12 decimal places. Tier BOUNDARIES remain integer. | [optional]
**flat_amount_minor** | **int** | Flat fee charged once when quantity enters this tier. May be null if the tier charges only a per-unit amount. Always a whole number of minor units — only the per-unit RATE supports sub-penny precision. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
