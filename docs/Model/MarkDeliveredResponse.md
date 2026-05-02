# # MarkDeliveredResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**success** | **bool** |  |
**marked_delivered** | **int** |  |
**reminder_eligible_now** | **int** | Count of invoices that would match the default overdue ladder (day 1+) at the next hourly reminder cron. With anchor &#x3D; NOW() on mark, this is typically 0 — the first reminder fires tomorrow. |
**reminder_eligible_within_7_days** | **int** | Count of invoices that will receive at least one reminder within 7 days of this attestation, assuming the default ladder [1, 7, 14, 30]. |
**skipped** | [**\RevKeen\Model\MarkDeliveredResponseSkippedInner[]**](MarkDeliveredResponseSkippedInner.md) |  |
**request_id** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
