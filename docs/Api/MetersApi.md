# RevKeen\MetersApi

Create and manage usage meters. Meters define how usage events are aggregated for billing. Attach prices to meters for automated usage-based invoicing.  **Required Scopes:** - &#x60;prices:read&#x60; - List and retrieve meters and prices - &#x60;prices:write&#x60; - Create, update, archive meters and prices  **MCP Tools:** &#x60;meters_list&#x60;, &#x60;meters_get&#x60;, &#x60;meters_create&#x60;, &#x60;meters_update&#x60;, &#x60;meters_create_price&#x60;, &#x60;meters_list_prices&#x60;, &#x60;meters_update_price&#x60;, &#x60;meters_deactivate_price&#x60;

All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**metersCreate()**](MetersApi.md#metersCreate) | **POST** /meters | Create a meter |
| [**metersGet()**](MetersApi.md#metersGet) | **GET** /meters/{id} | Get a meter |
| [**metersList()**](MetersApi.md#metersList) | **GET** /meters | List meters |
| [**metersQuantities()**](MetersApi.md#metersQuantities) | **GET** /meters/{id}/quantities | Get meter quantities |
| [**metersUpdate()**](MetersApi.md#metersUpdate) | **PATCH** /meters/{id} | Update a meter |


## `metersCreate()`

```php
metersCreate($create_meter_request): \RevKeen\Model\CreateMeterResponse
```

Create a meter

Create a new usage meter. Meters define how usage events are aggregated for billing.  ---  **Related endpoints**  - `GET /meters` — List meters - `GET /meters/{id}/quantities` — Get meter quantities - `GET /meters/{id}` — Get a meter - `PATCH /meters/{id}` — Update a meter - `POST /meters/{meterId}/prices` — Create a meter price - `GET /meters/{meterId}/prices` — List meter prices - `PATCH /meters/{meterId}/prices/{priceId}` — Update a meter price - `POST /meters/{meterId}/prices/{priceId}/deactivate` — Deactivate a meter price  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MetersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_meter_request = new \RevKeen\Model\CreateMeterRequest(); // \RevKeen\Model\CreateMeterRequest

try {
    $result = $apiInstance->metersCreate($create_meter_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetersApi->metersCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_meter_request** | [**\RevKeen\Model\CreateMeterRequest**](../Model/CreateMeterRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CreateMeterResponse**](../Model/CreateMeterResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metersGet()`

```php
metersGet($id): \RevKeen\Model\MeterGetResponse
```

Get a meter

Retrieve a single meter by ID.  ---  **Related endpoints**  - `GET /meters` — List meters - `POST /meters` — Create a meter - `GET /meters/{id}/quantities` — Get meter quantities - `PATCH /meters/{id}` — Update a meter - `POST /meters/{meterId}/prices` — Create a meter price - `GET /meters/{meterId}/prices` — List meter prices - `PATCH /meters/{meterId}/prices/{priceId}` — Update a meter price - `POST /meters/{meterId}/prices/{priceId}/deactivate` — Deactivate a meter price  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MetersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = e3e70682-c209-1cac-a29f-6fbed82c07cd; // string | Meter UUID.

try {
    $result = $apiInstance->metersGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetersApi->metersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Meter UUID. | |

### Return type

[**\RevKeen\Model\MeterGetResponse**](../Model/MeterGetResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metersList()`

```php
metersList($include_archived, $limit, $offset): \RevKeen\Model\MeterListResponse
```

List meters

List all usage meters with optional filtering and pagination.  ---  **Related endpoints**  - `POST /meters` — Create a meter - `GET /meters/{id}/quantities` — Get meter quantities - `GET /meters/{id}` — Get a meter - `PATCH /meters/{id}` — Update a meter - `POST /meters/{meterId}/prices` — Create a meter price - `GET /meters/{meterId}/prices` — List meter prices - `PATCH /meters/{meterId}/prices/{priceId}` — Update a meter price - `POST /meters/{meterId}/prices/{priceId}/deactivate` — Deactivate a meter price  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MetersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$include_archived = false; // string | Include archived meters
$limit = 50; // string | Max results (default 50, max 100)
$offset = 0; // string | Pagination offset

try {
    $result = $apiInstance->metersList($include_archived, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetersApi->metersList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **include_archived** | **string**| Include archived meters | [optional] |
| **limit** | **string**| Max results (default 50, max 100) | [optional] |
| **offset** | **string**| Pagination offset | [optional] |

### Return type

[**\RevKeen\Model\MeterListResponse**](../Model/MeterListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metersQuantities()`

```php
metersQuantities($id, $start_timestamp, $end_timestamp, $interval, $customer_id, $external_customer_id, $subscription_id, $timezone): \RevKeen\Model\MeterQuantitiesResponse
```

Get meter quantities

Get bucketed quantities for a meter over a time period. Timestamps are UTC. Polar-compatible query names (`start_timestamp`, `end_timestamp`, `interval`) are required.  ---  **Related endpoints**  - `GET /meters` — List meters - `POST /meters` — Create a meter - `GET /meters/{id}` — Get a meter - `PATCH /meters/{id}` — Update a meter - `POST /meters/{meterId}/prices` — Create a meter price - `GET /meters/{meterId}/prices` — List meter prices - `PATCH /meters/{meterId}/prices/{priceId}` — Update a meter price - `POST /meters/{meterId}/prices/{priceId}/deactivate` — Deactivate a meter price  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MetersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = e3e70682-c209-1cac-a29f-6fbed82c07cd; // string | Meter UUID.
$start_timestamp = 2026-03-01T00:00:00Z; // \DateTime | Start timestamp (ISO 8601, UTC)
$end_timestamp = 2026-03-08T00:00:00Z; // \DateTime | End timestamp (ISO 8601, UTC)
$interval = day; // string | Bucket width. UTC date_trunc semantics; week is ISO (Monday).
$customer_id = 'customer_id_example'; // string | Filter by customer UUID
$external_customer_id = 'external_customer_id_example'; // string | Filter by the merchant's external customer ID
$subscription_id = 'subscription_id_example'; // string | Filter by subscription UUID
$timezone = UTC; // string | Only UTC is supported. Omit or pass UTC.

try {
    $result = $apiInstance->metersQuantities($id, $start_timestamp, $end_timestamp, $interval, $customer_id, $external_customer_id, $subscription_id, $timezone);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetersApi->metersQuantities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Meter UUID. | |
| **start_timestamp** | **\DateTime**| Start timestamp (ISO 8601, UTC) | |
| **end_timestamp** | **\DateTime**| End timestamp (ISO 8601, UTC) | |
| **interval** | **string**| Bucket width. UTC date_trunc semantics; week is ISO (Monday). | |
| **customer_id** | **string**| Filter by customer UUID | [optional] |
| **external_customer_id** | **string**| Filter by the merchant&#39;s external customer ID | [optional] |
| **subscription_id** | **string**| Filter by subscription UUID | [optional] |
| **timezone** | **string**| Only UTC is supported. Omit or pass UTC. | [optional] |

### Return type

[**\RevKeen\Model\MeterQuantitiesResponse**](../Model/MeterQuantitiesResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metersUpdate()`

```php
metersUpdate($id, $update_meter_request): \RevKeen\Model\UpdateMeterResponse
```

Update a meter

Update a meter's configuration. Note: `event_name` and `aggregation` are immutable after creation.  ---  **Related endpoints**  - `GET /meters` — List meters - `POST /meters` — Create a meter - `GET /meters/{id}/quantities` — Get meter quantities - `GET /meters/{id}` — Get a meter - `POST /meters/{meterId}/prices` — Create a meter price - `GET /meters/{meterId}/prices` — List meter prices - `PATCH /meters/{meterId}/prices/{priceId}` — Update a meter price - `POST /meters/{meterId}/prices/{priceId}/deactivate` — Deactivate a meter price  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MetersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = e3e70682-c209-1cac-a29f-6fbed82c07cd; // string | Meter UUID.
$update_meter_request = new \RevKeen\Model\UpdateMeterRequest(); // \RevKeen\Model\UpdateMeterRequest

try {
    $result = $apiInstance->metersUpdate($id, $update_meter_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetersApi->metersUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Meter UUID. | |
| **update_meter_request** | [**\RevKeen\Model\UpdateMeterRequest**](../Model/UpdateMeterRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\UpdateMeterResponse**](../Model/UpdateMeterResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
