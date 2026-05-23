# RevKeen\WebhookEndpointsApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**webhookEndpointsCreate()**](WebhookEndpointsApi.md#webhookEndpointsCreate) | **POST** /webhook-endpoints | Create webhook endpoint |
| [**webhookEndpointsDelete()**](WebhookEndpointsApi.md#webhookEndpointsDelete) | **DELETE** /webhook-endpoints/{id} | Delete webhook endpoint |
| [**webhookEndpointsGet()**](WebhookEndpointsApi.md#webhookEndpointsGet) | **GET** /webhook-endpoints/{id} | Get webhook endpoint |
| [**webhookEndpointsList()**](WebhookEndpointsApi.md#webhookEndpointsList) | **GET** /webhook-endpoints | List webhook endpoints |
| [**webhookEndpointsRotateSecret()**](WebhookEndpointsApi.md#webhookEndpointsRotateSecret) | **POST** /webhook-endpoints/{id}/rotate-secret | Rotate signing secret |
| [**webhookEndpointsUpdate()**](WebhookEndpointsApi.md#webhookEndpointsUpdate) | **PATCH** /webhook-endpoints/{id} | Update webhook endpoint |


## `webhookEndpointsCreate()`

```php
webhookEndpointsCreate($webhook_endpoints_create_request): \RevKeen\Model\WebhookEndpointsCreate201Response
```

Create webhook endpoint

Create a webhook endpoint to receive event notifications at the given URL. Returns the endpoint with its signing secret — store the secret securely, it is only shown once.  ---  **Related endpoints**  - `GET /webhook-endpoints` — List webhook endpoints - `GET /webhook-endpoints/{id}` — Get webhook endpoint - `PATCH /webhook-endpoints/{id}` — Update webhook endpoint - `DELETE /webhook-endpoints/{id}` — Delete webhook endpoint - `POST /webhook-endpoints/{id}/rotate-secret` — Rotate signing secret  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\WebhookEndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_endpoints_create_request = new \RevKeen\Model\WebhookEndpointsCreateRequest(); // \RevKeen\Model\WebhookEndpointsCreateRequest

try {
    $result = $apiInstance->webhookEndpointsCreate($webhook_endpoints_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookEndpointsApi->webhookEndpointsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_endpoints_create_request** | [**\RevKeen\Model\WebhookEndpointsCreateRequest**](../Model/WebhookEndpointsCreateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\WebhookEndpointsCreate201Response**](../Model/WebhookEndpointsCreate201Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookEndpointsDelete()`

```php
webhookEndpointsDelete($id): \RevKeen\Model\WebhookEndpointsDelete200Response
```

Delete webhook endpoint

Permanently delete a webhook endpoint and all its event subscriptions.  ---  **Related endpoints**  - `GET /webhook-endpoints` — List webhook endpoints - `POST /webhook-endpoints` — Create webhook endpoint - `GET /webhook-endpoints/{id}` — Get webhook endpoint - `PATCH /webhook-endpoints/{id}` — Update webhook endpoint - `POST /webhook-endpoints/{id}/rotate-secret` — Rotate signing secret  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\WebhookEndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Webhook endpoint ID

try {
    $result = $apiInstance->webhookEndpointsDelete($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookEndpointsApi->webhookEndpointsDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Webhook endpoint ID | |

### Return type

[**\RevKeen\Model\WebhookEndpointsDelete200Response**](../Model/WebhookEndpointsDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookEndpointsGet()`

```php
webhookEndpointsGet($id): \RevKeen\Model\WebhookEndpointsGet200Response
```

Get webhook endpoint

Retrieve a single webhook endpoint by ID, including delivery statistics.  ---  **Related endpoints**  - `GET /webhook-endpoints` — List webhook endpoints - `POST /webhook-endpoints` — Create webhook endpoint - `PATCH /webhook-endpoints/{id}` — Update webhook endpoint - `DELETE /webhook-endpoints/{id}` — Delete webhook endpoint - `POST /webhook-endpoints/{id}/rotate-secret` — Rotate signing secret

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


$apiInstance = new RevKeen\Api\WebhookEndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Webhook endpoint ID

try {
    $result = $apiInstance->webhookEndpointsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookEndpointsApi->webhookEndpointsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Webhook endpoint ID | |

### Return type

[**\RevKeen\Model\WebhookEndpointsGet200Response**](../Model/WebhookEndpointsGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookEndpointsList()`

```php
webhookEndpointsList($status, $limit, $offset): \RevKeen\Model\WebhookEndpointsList200Response
```

List webhook endpoints

List all webhook endpoints for the authenticated merchant. Supports filtering by status and pagination.  ---  **Related endpoints**  - `POST /webhook-endpoints` — Create webhook endpoint - `GET /webhook-endpoints/{id}` — Get webhook endpoint - `PATCH /webhook-endpoints/{id}` — Update webhook endpoint - `DELETE /webhook-endpoints/{id}` — Delete webhook endpoint - `POST /webhook-endpoints/{id}/rotate-secret` — Rotate signing secret  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\WebhookEndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$status = 'status_example'; // string | Filter by endpoint status
$limit = 20; // int | Maximum number of results to return (1-100, default 20)
$offset = 0; // int | Number of results to skip for pagination

try {
    $result = $apiInstance->webhookEndpointsList($status, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookEndpointsApi->webhookEndpointsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **status** | **string**| Filter by endpoint status | [optional] |
| **limit** | **int**| Maximum number of results to return (1-100, default 20) | [optional] [default to 20] |
| **offset** | **int**| Number of results to skip for pagination | [optional] [default to 0] |

### Return type

[**\RevKeen\Model\WebhookEndpointsList200Response**](../Model/WebhookEndpointsList200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookEndpointsRotateSecret()`

```php
webhookEndpointsRotateSecret($id): \RevKeen\Model\WebhookEndpointsCreate201Response
```

Rotate signing secret

Generate a new signing secret for a webhook endpoint. The old secret is immediately invalidated. Store the new secret securely — it is only returned in this response.  ---  **Related endpoints**  - `GET /webhook-endpoints` — List webhook endpoints - `POST /webhook-endpoints` — Create webhook endpoint - `GET /webhook-endpoints/{id}` — Get webhook endpoint - `PATCH /webhook-endpoints/{id}` — Update webhook endpoint - `DELETE /webhook-endpoints/{id}` — Delete webhook endpoint  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\WebhookEndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Webhook endpoint ID

try {
    $result = $apiInstance->webhookEndpointsRotateSecret($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookEndpointsApi->webhookEndpointsRotateSecret: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Webhook endpoint ID | |

### Return type

[**\RevKeen\Model\WebhookEndpointsCreate201Response**](../Model/WebhookEndpointsCreate201Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookEndpointsUpdate()`

```php
webhookEndpointsUpdate($id, $webhook_endpoints_update_request): \RevKeen\Model\WebhookEndpointsGet200Response
```

Update webhook endpoint

Update a webhook endpoint's URL, subscribed events, description, or enabled status.  ---  **Related endpoints**  - `GET /webhook-endpoints` — List webhook endpoints - `POST /webhook-endpoints` — Create webhook endpoint - `GET /webhook-endpoints/{id}` — Get webhook endpoint - `DELETE /webhook-endpoints/{id}` — Delete webhook endpoint - `POST /webhook-endpoints/{id}/rotate-secret` — Rotate signing secret  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\WebhookEndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Webhook endpoint ID
$webhook_endpoints_update_request = new \RevKeen\Model\WebhookEndpointsUpdateRequest(); // \RevKeen\Model\WebhookEndpointsUpdateRequest

try {
    $result = $apiInstance->webhookEndpointsUpdate($id, $webhook_endpoints_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookEndpointsApi->webhookEndpointsUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Webhook endpoint ID | |
| **webhook_endpoints_update_request** | [**\RevKeen\Model\WebhookEndpointsUpdateRequest**](../Model/WebhookEndpointsUpdateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\WebhookEndpointsGet200Response**](../Model/WebhookEndpointsGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
