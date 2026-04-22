# # CustomerCreateResponseData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique customer identifier |
**merchant_id** | **string** | ID of the merchant this customer belongs to |
**merchant_ref_id** | **string** | Merchant-assigned reference ID for external system mapping | [optional]
**email** | **string** | Customer&#39;s email address |
**name** | **string** | Customer&#39;s full name | [optional]
**phone** | **string** | Customer&#39;s phone number | [optional]
**auth_user_id** | **string** | Linked Better Auth user ID for portal access | [optional]
**metadata** | **array<string,mixed>** | Arbitrary key-value metadata attached to this customer | [optional]
**custom_fields** | **array<string,mixed>** | Merchant-defined custom fields displayed as columns in the dashboard | [optional]
**created_at** | **\DateTime** | When the customer was created (ISO 8601) |
**updated_at** | **\DateTime** | When the customer was last updated (ISO 8601) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
