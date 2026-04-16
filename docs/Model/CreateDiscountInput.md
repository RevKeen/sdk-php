# # CreateDiscountInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**code** | **string** | Unique discount code (will be uppercased) |
**name** | **string** | Human-readable name |
**description** | **string** | Optional description | [optional]
**discount_type** | **string** | Type of discount |
**discount_value** | **float** | Discount value - percentage (1-100) or amount in cents |
**applies_to** | **string** | Which products the discount applies to | [optional] [default to 'all']
**scope** | **string** | Scope of where discount can be applied | [optional]
**product_ids** | **string[]** | Product IDs if applies_to is &#39;specific_products&#39; | [optional]
**max_redemptions** | **int** | Maximum total redemptions allowed | [optional]
**max_redemptions_per_user** | **int** | Maximum redemptions per customer (0 &#x3D; unlimited) | [optional] [default to 0]
**valid_from** | **string** | Start date (ISO 8601) | [optional]
**valid_until** | **string** | End date (ISO 8601) | [optional]
**recurring_type** | **string** | How the discount applies to recurring payments | [optional]
**recurring_cycles** | **int** | Number of billing cycles (only if recurring_type is &#39;repeating&#39;) | [optional]
**first_time_customer** | **bool** | Only available to first-time customers | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
