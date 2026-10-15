# CustomerPortalSession

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Server-generated session identifier. Embedded in the token&#39;s &#x60;jti&#x60; claim. |
**token** | **string** | Short-lived bearer token. The customer (or client app acting on their behalf) sends this as &#x60;Authorization: Bearer &lt;token&gt;&#x60; on every subsequent /v2/customer-portal/_* call. Treat as a credential — never log it and never persist it in a browser-accessible store. |
**customer_id** | **string** |  |
**expires_at** | **\DateTime** | ISO-8601 timestamp when this token expires. Default TTL is 60 minutes. |
**created_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
