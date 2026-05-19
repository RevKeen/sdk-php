# # CreatePriceRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**product_id** | **string** | ID of the product this price belongs to |
**currency** | **string** | Three-letter ISO currency code | [optional] [default to 'usd']
**unit_amount** | **int** | Price in minor units (cents). Required for fixed pricing. | [optional]
**type** | **string** | Price type | [optional] [default to 'one_time']
**pricing_model** | **string** | Pricing model | [optional] [default to 'fixed']
**interval** | **string** | Billing interval (required for recurring) | [optional]
**interval_count** | **int** | Number of intervals between billings (1-12) | [optional]
**trial_period_days** | **int** | Trial period in days (0-730) | [optional]
**minimum_amount** | **int** | PWYW: minimum amount in cents | [optional]
**maximum_amount** | **int** | PWYW: maximum amount in cents | [optional]
**suggested_amount** | **int** | PWYW: suggested amount in cents | [optional]
**preset_amounts** | **int[]** | PWYW: quick-select amounts (max 10) | [optional]
**nickname** | **string** | Display name (e.g., &#39;Monthly&#39;, &#39;Annual&#39;) | [optional]
**lookup_key** | **string** | Stable key for API lookups | [optional]
**billing_scheme** | **string** | Billing scheme. Defaults to &#x60;per_unit&#x60;. Set to &#x60;tiered&#x60; with &#x60;tiers_mode&#x60; + &#x60;tiers&#x60; for graduated or volume pricing. | [optional]
**tiers_mode** | **string** | Tiered pricing mode. Required when &#x60;billing_scheme&#x60; is &#x60;tiered&#x60;, must be omitted otherwise. | [optional]
**tiers** | [**\RevKeen\Model\PriceTier[]**](PriceTier.md) | Price tiers (ordered by &#x60;up_to&#x60;, min 2, max 50). Required when &#x60;billing_scheme&#x60; is &#x60;tiered&#x60;. Final tier MUST have &#x60;up_to: null&#x60;. | [optional]
**transform_quantity** | [**\RevKeen\Model\TransformQuantity**](TransformQuantity.md) |  | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
