# RevKeen\ExportsApi

Bulk data export jobs. Generate CSV or XLSX files of customers, invoices, transactions, subscriptions, products, or payment methods. Exports are processed asynchronously — poll &#x60;GET /v2/exports/:id&#x60; for status and download URL.  **Required Scopes:** - &#x60;exports:read&#x60; - Check export status - &#x60;exports:write&#x60; - Create export jobs

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**exportsCreate()**](ExportsApi.md#exportsCreate) | **POST** /exports | Create an export |
| [**exportsRetrieve()**](ExportsApi.md#exportsRetrieve) | **GET** /exports/{id} | Get export status |


## `exportsCreate()`

```php
exportsCreate($create_export_request): \RevKeen\Model\ExportCreateResponse
```

Create an export

Create an async data export. The export is processed in the background. Poll `GET /v2/exports/:id` for status and download URL.

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


$apiInstance = new RevKeen\Api\ExportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_export_request = new \RevKeen\Model\CreateExportRequest(); // \RevKeen\Model\CreateExportRequest | Export configuration

try {
    $result = $apiInstance->exportsCreate($create_export_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExportsApi->exportsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_export_request** | [**\RevKeen\Model\CreateExportRequest**](../Model/CreateExportRequest.md)| Export configuration | |

### Return type

[**\RevKeen\Model\ExportCreateResponse**](../Model/ExportCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportsRetrieve()`

```php
exportsRetrieve($id): \RevKeen\Model\ExportRetrieveResponse
```

Get export status

Check the status of an export job. When status is 'completed', the download_url will contain a presigned URL (valid for 1 hour).

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


$apiInstance = new RevKeen\Api\ExportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Export job UUID

try {
    $result = $apiInstance->exportsRetrieve($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExportsApi->exportsRetrieve: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Export job UUID | |

### Return type

[**\RevKeen\Model\ExportRetrieveResponse**](../Model/ExportRetrieveResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
