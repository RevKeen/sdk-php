# # TaxRate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the tax rate |
**object** | **string** | Object type |
**display_name** | **string** | Display name for the tax rate |
**description** | **string** | Description of the tax rate | [optional]
**jurisdiction** | **string** | Tax jurisdiction (e.g., &#39;US-CA&#39;, &#39;DE&#39;, &#39;GB&#39;) | [optional]
**percentage** | **float** | Tax percentage (e.g., 8.25 for 8.25%) |
**inclusive** | **bool** | Whether tax is included in displayed price (EU style) |
**tax_type** | **string** | Type of tax |
**country** | **string** | ISO country code | [optional]
**state** | **string** | State/province code | [optional]
**active** | **bool** | Whether the tax rate is active |
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**created_at** | **\DateTime** | Creation timestamp |
**updated_at** | **\DateTime** | Last update timestamp |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
