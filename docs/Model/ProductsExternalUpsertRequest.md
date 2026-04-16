# # ProductsExternalUpsertRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**merchant_id** | **string** | Deprecated: merchantId is derived from API key authentication. This field is ignored. | [optional]
**name** | **string** | Product name |
**description** | **string** | Product description | [optional]
**kind** | **string** | Product kind - subscription or one-time | [optional]
**amount_cents** | **int** | Price in minor units (cents) |
**currency** | **string** | ISO 4217 currency code | [optional] [default to 'USD']
**is_active** | **bool** | Whether the product is active | [optional] [default to true]
**interval** | **string** | Billing interval for subscriptions | [optional]
**interval_count** | **int** | Number of intervals between billings | [optional]
**external_updated_at** | **\DateTime** | External system&#39;s last update timestamp for stale update protection | [optional]
**external_ref** | **string** | Additional external reference (e.g., membership ID) | [optional]
**metadata** | **array<string,mixed>** | Additional metadata from external system | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
