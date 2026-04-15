# RevKeen\CheckoutSessionsApi



All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**checkoutSessionsCreate()**](CheckoutSessionsApi.md#checkoutSessionsCreate) | **POST** /checkout-sessions | Create a checkout session |
| [**checkoutSessionsExpire()**](CheckoutSessionsApi.md#checkoutSessionsExpire) | **POST** /checkout-sessions/{id}/expire | Expire a checkout session |
| [**checkoutSessionsRetrieve()**](CheckoutSessionsApi.md#checkoutSessionsRetrieve) | **GET** /checkout-sessions/{id} | Retrieve a checkout session |


## `checkoutSessionsCreate()`

```php
checkoutSessionsCreate($create_checkout_session_input): \RevKeen\Model\CheckoutSessionCreateResponse
```

Create a checkout session

Create a checkout session for an invoice or product.

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

Manually expire an open checkout session. Only sessions with status 'open' or 'pending' and no active payment attempt can be expired.

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

## `checkoutSessionsRetrieve()`

```php
checkoutSessionsRetrieve($id): \RevKeen\Model\CheckoutSessionRetrieveResponse
```

Retrieve a checkout session

Retrieve a checkout session by its ID.

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
    $result = $apiInstance->checkoutSessionsRetrieve($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CheckoutSessionsApi->checkoutSessionsRetrieve: ', $e->getMessage(), PHP_EOL;
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
