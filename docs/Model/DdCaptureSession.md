# # DdCaptureSession

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**session_token** | **string** | Plaintext capture-session token. Only present in the response that issues it (create / token re-issue); never returned on subsequent reads. | [optional]
**merchant_id** | **string** |  |
**customer_id** | **string** |  |
**checkout_session_id** | **string** |  |
**mandate_request_id** | **string** |  |
**source** | **string** |  |
**status** | **string** |  |
**account_holder_name** | **string** |  |
**sort_code_last2** | **string** | Last 2 digits of the sort code — never the full value |
**account_number_last4** | **string** | Last 4 digits of the account number |
**bank_name** | **string** |  |
**notice_date** | **string** | Advance-notice date (YYYY-MM-DD) |
**submission_date** | **string** | Bacs submission date (YYYY-MM-DD) |
**collection_date** | **string** | Collection date (YYYY-MM-DD) |
**settlement_date** | **string** | Settlement date (YYYY-MM-DD) |
**notice_days** | **int** |  |
**mandate_id** | **string** | Mandate created from this capture session, once completed |
**expires_at** | **string** |  |
**completed_at** | **string** |  |
**abandoned_at** | **string** |  |
**created_at** | **string** |  |
**updated_at** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
