# RevKeen\RefundsApi

Refund objects represent money returned to a customer after a completed payment. You can issue full or partial refunds, and they automatically create a child transaction linked to the original payment for audit trail purposes.  **Required Scopes:** - &#x60;refunds:read&#x60; - List and retrieve refunds - &#x60;refunds:write&#x60; - Create refunds  **MCP Tools:** &#x60;refunds_create&#x60;

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**refundsCreate()**](RefundsApi.md#refundsCreate) | **POST** /refunds | Create a refund |
| [**refundsGet()**](RefundsApi.md#refundsGet) | **GET** /refunds/{id} | Get refund by ID |
| [**refundsList()**](RefundsApi.md#refundsList) | **GET** /refunds | List refunds |


## `refundsCreate()`

```php
refundsCreate($create_refund_input): \RevKeen\Model\RefundCreateResponse
```

Create a refund

Initiate a refund for a payment. The refund will be processed through the original payment gateway.

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


$apiInstance = new RevKeen\Api\RefundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_refund_input = new \RevKeen\Model\CreateRefundInput(); // \RevKeen\Model\CreateRefundInput

try {
    $result = $apiInstance->refundsCreate($create_refund_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RefundsApi->refundsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_refund_input** | [**\RevKeen\Model\CreateRefundInput**](../Model/CreateRefundInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\RefundCreateResponse**](../Model/RefundCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `refundsGet()`

```php
refundsGet($id): \RevKeen\Model\RefundRetrieveResponse
```

Get refund by ID

Retrieve a single refund by its public ID (ref_xxx) or internal UUID.

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


$apiInstance = new RevKeen\Api\RefundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Refund public ID (ref_xxx) or UUID

try {
    $result = $apiInstance->refundsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RefundsApi->refundsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Refund public ID (ref_xxx) or UUID | |

### Return type

[**\RevKeen\Model\RefundRetrieveResponse**](../Model/RefundRetrieveResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `refundsList()`

```php
refundsList($status, $payment_id, $gateway, $reason, $created_after, $created_before, $limit, $offset): \RevKeen\Model\RefundListResponse
```

List refunds

Retrieve a paginated list of refunds with optional filters. Results are ordered by creation date (newest first).

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


$apiInstance = new RevKeen\Api\RefundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$status = 'status_example'; // string | Filter by refund status
$payment_id = 'payment_id_example'; // string | Filter by original payment ID
$gateway = 'gateway_example'; // string | Filter by payment gateway (nmi, stripe, etc.)
$reason = 'reason_example'; // string | Filter by refund reason
$created_after = 2024-01-01T00:00:00Z; // string | ISO 8601 date - only refunds created after this date
$created_before = 2024-12-31T23:59:59Z; // string | ISO 8601 date - only refunds created before this date
$limit = 20; // float | Number of results to return (1-100)
$offset = 0; // float | Number of results to skip

try {
    $result = $apiInstance->refundsList($status, $payment_id, $gateway, $reason, $created_after, $created_before, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RefundsApi->refundsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **status** | **string**| Filter by refund status | [optional] |
| **payment_id** | **string**| Filter by original payment ID | [optional] |
| **gateway** | **string**| Filter by payment gateway (nmi, stripe, etc.) | [optional] |
| **reason** | **string**| Filter by refund reason | [optional] |
| **created_after** | **string**| ISO 8601 date - only refunds created after this date | [optional] |
| **created_before** | **string**| ISO 8601 date - only refunds created before this date | [optional] |
| **limit** | **float**| Number of results to return (1-100) | [optional] [default to 20] |
| **offset** | **float**| Number of results to skip | [optional] [default to 0] |

### Return type

[**\RevKeen\Model\RefundListResponse**](../Model/RefundListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
