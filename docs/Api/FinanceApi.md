# RevKeen\FinanceApi

Financial summaries and income reports. Get a high-level overview of your business finances including revenue, expenses, and net income.  **Required Scopes:** - &#x60;finance:read&#x60; - Access finance endpoints

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**financeGetIncome()**](FinanceApi.md#financeGetIncome) | **GET** /finance/income | Get income report |
| [**financeGetSummary()**](FinanceApi.md#financeGetSummary) | **GET** /finance/summary | Get finance summary |


## `financeGetIncome()`

```php
financeGetIncome($start_date, $end_date, $group_by, $subscription_id, $status): \RevKeen\Model\FinanceGetIncome200Response
```

Get income report

Get income report for the authenticated merchant. Requires 'finance:read' scope.

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


$apiInstance = new RevKeen\Api\FinanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start_date = 2024-01-01; // string | Start date
$end_date = 2024-12-31; // string | End date
$group_by = 'day'; // string | Group results by time period
$subscription_id = 'subscription_id_example'; // string | Filter by subscription UUID
$status = 'status_example'; // string | Filter by status

try {
    $result = $apiInstance->financeGetIncome($start_date, $end_date, $group_by, $subscription_id, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FinanceApi->financeGetIncome: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start_date** | **string**| Start date | |
| **end_date** | **string**| End date | |
| **group_by** | **string**| Group results by time period | [optional] [default to &#39;day&#39;] |
| **subscription_id** | **string**| Filter by subscription UUID | [optional] |
| **status** | **string**| Filter by status | [optional] |

### Return type

[**\RevKeen\Model\FinanceGetIncome200Response**](../Model/FinanceGetIncome200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `financeGetSummary()`

```php
financeGetSummary(): \RevKeen\Model\FinanceGetSummary200Response
```

Get finance summary

Get finance summary for the authenticated merchant. Requires 'finance:read' scope.

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


$apiInstance = new RevKeen\Api\FinanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->financeGetSummary();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FinanceApi->financeGetSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\RevKeen\Model\FinanceGetSummary200Response**](../Model/FinanceGetSummary200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
