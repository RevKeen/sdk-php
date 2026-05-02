# # CreateImportRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**resource_type** | **string** | The type of resource to import. |
**file_url** | **string** | URL to the CSV file to import (if not using multipart upload) | [optional]
**column_mapping** | **array<string,mixed>** | Map CSV column names to resource fields (e.g., { &#39;Email Address&#39;: &#39;email&#39;, &#39;Full Name&#39;: &#39;name&#39; }) | [optional]
**on_duplicate** | **string** | Behavior when a duplicate record is found. skip: ignore the row. update: merge new data. error: fail the row. | [optional] [default to 'skip']

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
