# # DdMandateRequestCreateResponseData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**merchant_id** | **string** |  |
**customer_id** | **string** |  |
**invoice_id** | **string** |  |
**token** | **string** | Signed mandate-request token for the emailed link |
**signable_url** | **string** | Customer-facing URL that opens the sign flow |
**created_at** | **string** |  |
**expires_at** | **string** |  |
**status** | **string** |  |
**idempotent** | **bool** | True when an existing live request was returned instead of creating a new one |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
