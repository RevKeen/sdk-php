# # MeterPriceTierInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**up_to** | **int** | Upper bound of this tier (1-based inclusive). null &#x3D; open-ended final tier. New clients should use this canonical shape; legacy first_unit/last_unit is accepted during the deprecation window. | [optional]
**unit_amount_minor** | **int** | Per-unit price in this tier (minor units) |
**flat_amount_minor** | **int** | Flat fee for entering this tier (minor units) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
