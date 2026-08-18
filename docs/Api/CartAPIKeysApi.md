# RevKeen\CartAPIKeysApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cartApiKeysEnsure()**](CartAPIKeysApi.md#cartApiKeysEnsure) | **POST** /cart-api-keys/ensure | Ensure managed Cart API keys exist |
| [**cartApiKeysRotate()**](CartAPIKeysApi.md#cartApiKeysRotate) | **POST** /cart-api-keys/{kind}/rotate | Rotate a managed Cart API key |
| [**cartApiKeysStatus()**](CartAPIKeysApi.md#cartApiKeysStatus) | **GET** /cart-api-keys/status | Get managed Cart API key status |


## `cartApiKeysEnsure()`

```php
cartApiKeysEnsure(): \RevKeen\Model\CartApiKeysStatus200Response
```

Ensure managed Cart API keys exist

Creates any missing managed RevKeen Cart publishable and secret keys for the authenticated merchant. Newly created key values are returned once; existing secret values are never re-exposed.  ---  **Related endpoints**  - `GET /cart-api-keys/status` — Get managed Cart API key status - `POST /cart-api-keys/{kind}/rotate` — Rotate a managed Cart API key  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CartAPIKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->cartApiKeysEnsure();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartAPIKeysApi->cartApiKeysEnsure: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\RevKeen\Model\CartApiKeysStatus200Response**](../Model/CartApiKeysStatus200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cartApiKeysRotate()`

```php
cartApiKeysRotate($kind, $cart_api_keys_rotate_request): \RevKeen\Model\CartApiKeysRotate200Response
```

Rotate a managed Cart API key

Rotates the managed RevKeen Cart publishable or secret key. The new key value is returned once; previous keys remain valid for the requested grace window.  ---  **Related endpoints**  - `GET /cart-api-keys/status` — Get managed Cart API key status - `POST /cart-api-keys/ensure` — Ensure managed Cart API keys exist  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CartAPIKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$kind = publishable; // string
$cart_api_keys_rotate_request = new \RevKeen\Model\CartApiKeysRotateRequest(); // \RevKeen\Model\CartApiKeysRotateRequest

try {
    $result = $apiInstance->cartApiKeysRotate($kind, $cart_api_keys_rotate_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartAPIKeysApi->cartApiKeysRotate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **kind** | **string**|  | |
| **cart_api_keys_rotate_request** | [**\RevKeen\Model\CartApiKeysRotateRequest**](../Model/CartApiKeysRotateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CartApiKeysRotate200Response**](../Model/CartApiKeysRotate200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cartApiKeysStatus()`

```php
cartApiKeysStatus(): \RevKeen\Model\CartApiKeysStatus200Response
```

Get managed Cart API key status

Returns whether the authenticated merchant has managed RevKeen Cart publishable and secret keys. Existing key values are never returned.  ---  **Related endpoints**  - `POST /cart-api-keys/ensure` — Ensure managed Cart API keys exist - `POST /cart-api-keys/{kind}/rotate` — Rotate a managed Cart API key  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant.

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


$apiInstance = new RevKeen\Api\CartAPIKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->cartApiKeysStatus();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartAPIKeysApi->cartApiKeysStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\RevKeen\Model\CartApiKeysStatus200Response**](../Model/CartApiKeysStatus200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
