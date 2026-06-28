# # CreateMeterPriceRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pricing_model** | **string** | Pricing model. &#39;percentage&#39; charges a basis-points percentage of the metered amount (REV-3465); other models charge per unit, graduated tiers, volume tiers, or packages. |
**currency** | **string** | ISO 4217 currency code. A usage-based subscription has one currency; metered events attributed to it are assumed to be in this currency and are not FX-converted by RevKeen. |
**unit_amount_minor** | **int** | Price per unit in minor units (for per_unit) | [optional]
**flat_fee_minor** | **int** | Base charge per period in minor units | [optional]
**package_size** | **int** | Units per package (for package model) | [optional]
**cost_per_unit_minor** | **int** | Merchant&#39;s cost per unit for margin intelligence | [optional]
**name** | **string** | Customer-facing price name | [optional]
**nickname** | **string** | Internal price nickname | [optional]
**description** | **string** | Description of this price option | [optional]
**tiers** | [**\RevKeen\Model\PriceTier[]**](PriceTier.md) | Tier configuration (for graduated and volume) | [optional]
**percentage_rate_bps** | **int** | Rate in basis points. 70 &#x3D; 0.7%. Required when pricing_model&#x3D;&#39;percentage&#39;. Range 0–10000 (0%–100%). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
