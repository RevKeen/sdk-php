# Payout

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**public_id** | **string** |  |
**gateway** | **string** | Name of the payment processor that produced this payout batch |
**gateway_payout_id** | **string** |  |
**gross_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Gross amount in cents |
**fees_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Fees in cents |
**net_amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Net amount in cents |
**currency** | **string** |  |
**charges_count** | **float** |  |
**refunds_count** | **float** |  |
**chargebacks_count** | **float** |  |
**status** | **string** |  |
**arrival_date** | **string** |  |
**settled_at** | **\DateTime** |  |
**created_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
