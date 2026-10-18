# InvoicePdfResponseData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**url** | **string** | Presigned URL that downloads the invoice PDF. It expires at expires_at and is a secret link: do not log it or store it. Request a new one when it expires. |
**expires_at** | **\DateTime** | When the URL stops working (ISO 8601). Five minutes after the response. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
