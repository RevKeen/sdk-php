# # DdMandateRequestLifecycleItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**merchant_id** | **string** |  |
**customer_id** | **string** |  |
**invoice_id** | **string** |  |
**subscription_id** | **string** |  |
**mandate_id** | **string** |  |
**token** | **string** | Internal raw request token. Do not expose directly to customers. |
**signable_url** | **string** | Customer-facing tracked URL: pay.revkeen.com/dd_&lt;token&gt; |
**created_at** | **string** |  |
**expires_at** | **string** |  |
**consumed_at** | **string** |  |
**cancelled_at** | **string** |  |
**expired_at** | **string** |  |
**status** | [**\RevKeen\Model\DdMandateRequestLifecycleStatus**](DdMandateRequestLifecycleStatus.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
