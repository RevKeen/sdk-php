# ApiErrorError

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The type of error returned |
**code** | **string** | Machine-readable error code for programmatic handling |
**message** | **string** | Human-readable error message |
**param** | **string** | The parameter that caused the error | [optional]
**status_code** | **int** | HTTP status code | [optional]
**request_id** | **string** | Unique request identifier for debugging | [optional]
**details** | **array<string,mixed>** | Additional context about the error | [optional]
**decline_code** | **string** | Card decline code from the payment processor | [optional]
**doc_url** | **string** | URL to documentation about this error | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
