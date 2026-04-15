# RevKeen\EventsApi

Event objects represent something that happened in your account — a payment succeeded, an invoice was created, a subscription was canceled. Events are the source of truth for webhook delivery. Use them to debug webhook issues, replay missed events, or build an audit trail.  **Required Scopes:** - &#x60;events:read&#x60; - List and retrieve events - &#x60;events:write&#x60; - Resend webhook events

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**eventsList()**](EventsApi.md#eventsList) | **GET** /events | List events |
| [**eventsRetrieve()**](EventsApi.md#eventsRetrieve) | **GET** /events/{id} | Retrieve an event |


## `eventsList()`

```php
eventsList($type, $types, $customer_id, $invoice_id, $subscription_id, $order_id, $created_gte, $created_lte, $limit, $starting_after, $ending_before): \RevKeen\Model\EventListResponse
```

List events

Returns a list of events with optional filters. Events are returned in reverse chronological order.

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


$apiInstance = new RevKeen\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type = invoice.paid; // string | Filter by event type (e.g., invoice.paid)
$types = invoice.paid,payment.succeeded; // string | Filter by multiple event types (comma-separated)
$customer_id = 'customer_id_example'; // string | Filter by customer ID
$invoice_id = 'invoice_id_example'; // string | Filter by invoice ID
$subscription_id = 'subscription_id_example'; // string | Filter by subscription ID
$order_id = 'order_id_example'; // string | Filter by order ID
$created_gte = 3.4; // float | Filter by created_at >= (Unix timestamp)
$created_lte = 3.4; // float | Filter by created_at <= (Unix timestamp)
$limit = 20; // int | Maximum number of results (1-100)
$starting_after = 'starting_after_example'; // string | Cursor for pagination - return results after this event ID
$ending_before = 'ending_before_example'; // string | Cursor for pagination - return results before this event ID

try {
    $result = $apiInstance->eventsList($type, $types, $customer_id, $invoice_id, $subscription_id, $order_id, $created_gte, $created_lte, $limit, $starting_after, $ending_before);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->eventsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | **string**| Filter by event type (e.g., invoice.paid) | [optional] |
| **types** | **string**| Filter by multiple event types (comma-separated) | [optional] |
| **customer_id** | **string**| Filter by customer ID | [optional] |
| **invoice_id** | **string**| Filter by invoice ID | [optional] |
| **subscription_id** | **string**| Filter by subscription ID | [optional] |
| **order_id** | **string**| Filter by order ID | [optional] |
| **created_gte** | **float**| Filter by created_at &gt;&#x3D; (Unix timestamp) | [optional] |
| **created_lte** | **float**| Filter by created_at &lt;&#x3D; (Unix timestamp) | [optional] |
| **limit** | **int**| Maximum number of results (1-100) | [optional] [default to 20] |
| **starting_after** | **string**| Cursor for pagination - return results after this event ID | [optional] |
| **ending_before** | **string**| Cursor for pagination - return results before this event ID | [optional] |

### Return type

[**\RevKeen\Model\EventListResponse**](../Model/EventListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `eventsRetrieve()`

```php
eventsRetrieve($id): \RevKeen\Model\Event
```

Retrieve an event

Retrieves the details of an event by its ID.

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


$apiInstance = new RevKeen\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Event ID

try {
    $result = $apiInstance->eventsRetrieve($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->eventsRetrieve: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Event ID | |

### Return type

[**\RevKeen\Model\Event**](../Model/Event.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
