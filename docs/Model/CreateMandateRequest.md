# # CreateMandateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**customer_id** | **string** | Customer the mandate is created for |
**account_holder_name** | **string** | Name on the bank account |
**sort_code** | **string** | UK sort code (6 digits, dashes optional) |
**account_number** | **string** | UK account number (8 digits) |
**backup_payment_method_id** | **string** | Stored card used as recovery fallback if a collection fails | [optional]
**request_token** | **string** | Signed mandate-request token to consume on creation | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
