# RevKeen\InvoicesApi

Invoices are the canonical record of what a customer owes or has paid. Every subscription cycle generates an invoice automatically, and you can also create one-off invoices for ad-hoc charges. Invoices progress through a lifecycle: &#x60;draft&#x60; → &#x60;open&#x60; → &#x60;finalized&#x60; → &#x60;paid&#x60;.  **Required Scopes:** - &#x60;invoices:read&#x60; - List and retrieve invoices - &#x60;invoices:write&#x60; - Create, update, send, finalize invoices  **MCP Tools:** &#x60;invoices_list&#x60;, &#x60;invoices_get&#x60;, &#x60;invoices_create&#x60;, &#x60;invoices_send&#x60;, &#x60;invoices_finalize&#x60;

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**invoicesCreate()**](InvoicesApi.md#invoicesCreate) | **POST** /invoices | Create invoice |
| [**invoicesFinalize()**](InvoicesApi.md#invoicesFinalize) | **POST** /invoices/{id}/finalize | Finalize an invoice |
| [**invoicesList()**](InvoicesApi.md#invoicesList) | **GET** /invoices | List invoices |
| [**invoicesRetrieve()**](InvoicesApi.md#invoicesRetrieve) | **GET** /invoices/{id} | Get invoice |
| [**invoicesSend()**](InvoicesApi.md#invoicesSend) | **POST** /invoices/{id}/send | Send an invoice |
| [**invoicesUpdate()**](InvoicesApi.md#invoicesUpdate) | **PATCH** /invoices/{id} | Update invoice |
| [**invoicesVoid()**](InvoicesApi.md#invoicesVoid) | **POST** /invoices/{id}/void | Void an invoice |


## `invoicesCreate()`

```php
invoicesCreate($invoices_create_request): \RevKeen\Model\InvoiceResponse
```

Create invoice

Create a new invoice.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoices_create_request = new \RevKeen\Model\InvoicesCreateRequest(); // \RevKeen\Model\InvoicesCreateRequest | Invoice creation details

try {
    $result = $apiInstance->invoicesCreate($invoices_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **invoices_create_request** | [**\RevKeen\Model\InvoicesCreateRequest**](../Model/InvoicesCreateRequest.md)| Invoice creation details | |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesFinalize()`

```php
invoicesFinalize($id, $invoices_finalize_request): \RevKeen\Model\InvoiceResponse
```

Finalize an invoice

Finalizes a draft invoice, locking it for payment. Assigns invoice number and generates public token. After finalization, financial fields become immutable.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$invoices_finalize_request = new \RevKeen\Model\InvoicesFinalizeRequest(); // \RevKeen\Model\InvoicesFinalizeRequest | Finalization options

try {
    $result = $apiInstance->invoicesFinalize($id, $invoices_finalize_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesFinalize: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **invoices_finalize_request** | [**\RevKeen\Model\InvoicesFinalizeRequest**](../Model/InvoicesFinalizeRequest.md)| Finalization options | [optional] |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesList()`

```php
invoicesList($status, $customer_id, $limit, $offset): \RevKeen\Model\InvoiceListResponse
```

List invoices

List invoices with pagination and filtering.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$status = 'status_example'; // string | Filter by invoice status
$customer_id = 'customer_id_example'; // string | Filter by customer ID
$limit = 20; // int | Maximum number of results (1-100)
$offset = 0; // int | Number of results to skip

try {
    $result = $apiInstance->invoicesList($status, $customer_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **status** | **string**| Filter by invoice status | [optional] |
| **customer_id** | **string**| Filter by customer ID | [optional] |
| **limit** | **int**| Maximum number of results (1-100) | [optional] [default to 20] |
| **offset** | **int**| Number of results to skip | [optional] [default to 0] |

### Return type

[**\RevKeen\Model\InvoiceListResponse**](../Model/InvoiceListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesRetrieve()`

```php
invoicesRetrieve($id): \RevKeen\Model\InvoiceResponse
```

Get invoice

Get a single invoice by ID.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->invoicesRetrieve($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesRetrieve: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesSend()`

```php
invoicesSend($id, $invoices_send_request): \RevKeen\Model\InvoiceResponse
```

Send an invoice

Sends an invoice to the customer via the specified channel (email, SMS, or WhatsApp). Invoice must be approved first.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$invoices_send_request = new \RevKeen\Model\InvoicesSendRequest(); // \RevKeen\Model\InvoicesSendRequest | Send options

try {
    $result = $apiInstance->invoicesSend($id, $invoices_send_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesSend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **invoices_send_request** | [**\RevKeen\Model\InvoicesSendRequest**](../Model/InvoicesSendRequest.md)| Send options | [optional] |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesUpdate()`

```php
invoicesUpdate($id, $invoices_update_request): \RevKeen\Model\InvoiceResponse
```

Update invoice

Update an existing invoice.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$invoices_update_request = new \RevKeen\Model\InvoicesUpdateRequest(); // \RevKeen\Model\InvoicesUpdateRequest | Invoice update details

try {
    $result = $apiInstance->invoicesUpdate($id, $invoices_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **invoices_update_request** | [**\RevKeen\Model\InvoicesUpdateRequest**](../Model/InvoicesUpdateRequest.md)| Invoice update details | |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesVoid()`

```php
invoicesVoid($id, $invoices_void_request): \RevKeen\Model\InvoiceResponse
```

Void an invoice

Voids an invoice. Only invoices without recorded payments can be voided. Use refund instead for paid invoices.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$invoices_void_request = new \RevKeen\Model\InvoicesVoidRequest(); // \RevKeen\Model\InvoicesVoidRequest | Void details

try {
    $result = $apiInstance->invoicesVoid($id, $invoices_void_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesVoid: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **invoices_void_request** | [**\RevKeen\Model\InvoicesVoidRequest**](../Model/InvoicesVoidRequest.md)| Void details | [optional] |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
