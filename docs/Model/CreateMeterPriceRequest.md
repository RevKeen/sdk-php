# # CreateMeterPriceRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pricing_model** | **string** | Pricing model |
**currency** | **string** | ISO 4217 currency code |
**unit_amount_minor** | **int** | Price per unit in minor units (for per_unit) | [optional]
**flat_fee_minor** | **int** | Base charge per period in minor units | [optional]
**package_size** | **int** | Units per package (for package model) | [optional]
**cost_per_unit_minor** | **int** | Merchant&#39;s cost per unit for margin intelligence | [optional]
**tiers** | [**\RevKeen\Model\CreateMeterPriceRequestTiersInner[]**](CreateMeterPriceRequestTiersInner.md) | Tier configuration (for graduated and volume) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
