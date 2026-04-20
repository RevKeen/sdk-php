# RevKeen\WebhookEndpointsApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**webhookEndpointsCreate()**](WebhookEndpointsApi.md#webhookEndpointsCreate) | **POST** /webhook-endpoints |  |
| [**webhookEndpointsDelete()**](WebhookEndpointsApi.md#webhookEndpointsDelete) | **DELETE** /webhook-endpoints/{id} |  |
| [**webhookEndpointsGet()**](WebhookEndpointsApi.md#webhookEndpointsGet) | **GET** /webhook-endpoints/{id} |  |
| [**webhookEndpointsList()**](WebhookEndpointsApi.md#webhookEndpointsList) | **GET** /webhook-endpoints |  |
| [**webhookEndpointsRotateSecret()**](WebhookEndpointsApi.md#webhookEndpointsRotateSecret) | **POST** /webhook-endpoints/{id}/rotate-secret |  |
| [**webhookEndpointsUpdate()**](WebhookEndpointsApi.md#webhookEndpointsUpdate) | **PATCH** /webhook-endpoints/{id} |  |


## `webhookEndpointsCreate()`

```php
webhookEndpointsCreate($webhook_endpoints_create_request): \RevKeen\Model\WebhookEndpointsCreate201Response
```



---  **Related endpoints**  - `GET /webhook-endpoints` — webhook endpoints list - `GET /webhook-endpoints/{id}` — webhook endpoints get - `PATCH /webhook-endpoints/{id}` — webhook endpoints update - `DELETE /webhook-endpoints/{id}` — webhook endpoints delete - `POST /webhook-endpoints/{id}/rotate-secret` — webhook endpoints rotate secret  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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



---  **Related endpoints**  - `GET /webhook-endpoints` — webhook endpoints list - `POST /webhook-endpoints` — webhook endpoints create - `GET /webhook-endpoints/{id}` — webhook endpoints get - `PATCH /webhook-endpoints/{id}` — webhook endpoints update - `POST /webhook-endpoints/{id}/rotate-secret` — webhook endpoints rotate secret  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$id = 'id_example'; // string

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
| **id** | **string**|  | |

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



---  **Related endpoints**  - `GET /webhook-endpoints` — webhook endpoints list - `POST /webhook-endpoints` — webhook endpoints create - `PATCH /webhook-endpoints/{id}` — webhook endpoints update - `DELETE /webhook-endpoints/{id}` — webhook endpoints delete - `POST /webhook-endpoints/{id}/rotate-secret` — webhook endpoints rotate secret

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
$id = 'id_example'; // string

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
| **id** | **string**|  | |

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



---  **Related endpoints**  - `POST /webhook-endpoints` — webhook endpoints create - `GET /webhook-endpoints/{id}` — webhook endpoints get - `PATCH /webhook-endpoints/{id}` — webhook endpoints update - `DELETE /webhook-endpoints/{id}` — webhook endpoints delete - `POST /webhook-endpoints/{id}/rotate-secret` — webhook endpoints rotate secret  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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
$status = 'status_example'; // string
$limit = 20; // int
$offset = 0; // int

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
| **status** | **string**|  | [optional] |
| **limit** | **int**|  | [optional] [default to 20] |
| **offset** | **int**|  | [optional] [default to 0] |

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



---  **Related endpoints**  - `GET /webhook-endpoints` — webhook endpoints list - `POST /webhook-endpoints` — webhook endpoints create - `GET /webhook-endpoints/{id}` — webhook endpoints get - `PATCH /webhook-endpoints/{id}` — webhook endpoints update - `DELETE /webhook-endpoints/{id}` — webhook endpoints delete  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$id = 'id_example'; // string

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
| **id** | **string**|  | |

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



---  **Related endpoints**  - `GET /webhook-endpoints` — webhook endpoints list - `POST /webhook-endpoints` — webhook endpoints create - `GET /webhook-endpoints/{id}` — webhook endpoints get - `DELETE /webhook-endpoints/{id}` — webhook endpoints delete - `POST /webhook-endpoints/{id}/rotate-secret` — webhook endpoints rotate secret  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$id = 'id_example'; // string
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
| **id** | **string**|  | |
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
