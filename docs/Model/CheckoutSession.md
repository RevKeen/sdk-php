# CheckoutSession

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**object** | **string** |  |
**status** | **string** |  |
**mode** | **string** |  |
**amount_total** | [**MoneyMinor**](MoneyMinor.md) |  |
**currency** | **string** |  |
**customer_id** | **string** |  |
**payment_intent_id** | **string** |  |
**invoice_id** | **string** |  |
**subscription_id** | **string** |  |
**url** | **string** | The hosted checkout URL to redirect the customer to. Present only while the session is &#x60;pending&#x60; or &#x60;open&#x60; and has not expired, and only when the request is made with a merchant API key; otherwise &#x60;null&#x60;. |
**success_url** | **string** |  |
**cancel_url** | **string** |  |
**expires_at** | **\DateTime** |  |
**created_at** | **\DateTime** |  |
**allowed_methods** | **string[]** |  |
**selected_method** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
