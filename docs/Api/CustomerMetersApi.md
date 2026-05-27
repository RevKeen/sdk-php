# RevKeen\CustomerMetersApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**customerMetersGet()**](CustomerMetersApi.md#customerMetersGet) | **GET** /customer-meters/{customer_id}/{meter_id} | Retrieve a customer-meter aggregate |
| [**customerMetersList()**](CustomerMetersApi.md#customerMetersList) | **GET** /customer-meters | List a customer&#39;s meter usage |


## `customerMetersGet()`

```php
customerMetersGet($customer_id, $meter_id): \RevKeen\Model\CustomerMeterResponse
```

Retrieve a customer-meter aggregate

Returns a single customer-meter aggregate for the specified customer + meter pair. Returns 404 only if the meter itself does not exist on the merchant — if the meter exists but the customer has zero events, the response returns an aggregate with `total_quantity: 0`, `event_count: 0`, `last_event_at: null`.  ---  **Related endpoints**  - `GET /customer-meters` — List a customer's meter usage  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\CustomerMetersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 'customer_id_example'; // string | Customer UUID
$meter_id = 'meter_id_example'; // string | Meter UUID

try {
    $result = $apiInstance->customerMetersGet($customer_id, $meter_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerMetersApi->customerMetersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**| Customer UUID | |
| **meter_id** | **string**| Meter UUID | |

### Return type

[**\RevKeen\Model\CustomerMeterResponse**](../Model/CustomerMeterResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `customerMetersList()`

```php
customerMetersList($customer_id, $meter_id): \RevKeen\Model\CustomerMeterList
```

List a customer's meter usage

Returns per-meter aggregates for a single customer. Requires a `customer_id` query parameter. For each meter the merchant has defined, the response includes the aggregate quantity (applying the meter's native aggregation function), the event count, and the most recent event timestamp.  Use this to render a customer's current consumption snapshot in your own UI — for example, a usage dashboard showing \"4,820 / 10,000 requests this period\".  ---  **Related endpoints**  - `GET /customer-meters/{customer_id}/{meter_id}` — Retrieve a customer-meter aggregate  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\CustomerMetersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 'customer_id_example'; // string | Customer UUID. Required — customer-meters are not queryable merchant-wide via this endpoint. Use /v2/meters for merchant-level meter definitions.
$meter_id = 'meter_id_example'; // string | Optional single-meter filter. When provided, the response contains at most one entry.

try {
    $result = $apiInstance->customerMetersList($customer_id, $meter_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerMetersApi->customerMetersList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**| Customer UUID. Required — customer-meters are not queryable merchant-wide via this endpoint. Use /v2/meters for merchant-level meter definitions. | |
| **meter_id** | **string**| Optional single-meter filter. When provided, the response contains at most one entry. | [optional] |

### Return type

[**\RevKeen\Model\CustomerMeterList**](../Model/CustomerMeterList.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
