# # CreateOrderRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**customer_id** | **string** | Customer ID (optional for guest orders) | [optional]
**currency** | **string** | Three-letter ISO currency code | [optional] [default to 'usd']
**billing_type** | **string** | Billing type. one_time: Single purchase. recurring: Subscription-based. | [optional] [default to 'one_time']
**line_items** | [**\RevKeen\Model\CreateOrderRequestLineItemsInner[]**](CreateOrderRequestLineItemsInner.md) | Order line items (at least one required) |
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**notes** | **string** |  | [optional]
**expires_at** | **\DateTime** | Expiration timestamp for the order | [optional]
**invoice_id** | **string** | ID of the linked invoice (Commercial Truth) | [optional]
**subscription_id** | **string** | ID of the linked subscription (for recurring fulfillment) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
