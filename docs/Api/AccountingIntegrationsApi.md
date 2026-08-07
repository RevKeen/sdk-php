# RevKeen\AccountingIntegrationsApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**accountingInvoicePaymentRequestsCreate()**](AccountingIntegrationsApi.md#accountingInvoicePaymentRequestsCreate) | **POST** /integrations/accounting/invoice-payment-requests | Create an accounting-led invoice payment request |
| [**accountingInvoicePaymentRequestsGet()**](AccountingIntegrationsApi.md#accountingInvoicePaymentRequestsGet) | **GET** /integrations/accounting/invoice-payment-requests/{id} | Get an accounting-led invoice payment request |


## `accountingInvoicePaymentRequestsCreate()`

```php
accountingInvoicePaymentRequestsCreate($create_accounting_invoice_payment_request_input): \RevKeen\Model\AccountingInvoicePaymentRequestsCreate200Response
```

Create an accounting-led invoice payment request

Claims or reuses an ExternalAccountingInvoicePaymentRequest and mints a provider-neutral checkout session. Does not create a RevKeen invoice. Requires Idempotency-Key.  ---  **Related endpoints**  - `GET /integrations/accounting/invoice-payment-requests/{id}` — Get an accounting-led invoice payment request  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

// Configure OAuth2 access token for authorization: oauth2
$config = RevKeen\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth2
$config = RevKeen\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new RevKeen\Api\AccountingIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_accounting_invoice_payment_request_input = new \RevKeen\Model\CreateAccountingInvoicePaymentRequestInput(); // \RevKeen\Model\CreateAccountingInvoicePaymentRequestInput

try {
    $result = $apiInstance->accountingInvoicePaymentRequestsCreate($create_accounting_invoice_payment_request_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountingIntegrationsApi->accountingInvoicePaymentRequestsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_accounting_invoice_payment_request_input** | [**\RevKeen\Model\CreateAccountingInvoicePaymentRequestInput**](../Model/CreateAccountingInvoicePaymentRequestInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\AccountingInvoicePaymentRequestsCreate200Response**](../Model/AccountingInvoicePaymentRequestsCreate200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `accountingInvoicePaymentRequestsGet()`

```php
accountingInvoicePaymentRequestsGet($id): \RevKeen\Model\AccountingInvoicePaymentRequestsCreate200Response
```

Get an accounting-led invoice payment request

---  **Related endpoints**  - `POST /integrations/accounting/invoice-payment-requests` — Create an accounting-led invoice payment request  **Common errors**  - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

// Configure OAuth2 access token for authorization: oauth2
$config = RevKeen\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth2
$config = RevKeen\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new RevKeen\Api\AccountingIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->accountingInvoicePaymentRequestsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountingIntegrationsApi->accountingInvoicePaymentRequestsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\AccountingInvoicePaymentRequestsCreate200Response**](../Model/AccountingInvoicePaymentRequestsCreate200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
