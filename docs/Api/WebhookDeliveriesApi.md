# RevKeen\WebhookDeliveriesApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**webhookDeliveriesGet()**](WebhookDeliveriesApi.md#webhookDeliveriesGet) | **GET** /webhook-deliveries/{id} | Retrieve a webhook delivery |
| [**webhookDeliveriesList()**](WebhookDeliveriesApi.md#webhookDeliveriesList) | **GET** /webhook-deliveries | List webhook deliveries |
| [**webhookDeliveriesRetry()**](WebhookDeliveriesApi.md#webhookDeliveriesRetry) | **POST** /webhook-deliveries/{id}/retry | Retry a webhook delivery |


## `webhookDeliveriesGet()`

```php
webhookDeliveriesGet($id): \RevKeen\Model\WebhookDeliveryResponse
```

Retrieve a webhook delivery

Retrieve the details of a single webhook delivery including its last attempt outcome.  ---  **Related endpoints**  - `GET /webhook-deliveries` — List webhook deliveries - `POST /webhook-deliveries/{id}/retry` — Retry a webhook delivery  **Common errors**  - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\WebhookDeliveriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Webhook delivery ID

try {
    $result = $apiInstance->webhookDeliveriesGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookDeliveriesApi->webhookDeliveriesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Webhook delivery ID | |

### Return type

[**\RevKeen\Model\WebhookDeliveryResponse**](../Model/WebhookDeliveryResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookDeliveriesList()`

```php
webhookDeliveriesList($endpoint_id, $event_id, $status, $limit, $starting_after, $ending_before): \RevKeen\Model\WebhookDeliveryListResponse
```

List webhook deliveries

List individual webhook delivery attempts across all endpoints for the authenticated merchant. Use filters to scope to a specific endpoint, a specific event, or a specific delivery status. Results are returned in reverse chronological order.  ---  **Related endpoints**  - `GET /webhook-deliveries/{id}` — Retrieve a webhook delivery - `POST /webhook-deliveries/{id}/retry` — Retry a webhook delivery  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\WebhookDeliveriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$endpoint_id = 'endpoint_id_example'; // string | Filter by webhook endpoint ID
$event_id = 'event_id_example'; // string | Filter by source event ID
$status = 'status_example'; // string | Filter by delivery status
$limit = 20; // int
$starting_after = 'starting_after_example'; // string | Cursor — return deliveries created before the row with this ID.
$ending_before = 'ending_before_example'; // string | Cursor — return deliveries created after the row with this ID.

try {
    $result = $apiInstance->webhookDeliveriesList($endpoint_id, $event_id, $status, $limit, $starting_after, $ending_before);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookDeliveriesApi->webhookDeliveriesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **endpoint_id** | **string**| Filter by webhook endpoint ID | [optional] |
| **event_id** | **string**| Filter by source event ID | [optional] |
| **status** | **string**| Filter by delivery status | [optional] |
| **limit** | **int**|  | [optional] [default to 20] |
| **starting_after** | **string**| Cursor — return deliveries created before the row with this ID. | [optional] |
| **ending_before** | **string**| Cursor — return deliveries created after the row with this ID. | [optional] |

### Return type

[**\RevKeen\Model\WebhookDeliveryListResponse**](../Model/WebhookDeliveryListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookDeliveriesRetry()`

```php
webhookDeliveriesRetry($id): \RevKeen\Model\WebhookDeliveryRetryResponse
```

Retry a webhook delivery

Queue an immediate retry of this delivery. The delivery is marked `pending` and `next_retry_at` is set to now; the dispatcher picks it up on its next tick. Calling retry on an already-pending delivery just advances its retry time. Dead-lettered deliveries can be retried once; succeeded deliveries cannot.  ---  **Related endpoints**  - `GET /webhook-deliveries` — List webhook deliveries - `GET /webhook-deliveries/{id}` — Retrieve a webhook delivery  **Common errors**  - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\WebhookDeliveriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Webhook delivery ID

try {
    $result = $apiInstance->webhookDeliveriesRetry($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookDeliveriesApi->webhookDeliveriesRetry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Webhook delivery ID | |

### Return type

[**\RevKeen\Model\WebhookDeliveryRetryResponse**](../Model/WebhookDeliveryRetryResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
