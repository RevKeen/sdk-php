# # Export

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique export job ID |
**object** | **string** | Object type |
**status** | **string** | Export job status. pending: queued. processing: generating file. completed: ready for download. failed: export failed. |
**resource_type** | **string** | The type of resource to export. |
**format** | **string** | Output file format. csv: Comma-separated values. xlsx: Excel workbook. |
**download_url** | **string** | Presigned download URL (available when status is &#39;completed&#39;). Expires after 1 hour. | [optional]
**total_rows** | **int** | Total rows exported (available when completed) | [optional]
**file_size_bytes** | **int** | File size in bytes (available when completed) | [optional]
**error_message** | **string** | Error message (if status is &#39;failed&#39;) | [optional]
**created_at** | **\DateTime** | When the export was requested (ISO 8601) |
**completed_at** | **\DateTime** | When the export completed (ISO 8601) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
