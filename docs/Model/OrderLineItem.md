# OrderLineItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**product_id** | **string** |  | [optional]
**description** | **string** |  |
**quantity** | **int** |  |
**unit_price** | **int** | Unit price in cents |
**subtotal** | **int** | Subtotal in cents (unit_price * quantity) |
**discount** | **int** | Discount in cents | [optional] [default to 0]
**tax** | **int** | Tax in cents | [optional] [default to 0]
**total** | **int** | Total in cents (subtotal - discount + tax) |
**metadata** | **array<string,mixed>** | Custom key-value metadata | [optional]
**position** | **int** |  | [optional] [default to 0]
**fulfillment_type** | **string** | How this line is fulfilled | [optional]
**fulfillment_status** | **string** | Fulfilment state of this line; processing means partly shipped | [optional]
**fulfilled_quantity** | **int** | Units of this line shipped so far | [optional]
**tracking_number** | **string** |  | [optional]
**tracking_url** | **string** |  | [optional]
**carrier** | **string** |  | [optional]
**shipped_at** | **\DateTime** |  | [optional]
**delivered_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
