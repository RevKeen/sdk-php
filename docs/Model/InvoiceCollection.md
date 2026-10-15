# InvoiceCollection

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status** | **string** | &#x60;scheduled&#x60;: the collection is with the Direct Debit bureau for &#x60;collection_date&#x60;. &#x60;awaiting_advance_notice&#x60;: the customer&#39;s advance notice has been sent and the collection is submitted once its delivery is confirmed; the dates are not yet fixed. |
**payment_method** | **string** |  |
**id** | **string** | The collection schedule id, once scheduled. |
**mandate_id** | **string** |  |
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) | The amount being collected, in minor units, once scheduled. |
**currency** | **string** |  |
**collection_date** | **string** | The date the money is collected (YYYY-MM-DD), once scheduled. |
**notice_date** | **string** |  |
**submission_date** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
