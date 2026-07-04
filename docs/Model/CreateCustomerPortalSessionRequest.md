# # CreateCustomerPortalSessionRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**customer_id** | **string** | UUID of the customer this session will authenticate as. |
**ttl_minutes** | **int** | Lifetime of the session token in minutes. Between 5 and 240; default 60. Shorter TTLs reduce blast radius if a token leaks. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
