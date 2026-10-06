# RevKeen\UsageEventsApi



All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**usageEventsGet()**](UsageEventsApi.md#usageEventsGet) | **GET** /usage-events/{id} | Get a usage event |
| [**usageEventsIngest()**](UsageEventsApi.md#usageEventsIngest) | **POST** /usage-events | Ingest usage events |
| [**usageEventsList()**](UsageEventsApi.md#usageEventsList) | **GET** /usage-events | Query usage events |


## `usageEventsGet()`

```php
usageEventsGet($id): \RevKeen\Model\UsageEventGetResponse
```

Get a usage event

Retrieve a single usage event by ID. Unknown ids and ids that belong to another merchant both return 404 — the lookup is merchant-scoped under RLS.  ---  **Related endpoints**  - `POST /usage-events` — Ingest usage events - `GET /usage-events` — Query usage events - `POST /usage-events/dry-run` — Dry-run usage events - `GET /usage-events/aggregate/{meterId}` — Get aggregated usage  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\UsageEventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Usage event ID

try {
    $result = $apiInstance->usageEventsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageEventsApi->usageEventsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Usage event ID | |

### Return type

[**\RevKeen\Model\UsageEventGetResponse**](../Model/UsageEventGetResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `usageEventsIngest()`

```php
usageEventsIngest($idempotency_key, $usage_ingest_request): \RevKeen\Model\BatchIngestResult
```

Ingest usage events

Send usage events for billing. Accepts a single event or a batch of up to 1000 events.  **Single event:** Send the event object directly in the request body. **Batch:** Wrap events in an `events` array.  Events are matched to meters by `name` (event name) or `meter_id`. At least one of `customer_id`, `external_customer_id`, or `subscription_id` is required.  **Idempotency:** provide `idempotency_key` per event. The key is unique per merchant forever; repeats return `duplicate` and do not create another billable event.  **Attribution:** prefer `external_customer_id` when your system owns customer identifiers. Unknown external IDs fail fast instead of creating orphan usage.  **Currency:** each subscription has one currency. Usage attributed to that subscription is interpreted in that currency; RevKeen does not perform FX conversion in the metering layer.  ---  **Related endpoints**  - `GET /usage-events` — Query usage events - `POST /usage-events/dry-run` — Dry-run usage events - `GET /usage-events/aggregate/{meterId}` — Get aggregated usage - `GET /usage-events/{id}` — Get a usage event  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\UsageEventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$usage_ingest_request = new \RevKeen\Model\UsageIngestRequest(); // \RevKeen\Model\UsageIngestRequest

try {
    $result = $apiInstance->usageEventsIngest($idempotency_key, $usage_ingest_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageEventsApi->usageEventsIngest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **usage_ingest_request** | [**\RevKeen\Model\UsageIngestRequest**](../Model/UsageIngestRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\BatchIngestResult**](../Model/BatchIngestResult.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `usageEventsList()`

```php
usageEventsList($meter_id, $customer_id, $external_customer_id, $subscription_id, $start_time, $end_time, $limit): \RevKeen\Model\UsageEventListResponse
```

Query usage events

List usage events with optional filters. Returns up to 100 events per request.  ---  **Related endpoints**  - `POST /usage-events` — Ingest usage events - `POST /usage-events/dry-run` — Dry-run usage events - `GET /usage-events/aggregate/{meterId}` — Get aggregated usage - `GET /usage-events/{id}` — Get a usage event  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\UsageEventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$meter_id = 'meter_id_example'; // string | Filter by meter ID
$customer_id = 'customer_id_example'; // string | Filter by customer ID
$external_customer_id = 'external_customer_id_example'; // string | Filter by external customer ID
$subscription_id = 'subscription_id_example'; // string | Filter by subscription ID
$start_time = 2026-03-01T00:00:00Z; // \DateTime | Start of time range (ISO 8601)
$end_time = 2026-03-31T23:59:59Z; // \DateTime | End of time range (ISO 8601)
$limit = 100; // string | Max results (default 100, max 100)

try {
    $result = $apiInstance->usageEventsList($meter_id, $customer_id, $external_customer_id, $subscription_id, $start_time, $end_time, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsageEventsApi->usageEventsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **meter_id** | **string**| Filter by meter ID | [optional] |
| **customer_id** | **string**| Filter by customer ID | [optional] |
| **external_customer_id** | **string**| Filter by external customer ID | [optional] |
| **subscription_id** | **string**| Filter by subscription ID | [optional] |
| **start_time** | **\DateTime**| Start of time range (ISO 8601) | [optional] |
| **end_time** | **\DateTime**| End of time range (ISO 8601) | [optional] |
| **limit** | **string**| Max results (default 100, max 100) | [optional] |

### Return type

[**\RevKeen\Model\UsageEventListResponse**](../Model/UsageEventListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
