# RevKeen\ProductsApi

Products represent the goods or services you sell. Each product can have multiple prices for different currencies, billing intervals, or pricing models. Products are used across subscriptions, one-off charges, and checkout sessions.  **Required Scopes:** - &#x60;products:read&#x60; - List and retrieve products - &#x60;products:write&#x60; - Create, update, archive products

All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**productCollectionsCreate()**](ProductsApi.md#productCollectionsCreate) | **POST** /product-collections | Create a product collection |
| [**productCollectionsDelete()**](ProductsApi.md#productCollectionsDelete) | **DELETE** /product-collections/{id} | Delete a product collection |
| [**productCollectionsGet()**](ProductsApi.md#productCollectionsGet) | **GET** /product-collections/{id} | Get a product collection |
| [**productCollectionsList()**](ProductsApi.md#productCollectionsList) | **GET** /product-collections | List product collections |
| [**productCollectionsUpdate()**](ProductsApi.md#productCollectionsUpdate) | **PATCH** /product-collections/{id} | Update a product collection |
| [**productsCreate()**](ProductsApi.md#productsCreate) | **POST** /products | Create product |
| [**productsGet()**](ProductsApi.md#productsGet) | **GET** /products/{id} | Get product by ID |
| [**productsList()**](ProductsApi.md#productsList) | **GET** /products | List products |
| [**productsUpdate()**](ProductsApi.md#productsUpdate) | **PATCH** /products/{id} | Update product |


## `productCollectionsCreate()`

```php
productCollectionsCreate($product_collection_create_request): \RevKeen\Model\ProductCollectionCreateResponse
```

Create a product collection

Create a product collection. The URL handle must be unique for the merchant, and every product must belong to the merchant.  ---  **Related endpoints**  - `GET /products` — List products - `POST /products` — Create product - `GET /products/{id}` — Get product by ID - `PATCH /products/{id}` — Update product - `PUT /products/external/{source}/{externalId}` — Upsert product by external ID - `PUT /products/external/batch` — Batch upsert products by external ID - `GET /product-collections` — List product collections - `GET /product-collections/{id}` — Get a product collection  **Common errors**  - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `422 unprocessable_entity` — business-rule failure (for example, refunding more than the original charge).  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$product_collection_create_request = new \RevKeen\Model\ProductCollectionCreateRequest(); // \RevKeen\Model\ProductCollectionCreateRequest

try {
    $result = $apiInstance->productCollectionsCreate($product_collection_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productCollectionsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **product_collection_create_request** | [**\RevKeen\Model\ProductCollectionCreateRequest**](../Model/ProductCollectionCreateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\ProductCollectionCreateResponse**](../Model/ProductCollectionCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productCollectionsDelete()`

```php
productCollectionsDelete($id): \RevKeen\Model\ProductCollectionDeletedResponse
```

Delete a product collection

Delete a product collection. Its products are not changed.  ---  **Related endpoints**  - `GET /products` — List products - `POST /products` — Create product - `GET /products/{id}` — Get product by ID - `PATCH /products/{id}` — Update product - `PUT /products/external/{source}/{externalId}` — Upsert product by external ID - `PUT /products/external/batch` — Batch upsert products by external ID - `GET /product-collections` — List product collections - `POST /product-collections` — Create a product collection  **Common errors**  - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$id = 'id_example'; // string

try {
    $result = $apiInstance->productCollectionsDelete($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productCollectionsDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\ProductCollectionDeletedResponse**](../Model/ProductCollectionDeletedResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productCollectionsGet()`

```php
productCollectionsGet($id): \RevKeen\Model\ProductCollectionResponse
```

Get a product collection

Get one product collection by id or URL handle.  ---  **Related endpoints**  - `GET /products` — List products - `POST /products` — Create product - `GET /products/{id}` — Get product by ID - `PATCH /products/{id}` — Update product - `PUT /products/external/{source}/{externalId}` — Upsert product by external ID - `PUT /products/external/batch` — Batch upsert products by external ID - `GET /product-collections` — List product collections - `POST /product-collections` — Create a product collection  **Common errors**  - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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
$id = 'id_example'; // string | Collection id or URL handle.

try {
    $result = $apiInstance->productCollectionsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productCollectionsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Collection id or URL handle. | |

### Return type

[**\RevKeen\Model\ProductCollectionResponse**](../Model/ProductCollectionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productCollectionsList()`

```php
productCollectionsList(): \RevKeen\Model\ProductCollectionListResponse
```

List product collections

List the merchant's product collections, with member product ids in display order.  ---  **Related endpoints**  - `GET /products` — List products - `POST /products` — Create product - `GET /products/{id}` — Get product by ID - `PATCH /products/{id}` — Update product - `PUT /products/external/{source}/{externalId}` — Upsert product by external ID - `PUT /products/external/batch` — Batch upsert products by external ID - `POST /product-collections` — Create a product collection - `GET /product-collections/{id}` — Get a product collection  **Common errors**  - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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

try {
    $result = $apiInstance->productCollectionsList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productCollectionsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\RevKeen\Model\ProductCollectionListResponse**](../Model/ProductCollectionListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productCollectionsUpdate()`

```php
productCollectionsUpdate($id, $product_collection_update_request): \RevKeen\Model\ProductCollectionUpdateResponse
```

Update a product collection

Update a product collection. `product_ids` replaces the membership in the given order. Send `expected_version` to refuse the change if the collection was edited since you read it.  ---  **Related endpoints**  - `GET /products` — List products - `POST /products` — Create product - `GET /products/{id}` — Get product by ID - `PATCH /products/{id}` — Update product - `PUT /products/external/{source}/{externalId}` — Upsert product by external ID - `PUT /products/external/batch` — Batch upsert products by external ID - `GET /product-collections` — List product collections - `POST /product-collections` — Create a product collection  **Common errors**  - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `422 unprocessable_entity` — business-rule failure (for example, refunding more than the original charge).  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$id = 'id_example'; // string
$product_collection_update_request = new \RevKeen\Model\ProductCollectionUpdateRequest(); // \RevKeen\Model\ProductCollectionUpdateRequest

try {
    $result = $apiInstance->productCollectionsUpdate($id, $product_collection_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productCollectionsUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **product_collection_update_request** | [**\RevKeen\Model\ProductCollectionUpdateRequest**](../Model/ProductCollectionUpdateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\ProductCollectionUpdateResponse**](../Model/ProductCollectionUpdateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsCreate()`

```php
productsCreate($create_product_request): \RevKeen\Model\ProductCreateResponse
```

Create product

Create a new product. Requires 'products:write' scope.  ---  **Related endpoints**  - `GET /products` — List products - `GET /products/{id}` — Get product by ID - `PATCH /products/{id}` — Update product - `PUT /products/external/{source}/{externalId}` — Upsert product by external ID - `PUT /products/external/batch` — Batch upsert products by external ID - `GET /product-collections` — List product collections - `POST /product-collections` — Create a product collection - `GET /product-collections/{id}` — Get a product collection  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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

## `productsGet()`

```php
productsGet($id): \RevKeen\Model\ProductRetrieveResponse
```

Get product by ID

Get a product by its ID. Requires 'products:read' scope.  ---  **Related endpoints**  - `GET /products` — List products - `POST /products` — Create product - `PATCH /products/{id}` — Update product - `PUT /products/external/{source}/{externalId}` — Upsert product by external ID - `PUT /products/external/batch` — Batch upsert products by external ID - `GET /product-collections` — List product collections - `POST /product-collections` — Create a product collection - `GET /product-collections/{id}` — Get a product collection  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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
$id = 'id_example'; // string

try {
    $result = $apiInstance->productsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsGet: ', $e->getMessage(), PHP_EOL;
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

## `productsList()`

```php
productsList($page, $limit, $search): \RevKeen\Model\ProductListResponse
```

List products

List products with pagination and optional search.  ---  **Related endpoints**  - `POST /products` — Create product - `GET /products/{id}` — Get product by ID - `PATCH /products/{id}` — Update product - `PUT /products/external/{source}/{externalId}` — Upsert product by external ID - `PUT /products/external/batch` — Batch upsert products by external ID - `GET /product-collections` — List product collections - `POST /product-collections` — Create a product collection - `GET /product-collections/{id}` — Get a product collection  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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

## `productsUpdate()`

```php
productsUpdate($id, $update_product_request): \RevKeen\Model\ProductUpdateResponse
```

Update product

Update an existing product. Requires 'products:write' scope.  ---  **Related endpoints**  - `GET /products` — List products - `POST /products` — Create product - `GET /products/{id}` — Get product by ID - `PUT /products/external/{source}/{externalId}` — Upsert product by external ID - `PUT /products/external/batch` — Batch upsert products by external ID - `GET /product-collections` — List product collections - `POST /product-collections` — Create a product collection - `GET /product-collections/{id}` — Get a product collection  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$id = 'id_example'; // string
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
