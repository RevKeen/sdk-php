# RevKeen\PaymentLinksApi



All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**paymentLinksActivate()**](PaymentLinksApi.md#paymentLinksActivate) | **POST** /payment-links/{id}/activate | Activate a payment link (deprecated) |
| [**paymentLinksArchive()**](PaymentLinksApi.md#paymentLinksArchive) | **POST** /payment-links/{id}/archive | Archive a payment link (deprecated) |
| [**paymentLinksCreate()**](PaymentLinksApi.md#paymentLinksCreate) | **POST** /payment-links | Create a new payment link |
| [**paymentLinksDeactivate()**](PaymentLinksApi.md#paymentLinksDeactivate) | **POST** /payment-links/{id}/deactivate | Deactivate a payment link (deprecated) |
| [**paymentLinksExpire()**](PaymentLinksApi.md#paymentLinksExpire) | **POST** /payment-links/{id}/expire | Expire a payment link (deprecated) |
| [**paymentLinksGet()**](PaymentLinksApi.md#paymentLinksGet) | **GET** /payment-links/{id} | Get payment link by ID |
| [**paymentLinksList()**](PaymentLinksApi.md#paymentLinksList) | **GET** /payment-links | List payment links |
| [**paymentLinksUpdate()**](PaymentLinksApi.md#paymentLinksUpdate) | **PATCH** /payment-links/{id}/status | Update payment link status |


## `paymentLinksActivate()`

```php
paymentLinksActivate($id): \RevKeen\Model\PaymentLinksUpdate200Response
```

Activate a payment link (deprecated)

**Deprecated — use `PATCH /v2/payment-links/{id}/status` with `status: \"active\"` instead.** This convenience endpoint will be removed in a future API version. Enable a payment link to accept payments. Cannot be used on archived links.

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


$apiInstance = new RevKeen\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment link UUID or public_id

try {
    $result = $apiInstance->paymentLinksActivate($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksActivate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |

### Return type

[**\RevKeen\Model\PaymentLinksUpdate200Response**](../Model/PaymentLinksUpdate200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksArchive()`

```php
paymentLinksArchive($id): \RevKeen\Model\PaymentLinksUpdate200Response
```

Archive a payment link (deprecated)

**Deprecated — use `PATCH /v2/payment-links/{id}/status` with `status: \"archived\"` instead.** This convenience endpoint will be removed in a future API version. Permanently disable a payment link. This action cannot be undone.

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


$apiInstance = new RevKeen\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment link UUID or public_id

try {
    $result = $apiInstance->paymentLinksArchive($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksArchive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |

### Return type

[**\RevKeen\Model\PaymentLinksUpdate200Response**](../Model/PaymentLinksUpdate200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksCreate()`

```php
paymentLinksCreate($payment_links_create_request): \RevKeen\Model\PaymentLinksList200ResponseDataInner
```

Create a new payment link

Create a new payment link for invoices, subscriptions, or custom amounts

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


$apiInstance = new RevKeen\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payment_links_create_request = new \RevKeen\Model\PaymentLinksCreateRequest(); // \RevKeen\Model\PaymentLinksCreateRequest

try {
    $result = $apiInstance->paymentLinksCreate($payment_links_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payment_links_create_request** | [**\RevKeen\Model\PaymentLinksCreateRequest**](../Model/PaymentLinksCreateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\PaymentLinksList200ResponseDataInner**](../Model/PaymentLinksList200ResponseDataInner.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksDeactivate()`

```php
paymentLinksDeactivate($id): \RevKeen\Model\PaymentLinksUpdate200Response
```

Deactivate a payment link (deprecated)

**Deprecated — use `PATCH /v2/payment-links/{id}/status` with `status: \"inactive\"` instead.** This convenience endpoint will be removed in a future API version. Temporarily disable a payment link. It can be reactivated later.

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


$apiInstance = new RevKeen\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment link UUID or public_id

try {
    $result = $apiInstance->paymentLinksDeactivate($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksDeactivate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |

### Return type

[**\RevKeen\Model\PaymentLinksUpdate200Response**](../Model/PaymentLinksUpdate200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksExpire()`

```php
paymentLinksExpire($id, $payment_links_expire_request): \RevKeen\Model\PaymentLinksList200ResponseDataInner
```

Expire a payment link (deprecated)

**Deprecated — use `PATCH /v2/payment-links/{id}/status` with `status: \"expired\"` instead.** This convenience endpoint will be removed in a future API version. Mark a payment link as expired, preventing further use.

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


$apiInstance = new RevKeen\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment link UUID or public_id
$payment_links_expire_request = new \RevKeen\Model\PaymentLinksExpireRequest(); // \RevKeen\Model\PaymentLinksExpireRequest

try {
    $result = $apiInstance->paymentLinksExpire($id, $payment_links_expire_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksExpire: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |
| **payment_links_expire_request** | [**\RevKeen\Model\PaymentLinksExpireRequest**](../Model/PaymentLinksExpireRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\PaymentLinksList200ResponseDataInner**](../Model/PaymentLinksList200ResponseDataInner.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksGet()`

```php
paymentLinksGet($id): \RevKeen\Model\PaymentLinksList200ResponseDataInner
```

Get payment link by ID

Retrieve a payment link by its UUID or public_id

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


$apiInstance = new RevKeen\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment link UUID or public_id

try {
    $result = $apiInstance->paymentLinksGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |

### Return type

[**\RevKeen\Model\PaymentLinksList200ResponseDataInner**](../Model/PaymentLinksList200ResponseDataInner.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksList()`

```php
paymentLinksList($limit, $offset, $status, $mode, $search): \RevKeen\Model\PaymentLinksList200Response
```

List payment links

List payment links for the authenticated merchant with pagination and filters

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


$apiInstance = new RevKeen\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 50; // int
$offset = 0; // int
$status = 'status_example'; // string
$mode = 'mode_example'; // string
$search = 'search_example'; // string

try {
    $result = $apiInstance->paymentLinksList($limit, $offset, $status, $mode, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**|  | [optional] [default to 50] |
| **offset** | **int**|  | [optional] [default to 0] |
| **status** | **string**|  | [optional] |
| **mode** | **string**|  | [optional] |
| **search** | **string**|  | [optional] |

### Return type

[**\RevKeen\Model\PaymentLinksList200Response**](../Model/PaymentLinksList200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksUpdate()`

```php
paymentLinksUpdate($id, $payment_links_update_request): \RevKeen\Model\PaymentLinksUpdate200Response
```

Update payment link status

Change the status of a payment link. Active links accept payments, inactive links are temporarily disabled, and archived links are permanently disabled and cannot be reactivated.

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


$apiInstance = new RevKeen\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment link UUID or public_id
$payment_links_update_request = new \RevKeen\Model\PaymentLinksUpdateRequest(); // \RevKeen\Model\PaymentLinksUpdateRequest

try {
    $result = $apiInstance->paymentLinksUpdate($id, $payment_links_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |
| **payment_links_update_request** | [**\RevKeen\Model\PaymentLinksUpdateRequest**](../Model/PaymentLinksUpdateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\PaymentLinksUpdate200Response**](../Model/PaymentLinksUpdate200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
