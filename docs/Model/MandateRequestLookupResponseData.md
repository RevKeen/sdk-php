# # MandateRequestLookupResponseData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Mandate request ID |
**merchant_id** | **string** | Merchant ID |
**merchant_slug** | **string** | Merchant slug |
**customer_id** | **string** | Customer ID |
**invoice_id** | **string** | Invoice ID, if the request is tied to an invoice |
**expires_at** | **string** | Expiry timestamp (ISO 8601) |
**status** | **string** | Mandate request status |
**merchant** | [**\RevKeen\Model\MandateRequestLookupResponseDataMerchant**](MandateRequestLookupResponseDataMerchant.md) |  |
**customer** | [**\RevKeen\Model\MandateRequestLookupResponseDataCustomer**](MandateRequestLookupResponseDataCustomer.md) |  |
**invoice** | [**\RevKeen\Model\MandateRequestLookupResponseDataInvoice**](MandateRequestLookupResponseDataInvoice.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
