# RevKeen\ProductsApi

Products represent the goods or services you sell. Each product can have multiple prices for different currencies, billing intervals, or pricing models. Products are used across subscriptions, one-off charges, and checkout sessions.  **Required Scopes:** - &#x60;products:read&#x60; - List and retrieve products - &#x60;products:write&#x60; - Create, update, archive products

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**productsCreate()**](ProductsApi.md#productsCreate) | **POST** /products | Create product |
| [**productsExternalBatch()**](ProductsApi.md#productsExternalBatch) | **PUT** /products/external/batch | Batch upsert products by external ID |
| [**productsExternalUpsert()**](ProductsApi.md#productsExternalUpsert) | **PUT** /products/external/{source}/{externalId} | Upsert product by external ID |
| [**productsList()**](ProductsApi.md#productsList) | **GET** /products | List products |
| [**productsRetrieve()**](ProductsApi.md#productsRetrieve) | **GET** /products/{id} | Get product by ID |
| [**productsUpdate()**](ProductsApi.md#productsUpdate) | **PATCH** /products/{id} | Update product |


## `productsCreate()`

```php
productsCreate($create_product_request): \RevKeen\Model\ProductCreateResponse
```

Create product

Create a new product. Requires 'products:write' scope.

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


$apiInstance = new RevKeen\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_product_request = new \RevKeen\Model\CreateProductRequest(); // \RevKeen\Model\CreateProductRequest | Product creation details

try {
    $result = $apiInstance->productsCreate($create_product_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_product_request** | [**\RevKeen\Model\CreateProductRequest**](../Model/CreateProductRequest.md)| Product creation details | |

### Return type

[**\RevKeen\Model\ProductCreateResponse**](../Model/ProductCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsExternalBatch()`

```php
productsExternalBatch($products_external_batch_request): \RevKeen\Model\ProductsExternalBatch200Response
```

Batch upsert products by external ID

Create or update multiple products by external system ID. Supports up to 100 products per request with stale update protection.

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


$apiInstance = new RevKeen\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$products_external_batch_request = new \RevKeen\Model\ProductsExternalBatchRequest(); // \RevKeen\Model\ProductsExternalBatchRequest

try {
    $result = $apiInstance->productsExternalBatch($products_external_batch_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsExternalBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **products_external_batch_request** | [**\RevKeen\Model\ProductsExternalBatchRequest**](../Model/ProductsExternalBatchRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\ProductsExternalBatch200Response**](../Model/ProductsExternalBatch200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsExternalUpsert()`

```php
productsExternalUpsert($source, $external_id, $products_external_upsert_request): \RevKeen\Model\ProductsExternalUpsert200Response
```

Upsert product by external ID

Create or update a product by external system ID. Uses stale update protection.

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


$apiInstance = new RevKeen\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source = practicehub; // string | Integration source (e.g., practicehub, wodify)
$external_id = prod_12345; // string | External system's product ID
$products_external_upsert_request = new \RevKeen\Model\ProductsExternalUpsertRequest(); // \RevKeen\Model\ProductsExternalUpsertRequest

try {
    $result = $apiInstance->productsExternalUpsert($source, $external_id, $products_external_upsert_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsExternalUpsert: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source** | **string**| Integration source (e.g., practicehub, wodify) | |
| **external_id** | **string**| External system&#39;s product ID | |
| **products_external_upsert_request** | [**\RevKeen\Model\ProductsExternalUpsertRequest**](../Model/ProductsExternalUpsertRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\ProductsExternalUpsert200Response**](../Model/ProductsExternalUpsert200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsList()`

```php
productsList($page, $limit, $search): \RevKeen\Model\ProductListResponse
```

List products

List products with pagination and optional search.

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


$apiInstance = new RevKeen\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page number
$limit = 20; // int | Maximum number of results (1-100)
$search = 'search_example'; // string | Search term to filter products

try {
    $result = $apiInstance->productsList($page, $limit, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page number | [optional] [default to 1] |
| **limit** | **int**| Maximum number of results (1-100) | [optional] [default to 20] |
| **search** | **string**| Search term to filter products | [optional] |

### Return type

[**\RevKeen\Model\ProductListResponse**](../Model/ProductListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsRetrieve()`

```php
productsRetrieve($id): \RevKeen\Model\ProductRetrieveResponse
```

Get product by ID

Get a product by its ID. Requires 'products:read' scope.

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


$apiInstance = new RevKeen\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = prod_123; // string

try {
    $result = $apiInstance->productsRetrieve($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsRetrieve: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\ProductRetrieveResponse**](../Model/ProductRetrieveResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsUpdate()`

```php
productsUpdate($id, $update_product_request): \RevKeen\Model\ProductUpdateResponse
```

Update product

Update an existing product. Requires 'products:write' scope.

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


$apiInstance = new RevKeen\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = prod_123; // string
$update_product_request = new \RevKeen\Model\UpdateProductRequest(); // \RevKeen\Model\UpdateProductRequest | Product update details

try {
    $result = $apiInstance->productsUpdate($id, $update_product_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **update_product_request** | [**\RevKeen\Model\UpdateProductRequest**](../Model/UpdateProductRequest.md)| Product update details | |

### Return type

[**\RevKeen\Model\ProductUpdateResponse**](../Model/ProductUpdateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
