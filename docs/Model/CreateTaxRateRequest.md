# # CreateTaxRateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**display_name** | **string** | Display name for the tax rate |
**description** | **string** | Description of the tax rate | [optional]
**jurisdiction** | **string** | Tax jurisdiction (e.g., &#39;US-CA&#39;, &#39;DE&#39;, &#39;GB&#39;) | [optional]
**percentage** | **float** | Tax percentage (e.g., 8.25 for 8.25%) |
**inclusive** | **bool** | Whether tax is included in displayed price | [optional] [default to false]
**tax_type** | **string** | Type of tax | [optional] [default to 'vat']
**country** | **string** | ISO 2-letter country code | [optional]
**state** | **string** | State/province code | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
