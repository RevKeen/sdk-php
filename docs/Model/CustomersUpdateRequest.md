# CustomersUpdateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **string** | Updated email address | [optional]
**external_id** | **string** | Your system&#39;s identifier for this customer. Unique per merchant and source: no two customers whose external id you set through the API can share one, but a customer synced from an integration can carry the same value. Cannot be changed on a customer that is linked to an integration. | [optional]
**name** | **string** | Updated full name | [optional]
**phone** | **string** | Updated phone number | [optional]
**company_name** | **string** | Updated company name | [optional]
**address_line1** | **string** | Updated billing address line 1 | [optional]
**address_line2** | **string** | Updated billing address line 2 | [optional]
**city** | **string** | Updated billing address city | [optional]
**state** | **string** | Updated billing address state or county | [optional]
**postal_code** | **string** | Updated billing address postal code | [optional]
**country** | **string** | Updated billing address country code | [optional]
**metadata** | **array<string,mixed>** | Metadata to merge with existing values (set a key to null to remove it) | [optional]
**custom_fields** | **array<string,mixed>** | Merchant-defined custom fields displayed as columns in the dashboard | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
