# SubscriptionItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**subscription_id** | **string** |  |
**product_id** | **string** |  |
**price_id** | **string** |  |
**description** | **string** |  |
**quantity** | **int** | Item quantity |
**currency** | **string** |  |
**unit_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Unit price in cents |
**fulfillment_type** | **string** | none: service (no order), physical: creates shipping order, digital: creates download order |
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**created_at** | **\DateTime** |  |
**updated_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
