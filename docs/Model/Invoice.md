# # Invoice

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique invoice identifier |
**customer_uuid** | **string** | ID of the customer this invoice belongs to |
**invoice_number** | **string** | Merchant-assigned invoice number for reference | [optional]
**total_minor** | **int** | Total amount in minor units (cents) |
**currency** | **string** | Three-letter ISO 4217 currency code |
**allowed_methods** | **string[]** | Allowed payment methods for checkout sessions against this invoice | [optional]
**status** | **string** | Invoice lifecycle status: draft, open, finalized, paid, void, or uncollectible |
**due_date** | **string** | Payment due date in ISO 8601 format | [optional]
**custom_fields** | **array<string,mixed>** | Key-value pairs for custom fields | [optional]
**external_source** | **string** | External integration source (e.g., practicehub, wodify) | [optional]
**external_type** | **string** | Type within external system (e.g., appointment, membership) | [optional]
**external_id** | **string** | ID from external system | [optional]
**subscription_terms** | [**\RevKeen\Model\InvoiceSubscriptionTerms**](InvoiceSubscriptionTerms.md) |  | [optional]
**created_at** | **string** | When the invoice was created (ISO 8601) |
**updated_at** | **string** | When the invoice was last updated (ISO 8601) |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
