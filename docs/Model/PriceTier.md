# # PriceTier

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**up_to** | **int** | Upper bound of this tier (1-based inclusive). &#x60;null&#x60; &#x3D; open-ended catch-all. Only the FINAL tier may set &#x60;up_to: null&#x60;. |
**unit_amount_minor** | **int** | Per-unit charge in minor currency units (cents). May be null if the tier charges only a flat fee. |
**flat_amount_minor** | **int** | Flat fee charged once when quantity enters this tier. May be null if the tier charges only a per-unit amount. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
