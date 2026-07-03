# # CartSession

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**object** | **string** |  |
**merchant_id** | **string** |  |
**customer_id** | **string** |  |
**currency** | **string** |  |
**mode** | **string** |  |
**status** | [**\RevKeen\Model\CartSessionStatus**](CartSessionStatus.md) |  |
**line_items** | [**\RevKeen\Model\CartLineItem[]**](CartLineItem.md) |  |
**add_ons_offered** | **string[]** |  |
**add_ons_selected** | **string[]** |  |
**discount_code** | **string** |  |
**subtotal_minor** | **int** |  |
**total_minor** | **int** |  |
**metadata** | **array<string,mixed>** |  |
**converted_to_checkout_session_id** | **string** |  |
**public_token** | **string** | Anon-access token. Use to build /c/[cart_session_id]?token&#x3D;... URLs for customer-facing cart checkout. Becomes useless once the cart leaves status&#x3D;&#39;open&#39;. |
**created_at** | **\DateTime** |  |
**updated_at** | **\DateTime** |  |
**expires_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
