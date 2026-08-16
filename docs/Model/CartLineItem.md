# # CartLineItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**product_id** | **string** |  |
**name** | **string** |  |
**quantity** | **int** |  |
**unit_price_minor** | **int** |  |
**currency** | **string** |  |
**recurring** | [**\RevKeen\Model\CartLineItemRecurring**](CartLineItemRecurring.md) |  |
**billing_max_cycles** | **int** |  | [optional]
**trial_period_days** | **int** |  | [optional]
**start_rule** | [**\RevKeen\Model\CartStartRule**](CartStartRule.md) |  | [optional]
**billing_anchor_rule** | [**\RevKeen\Model\CartBillingAnchorRule**](CartBillingAnchorRule.md) |  | [optional]
**billing_anchor_day** | **int** |  | [optional]
**due_today_minor** | **int** |  | [optional]
**first_charge_minor** | **int** |  | [optional]
**first_renewal_at** | **\DateTime** |  | [optional]
**effective_start_rule** | [**\RevKeen\Model\CartStartRule**](CartStartRule.md) |  | [optional]
**metadata** | **array<string,mixed>** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
