# StorefrontProduct

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**object** | **string** |  |
**product_id** | **string** |  |
**slug** | **string** |  |
**name** | **string** |  |
**description** | **string** |  |
**kind** | **string** |  |
**pricing_model** | **string** |  |
**currency** | **string** |  |
**image_url** | **string** |  |
**default_price_id** | **string** |  |
**prices** | [**\RevKeen\Model\StorefrontPrice[]**](StorefrontPrice.md) |  |
**trial_days** | **int** |  |
**usage_meter_id** | **string** |  |
**tax_behavior** | **string** |  |
**tax_code** | **string** |  |
**availability** | [**\RevKeen\Model\StorefrontAvailability**](StorefrontAvailability.md) |  |
**tags** | **string[]** | Merchant tags for store filters and search. |
**images** | [**\RevKeen\Model\StorefrontProductImage[]**](StorefrontProductImage.md) | Extra images in display order. image_url stays the main image. |
**seo_title** | **string** | Page title for search and social. Null means use the name. |
**seo_description** | **string** | Meta description. Null means use the description. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
