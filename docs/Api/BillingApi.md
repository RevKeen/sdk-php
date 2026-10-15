# RevKeen\BillingApi

Billing utilities let you preview upcoming charges and billing schedules before they execute. Use these endpoints to show customers what they will be charged and when, or to validate pricing changes before applying them.  **Required Scopes:** - &#x60;billing:read&#x60; - Preview billing schedules

All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**billingOverviewGet()**](BillingApi.md#billingOverviewGet) | **GET** /billing/overview | Get merchant billing overview |


## `billingOverviewGet()`

```php
billingOverviewGet(): \RevKeen\Model\BillingOverviewGet200Response
```

Get merchant billing overview

Return overdue invoices, subscriptions in dunning, and high-signal usage invoices for the authenticated merchant. Use this instead of chaining invoices_list + subscriptions_list_in_dunning.  ---  **Related endpoints**  - `POST /billing/preview` — Generate billing schedule preview - `GET /billing/intervals` — Get billing intervals - `GET /billing/anchor-rules` — Get billing anchor rules  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.

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


$apiInstance = new RevKeen\Api\BillingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->billingOverviewGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BillingApi->billingOverviewGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\RevKeen\Model\BillingOverviewGet200Response**](../Model/BillingOverviewGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
