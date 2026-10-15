# PreviewSubscriptionPlanChangeInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**new_plan_id** | **string** | The price to move to. A product id resolves to the product&#39;s default price. |
**proration_behavior** | **string** | As for the change. &#x60;next_invoice&#x60; (default; &#x60;invoice_immediately&#x60; is applied the same way) prorates onto the next renewal invoice; &#x60;none&#x60; previews a change with no proration. | [optional]
**effective_date** | **\DateTime** | Price the proration as of this date (ISO 8601). Defaults to now. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
