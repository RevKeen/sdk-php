# # CreateTerminalPaymentRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**device_id** | **string** | The ID of the terminal device to send the payment to. Use List Devices to discover available device IDs. Even merchants with a single terminal must pass the device_id explicitly — there is no auto-routing fallback. |
**amount_minor** | **int** | Amount in minor units (e.g., pence for GBP, cents for USD) |
**currency** | **string** | ISO 4217 currency code |
**invoice_id** | **string** | The invoice to charge. Omit for walk-in or ad-hoc payments where no invoice exists. When omitted, the terminal payment is recorded without an invoice association. | [optional]
**reference** | **string** | Custom reference for the payment. Auto-generated if not provided. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
