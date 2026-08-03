# # CreateCheckoutSessionInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**invoice_id** | **string** |  | [optional]
**product_id** | **string** |  | [optional]
**amount_minor** | **int** |  | [optional]
**currency** | **string** |  | [optional] [default to 'USD']
**success_url** | **string** |  | [optional]
**cancel_url** | **string** |  | [optional]
**allowed_methods** | **string[]** | Payment methods to offer. Intersected with merchant capabilities. Defaults to merchant config. | [optional]
**companion_device_id** | **string** | Target a registered companion device. Session is pushed via SSE to the device. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
