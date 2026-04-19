# RevKeen\CustomersApi

Customer objects represent the individuals or businesses you bill. Use them to store contact information, attach payment methods, and track billing history across subscriptions and one-off payments. Every charge, invoice, and subscription belongs to a customer.  **Required Scopes:** - &#x60;customers:read&#x60; - List and retrieve customers - &#x60;customers:write&#x60; - Create, update, delete customers  **MCP Tools:** &#x60;customers_list&#x60;, &#x60;customers_get&#x60;, &#x60;customers_create&#x60;, &#x60;customers_update&#x60;

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**customersCreate()**](CustomersApi.md#customersCreate) | **POST** /customers | Create a new customer |
| [**customersGet()**](CustomersApi.md#customersGet) | **GET** /customers/{id} | Get customer by ID |
| [**customersList()**](CustomersApi.md#customersList) | **GET** /customers | List customers |
| [**customersPaymentMethodsList()**](CustomersApi.md#customersPaymentMethodsList) | **GET** /customers/{id}/payment-methods | Get customer payment methods |
| [**customersUpdate()**](CustomersApi.md#customersUpdate) | **PATCH** /customers/{id} | Update customer details |


## `customersCreate()`

```php
customersCreate($customers_create_request): \RevKeen\Model\CustomerCreateResponse
```

Create a new customer

Create a new customer record in the merchant's account

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


$apiInstance = new RevKeen\Api\CustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customers_create_request = new \RevKeen\Model\CustomersCreateRequest(); // \RevKeen\Model\CustomersCreateRequest

try {
    $result = $apiInstance->customersCreate($customers_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customersCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customers_create_request** | [**\RevKeen\Model\CustomersCreateRequest**](../Model/CustomersCreateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CustomerCreateResponse**](../Model/CustomerCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customersGet()`

```php
customersGet($id): \RevKeen\Model\CustomerRetrieveResponse
```

Get customer by ID

Retrieve detailed information about a specific customer

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


$apiInstance = new RevKeen\Api\CustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Customer UUID

try {
    $result = $apiInstance->customersGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Customer UUID | |

### Return type

[**\RevKeen\Model\CustomerRetrieveResponse**](../Model/CustomerRetrieveResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customersList()`

```php
customersList($limit, $offset, $search): \RevKeen\Model\CustomerListResponse
```

List customers

Retrieve a paginated list of customers for the merchant

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


$apiInstance = new RevKeen\Api\CustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 20; // int | Maximum number of results (1-100)
$offset = 0; // int | Number of results to skip
$search = 'search_example'; // string | Search term to filter customers

try {
    $result = $apiInstance->customersList($limit, $offset, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customersList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Maximum number of results (1-100) | [optional] [default to 20] |
| **offset** | **int**| Number of results to skip | [optional] [default to 0] |
| **search** | **string**| Search term to filter customers | [optional] |

### Return type

[**\RevKeen\Model\CustomerListResponse**](../Model/CustomerListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customersPaymentMethodsList()`

```php
customersPaymentMethodsList($id): \RevKeen\Model\CustomerPaymentMethodsListResponse
```

Get customer payment methods

Retrieve all payment methods for a customer

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


$apiInstance = new RevKeen\Api\CustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Customer UUID

try {
    $result = $apiInstance->customersPaymentMethodsList($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customersPaymentMethodsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Customer UUID | |

### Return type

[**\RevKeen\Model\CustomerPaymentMethodsListResponse**](../Model/CustomerPaymentMethodsListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customersUpdate()`

```php
customersUpdate($id, $customers_update_request): \RevKeen\Model\CustomerUpdateResponse
```

Update customer details

Update an existing customer's information

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


$apiInstance = new RevKeen\Api\CustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Customer UUID
$customers_update_request = new \RevKeen\Model\CustomersUpdateRequest(); // \RevKeen\Model\CustomersUpdateRequest

try {
    $result = $apiInstance->customersUpdate($id, $customers_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customersUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Customer UUID | |
| **customers_update_request** | [**\RevKeen\Model\CustomersUpdateRequest**](../Model/CustomersUpdateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CustomerUpdateResponse**](../Model/CustomerUpdateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
