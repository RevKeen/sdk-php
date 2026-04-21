# # Product

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
**amount_minor** | **int** | Price in minor units (cents/pence) |
**currency** | **string** | Three-letter ISO currency code |
**interval** | **string** | Billing interval (day, week, month, year) | [optional]
**interval_count** | **int** | Number of intervals between billings | [optional]
**trial_days** | **int** | Free trial period in days |
**fulfillment_type** | **string** | Fulfillment type |
**billing_anchor_rule** | **string** | Billing date calculation rule | [optional]
**billing_anchor_day** | **int** | Day of month for billing (1-31) | [optional]
**first_charge_behavior** | **string** | First payment timing | [optional]
**end_behavior** | **string** | Subscription end behavior | [optional]
**max_payments** | **int** | Max billing cycles for fixed-payment subscriptions | [optional]
**usage_meter_id** | **string** | Associated usage meter ID | [optional]
**slug** | **string** | URL-friendly slug | [optional]
**is_active** | **bool** | Whether the product is active |
**is_archived** | **bool** | Whether the product is archived |
**image_url** | **string** | Product image URL | [optional]
**tax_behavior** | **string** | Tax behavior (exclusive, inclusive, location) | [optional]
**tax_code** | **string** | Tax code for tax calculation | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**created_at** | **\DateTime** | Creation timestamp (ISO 8601) |
**updated_at** | **\DateTime** | Last update timestamp (ISO 8601) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
