# RevKeen\PaymentIntentsApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**paymentIntentsCancel()**](PaymentIntentsApi.md#paymentIntentsCancel) | **POST** /payment-intents/{id}/cancel | Cancel a payment intent |
| [**paymentIntentsCapture()**](PaymentIntentsApi.md#paymentIntentsCapture) | **POST** /payment-intents/{id}/capture | Capture a payment intent |
| [**paymentIntentsConfirm()**](PaymentIntentsApi.md#paymentIntentsConfirm) | **POST** /payment-intents/{id}/confirm | Confirm a payment intent |
| [**paymentIntentsCreate()**](PaymentIntentsApi.md#paymentIntentsCreate) | **POST** /payment-intents | Create a payment intent |
| [**paymentIntentsGet()**](PaymentIntentsApi.md#paymentIntentsGet) | **GET** /payment-intents/{id} | Retrieve a payment intent |
| [**paymentIntentsList()**](PaymentIntentsApi.md#paymentIntentsList) | **GET** /payment-intents | List payment intents |


## `paymentIntentsCancel()`

```php
paymentIntentsCancel($id, $cancel_payment_intent_request): \RevKeen\Model\PaymentIntent
```

Cancel a payment intent

Cancels a payment intent. Cannot cancel if already succeeded or canceled.  ---  **Related endpoints**  - `POST /payment-intents` — Create a payment intent - `GET /payment-intents` — List payment intents - `GET /payment-intents/{id}` — Retrieve a payment intent - `POST /payment-intents/{id}` — Update a payment intent - `POST /payment-intents/{id}/confirm` — Confirm a payment intent - `POST /payment-intents/{id}/capture` — Capture a payment intent  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\PaymentIntentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment intent ID (pi_xxx)
$cancel_payment_intent_request = new \RevKeen\Model\CancelPaymentIntentRequest(); // \RevKeen\Model\CancelPaymentIntentRequest

try {
    $result = $apiInstance->paymentIntentsCancel($id, $cancel_payment_intent_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentIntentsApi->paymentIntentsCancel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment intent ID (pi_xxx) | |
| **cancel_payment_intent_request** | [**\RevKeen\Model\CancelPaymentIntentRequest**](../Model/CancelPaymentIntentRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\PaymentIntent**](../Model/PaymentIntent.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentIntentsCapture()`

```php
paymentIntentsCapture($id, $capture_payment_intent_request): \RevKeen\Model\PaymentIntent
```

Capture a payment intent

Captures a payment intent that was created with capture_method=manual.  ---  **Related endpoints**  - `POST /payment-intents` — Create a payment intent - `GET /payment-intents` — List payment intents - `GET /payment-intents/{id}` — Retrieve a payment intent - `POST /payment-intents/{id}` — Update a payment intent - `POST /payment-intents/{id}/confirm` — Confirm a payment intent - `POST /payment-intents/{id}/cancel` — Cancel a payment intent  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\PaymentIntentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment intent ID (pi_xxx)
$capture_payment_intent_request = new \RevKeen\Model\CapturePaymentIntentRequest(); // \RevKeen\Model\CapturePaymentIntentRequest

try {
    $result = $apiInstance->paymentIntentsCapture($id, $capture_payment_intent_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentIntentsApi->paymentIntentsCapture: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment intent ID (pi_xxx) | |
| **capture_payment_intent_request** | [**\RevKeen\Model\CapturePaymentIntentRequest**](../Model/CapturePaymentIntentRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\PaymentIntent**](../Model/PaymentIntent.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentIntentsConfirm()`

```php
paymentIntentsConfirm($id, $confirm_payment_intent_request): \RevKeen\Model\PaymentIntent
```

Confirm a payment intent

Confirms the payment intent. May return requires_action if 3DS authentication is needed.  ---  **Related endpoints**  - `POST /payment-intents` — Create a payment intent - `GET /payment-intents` — List payment intents - `GET /payment-intents/{id}` — Retrieve a payment intent - `POST /payment-intents/{id}` — Update a payment intent - `POST /payment-intents/{id}/capture` — Capture a payment intent - `POST /payment-intents/{id}/cancel` — Cancel a payment intent  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\PaymentIntentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment intent ID (pi_xxx)
$confirm_payment_intent_request = new \RevKeen\Model\ConfirmPaymentIntentRequest(); // \RevKeen\Model\ConfirmPaymentIntentRequest

try {
    $result = $apiInstance->paymentIntentsConfirm($id, $confirm_payment_intent_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentIntentsApi->paymentIntentsConfirm: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment intent ID (pi_xxx) | |
| **confirm_payment_intent_request** | [**\RevKeen\Model\ConfirmPaymentIntentRequest**](../Model/ConfirmPaymentIntentRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\PaymentIntent**](../Model/PaymentIntent.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentIntentsCreate()`

```php
paymentIntentsCreate($create_payment_intent_request): \RevKeen\Model\PaymentIntent
```

Create a payment intent

Creates a payment intent to orchestrate payment collection with support for 3DS/SCA authentication.  ---  **Related endpoints**  - `GET /payment-intents` — List payment intents - `GET /payment-intents/{id}` — Retrieve a payment intent - `POST /payment-intents/{id}` — Update a payment intent - `POST /payment-intents/{id}/confirm` — Confirm a payment intent - `POST /payment-intents/{id}/capture` — Capture a payment intent - `POST /payment-intents/{id}/cancel` — Cancel a payment intent  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\PaymentIntentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payment_intent_request = new \RevKeen\Model\CreatePaymentIntentRequest(); // \RevKeen\Model\CreatePaymentIntentRequest

try {
    $result = $apiInstance->paymentIntentsCreate($create_payment_intent_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentIntentsApi->paymentIntentsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_payment_intent_request** | [**\RevKeen\Model\CreatePaymentIntentRequest**](../Model/CreatePaymentIntentRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\PaymentIntent**](../Model/PaymentIntent.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentIntentsGet()`

```php
paymentIntentsGet($id): \RevKeen\Model\PaymentIntent
```

Retrieve a payment intent

Retrieves a payment intent by its ID (pi_xxx).  ---  **Related endpoints**  - `POST /payment-intents` — Create a payment intent - `GET /payment-intents` — List payment intents - `POST /payment-intents/{id}` — Update a payment intent - `POST /payment-intents/{id}/confirm` — Confirm a payment intent - `POST /payment-intents/{id}/capture` — Capture a payment intent - `POST /payment-intents/{id}/cancel` — Cancel a payment intent  **Common errors**  - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\PaymentIntentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment intent ID (pi_xxx)

try {
    $result = $apiInstance->paymentIntentsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentIntentsApi->paymentIntentsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment intent ID (pi_xxx) | |

### Return type

[**\RevKeen\Model\PaymentIntent**](../Model/PaymentIntent.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentIntentsList()`

```php
paymentIntentsList($customer, $status, $created_gte, $created_lte, $limit, $starting_after, $ending_before): \RevKeen\Model\PaymentIntentListResponse
```

List payment intents

Returns a list of payment intents with optional filtering.  ---  **Related endpoints**  - `POST /payment-intents` — Create a payment intent - `GET /payment-intents/{id}` — Retrieve a payment intent - `POST /payment-intents/{id}` — Update a payment intent - `POST /payment-intents/{id}/confirm` — Confirm a payment intent - `POST /payment-intents/{id}/capture` — Capture a payment intent - `POST /payment-intents/{id}/cancel` — Cancel a payment intent  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\PaymentIntentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer = 'customer_example'; // string | Filter by customer ID
$status = 'status_example'; // string | Filter by status
$created_gte = 3.4; // float | Filter by created_at >= (Unix timestamp)
$created_lte = 3.4; // float | Filter by created_at <= (Unix timestamp)
$limit = 20; // int | Maximum number of results (1-100)
$starting_after = 'starting_after_example'; // string | Cursor for pagination - return results after this ID (pi_xxx)
$ending_before = 'ending_before_example'; // string | Cursor for pagination - return results before this ID (pi_xxx)

try {
    $result = $apiInstance->paymentIntentsList($customer, $status, $created_gte, $created_lte, $limit, $starting_after, $ending_before);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentIntentsApi->paymentIntentsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer** | **string**| Filter by customer ID | [optional] |
| **status** | **string**| Filter by status | [optional] |
| **created_gte** | **float**| Filter by created_at &gt;&#x3D; (Unix timestamp) | [optional] |
| **created_lte** | **float**| Filter by created_at &lt;&#x3D; (Unix timestamp) | [optional] |
| **limit** | **int**| Maximum number of results (1-100) | [optional] [default to 20] |
| **starting_after** | **string**| Cursor for pagination - return results after this ID (pi_xxx) | [optional] |
| **ending_before** | **string**| Cursor for pagination - return results before this ID (pi_xxx) | [optional] |

### Return type

[**\RevKeen\Model\PaymentIntentListResponse**](../Model/PaymentIntentListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
