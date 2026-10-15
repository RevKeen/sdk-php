# InvoiceLineUsageEventProvenanceItemEntry

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) |  |
**precise_amount_minor** | **string** | Unrounded amount in minor units as a decimal string (REV-6211). Not integer cents; sub-penny rates stay exact. Null means not computable for this pricing scheme; never coerce to 0. |
**quantity** | **string** |  |
**currency** | **string** |  |
**rating_version** | **int** |  |
**price_id** | **string** |  |
**price_terms_hash** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
