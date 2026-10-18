# RevKeen\CustomersApi

Customer objects represent the individuals or businesses you bill. Use them to store contact information, attach payment methods, and track billing history across subscriptions and one-off payments. Every charge, invoice, and subscription belongs to a customer.  **Required Scopes:** - &#x60;customers:read&#x60; - List and retrieve customers - &#x60;customers:write&#x60; - Create, update, delete customers  **MCP Tools:** &#x60;customers_list&#x60;, &#x60;customers_get&#x60;, &#x60;customers_create&#x60;, &#x60;customers_update&#x60;

All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**customerStateGet()**](CustomersApi.md#customerStateGet) | **GET** /customers/{id}/state | Get customer billing state |
| [**customersCreate()**](CustomersApi.md#customersCreate) | **POST** /customers | Create a new customer |
| [**customersGet()**](CustomersApi.md#customersGet) | **GET** /customers/{id} | Get customer by ID |
| [**customersList()**](CustomersApi.md#customersList) | **GET** /customers | List customers |
| [**customersPaymentMethodsList()**](CustomersApi.md#customersPaymentMethodsList) | **GET** /customers/{id}/payment-methods | Get customer payment methods |
| [**customersPaymentRailsGet()**](CustomersApi.md#customersPaymentRailsGet) | **GET** /customers/{id}/payment-rails | Get customer payment rail availability |
| [**customersPreferredRailsGet()**](CustomersApi.md#customersPreferredRailsGet) | **GET** /customers/{id}/preferred-rails | Get preferred payment rails |
| [**customersUpdate()**](CustomersApi.md#customersUpdate) | **PATCH** /customers/{id} | Update customer details |


## `customerStateGet()`

```php
customerStateGet($id): \RevKeen\Model\CustomerStateGet200Response
```

Get customer billing state

Return the Polar-shaped job snapshot for one customer: identity, active and recent subscriptions, and recent invoices with overdue flags. Use this instead of chaining customers_get + subscriptions_list + invoices_list.  ---  **Related endpoints**  - `GET /customers/{customerId}/invoices` — List customer invoices - `GET /customers/{customerId}/subscriptions` — List customer subscriptions - `GET /customers/{customerId}/orders` — List customer orders - `GET /customers/{customerId}/payments` — List customer payments - `PUT /customers/external/batch` — Batch upsert customers by external ID - `POST /customers` — Create a new customer - `GET /customers` — List customers - `GET /customers/{id}` — Get customer by ID  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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
    $result = $apiInstance->customerStateGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customerStateGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Customer UUID | |

### Return type

[**\RevKeen\Model\CustomerStateGet200Response**](../Model/CustomerStateGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customersCreate()`

```php
customersCreate($idempotency_key, $customers_create_request): \RevKeen\Model\CustomerCreateResponse
```

Create a new customer

Create a new customer record in the merchant's account  ---  **Related endpoints**  - `GET /customers/{id}/state` — Get customer billing state - `GET /customers/{customerId}/invoices` — List customer invoices - `GET /customers/{customerId}/subscriptions` — List customer subscriptions - `GET /customers/{customerId}/orders` — List customer orders - `GET /customers/{customerId}/payments` — List customer payments - `PUT /customers/external/batch` — Batch upsert customers by external ID - `GET /customers` — List customers - `GET /customers/{id}` — Get customer by ID  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$customers_create_request = new \RevKeen\Model\CustomersCreateRequest(); // \RevKeen\Model\CustomersCreateRequest

try {
    $result = $apiInstance->customersCreate($idempotency_key, $customers_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customersCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
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

Retrieve detailed information about a specific customer  ---  **Related endpoints**  - `GET /customers/{id}/state` — Get customer billing state - `GET /customers/{customerId}/invoices` — List customer invoices - `GET /customers/{customerId}/subscriptions` — List customer subscriptions - `GET /customers/{customerId}/orders` — List customer orders - `GET /customers/{customerId}/payments` — List customer payments - `PUT /customers/external/batch` — Batch upsert customers by external ID - `POST /customers` — Create a new customer - `GET /customers` — List customers  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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
customersList($limit, $offset, $search, $external_id): \RevKeen\Model\CustomerListResponse
```

List customers

Retrieve a paginated list of customers for the merchant  ---  **Related endpoints**  - `GET /customers/{id}/state` — Get customer billing state - `GET /customers/{customerId}/invoices` — List customer invoices - `GET /customers/{customerId}/subscriptions` — List customer subscriptions - `GET /customers/{customerId}/orders` — List customer orders - `GET /customers/{customerId}/payments` — List customer payments - `PUT /customers/external/batch` — Batch upsert customers by external ID - `POST /customers` — Create a new customer - `GET /customers/{id}` — Get customer by ID  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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
$search = 'search_example'; // string | Search term to filter customers by name or email. Matched as a literal substring, case-insensitively.
$external_id = 'external_id_example'; // string | Return the customers whose external_id equals this value. Usually that is one customer; it is more than one only when a customer synced from an integration carries the same value.

try {
    $result = $apiInstance->customersList($limit, $offset, $search, $external_id);
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
| **search** | **string**| Search term to filter customers by name or email. Matched as a literal substring, case-insensitively. | [optional] |
| **external_id** | **string**| Return the customers whose external_id equals this value. Usually that is one customer; it is more than one only when a customer synced from an integration carries the same value. | [optional] |

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

Retrieve all payment methods for a customer  ---  **Related endpoints**  - `GET /customers/{id}/state` — Get customer billing state - `GET /customers/{customerId}/invoices` — List customer invoices - `GET /customers/{customerId}/subscriptions` — List customer subscriptions - `GET /customers/{customerId}/orders` — List customer orders - `GET /customers/{customerId}/payments` — List customer payments - `PUT /customers/external/batch` — Batch upsert customers by external ID - `POST /customers` — Create a new customer - `GET /customers` — List customers  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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

## `customersPaymentRailsGet()`

```php
customersPaymentRailsGet($id, $invoice_id): \RevKeen\Model\CustomersPaymentRailsGet200Response
```

Get customer payment rail availability

Return per-rail availability for a customer, including mandate state and last successful rail usage.  ---  **Related endpoints**  - `GET /customers/{id}/state` — Get customer billing state - `GET /customers/{customerId}/invoices` — List customer invoices - `GET /customers/{customerId}/subscriptions` — List customer subscriptions - `GET /customers/{customerId}/orders` — List customer orders - `GET /customers/{customerId}/payments` — List customer payments - `PUT /customers/external/batch` — Batch upsert customers by external ID - `POST /customers` — Create a new customer - `GET /customers` — List customers  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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
$invoice_id = 'invoice_id_example'; // string | Optional invoice context used to apply invoice-level rail restrictions.

try {
    $result = $apiInstance->customersPaymentRailsGet($id, $invoice_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customersPaymentRailsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Customer UUID | |
| **invoice_id** | **string**| Optional invoice context used to apply invoice-level rail restrictions. | [optional] |

### Return type

[**\RevKeen\Model\CustomersPaymentRailsGet200Response**](../Model/CustomersPaymentRailsGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customersPreferredRailsGet()`

```php
customersPreferredRailsGet($id, $invoice_id, $amount, $amount_minor): \RevKeen\Model\CustomersPreferredRailsGet200Response
```

Get preferred payment rails

Return smart-pick rail recommendations with customer history, mandate state, and margin-aware reasoning.  ---  **Related endpoints**  - `GET /customers/{id}/state` — Get customer billing state - `GET /customers/{customerId}/invoices` — List customer invoices - `GET /customers/{customerId}/subscriptions` — List customer subscriptions - `GET /customers/{customerId}/orders` — List customer orders - `GET /customers/{customerId}/payments` — List customer payments - `PUT /customers/external/batch` — Batch upsert customers by external ID - `POST /customers` — Create a new customer - `GET /customers` — List customers  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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
$invoice_id = 'invoice_id_example'; // string | Optional invoice context used to apply invoice-level rail restrictions and amount.
$amount = new \RevKeen\Model\MoneyMinor(); // MoneyMinor | Optional amount in minor units. Use amount_minor for the explicit alias.
$amount_minor = new \RevKeen\Model\MoneyMinor(); // MoneyMinor | Optional amount in minor units. Overrides invoice total for margin-aware ranking.

try {
    $result = $apiInstance->customersPreferredRailsGet($id, $invoice_id, $amount, $amount_minor);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customersPreferredRailsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Customer UUID | |
| **invoice_id** | **string**| Optional invoice context used to apply invoice-level rail restrictions and amount. | [optional] |
| **amount** | **MoneyMinor**| Optional amount in minor units. Use amount_minor for the explicit alias. | [optional] |
| **amount_minor** | **MoneyMinor**| Optional amount in minor units. Overrides invoice total for margin-aware ranking. | [optional] |

### Return type

[**\RevKeen\Model\CustomersPreferredRailsGet200Response**](../Model/CustomersPreferredRailsGet200Response.md)

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
customersUpdate($id, $idempotency_key, $customers_update_request): \RevKeen\Model\CustomerUpdateResponse
```

Update customer details

Update an existing customer's information  ---  **Related endpoints**  - `GET /customers/{id}/state` — Get customer billing state - `GET /customers/{customerId}/invoices` — List customer invoices - `GET /customers/{customerId}/subscriptions` — List customer subscriptions - `GET /customers/{customerId}/orders` — List customer orders - `GET /customers/{customerId}/payments` — List customer payments - `PUT /customers/external/batch` — Batch upsert customers by external ID - `POST /customers` — Create a new customer - `GET /customers` — List customers  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$customers_update_request = new \RevKeen\Model\CustomersUpdateRequest(); // \RevKeen\Model\CustomersUpdateRequest

try {
    $result = $apiInstance->customersUpdate($id, $idempotency_key, $customers_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customersUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Customer UUID | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
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
