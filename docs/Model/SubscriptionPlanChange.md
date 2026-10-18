# SubscriptionPlanChange

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**subscription_id** | **string** |  |
**current_price_id** | **string** | The price the subscription is on before the change. |
**current_plan_name** | **string** | The current plan&#39;s product name. |
**new_price_id** | **string** | The price the subscription moves to. A product id in the request resolves to its default price. |
**new_plan_name** | **string** | The new plan&#39;s product name. |
**new_product_id** | **string** | The product of the new price. |
**billing_interval** | **string** | The new price&#39;s interval. Always the subscription&#39;s own: changing interval is refused. |
**billing_interval_count** | **int** | The new price&#39;s interval count. |
**quantity** | **int** | The subscribed quantity, which a plan change keeps. |
**current_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | The renewal amount before the change, in minor units. |
**new_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | The renewal amount after the change: the new unit amount times &#x60;quantity&#x60;. Always above zero. |
**proration_behavior** | **string** | How the difference is billed. &#x60;next_invoice&#x60; (also what &#x60;invoice_immediately&#x60; means here) adds it to the next renewal invoice; &#x60;none&#x60; changes the plan with no proration. |
**effective_date** | **\DateTime** | When the change takes effect for proration (ISO 8601). |
**proration** | [**\RevKeen\Model\SubscriptionPlanChangeProration**](SubscriptionPlanChangeProration.md) |  | [optional]
**pending_proration_net_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | What the next renewal invoice adds (positive) or credits (negative) after this change, including anything already pending from earlier changes. Null when nothing is pending. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
