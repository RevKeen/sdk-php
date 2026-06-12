# # CollectionSchedule

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Collection schedule ID |
**mandate_id** | **string** | Mandate the collection is scheduled against |
**lz_schedule_id** | **string** | Bureau schedule reference |
**amount_minor** | **int** | Collection amount in minor units (pence) |
**currency** | **string** | ISO 4217 currency |
**source_type** | **string** | invoice | payment_link |
**source_id** | **string** | Invoice or payment-link ID the collection settles |
**status** | **string** | Schedule status |
**collection_date** | **string** | Collection date (YYYY-MM-DD) |
**notice_date** | **string** | Advance-notice date (YYYY-MM-DD) |
**submission_date** | **string** | Bacs submission date (YYYY-MM-DD) |
**already_scheduled** | **bool** | True when an existing schedule for this source was returned instead of creating a duplicate |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
