# RevKeen\CheckoutSessionsApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**checkoutSessionsCreate()**](CheckoutSessionsApi.md#checkoutSessionsCreate) | **POST** /checkout-sessions | Create a checkout session |
| [**checkoutSessionsExpire()**](CheckoutSessionsApi.md#checkoutSessionsExpire) | **POST** /checkout-sessions/{id}/expire | Expire a checkout session |
| [**checkoutSessionsGet()**](CheckoutSessionsApi.md#checkoutSessionsGet) | **GET** /checkout-sessions/{id} | Retrieve a checkout session |


## `checkoutSessionsCreate()`

```php
checkoutSessionsCreate($create_checkout_session_input): \RevKeen\Model\CheckoutSessionCreateResponse
```

Create a checkout session

Create a checkout session for an invoice or product.  ---  **Related endpoints**  - `GET /checkout-sessions/{id}` — Retrieve a checkout session - `POST /checkout-sessions/{id}/expire` — Expire a checkout session  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CheckoutSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_checkout_session_input = new \RevKeen\Model\CreateCheckoutSessionInput(); // \RevKeen\Model\CreateCheckoutSessionInput

try {
    $result = $apiInstance->checkoutSessionsCreate($create_checkout_session_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CheckoutSessionsApi->checkoutSessionsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_checkout_session_input** | [**\RevKeen\Model\CreateCheckoutSessionInput**](../Model/CreateCheckoutSessionInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CheckoutSessionCreateResponse**](../Model/CheckoutSessionCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `checkoutSessionsExpire()`

```php
checkoutSessionsExpire($id): \RevKeen\Model\CheckoutSessionExpireResponse
```

Expire a checkout session

Manually expire an open checkout session. Only sessions with status 'open' or 'pending' and no active payment attempt can be expired.  ---  **Related endpoints**  - `POST /checkout-sessions` — Create a checkout session - `GET /checkout-sessions/{id}` — Retrieve a checkout session  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CheckoutSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string

try {
    $result = $apiInstance->checkoutSessionsExpire($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CheckoutSessionsApi->checkoutSessionsExpire: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\CheckoutSessionExpireResponse**](../Model/CheckoutSessionExpireResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `checkoutSessionsGet()`

```php
checkoutSessionsGet($id): \RevKeen\Model\CheckoutSessionRetrieveResponse
```

Retrieve a checkout session

Retrieve a checkout session by its ID.  ---  **Related endpoints**  - `POST /checkout-sessions` — Create a checkout session - `POST /checkout-sessions/{id}/expire` — Expire a checkout session  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\CheckoutSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string

try {
    $result = $apiInstance->checkoutSessionsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CheckoutSessionsApi->checkoutSessionsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\CheckoutSessionRetrieveResponse**](../Model/CheckoutSessionRetrieveResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
