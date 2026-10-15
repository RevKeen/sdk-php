# FulfillOrderRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tracking_number** | **string** | Shipping tracking number | [optional]
**carrier** | **string** | Shipping carrier (e.g., &#39;ups&#39;, &#39;fedex&#39;, &#39;usps&#39;) | [optional]
**line_item_ids** | **string[]** | Specific line items to fulfill, each in full (defaults to every unfulfilled line) | [optional]
**tracking_url** | **string** | Carrier tracking link | [optional]
**status** | **string** | Mark the lines shipped (default) or delivered | [optional] [default to 'shipped']
**notify_customer** | **bool** | Send fulfillment notification to customer | [optional] [default to true]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
