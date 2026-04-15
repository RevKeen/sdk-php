# RevKeen\ImportsApi

Bulk data import jobs. Upload a CSV file to create customers, products, or invoices in bulk. Imports are processed asynchronously — poll &#x60;GET /v2/imports/:id&#x60; for progress and error details.  **Required Scopes:** - &#x60;imports:read&#x60; - Check import status - &#x60;imports:write&#x60; - Create import jobs

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**importsCreate()**](ImportsApi.md#importsCreate) | **POST** /imports | Create an import |
| [**importsRetrieve()**](ImportsApi.md#importsRetrieve) | **GET** /imports/{id} | Get import status |


## `importsCreate()`

```php
importsCreate($create_import_request): \RevKeen\Model\ImportCreateResponse
```

Create an import

Create a bulk data import job. The import is processed asynchronously. Poll `GET /v2/imports/:id` for progress and errors.

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


$apiInstance = new RevKeen\Api\ImportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_import_request = new \RevKeen\Model\CreateImportRequest(); // \RevKeen\Model\CreateImportRequest | Import configuration

try {
    $result = $apiInstance->importsCreate($create_import_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImportsApi->importsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_import_request** | [**\RevKeen\Model\CreateImportRequest**](../Model/CreateImportRequest.md)| Import configuration | |

### Return type

[**\RevKeen\Model\ImportCreateResponse**](../Model/ImportCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `importsRetrieve()`

```php
importsRetrieve($id): \RevKeen\Model\ImportRetrieveResponse
```

Get import status

Check the status and progress of an import job. Includes detailed error information for failed rows.

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


$apiInstance = new RevKeen\Api\ImportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Import job UUID

try {
    $result = $apiInstance->importsRetrieve($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImportsApi->importsRetrieve: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Import job UUID | |

### Return type

[**\RevKeen\Model\ImportRetrieveResponse**](../Model/ImportRetrieveResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
