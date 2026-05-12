# RevKeen\CustomerPortalApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**customerPortalCustomerGet()**](CustomerPortalApi.md#customerPortalCustomerGet) | **GET** /customer-portal/customer | Retrieve the authenticated customer |
| [**customerPortalInvoicesGet()**](CustomerPortalApi.md#customerPortalInvoicesGet) | **GET** /customer-portal/invoices/{id} | Retrieve an invoice |
| [**customerPortalInvoicesList()**](CustomerPortalApi.md#customerPortalInvoicesList) | **GET** /customer-portal/invoices | List the authenticated customer&#39;s invoices |
| [**customerPortalSessionsCreate()**](CustomerPortalApi.md#customerPortalSessionsCreate) | **POST** /customer-portal/sessions | Create a customer-portal session |
| [**customerPortalSubscriptionsCancel()**](CustomerPortalApi.md#customerPortalSubscriptionsCancel) | **POST** /customer-portal/subscriptions/{id}/cancel | Cancel a subscription |
| [**customerPortalSubscriptionsGet()**](CustomerPortalApi.md#customerPortalSubscriptionsGet) | **GET** /customer-portal/subscriptions/{id} | Retrieve a subscription |
| [**customerPortalSubscriptionsList()**](CustomerPortalApi.md#customerPortalSubscriptionsList) | **GET** /customer-portal/subscriptions | List the authenticated customer&#39;s subscriptions |


## `customerPortalCustomerGet()`

```php
customerPortalCustomerGet(): \RevKeen\Model\PortalCustomerResponse
```

Retrieve the authenticated customer

Returns the customer represented by the bearer token. Useful as a warm-up / identity check when an embedded portal page loads.  ---  **Related endpoints**  - `POST /customer-portal/sessions` — Create a customer-portal session - `GET /customer-portal/subscriptions` — List the authenticated customer's subscriptions - `GET /customer-portal/subscriptions/{id}` — Retrieve a subscription - `POST /customer-portal/subscriptions/{id}/cancel` — Cancel a subscription - `GET /customer-portal/invoices` — List the authenticated customer's invoices - `GET /customer-portal/invoices/{id}` — Retrieve an invoice  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\CustomerPortalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->customerPortalCustomerGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerPortalApi->customerPortalCustomerGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\RevKeen\Model\PortalCustomerResponse**](../Model/PortalCustomerResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customerPortalInvoicesGet()`

```php
customerPortalInvoicesGet($id): \RevKeen\Model\PortalInvoiceResponse
```

Retrieve an invoice

Returns an invoice owned by the authenticated customer.  ---  **Related endpoints**  - `POST /customer-portal/sessions` — Create a customer-portal session - `GET /customer-portal/customer` — Retrieve the authenticated customer - `GET /customer-portal/subscriptions` — List the authenticated customer's subscriptions - `GET /customer-portal/subscriptions/{id}` — Retrieve a subscription - `POST /customer-portal/subscriptions/{id}/cancel` — Cancel a subscription - `GET /customer-portal/invoices` — List the authenticated customer's invoices  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\CustomerPortalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->customerPortalInvoicesGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerPortalApi->customerPortalInvoicesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\PortalInvoiceResponse**](../Model/PortalInvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customerPortalInvoicesList()`

```php
customerPortalInvoicesList($limit, $starting_after, $ending_before): \RevKeen\Model\PortalInvoiceList
```

List the authenticated customer's invoices

Returns invoices owned by the authenticated customer, reverse-chronological by `invoice_date`. Use the same `starting_after`/`ending_before` cursor pattern as subscriptions.  ---  **Related endpoints**  - `POST /customer-portal/sessions` — Create a customer-portal session - `GET /customer-portal/customer` — Retrieve the authenticated customer - `GET /customer-portal/subscriptions` — List the authenticated customer's subscriptions - `GET /customer-portal/subscriptions/{id}` — Retrieve a subscription - `POST /customer-portal/subscriptions/{id}/cancel` — Cancel a subscription - `GET /customer-portal/invoices/{id}` — Retrieve an invoice  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\CustomerPortalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 20; // int
$starting_after = 'starting_after_example'; // string
$ending_before = 'ending_before_example'; // string

try {
    $result = $apiInstance->customerPortalInvoicesList($limit, $starting_after, $ending_before);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerPortalApi->customerPortalInvoicesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**|  | [optional] [default to 20] |
| **starting_after** | **string**|  | [optional] |
| **ending_before** | **string**|  | [optional] |

### Return type

[**\RevKeen\Model\PortalInvoiceList**](../Model/PortalInvoiceList.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customerPortalSessionsCreate()`

```php
customerPortalSessionsCreate($create_customer_portal_session_request): \RevKeen\Model\CustomerPortalSessionCreateResponse
```

Create a customer-portal session

Mint a short-lived bearer token that authenticates a specific customer against /v2/customer-portal/_*. Returns an opaque `rkcps_...` token that expires in 60 minutes by default. Call this server-side from the merchant's backend, then hand the token to the customer's browser or embedded client. Treat the token like a password — never log it and never expose it to untrusted code.  ---  **Related endpoints**  - `GET /customer-portal/customer` — Retrieve the authenticated customer - `GET /customer-portal/subscriptions` — List the authenticated customer's subscriptions - `GET /customer-portal/subscriptions/{id}` — Retrieve a subscription - `POST /customer-portal/subscriptions/{id}/cancel` — Cancel a subscription - `GET /customer-portal/invoices` — List the authenticated customer's invoices - `GET /customer-portal/invoices/{id}` — Retrieve an invoice  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CustomerPortalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_customer_portal_session_request = new \RevKeen\Model\CreateCustomerPortalSessionRequest(); // \RevKeen\Model\CreateCustomerPortalSessionRequest

try {
    $result = $apiInstance->customerPortalSessionsCreate($create_customer_portal_session_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerPortalApi->customerPortalSessionsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_customer_portal_session_request** | [**\RevKeen\Model\CreateCustomerPortalSessionRequest**](../Model/CreateCustomerPortalSessionRequest.md)|  | |

### Return type

[**\RevKeen\Model\CustomerPortalSessionCreateResponse**](../Model/CustomerPortalSessionCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customerPortalSubscriptionsCancel()`

```php
customerPortalSubscriptionsCancel($id, $cancel_subscription_request): \RevKeen\Model\PortalSubscriptionCancelResponse
```

Cancel a subscription

Cancel a subscription owned by the authenticated customer. By default the subscription is scheduled to cancel at the end of the current billing period — set `cancel_at_period_end=false` to cancel immediately. Idempotent — cancelling an already-canceled subscription is a no-op that returns the current state.  ---  **Related endpoints**  - `POST /customer-portal/sessions` — Create a customer-portal session - `GET /customer-portal/customer` — Retrieve the authenticated customer - `GET /customer-portal/subscriptions` — List the authenticated customer's subscriptions - `GET /customer-portal/subscriptions/{id}` — Retrieve a subscription - `GET /customer-portal/invoices` — List the authenticated customer's invoices - `GET /customer-portal/invoices/{id}` — Retrieve an invoice  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CustomerPortalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$cancel_subscription_request = new \RevKeen\Model\CancelSubscriptionRequest(); // \RevKeen\Model\CancelSubscriptionRequest

try {
    $result = $apiInstance->customerPortalSubscriptionsCancel($id, $cancel_subscription_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerPortalApi->customerPortalSubscriptionsCancel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **cancel_subscription_request** | [**\RevKeen\Model\CancelSubscriptionRequest**](../Model/CancelSubscriptionRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\PortalSubscriptionCancelResponse**](../Model/PortalSubscriptionCancelResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customerPortalSubscriptionsGet()`

```php
customerPortalSubscriptionsGet($id): \RevKeen\Model\PortalSubscriptionResponse
```

Retrieve a subscription

Returns a subscription owned by the authenticated customer. 404s on cross-customer access even if the subscription exists.  ---  **Related endpoints**  - `POST /customer-portal/sessions` — Create a customer-portal session - `GET /customer-portal/customer` — Retrieve the authenticated customer - `GET /customer-portal/subscriptions` — List the authenticated customer's subscriptions - `POST /customer-portal/subscriptions/{id}/cancel` — Cancel a subscription - `GET /customer-portal/invoices` — List the authenticated customer's invoices - `GET /customer-portal/invoices/{id}` — Retrieve an invoice  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\CustomerPortalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->customerPortalSubscriptionsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerPortalApi->customerPortalSubscriptionsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\PortalSubscriptionResponse**](../Model/PortalSubscriptionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customerPortalSubscriptionsList()`

```php
customerPortalSubscriptionsList($limit, $starting_after, $ending_before): \RevKeen\Model\PortalSubscriptionList
```

List the authenticated customer's subscriptions

Returns subscriptions where the customer is the subscriber. Results are reverse-chronological by creation time and paginate via `starting_after` / `ending_before` cursors.  ---  **Related endpoints**  - `POST /customer-portal/sessions` — Create a customer-portal session - `GET /customer-portal/customer` — Retrieve the authenticated customer - `GET /customer-portal/subscriptions/{id}` — Retrieve a subscription - `POST /customer-portal/subscriptions/{id}/cancel` — Cancel a subscription - `GET /customer-portal/invoices` — List the authenticated customer's invoices - `GET /customer-portal/invoices/{id}` — Retrieve an invoice  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\CustomerPortalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 20; // int
$starting_after = 'starting_after_example'; // string
$ending_before = 'ending_before_example'; // string

try {
    $result = $apiInstance->customerPortalSubscriptionsList($limit, $starting_after, $ending_before);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerPortalApi->customerPortalSubscriptionsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**|  | [optional] [default to 20] |
| **starting_after** | **string**|  | [optional] |
| **ending_before** | **string**|  | [optional] |

### Return type

[**\RevKeen\Model\PortalSubscriptionList**](../Model/PortalSubscriptionList.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
