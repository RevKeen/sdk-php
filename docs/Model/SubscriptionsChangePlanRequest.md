# SubscriptionsChangePlanRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**new_plan_id** | **string** |  |
**proration_behavior** | **string** | How the price difference is billed. &#x60;next_invoice&#x60; (and &#x60;invoice_immediately&#x60;, accepted for compatibility and applied the same way) adds it to the next renewal invoice as a line; a downgrade credit is carried there, never refunded, and a credit larger than the renewal carries to the following one. &#x60;none&#x60; changes without proration. | [optional]
**effective_date** | **\DateTime** |  | [optional]
**reason** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
