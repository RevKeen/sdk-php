# RevKeen\AnalyticsApi

Revenue analytics including MRR summaries, time-series data, accounts receivable aging, days sales outstanding (DSO), and customer lifetime value (LTV). Use these endpoints to build dashboards and financial reports.  **Required Scopes:** - &#x60;analytics:read&#x60; - Access analytics endpoints

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**analyticsCollectionsGetDso()**](AnalyticsApi.md#analyticsCollectionsGetDso) | **GET** /analytics/collections/dso | Days Sales Outstanding |
| [**analyticsCustomersGetLtv()**](AnalyticsApi.md#analyticsCustomersGetLtv) | **GET** /analytics/customers/ltv | Customer LTV |
| [**analyticsInvoicesGetArAging()**](AnalyticsApi.md#analyticsInvoicesGetArAging) | **GET** /analytics/invoices/ar-aging | A/R Aging Report |
| [**analyticsRevenueGetMrrSummary()**](AnalyticsApi.md#analyticsRevenueGetMrrSummary) | **GET** /analytics/revenue/mrr-summary | MRR Summary |
| [**analyticsRevenueGetTimeSeries()**](AnalyticsApi.md#analyticsRevenueGetTimeSeries) | **GET** /analytics/revenue/time-series | Revenue Time Series |


## `analyticsCollectionsGetDso()`

```php
analyticsCollectionsGetDso($start_date, $end_date): \RevKeen\Model\AnalyticsCollectionsGetDso200Response
```

Days Sales Outstanding

Calculate DSO and collection health metrics

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


$apiInstance = new RevKeen\Api\AnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start_date = 2024-01-01T00:00:00Z; // \DateTime | Start date (ISO 8601)
$end_date = 2024-12-31T23:59:59Z; // \DateTime | End date (ISO 8601)

try {
    $result = $apiInstance->analyticsCollectionsGetDso($start_date, $end_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->analyticsCollectionsGetDso: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start_date** | **\DateTime**| Start date (ISO 8601) | [optional] |
| **end_date** | **\DateTime**| End date (ISO 8601) | [optional] |

### Return type

[**\RevKeen\Model\AnalyticsCollectionsGetDso200Response**](../Model/AnalyticsCollectionsGetDso200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `analyticsCustomersGetLtv()`

```php
analyticsCustomersGetLtv($top_n): \RevKeen\Model\AnalyticsCustomersGetLtv200Response
```

Customer LTV

Calculate customer lifetime value metrics

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


$apiInstance = new RevKeen\Api\AnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$top_n = 10; // float | Number of top customers to return (1-100)

try {
    $result = $apiInstance->analyticsCustomersGetLtv($top_n);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->analyticsCustomersGetLtv: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **top_n** | **float**| Number of top customers to return (1-100) | [optional] [default to 10] |

### Return type

[**\RevKeen\Model\AnalyticsCustomersGetLtv200Response**](../Model/AnalyticsCustomersGetLtv200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `analyticsInvoicesGetArAging()`

```php
analyticsInvoicesGetArAging($as_of_date): \RevKeen\Model\AnalyticsInvoicesGetArAging200Response
```

A/R Aging Report

Returns Accounts Receivable aging buckets with invoice counts and amounts

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


$apiInstance = new RevKeen\Api\AnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$as_of_date = 2024-01-31T23:59:59Z; // \DateTime | Calculate aging as of this date (ISO 8601)

try {
    $result = $apiInstance->analyticsInvoicesGetArAging($as_of_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->analyticsInvoicesGetArAging: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **as_of_date** | **\DateTime**| Calculate aging as of this date (ISO 8601) | [optional] |

### Return type

[**\RevKeen\Model\AnalyticsInvoicesGetArAging200Response**](../Model/AnalyticsInvoicesGetArAging200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `analyticsRevenueGetMrrSummary()`

```php
analyticsRevenueGetMrrSummary($as_of_date): \RevKeen\Model\AnalyticsRevenueGetMrrSummary200Response
```

MRR Summary

Get Monthly Recurring Revenue metrics and growth

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


$apiInstance = new RevKeen\Api\AnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$as_of_date = 2024-01-31T23:59:59Z; // \DateTime | Calculate MRR as of this date (ISO 8601)

try {
    $result = $apiInstance->analyticsRevenueGetMrrSummary($as_of_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->analyticsRevenueGetMrrSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **as_of_date** | **\DateTime**| Calculate MRR as of this date (ISO 8601) | [optional] |

### Return type

[**\RevKeen\Model\AnalyticsRevenueGetMrrSummary200Response**](../Model/AnalyticsRevenueGetMrrSummary200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `analyticsRevenueGetTimeSeries()`

```php
analyticsRevenueGetTimeSeries($start_date, $end_date, $granularity): \RevKeen\Model\AnalyticsRevenueGetTimeSeries200Response
```

Revenue Time Series

Get revenue data over time with configurable granularity

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


$apiInstance = new RevKeen\Api\AnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start_date = 2024-01-01T00:00:00Z; // \DateTime | Start date (ISO 8601)
$end_date = 2024-12-31T23:59:59Z; // \DateTime | End date (ISO 8601)
$granularity = 'month'; // string | Time granularity for data points

try {
    $result = $apiInstance->analyticsRevenueGetTimeSeries($start_date, $end_date, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->analyticsRevenueGetTimeSeries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start_date** | **\DateTime**| Start date (ISO 8601) | |
| **end_date** | **\DateTime**| End date (ISO 8601) | |
| **granularity** | **string**| Time granularity for data points | [optional] [default to &#39;month&#39;] |

### Return type

[**\RevKeen\Model\AnalyticsRevenueGetTimeSeries200Response**](../Model/AnalyticsRevenueGetTimeSeries200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
