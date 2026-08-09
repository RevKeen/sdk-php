# # UsageBalanceResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**object** | **string** |  |
**meters** | [**\RevKeen\Model\UsageBalanceMeter[]**](UsageBalanceMeter.md) |  |
**total_estimated_amount_minor** | **float** | Total estimated charge across all meters |
**total_cost_minor** | **float** | Total cost across all meters (null if no cost data) |
**total_payment_processing_cost_minor** | **float** | Payment-processing cost from transaction_costs for matching paid transactions. Null when no matching settled/paid cost evidence is available. |
**total_platform_fee_minor** | **float** | RevKeen/platform fee from transaction_costs for matching paid transactions. Null when no matching settled/paid cost evidence is available. |
**true_net_margin_minor** | **float** | Total estimated charge minus AI provider COGS, payment-processing cost, and platform fee. Null until all cost inputs are available. |
**true_net_margin_percent** | **float** | true_net_margin_minor as a percentage of total_estimated_amount_minor. Null until true-net margin is available. |
**currency** | **string** | Currency code |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
