# # AvsCodeInterpretation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**code** | **string** | Raw AVS response code from gateway |
**match_type** | **string** | Type of address match |
**address_match** | **bool** | Whether the street address matched |
**zip_match** | **bool** | Whether the ZIP/postal code matched |
**description** | **string** | Human-readable description of the AVS result |
**risk_level** | **string** | Risk level based on AVS result. low: full match, medium: partial match, high: no match |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
