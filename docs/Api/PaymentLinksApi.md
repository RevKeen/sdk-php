# RevKeen\PaymentLinksApi



All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**activatePaymentLink()**](PaymentLinksApi.md#activatePaymentLink) | **POST** /payment-links/{id}/activate | Activate a payment link |
| [**archivePaymentLink()**](PaymentLinksApi.md#archivePaymentLink) | **POST** /payment-links/{id}/archive | Archive a payment link |
| [**createPaymentLink()**](PaymentLinksApi.md#createPaymentLink) | **POST** /payment-links | Create a new payment link |
| [**deactivatePaymentLink()**](PaymentLinksApi.md#deactivatePaymentLink) | **POST** /payment-links/{id}/deactivate | Deactivate a payment link |
| [**expirePaymentLink()**](PaymentLinksApi.md#expirePaymentLink) | **POST** /payment-links/{id}/expire | Expire a payment link |
| [**getPaymentLink()**](PaymentLinksApi.md#getPaymentLink) | **GET** /payment-links/{id} | Get payment link by ID |
| [**listPaymentLinks()**](PaymentLinksApi.md#listPaymentLinks) | **GET** /payment-links | List payment links |
| [**updatePaymentLinkStatus()**](PaymentLinksApi.md#updatePaymentLinkStatus) | **PATCH** /payment-links/{id}/status | Update payment link status |


## `activatePaymentLink()`

```php
activatePaymentLink($id): \RevKeen\Model\UpdatePaymentLinkStatus200Response
```

Activate a payment link

Enable a payment link to accept payments. Cannot be used on archived links.

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
    $result = $apiInstance->activatePaymentLink($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->activatePaymentLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |

### Return type

[**\RevKeen\Model\UpdatePaymentLinkStatus200Response**](../Model/UpdatePaymentLinkStatus200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `archivePaymentLink()`

```php
archivePaymentLink($id): \RevKeen\Model\UpdatePaymentLinkStatus200Response
```

Archive a payment link

Permanently disable a payment link. This action cannot be undone.

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
    $result = $apiInstance->archivePaymentLink($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->archivePaymentLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |

### Return type

[**\RevKeen\Model\UpdatePaymentLinkStatus200Response**](../Model/UpdatePaymentLinkStatus200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createPaymentLink()`

```php
createPaymentLink($create_payment_link_request): \RevKeen\Model\ListPaymentLinks200ResponseDataInner
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
$create_payment_link_request = new \RevKeen\Model\CreatePaymentLinkRequest(); // \RevKeen\Model\CreatePaymentLinkRequest

try {
    $result = $apiInstance->createPaymentLink($create_payment_link_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->createPaymentLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_payment_link_request** | [**\RevKeen\Model\CreatePaymentLinkRequest**](../Model/CreatePaymentLinkRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\ListPaymentLinks200ResponseDataInner**](../Model/ListPaymentLinks200ResponseDataInner.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deactivatePaymentLink()`

```php
deactivatePaymentLink($id): \RevKeen\Model\UpdatePaymentLinkStatus200Response
```

Deactivate a payment link

Temporarily disable a payment link. It can be reactivated later.

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
    $result = $apiInstance->deactivatePaymentLink($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->deactivatePaymentLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |

### Return type

[**\RevKeen\Model\UpdatePaymentLinkStatus200Response**](../Model/UpdatePaymentLinkStatus200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `expirePaymentLink()`

```php
expirePaymentLink($id, $expire_payment_link_request): \RevKeen\Model\ListPaymentLinks200ResponseDataInner
```

Expire a payment link

Mark a payment link as expired, preventing further use

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
$expire_payment_link_request = new \RevKeen\Model\ExpirePaymentLinkRequest(); // \RevKeen\Model\ExpirePaymentLinkRequest

try {
    $result = $apiInstance->expirePaymentLink($id, $expire_payment_link_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->expirePaymentLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |
| **expire_payment_link_request** | [**\RevKeen\Model\ExpirePaymentLinkRequest**](../Model/ExpirePaymentLinkRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\ListPaymentLinks200ResponseDataInner**](../Model/ListPaymentLinks200ResponseDataInner.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPaymentLink()`

```php
getPaymentLink($id): \RevKeen\Model\ListPaymentLinks200ResponseDataInner
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
    $result = $apiInstance->getPaymentLink($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->getPaymentLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |

### Return type

[**\RevKeen\Model\ListPaymentLinks200ResponseDataInner**](../Model/ListPaymentLinks200ResponseDataInner.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPaymentLinks()`

```php
listPaymentLinks($limit, $offset, $status, $mode, $search): \RevKeen\Model\ListPaymentLinks200Response
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
    $result = $apiInstance->listPaymentLinks($limit, $offset, $status, $mode, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->listPaymentLinks: ', $e->getMessage(), PHP_EOL;
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

[**\RevKeen\Model\ListPaymentLinks200Response**](../Model/ListPaymentLinks200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePaymentLinkStatus()`

```php
updatePaymentLinkStatus($id, $update_payment_link_status_request): \RevKeen\Model\UpdatePaymentLinkStatus200Response
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
$update_payment_link_status_request = new \RevKeen\Model\UpdatePaymentLinkStatusRequest(); // \RevKeen\Model\UpdatePaymentLinkStatusRequest

try {
    $result = $apiInstance->updatePaymentLinkStatus($id, $update_payment_link_status_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->updatePaymentLinkStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment link UUID or public_id | |
| **update_payment_link_status_request** | [**\RevKeen\Model\UpdatePaymentLinkStatusRequest**](../Model/UpdatePaymentLinkStatusRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\UpdatePaymentLinkStatus200Response**](../Model/UpdatePaymentLinkStatus200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
