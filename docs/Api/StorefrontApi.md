# RevKeen\StorefrontApi

Read storefront products and availability, manage browser origin allowlists, and inspect integration readiness for RevKeen Cart.  **Required Scopes:** - &#x60;products:read&#x60; - Read storefront products and availability - &#x60;apps:read&#x60; - Inspect storefront integration status - &#x60;apps:write&#x60; - Manage allowed storefront origins

All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**storefrontOriginsCreate()**](StorefrontApi.md#storefrontOriginsCreate) | **POST** /storefront/origins | Register a storefront origin |
| [**storefrontOriginsDelete()**](StorefrontApi.md#storefrontOriginsDelete) | **DELETE** /storefront/origins/{originId} | Remove a storefront origin |
| [**storefrontOriginsList()**](StorefrontApi.md#storefrontOriginsList) | **GET** /storefront/origins | List storefront origins |
| [**storefrontProductsGet()**](StorefrontApi.md#storefrontProductsGet) | **GET** /storefront/products/{productId} | Get a storefront product |
| [**storefrontProductsList()**](StorefrontApi.md#storefrontProductsList) | **GET** /storefront/products | List storefront products |
| [**storefrontStatusGet()**](StorefrontApi.md#storefrontStatusGet) | **GET** /storefront/status | Get storefront integration status |


## `storefrontOriginsCreate()`

```php
storefrontOriginsCreate($storefront_origin_create_request): \RevKeen\Model\StorefrontOriginCreateResponse
```

Register a storefront origin

Register an exact web origin (scheme://host[:port]) for publishable-key storefront calls. Wildcards are rejected; http is allowed only for localhost.  ---  **Related endpoints**  - `GET /storefront/products` — List storefront products - `GET /storefront/products/{productId}` — Get a storefront product - `GET /storefront/origins` — List storefront origins - `DELETE /storefront/origins/{originId}` — Remove a storefront origin - `GET /storefront/status` — Get storefront integration status  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\StorefrontApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$storefront_origin_create_request = new \RevKeen\Model\StorefrontOriginCreateRequest(); // \RevKeen\Model\StorefrontOriginCreateRequest

try {
    $result = $apiInstance->storefrontOriginsCreate($storefront_origin_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorefrontApi->storefrontOriginsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **storefront_origin_create_request** | [**\RevKeen\Model\StorefrontOriginCreateRequest**](../Model/StorefrontOriginCreateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\StorefrontOriginCreateResponse**](../Model/StorefrontOriginCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `storefrontOriginsDelete()`

```php
storefrontOriginsDelete($origin_id): \RevKeen\Model\StorefrontOriginDeleteResponse
```

Remove a storefront origin

Remove a registered storefront origin. Browser calls from it fail closed afterwards.  ---  **Related endpoints**  - `GET /storefront/products` — List storefront products - `GET /storefront/products/{productId}` — Get a storefront product - `GET /storefront/origins` — List storefront origins - `POST /storefront/origins` — Register a storefront origin - `GET /storefront/status` — Get storefront integration status  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\StorefrontApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$origin_id = 'origin_id_example'; // string | Storefront origin id.

try {
    $result = $apiInstance->storefrontOriginsDelete($origin_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorefrontApi->storefrontOriginsDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **origin_id** | **string**| Storefront origin id. | |

### Return type

[**\RevKeen\Model\StorefrontOriginDeleteResponse**](../Model/StorefrontOriginDeleteResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `storefrontOriginsList()`

```php
storefrontOriginsList(): \RevKeen\Model\StorefrontOriginListResponse
```

List storefront origins

List the browser origins registered for publishable-key storefront calls.  ---  **Related endpoints**  - `GET /storefront/products` — List storefront products - `GET /storefront/products/{productId}` — Get a storefront product - `POST /storefront/origins` — Register a storefront origin - `DELETE /storefront/origins/{originId}` — Remove a storefront origin - `GET /storefront/status` — Get storefront integration status  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\StorefrontApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->storefrontOriginsList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorefrontApi->storefrontOriginsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\RevKeen\Model\StorefrontOriginListResponse**](../Model/StorefrontOriginListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `storefrontProductsGet()`

```php
storefrontProductsGet($product_id): \RevKeen\Model\StorefrontProductResponse
```

Get a storefront product

Fetch one active, cart-eligible product by UUID, product reference, or slug. Same browser-safe projection as the list endpoint.  ---  **Related endpoints**  - `GET /storefront/products` — List storefront products - `GET /storefront/origins` — List storefront origins - `POST /storefront/origins` — Register a storefront origin - `DELETE /storefront/origins/{originId}` — Remove a storefront origin - `GET /storefront/status` — Get storefront integration status  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\StorefrontApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_id = 'product_id_example'; // string | Product UUID, merchant product reference, or slug.

try {
    $result = $apiInstance->storefrontProductsGet($product_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorefrontApi->storefrontProductsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **product_id** | **string**| Product UUID, merchant product reference, or slug. | |

### Return type

[**\RevKeen\Model\StorefrontProductResponse**](../Model/StorefrontProductResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `storefrontProductsList()`

```php
storefrontProductsList($limit): \RevKeen\Model\StorefrontProductListResponse
```

List storefront products

List active, cart-eligible products with browser-safe display data, active prices, and derived availability. Intended for publishable-key storefront and CMS-picker use; never returns product metadata or internal fields.  ---  **Related endpoints**  - `GET /storefront/products/{productId}` — Get a storefront product - `GET /storefront/origins` — List storefront origins - `POST /storefront/origins` — Register a storefront origin - `DELETE /storefront/origins/{originId}` — Remove a storefront origin - `GET /storefront/status` — Get storefront integration status  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\StorefrontApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | Maximum products to return (default 50, max 100).

try {
    $result = $apiInstance->storefrontProductsList($limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorefrontApi->storefrontProductsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Maximum products to return (default 50, max 100). | [optional] |

### Return type

[**\RevKeen\Model\StorefrontProductListResponse**](../Model/StorefrontProductListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `storefrontStatusGet()`

```php
storefrontStatusGet(): \RevKeen\Model\StorefrontStatusResponse
```

Get storefront integration status

Readiness report for the Cart/headless-storefront setup: activation, managed keys, registered origins, product-read readiness, webhook health, and availability tracking. CART_DISABLED / KEYS_MISSING / ORIGIN_MISSING / PRODUCT_READ_UNAVAILABLE are fail-level; WEBHOOK_MISSING / WEBHOOK_UNREACHABLE are warn-level. Never returns key material.  ---  **Related endpoints**  - `GET /storefront/products` — List storefront products - `GET /storefront/products/{productId}` — Get a storefront product - `GET /storefront/origins` — List storefront origins - `POST /storefront/origins` — Register a storefront origin - `DELETE /storefront/origins/{originId}` — Remove a storefront origin  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant.

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


$apiInstance = new RevKeen\Api\StorefrontApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->storefrontStatusGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorefrontApi->storefrontStatusGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\RevKeen\Model\StorefrontStatusResponse**](../Model/StorefrontStatusResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
