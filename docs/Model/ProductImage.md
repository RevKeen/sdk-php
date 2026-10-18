# ProductImage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | Storage key returned by the upload (product-images/&lt;merchant&gt;/...) or an https URL. |
**asset_id** | **string** | Media library asset ID, when the image came from an upload. | [optional]
**alt** | **string** | Alt text for shoppers using screen readers. | [optional]
**source** | **string** | Where the image came from. Defaults to merchant. Pexels images must keep photographer and attribution_url. | [optional]
**photographer** | **string** | Photographer credit (required for Pexels). | [optional]
**attribution_url** | **string** | https link for the credit (required for Pexels). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
