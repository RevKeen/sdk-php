# # Price

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the price |
**object** | **string** | Object type |
**product_id** | **string** | ID of the product this price belongs to |
**active** | **bool** | Whether the price is active |
**currency** | **string** | Three-letter ISO currency code (lowercase) |
**unit_amount** | **int** | Price in minor units (cents) |
**type** | **string** | Price type |
**pricing_model** | **string** | Pricing model |
**interval** | **string** | Billing interval (recurring only) | [optional]
**interval_count** | **int** | Number of intervals between billings | [optional]
**trial_period_days** | **int** | Trial period in days (recurring only) | [optional]
**minimum_amount** | **int** | PWYW: minimum amount in cents | [optional]
**maximum_amount** | **int** | PWYW: maximum amount in cents | [optional]
**suggested_amount** | **int** | PWYW: suggested amount in cents | [optional]
**preset_amounts** | **int[]** | PWYW: quick-select amounts | [optional]
**nickname** | **string** | Display name (e.g., &#39;Monthly&#39;, &#39;Annual - Save 17%&#39;) | [optional]
**lookup_key** | **string** | Stable key for API lookups | [optional]
**billing_scheme** | **string** | Billing scheme. Defaults to &#x60;per_unit&#x60;. Set to &#x60;tiered&#x60; along with &#x60;tiers_mode&#x60; + &#x60;tiers&#x60; to use graduated or volume pricing. |
**tiers_mode** | **string** | Tiered pricing mode. Required when &#x60;billing_scheme&#x60; is &#x60;tiered&#x60;, must be null otherwise. | [optional]
**tiers** | [**\RevKeen\Model\PriceTier[]**](PriceTier.md) | Price tiers (ordered by &#x60;up_to&#x60;). Present only when &#x60;billing_scheme&#x60; is &#x60;tiered&#x60;. At least 2 tiers, final tier MUST have &#x60;up_to: null&#x60;. Immutable after creation. | [optional]
**transform_quantity** | [**\RevKeen\Model\PriceTransformQuantity**](PriceTransformQuantity.md) |  | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**created_at** | **\DateTime** | Creation timestamp |
**updated_at** | **\DateTime** | Last update timestamp |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
