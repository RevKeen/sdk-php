# SubscriptionPlanChangeProration

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**credit_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Credit for the unused time on the current plan, in minor units. |
**charge_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Charge for the remaining time on the new plan, in minor units. |
**net_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | &#x60;charge_amount_minor&#x60; minus &#x60;credit_amount_minor&#x60;. Positive is added to the next renewal invoice; negative is credited there. |
**is_upgrade** | **bool** | Whether the new plan costs more than the current one. |
**days_remaining** | **int** | Days left in the current period at the effective date. |
**days_in_period** | **int** | Days in the current period. |
**currency** | **string** | Three-letter ISO currency code of the amounts. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
