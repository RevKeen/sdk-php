# # CustomersCreateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **string** | Customer&#39;s email address (must be unique per merchant) |
**name** | **string** | Customer&#39;s full name | [optional]
**phone** | **string** | Customer&#39;s phone number | [optional]
**company_name** | **string** | Customer&#39;s company name | [optional]
**address_line1** | **string** | Billing address line 1 | [optional]
**address_line2** | **string** | Billing address line 2 | [optional]
**city** | **string** | Billing address city | [optional]
**state** | **string** | Billing address state or county | [optional]
**postal_code** | **string** | Billing address postal code | [optional]
**country** | **string** | Billing address country code | [optional]
**metadata** | **array<string,mixed>** | Arbitrary key-value metadata to attach to this customer | [optional]
**custom_fields** | **array<string,mixed>** | Merchant-defined custom fields displayed as columns in the dashboard | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
