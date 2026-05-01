# RevKeen\PricesApi

Prices define how much and how often to charge for a product. A single product can have multiple prices — different currencies, billing intervals, or pricing tiers. Supports fixed-amount, pay-what-you-want, tiered, and free pricing models.  **Required Scopes:** - &#x60;prices:read&#x60; - List and retrieve prices - &#x60;prices:write&#x60; - Create, update, archive prices

All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**pricesArchive()**](PricesApi.md#pricesArchive) | **DELETE** /prices/{id} | Archive a price |
| [**pricesCreate()**](PricesApi.md#pricesCreate) | **POST** /prices | Create a price |
| [**pricesGet()**](PricesApi.md#pricesGet) | **GET** /prices/{id} | Retrieve a price |
| [**pricesList()**](PricesApi.md#pricesList) | **GET** /prices | List prices |
| [**pricesUpdate()**](PricesApi.md#pricesUpdate) | **PATCH** /prices/{id} | Update a price |


## `pricesArchive()`

```php
pricesArchive($id): \RevKeen\Model\Price
```

Archive a price

Archives a price by setting active to false. The price remains in the system but cannot be used for new purchases.  ---  **Related endpoints**  - `GET /prices` — List prices - `POST /prices` — Create a price - `GET /prices/{id}` — Retrieve a price - `PATCH /prices/{id}` — Update a price  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\PricesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Price ID

try {
    $result = $apiInstance->pricesArchive($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PricesApi->pricesArchive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Price ID | |

### Return type

[**\RevKeen\Model\Price**](../Model/Price.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pricesCreate()`

```php
pricesCreate($create_price_request): \RevKeen\Model\Price
```

Create a price

Creates a new price for a product. Supports fixed, pay-what-you-want, and free pricing models.  ---  **Related endpoints**  - `GET /prices` — List prices - `GET /prices/{id}` — Retrieve a price - `PATCH /prices/{id}` — Update a price - `DELETE /prices/{id}` — Archive a price  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\PricesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_price_request = new \RevKeen\Model\CreatePriceRequest(); // \RevKeen\Model\CreatePriceRequest | Price creation details

try {
    $result = $apiInstance->pricesCreate($create_price_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PricesApi->pricesCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_price_request** | [**\RevKeen\Model\CreatePriceRequest**](../Model/CreatePriceRequest.md)| Price creation details | |

### Return type

[**\RevKeen\Model\Price**](../Model/Price.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pricesGet()`

```php
pricesGet($id): \RevKeen\Model\Price
```

Retrieve a price

Retrieves a price by its ID.  ---  **Related endpoints**  - `GET /prices` — List prices - `POST /prices` — Create a price - `PATCH /prices/{id}` — Update a price - `DELETE /prices/{id}` — Archive a price  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\PricesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Price ID

try {
    $result = $apiInstance->pricesGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PricesApi->pricesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Price ID | |

### Return type

[**\RevKeen\Model\Price**](../Model/Price.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pricesList()`

```php
pricesList($product_id, $type, $pricing_model, $active, $currency, $lookup_key, $limit, $starting_after, $ending_before): \RevKeen\Model\PriceListResponse
```

List prices

List all prices for the authenticated merchant. Supports filtering and cursor-based pagination.  ---  **Related endpoints**  - `POST /prices` — Create a price - `GET /prices/{id}` — Retrieve a price - `PATCH /prices/{id}` — Update a price - `DELETE /prices/{id}` — Archive a price  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\PricesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_id = 'product_id_example'; // string | Filter by product ID
$type = 'type_example'; // string | Filter by price type
$pricing_model = 'pricing_model_example'; // string | Filter by pricing model
$active = 'active_example'; // string | Filter by active status
$currency = 'currency_example'; // string | Filter by currency
$lookup_key = 'lookup_key_example'; // string | Filter by lookup key
$limit = 20; // int | Number of results (1-100)
$starting_after = 'starting_after_example'; // string | Cursor for pagination (ID to start after)
$ending_before = 'ending_before_example'; // string | Cursor for pagination (ID to end before)

try {
    $result = $apiInstance->pricesList($product_id, $type, $pricing_model, $active, $currency, $lookup_key, $limit, $starting_after, $ending_before);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PricesApi->pricesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **product_id** | **string**| Filter by product ID | [optional] |
| **type** | **string**| Filter by price type | [optional] |
| **pricing_model** | **string**| Filter by pricing model | [optional] |
| **active** | **string**| Filter by active status | [optional] |
| **currency** | **string**| Filter by currency | [optional] |
| **lookup_key** | **string**| Filter by lookup key | [optional] |
| **limit** | **int**| Number of results (1-100) | [optional] [default to 20] |
| **starting_after** | **string**| Cursor for pagination (ID to start after) | [optional] |
| **ending_before** | **string**| Cursor for pagination (ID to end before) | [optional] |

### Return type

[**\RevKeen\Model\PriceListResponse**](../Model/PriceListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pricesUpdate()`

```php
pricesUpdate($id, $update_price_request): \RevKeen\Model\Price
```

Update a price

Updates a price. Only certain fields can be updated (active, nickname, lookup_key, metadata). Core pricing fields are immutable.  ---  **Related endpoints**  - `GET /prices` — List prices - `POST /prices` — Create a price - `GET /prices/{id}` — Retrieve a price - `DELETE /prices/{id}` — Archive a price  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\PricesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Price ID
$update_price_request = new \RevKeen\Model\UpdatePriceRequest(); // \RevKeen\Model\UpdatePriceRequest | Price update details

try {
    $result = $apiInstance->pricesUpdate($id, $update_price_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PricesApi->pricesUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Price ID | |
| **update_price_request** | [**\RevKeen\Model\UpdatePriceRequest**](../Model/UpdatePriceRequest.md)| Price update details | |

### Return type

[**\RevKeen\Model\Price**](../Model/Price.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
