# RevKeen\SubscriptionsApi

Subscriptions manage recurring billing cycles for your customers. Create subscriptions to automatically charge customers on a schedule, with support for trials, prorations, plan changes, and dunning for failed payments.  **Required Scopes:** - &#x60;subscriptions:read&#x60; - List and retrieve subscriptions - &#x60;subscriptions:write&#x60; - Create, update, cancel subscriptions  **MCP Tools:** &#x60;subscriptions_get&#x60;

All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**subscriptionsCancel()**](SubscriptionsApi.md#subscriptionsCancel) | **POST** /subscriptions/{id}/cancel | Cancel subscription |
| [**subscriptionsCreate()**](SubscriptionsApi.md#subscriptionsCreate) | **POST** /subscriptions | Create a new subscription |
| [**subscriptionsGet()**](SubscriptionsApi.md#subscriptionsGet) | **GET** /subscriptions/{id} | Get subscription by ID |
| [**subscriptionsList()**](SubscriptionsApi.md#subscriptionsList) | **GET** /subscriptions | List subscriptions |
| [**subscriptionsUpdate()**](SubscriptionsApi.md#subscriptionsUpdate) | **PATCH** /subscriptions/{id} | Update subscription details |


## `subscriptionsCancel()`

```php
subscriptionsCancel($id, $idempotency_key, $cancel_subscription_input): \RevKeen\Model\SubscriptionCancelSubscriptionResponse
```

Cancel subscription

Cancel a subscription either immediately or at the end of the current billing period.  **Modes:** - `immediately`: Status set to \"canceled\", access revoked now - `period_end`: cancelAtPeriodEnd flag set, access continues until period end  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\SubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Subscription UUID
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$cancel_subscription_input = new \RevKeen\Model\CancelSubscriptionInput(); // \RevKeen\Model\CancelSubscriptionInput

try {
    $result = $apiInstance->subscriptionsCancel($id, $idempotency_key, $cancel_subscription_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->subscriptionsCancel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Subscription UUID | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **cancel_subscription_input** | [**\RevKeen\Model\CancelSubscriptionInput**](../Model/CancelSubscriptionInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\SubscriptionCancelSubscriptionResponse**](../Model/SubscriptionCancelSubscriptionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subscriptionsCreate()`

```php
subscriptionsCreate($idempotency_key, $subscriptions_create_request): \RevKeen\Model\SubscriptionCreateResponse
```

Create a new subscription

Create a new subscription for a customer.  **The first period is billed at creation**, at the price's amount for the quantity. On card the saved `paymentMethodId` is charged straight away (it is required unless the subscription starts in a trial). On Direct Debit the first collection is scheduled with advance notice, typically 5–7 working days after creation. With a trial, nothing is billed until the trial ends.  Set `paymentRail: direct_debit` with an active `mandateId` to create a Direct Debit subscription (GBP only). This needs a signed-in team member or an OAuth app; API keys are refused with 403.  ---  **Related endpoints**  - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal - `POST /subscriptions/{id}/pause` — Pause subscription  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `422 unprocessable_entity` — business-rule failure (for example, refunding more than the original charge).  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\SubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$subscriptions_create_request = new \RevKeen\Model\SubscriptionsCreateRequest(); // \RevKeen\Model\SubscriptionsCreateRequest

try {
    $result = $apiInstance->subscriptionsCreate($idempotency_key, $subscriptions_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->subscriptionsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **subscriptions_create_request** | [**\RevKeen\Model\SubscriptionsCreateRequest**](../Model/SubscriptionsCreateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\SubscriptionCreateResponse**](../Model/SubscriptionCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subscriptionsGet()`

```php
subscriptionsGet($id): \RevKeen\Model\SubscriptionRetrieveResponse
```

Get subscription by ID

Retrieve detailed information about a specific subscription  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal - `POST /subscriptions/{id}/pause` — Pause subscription  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\SubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Subscription UUID

try {
    $result = $apiInstance->subscriptionsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->subscriptionsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Subscription UUID | |

### Return type

[**\RevKeen\Model\SubscriptionRetrieveResponse**](../Model/SubscriptionRetrieveResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subscriptionsList()`

```php
subscriptionsList($page, $limit, $status, $customer_id): \RevKeen\Model\SubscriptionListResponse
```

List subscriptions

Retrieve a paginated list of subscriptions with optional filters  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal - `POST /subscriptions/{id}/pause` — Pause subscription  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\SubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page number
$limit = 20; // int | Maximum number of results (1-100)
$status = 'status_example'; // string | Filter by subscription status
$customer_id = 'customer_id_example'; // string | Filter by customer UUID

try {
    $result = $apiInstance->subscriptionsList($page, $limit, $status, $customer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->subscriptionsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page number | [optional] [default to 1] |
| **limit** | **int**| Maximum number of results (1-100) | [optional] [default to 20] |
| **status** | **string**| Filter by subscription status | [optional] |
| **customer_id** | **string**| Filter by customer UUID | [optional] |

### Return type

[**\RevKeen\Model\SubscriptionListResponse**](../Model/SubscriptionListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subscriptionsUpdate()`

```php
subscriptionsUpdate($id, $idempotency_key, $subscriptions_update_request): \RevKeen\Model\SubscriptionUpdateResponse
```

Update subscription details

Update an existing subscription's properties  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal - `POST /subscriptions/{id}/pause` — Pause subscription  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\SubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Subscription UUID
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$subscriptions_update_request = new \RevKeen\Model\SubscriptionsUpdateRequest(); // \RevKeen\Model\SubscriptionsUpdateRequest

try {
    $result = $apiInstance->subscriptionsUpdate($id, $idempotency_key, $subscriptions_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->subscriptionsUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Subscription UUID | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **subscriptions_update_request** | [**\RevKeen\Model\SubscriptionsUpdateRequest**](../Model/SubscriptionsUpdateRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\SubscriptionUpdateResponse**](../Model/SubscriptionUpdateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
