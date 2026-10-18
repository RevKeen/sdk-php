# UpdateProductRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** |  | [optional]
**description** | **string** |  | [optional]
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) |  | [optional]
**currency** | **string** |  | [optional]
**interval** | **string** |  | [optional]
**interval_count** | **int** |  | [optional]
**trial_days** | **int** |  | [optional]
**is_active** | **bool** |  | [optional]
**is_archived** | **bool** |  | [optional]
**slug** | **string** | URL handle, unique among this merchant&#39;s products. Pass null to clear it. | [optional]
**images** | [**\RevKeen\Model\ProductImage[]**](ProductImage.md) | Ordered extra images (at most 20). Replaces the list. The main image stays in image_url. | [optional]
**seo_title** | **string** | Search and social title (at most 70 characters). Defaults to the name. | [optional]
**seo_description** | **string** | Meta description (at most 320 characters). | [optional]
**store_visibility** | **string** | Whether the product is listed on the Storefront. hidden: only payment links and invoices. scheduled: listed from store_visible_from. | [optional]
**store_visible_from** | **\DateTime** | When a scheduled product appears on the Storefront (ISO 8601). Required when store_visibility is scheduled. | [optional]
**fulfillment_type** | **string** | Fulfillment type for the product. | [optional]
**track_inventory** | **bool** | Turn stock tracking on (requires stock_quantity) or off. One-time products only. Stock is stored in the product&#39;s availability record. | [optional]
**stock_quantity** | **int** | Deprecated. Sets the units available to sell in the product&#39;s availability record. Required (non-negative) when track_inventory is true. | [optional]
**tags** | **string[]** | Tags for Storefront filters and search. Replaces the product&#39;s tags. At most 50, each up to 50 characters. | [optional]
**billing_anchor_rule** | **string** | How billing dates are calculated. same_day: Bill on same day as start. day_of_month: Bill on specific day (1-31). last_day: Bill on last day of month. | [optional]
**billing_anchor_day** | **int** |  | [optional]
**first_charge_behavior** | **string** | When first payment is collected. immediate: Charge on start. next_anchor: Charge on first scheduled date. prorate: Prorate until first date. | [optional]
**end_behavior** | **string** | How subscription ends. until_canceled: Runs forever. fixed_payments: Ends after N billing cycles. | [optional]
**max_payments** | **int** |  | [optional]
**metadata** | **array<string,mixed>** | Arbitrary key-value metadata for the product | [optional]
**image_url** | **string** | Product image S3 key or public URL. Pass null to remove. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
