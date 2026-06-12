# # CreateExportRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**resource_type** | **string** | The type of resource to export. |
**format** | **string** | Output file format. csv: Comma-separated values. xlsx: Excel workbook. | [optional] [default to 'csv']
**filters** | **array<string,mixed>** | Filters to apply (e.g., { status: &#39;paid&#39;, created_gte: &#39;2024-01-01&#39; }) | [optional]
**column_set** | **string** | Column set to include. standard: common fields. full: all fields. minimal: IDs and key fields only. | [optional] [default to 'standard']

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
