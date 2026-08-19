# # Order

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the order |
**object** | **string** | Object type |
**public_id** | **string** | Public-facing order ID |
**customer_id** | **string** | ID of the customer | [optional]
**status** | **string** | Order status. draft: Being built. pending: Awaiting payment. paid: Fully paid. partially_paid: Partial payment received. refunded: Refunded. canceled: Canceled. fulfilled: Shipped/delivered. |
**billing_type** | **string** | Billing type. one_time: Single purchase. recurring: Subscription-based. |
**fulfillment_status** | **string** | Fulfillment status for physical goods. | [optional]
**currency** | **string** | Three-letter ISO currency code |
**subtotal** | **int** | Subtotal in cents |
**discount** | **int** | Total discount in cents |
**tax** | **int** | Total tax in cents |
**total** | **int** | Total amount in cents |
**amount_paid** | **int** | Amount paid in cents |
**amount_refunded** | **int** | Amount refunded in cents |
**amount_due** | **int** | Amount still due in cents |
**line_items** | [**\RevKeen\Model\OrderLineItem[]**](OrderLineItem.md) |  | [optional]
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**notes** | **string** |  | [optional]
**invoice_id** | **string** | ID of the linked invoice (Commercial Truth) | [optional]
**subscription_id** | **string** | ID of the linked subscription (for recurring fulfillment) | [optional]
**created_at** | **\DateTime** |  |
**updated_at** | **\DateTime** |  |
**paid_at** | **\DateTime** |  | [optional]
**canceled_at** | **\DateTime** |  | [optional]
**fulfilled_at** | **\DateTime** |  | [optional]
**expires_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
