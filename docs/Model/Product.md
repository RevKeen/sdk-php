# Product

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier (UUID) |
**object** | **string** | Object type |
**product_id** | **string** | User-facing product identifier |
**name** | **string** | Product display name |
**description** | **string** | Product description | [optional]
**kind** | **string** | Product kind |
**pricing_model** | **string** | How the product is priced |
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Price in minor units (cents/pence) |
**currency** | **string** | Three-letter ISO currency code |
**interval** | **string** | Billing interval (day, week, month, year) | [optional]
**interval_count** | **int** | Number of intervals between billings | [optional]
**trial_days** | **int** | Free trial period in days |
**fulfillment_type** | **string** | Fulfillment type |
**track_inventory** | **bool** | Whether stock is tracked for this product (read from its availability record) | [optional]
**stock_quantity** | **int** | Deprecated, read-only view: units available to sell, computed from the product&#39;s availability record (null when not tracked). | [optional]
**tags** | **string[]** | Tags for Storefront filters and search | [optional]
**billing_anchor_rule** | **string** | Billing date calculation rule | [optional]
**billing_anchor_day** | **int** | Day of month for billing (1-31) | [optional]
**first_charge_behavior** | **string** | First payment timing | [optional]
**end_behavior** | **string** | Subscription end behavior | [optional]
**max_payments** | **int** | Max billing cycles for fixed-payment subscriptions | [optional]
**usage_meter_id** | **string** | Associated usage meter ID | [optional]
**slug** | **string** | URL handle, unique among this merchant&#39;s products | [optional]
**is_active** | **bool** | Whether the product is active |
**is_archived** | **bool** | Whether the product is archived |
**image_url** | **string** | Main product image (storage key or URL) | [optional]
**images** | [**\RevKeen\Model\ProductImageResponse[]**](ProductImageResponse.md) | Extra product images, in display order | [optional]
**seo_title** | **string** | Search and social title | [optional]
**seo_description** | **string** | Meta description | [optional]
**store_visibility** | **string** | Whether the product is listed on the Storefront. hidden: only payment links and invoices. scheduled: listed from store_visible_from. | [optional]
**store_visible_from** | **\DateTime** | When a scheduled product appears on the Storefront (ISO 8601) | [optional]
**tax_behavior** | **string** | Tax behavior (exclusive, inclusive, location) | [optional]
**tax_code** | **string** | Tax code for tax calculation | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**created_at** | **\DateTime** | Creation timestamp (ISO 8601) |
**updated_at** | **\DateTime** | Last update timestamp (ISO 8601) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
