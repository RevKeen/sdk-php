# RevKeen\MandatesApi

Direct Debit (Bacs) mandate lifecycle. Create and manage Bacs Direct Debit mandates, including AUDDIS submission, suspension, reinstatement, and cancellation.  **Required Scopes:** - &#x60;mandates:read&#x60; - List and retrieve mandates - &#x60;mandates:write&#x60; - Create, suspend, reinstate, cancel mandates

All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**mandatesCancel()**](MandatesApi.md#mandatesCancel) | **POST** /mandates/{id}/cancel | Cancel a Direct Debit mandate |
| [**mandatesCreate()**](MandatesApi.md#mandatesCreate) | **POST** /mandates | Create a Direct Debit mandate |
| [**mandatesGet()**](MandatesApi.md#mandatesGet) | **GET** /mandates/{id} | Retrieve a Direct Debit mandate |
| [**mandatesList()**](MandatesApi.md#mandatesList) | **GET** /mandates | List Direct Debit mandates |
| [**mandatesReinstate()**](MandatesApi.md#mandatesReinstate) | **POST** /mandates/{id}/reinstate | Reinstate a suspended Direct Debit mandate |
| [**mandatesScheduleCollection()**](MandatesApi.md#mandatesScheduleCollection) | **POST** /mandates/{id}/collections | Schedule a one-off Direct Debit collection |
| [**mandatesSuspend()**](MandatesApi.md#mandatesSuspend) | **POST** /mandates/{id}/suspend | Suspend a Direct Debit mandate |


## `mandatesCancel()`

```php
mandatesCancel($id, $mandate_action_request): \RevKeen\Model\MandateActionResponse
```

Cancel a Direct Debit mandate

Cancels a mandate. If it was lodged with the bureau, the London & Zurich customer is cancelled too.  ---  **Related endpoints**  - `POST /mandates` — Create a Direct Debit mandate - `GET /mandates` — List Direct Debit mandates - `GET /mandates/{id}` — Retrieve a Direct Debit mandate - `POST /mandates/{id}/suspend` — Suspend a Direct Debit mandate - `POST /mandates/{id}/reinstate` — Reinstate a suspended Direct Debit mandate - `POST /mandates/{id}/collections` — Schedule a one-off Direct Debit collection  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MandatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Mandate ID
$mandate_action_request = new \RevKeen\Model\MandateActionRequest(); // \RevKeen\Model\MandateActionRequest

try {
    $result = $apiInstance->mandatesCancel($id, $mandate_action_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MandatesApi->mandatesCancel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Mandate ID | |
| **mandate_action_request** | [**\RevKeen\Model\MandateActionRequest**](../Model/MandateActionRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\MandateActionResponse**](../Model/MandateActionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mandatesCreate()`

```php
mandatesCreate($create_mandate_request): \RevKeen\Model\MandateResponse
```

Create a Direct Debit mandate

Creates a Direct Debit mandate for a customer. Bank details are validated with the bureau and stored KMS-encrypted; only masked values are returned.  ---  **Related endpoints**  - `GET /mandates` — List Direct Debit mandates - `GET /mandates/{id}` — Retrieve a Direct Debit mandate - `POST /mandates/{id}/cancel` — Cancel a Direct Debit mandate - `POST /mandates/{id}/suspend` — Suspend a Direct Debit mandate - `POST /mandates/{id}/reinstate` — Reinstate a suspended Direct Debit mandate - `POST /mandates/{id}/collections` — Schedule a one-off Direct Debit collection  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `422 unprocessable_entity` — business-rule failure (for example, refunding more than the original charge).  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MandatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_mandate_request = new \RevKeen\Model\CreateMandateRequest(); // \RevKeen\Model\CreateMandateRequest

try {
    $result = $apiInstance->mandatesCreate($create_mandate_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MandatesApi->mandatesCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_mandate_request** | [**\RevKeen\Model\CreateMandateRequest**](../Model/CreateMandateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\MandateResponse**](../Model/MandateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mandatesGet()`

```php
mandatesGet($id): \RevKeen\Model\MandateResponse
```

Retrieve a Direct Debit mandate

---  **Related endpoints**  - `POST /mandates` — Create a Direct Debit mandate - `GET /mandates` — List Direct Debit mandates - `POST /mandates/{id}/cancel` — Cancel a Direct Debit mandate - `POST /mandates/{id}/suspend` — Suspend a Direct Debit mandate - `POST /mandates/{id}/reinstate` — Reinstate a suspended Direct Debit mandate - `POST /mandates/{id}/collections` — Schedule a one-off Direct Debit collection  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MandatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Mandate ID

try {
    $result = $apiInstance->mandatesGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MandatesApi->mandatesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Mandate ID | |

### Return type

[**\RevKeen\Model\MandateResponse**](../Model/MandateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mandatesList()`

```php
mandatesList($customer_id, $status): \RevKeen\Model\MandateListResponse
```

List Direct Debit mandates

---  **Related endpoints**  - `POST /mandates` — Create a Direct Debit mandate - `GET /mandates/{id}` — Retrieve a Direct Debit mandate - `POST /mandates/{id}/cancel` — Cancel a Direct Debit mandate - `POST /mandates/{id}/suspend` — Suspend a Direct Debit mandate - `POST /mandates/{id}/reinstate` — Reinstate a suspended Direct Debit mandate - `POST /mandates/{id}/collections` — Schedule a one-off Direct Debit collection  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MandatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 'customer_id_example'; // string | Filter mandates by customer
$status = 'status_example'; // string | Filter mandates by status (e.g. active, suspended, cancelled)

try {
    $result = $apiInstance->mandatesList($customer_id, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MandatesApi->mandatesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**| Filter mandates by customer | [optional] |
| **status** | **string**| Filter mandates by status (e.g. active, suspended, cancelled) | [optional] |

### Return type

[**\RevKeen\Model\MandateListResponse**](../Model/MandateListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mandatesReinstate()`

```php
mandatesReinstate($id, $mandate_action_request): \RevKeen\Model\MandateActionResponse
```

Reinstate a suspended Direct Debit mandate

Reinstates a suspended mandate. This is NOT a status flip — it re-lodges the mandate to Bacs (a new AUDDIS instruction) using the securely stored bank details, then moves the mandate to pending_lodgement (REV-3123).  ---  **Related endpoints**  - `POST /mandates` — Create a Direct Debit mandate - `GET /mandates` — List Direct Debit mandates - `GET /mandates/{id}` — Retrieve a Direct Debit mandate - `POST /mandates/{id}/cancel` — Cancel a Direct Debit mandate - `POST /mandates/{id}/suspend` — Suspend a Direct Debit mandate - `POST /mandates/{id}/collections` — Schedule a one-off Direct Debit collection  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `422 unprocessable_entity` — business-rule failure (for example, refunding more than the original charge).  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MandatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Mandate ID
$mandate_action_request = new \RevKeen\Model\MandateActionRequest(); // \RevKeen\Model\MandateActionRequest

try {
    $result = $apiInstance->mandatesReinstate($id, $mandate_action_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MandatesApi->mandatesReinstate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Mandate ID | |
| **mandate_action_request** | [**\RevKeen\Model\MandateActionRequest**](../Model/MandateActionRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\MandateActionResponse**](../Model/MandateActionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mandatesScheduleCollection()`

```php
mandatesScheduleCollection($id, $schedule_collection_request): \RevKeen\Model\ScheduleCollectionResponse
```

Schedule a one-off Direct Debit collection

Schedules a one-off Bacs collection against an active mandate for an invoice or payment link. BACS is not real-time: the collection settles 3–5 working days after submission, the payer receives the regulatory advance notice first, and nothing is marked paid until the bureau confirms collection. Idempotent per source: retrying with the same sourceId returns the existing schedule instead of collecting twice.  ---  **Related endpoints**  - `POST /mandates` — Create a Direct Debit mandate - `GET /mandates` — List Direct Debit mandates - `GET /mandates/{id}` — Retrieve a Direct Debit mandate - `POST /mandates/{id}/cancel` — Cancel a Direct Debit mandate - `POST /mandates/{id}/suspend` — Suspend a Direct Debit mandate - `POST /mandates/{id}/reinstate` — Reinstate a suspended Direct Debit mandate  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `403 permission_denied` — key lacks the required scope, or the resource belongs to a different merchant. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `422 unprocessable_entity` — business-rule failure (for example, refunding more than the original charge).  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MandatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Mandate ID
$schedule_collection_request = new \RevKeen\Model\ScheduleCollectionRequest(); // \RevKeen\Model\ScheduleCollectionRequest

try {
    $result = $apiInstance->mandatesScheduleCollection($id, $schedule_collection_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MandatesApi->mandatesScheduleCollection: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Mandate ID | |
| **schedule_collection_request** | [**\RevKeen\Model\ScheduleCollectionRequest**](../Model/ScheduleCollectionRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\ScheduleCollectionResponse**](../Model/ScheduleCollectionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mandatesSuspend()`

```php
mandatesSuspend($id, $mandate_action_request): \RevKeen\Model\MandateActionResponse
```

Suspend a Direct Debit mandate

Suspends an active (or pending-lodgement) mandate.  ---  **Related endpoints**  - `POST /mandates` — Create a Direct Debit mandate - `GET /mandates` — List Direct Debit mandates - `GET /mandates/{id}` — Retrieve a Direct Debit mandate - `POST /mandates/{id}/cancel` — Cancel a Direct Debit mandate - `POST /mandates/{id}/reinstate` — Reinstate a suspended Direct Debit mandate - `POST /mandates/{id}/collections` — Schedule a one-off Direct Debit collection  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\MandatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Mandate ID
$mandate_action_request = new \RevKeen\Model\MandateActionRequest(); // \RevKeen\Model\MandateActionRequest

try {
    $result = $apiInstance->mandatesSuspend($id, $mandate_action_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MandatesApi->mandatesSuspend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Mandate ID | |
| **mandate_action_request** | [**\RevKeen\Model\MandateActionRequest**](../Model/MandateActionRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\MandateActionResponse**](../Model/MandateActionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
