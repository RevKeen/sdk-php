# ScheduleCollectionRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Collection amount in minor units (pence) |
**currency** | **string** | ISO 4217 currency. Bacs collections are GBP-only. |
**source_type** | **string** | What the collection settles. Only an invoice can be collected through this endpoint; the settlement webhook resolves invoices by this reference. |
**source_id** | **string** | Invoice ID the collection is for |
**requested_collection_date** | **string** | Earliest acceptable collection date (ISO date). The backend resolves the Bacs working-day chain; must be on/after the bureau&#39;s earliest allowed date. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
