# # UpdateMeterPriceRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**unit_amount_minor** | **int** |  | [optional]
**flat_fee_minor** | **int** |  | [optional]
**package_size** | **int** |  | [optional]
**cost_per_unit_minor** | **int** |  | [optional]
**name** | **string** |  | [optional]
**nickname** | **string** |  | [optional]
**description** | **string** |  | [optional]
**tiers** | [**\RevKeen\Model\PriceTier[]**](PriceTier.md) |  | [optional]
**percentage_rate_bps** | **int** | Rate in basis points. 70 &#x3D; 0.7%. Only meaningful when the price&#39;s pricing_model is &#39;percentage&#39;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
