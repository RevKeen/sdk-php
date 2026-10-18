# RevKeen\UsageApi

Query current-period usage balance with estimated costs per meter. Includes included allowance, overage, and margin data.  **Required Scopes:** - &#x60;usage:read&#x60; - Get usage balance  **MCP Tools:** &#x60;usage_balance_get&#x60;

All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**usageBalanceGet()**](UsageApi.md#usageBalanceGet) | **GET** /usage/balance | Get current usage balance |


## `usageBalanceGet()`

```php
usageBalanceGet($subscription_id, $customer_id, $external_customer_id, $meter_id): \RevKeen\Model\UsageBalanceResponse
```

Get current usage balance

Returns the current usage balance for a customer or subscription in the active billing period. Shows per-meter breakdown with included allowance, overage, estimated charges, and margin data. A subscription has one currency; metered usage attributed to the subscription is assumed to be in that same currency. RevKeen does not perform FX conversion in the metering layer.  **Required:** at least one of `subscription_id`, `customer_id` or `external_customer_id`. Each is optional on its own, but a request with none of them is rejected with `400` and `error.type` `invalid_request_error`. `meter_id` narrows the result and does not identify a customer by itself.  ---  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\UsageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscription_id = 'subscription_id_example'; // string | Filter to a specific subscription
$customer_id = 'customer_id_example'; // string | Filter to a specific customer by RevKeen ID
$external_customer_id = usr_123; // string | Filter to a customer by your external identifier
$meter_id = 'meter_id_example'; // string | Filter to a single meter

try {
    $result = $apiInstance->usageBalanceGet($subscription_id, $customer_id, $external_customer_id, $meter_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageApi->usageBalanceGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **subscription_id** | **string**| Filter to a specific subscription | [optional] |
| **customer_id** | **string**| Filter to a specific customer by RevKeen ID | [optional] |
| **external_customer_id** | **string**| Filter to a customer by your external identifier | [optional] |
| **meter_id** | **string**| Filter to a single meter | [optional] |

### Return type

[**\RevKeen\Model\UsageBalanceResponse**](../Model/UsageBalanceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
