# # Import

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique import job ID |
**object** | **string** | Object type |
**status** | **string** | Import job status. pending: queued. validating: checking data. processing: creating records. completed: all rows imported. completed_with_errors: some rows failed. failed: import aborted. |
**resource_type** | **string** | The type of resource to import. |
**total_rows** | **int** | Total rows in the uploaded file | [optional]
**processed_rows** | **int** | Number of rows processed so far | [optional]
**success_count** | **int** | Number of rows successfully imported | [optional]
**error_count** | **int** | Number of rows that failed | [optional]
**errors** | [**\RevKeen\Model\ImportErrorsInner[]**](ImportErrorsInner.md) | Detailed error information for failed rows | [optional]
**created_at** | **\DateTime** | When the import was created (ISO 8601) |
**completed_at** | **\DateTime** | When the import completed (ISO 8601) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
