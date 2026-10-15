# SubscriptionPlanChangeErrorError

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** |  |
**code** | **string** | &#x60;parameter_invalid&#x60;: the body failed validation. &#x60;invalid_status&#x60;: only active, trialing or past_due subscriptions can change plan. &#x60;resource_missing&#x60;: &#x60;newPlanId&#x60; names no price or product of yours. &#x60;price_missing&#x60;: the subscription has no current price. &#x60;price_not_recurring&#x60;, &#x60;interval_mismatch&#x60;, &#x60;currency_mismatch&#x60;: the new price is not a recurring price on the subscription&#39;s interval and currency. &#x60;price_amount_missing&#x60;: the new price has no amount above zero. |
**message** | **string** |  |
**param** | **string** |  | [optional]
**request_id** | **string** |  | [optional]
**details** | **object** | Extra detail for the refusal, for example the two intervals. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
