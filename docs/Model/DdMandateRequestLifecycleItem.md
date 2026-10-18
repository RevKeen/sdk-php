# DdMandateRequestLifecycleItem

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
**created_at** | **\DateTime** |  |
**expires_at** | **\DateTime** |  |
**consumed_at** | **\DateTime** |  |
**cancelled_at** | **\DateTime** |  |
**expired_at** | **\DateTime** |  |
**status** | [**\RevKeen\Model\DdMandateRequestLifecycleStatus**](DdMandateRequestLifecycleStatus.md) |  |
**notification_delivery_event_type** | **string** |  |
**notification_delivery_status** | **string** |  |
**notification_delivery_error** | **string** |  |
**notification_delivery_updated_at** | **\DateTime** |  |
**pdf_documents** | [**\RevKeen\Model\DdMandatePdfReference[]**](DdMandatePdfReference.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
