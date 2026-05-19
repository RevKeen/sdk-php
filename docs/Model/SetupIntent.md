# # SetupIntent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the setup intent |
**object** | **string** | Object type, always &#39;setup_intent&#39; |
**public_id** | **string** | Public ID visible in API responses (seti_xxx format) |
**status** | **string** | The status of the setup intent |
**customer_id** | **string** | ID of the customer this setup intent is for |
**payment_method_id** | **string** | ID of the payment method being set up |
**payment_method_types** | **string[]** | Allowed payment method types for this setup |
**usage** | **string** | Indicates how the payment method will be used |
**next_action** | [**\RevKeen\Model\SetupIntentNextAction**](SetupIntentNextAction.md) |  |
**client_secret** | **string** | Client secret for frontend confirmation |
**gateway** | **string** | Name of the payment processor that handled this setup intent |
**last_error** | [**\RevKeen\Model\SetupIntentError**](SetupIntentError.md) |  |
**cancellation_reason** | **string** | Reason for cancellation if canceled |
**description** | **string** | Merchant description for reference |
**metadata** | **array<string,mixed>** | Custom metadata attached to the setup intent |
**confirmed_at** | **\DateTime** | When the setup intent was confirmed |
**canceled_at** | **\DateTime** | When the setup intent was canceled |
**created_at** | **\DateTime** | When the setup intent was created |
**updated_at** | **\DateTime** | When the setup intent was last updated |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
