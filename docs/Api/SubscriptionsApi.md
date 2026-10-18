# RevKeen\SubscriptionsApi

Subscriptions manage recurring billing cycles for your customers. Create subscriptions to automatically charge customers on a schedule, with support for trials, prorations, plan changes, and dunning for failed payments.  **Required Scopes:** - &#x60;subscriptions:read&#x60; - List and retrieve subscriptions - &#x60;subscriptions:write&#x60; - Create, update, cancel subscriptions  **MCP Tools:** &#x60;subscriptions_get&#x60;

All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**subscriptionsCancel()**](SubscriptionsApi.md#subscriptionsCancel) | **POST** /subscriptions/{id}/cancel | Cancel subscription |
| [**subscriptionsChangePlan()**](SubscriptionsApi.md#subscriptionsChangePlan) | **POST** /subscriptions/{id}/change-plan | Change subscription plan |
| [**subscriptionsCreate()**](SubscriptionsApi.md#subscriptionsCreate) | **POST** /subscriptions | Create a new subscription |
| [**subscriptionsGet()**](SubscriptionsApi.md#subscriptionsGet) | **GET** /subscriptions/{id} | Get subscription by ID |
| [**subscriptionsList()**](SubscriptionsApi.md#subscriptionsList) | **GET** /subscriptions | List subscriptions |
| [**subscriptionsPause()**](SubscriptionsApi.md#subscriptionsPause) | **POST** /subscriptions/{id}/pause | Pause subscription |
| [**subscriptionsPreviewChangePlan()**](SubscriptionsApi.md#subscriptionsPreviewChangePlan) | **POST** /subscriptions/{id}/preview-change-plan | Preview a plan change |
| [**subscriptionsResume()**](SubscriptionsApi.md#subscriptionsResume) | **POST** /subscriptions/{id}/resume | Resume subscription |
| [**subscriptionsUpdate()**](SubscriptionsApi.md#subscriptionsUpdate) | **PATCH** /subscriptions/{id} | Update subscription details |


## `subscriptionsCancel()`

```php
subscriptionsCancel($id, $idempotency_key, $cancel_subscription_input): \RevKeen\Model\SubscriptionCancelSubscriptionResponse
```

Cancel subscription

Cancel a subscription either immediately or at the end of the current billing period.  **Modes:** - `immediately`: Status set to \"canceled\", access revoked now - `period_end`: cancelAtPeriodEnd flag set, access continues until period end  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/preview-change-plan` — Preview a plan change - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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

## `subscriptionsChangePlan()`

```php
subscriptionsChangePlan($id, $idempotency_key, $subscriptions_change_plan_request): \RevKeen\Model\SubscriptionChangePlanResponse
```

Change subscription plan

Move an `active`, `trialing` or `past_due` subscription to another recurring price, from now.  **Nothing is charged when the plan changes.** With `prorationBehavior` `next_invoice` (the default, and what `invoice_immediately` means here), the difference for the rest of the current period is added to the next renewal invoice, or credited there for a downgrade. Two changes before a renewal are netted. With `none` the plan changes and no proration is added. The renewal amount becomes the new price times the subscription's quantity.  The new price must bill on the subscription's own interval and in its currency (`interval_mismatch`, `currency_mismatch`), and must have an amount above zero (`price_amount_missing`). See the figures first with `POST /v2/subscriptions/{id}/preview-change-plan`, which uses the same calculation.  **Direct Debit.** A Direct Debit subscription is refused with `409 direct_debit_plan_change_unsupported`: a new amount needs advance notice to the payer, which this operation does not send.  Emits `subscription.plan_changed`. Requires the `subscriptions:write` scope and the `subscription:update` permission. Send an `Idempotency-Key` header to make retries safe.  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/preview-change-plan` — Preview a plan change - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `429 rate_limit_error` — code `rate_limit_exceeded`. Back off using the `Retry-After` header (whole seconds); `X-RateLimit-Reset` is a UNIX timestamp in seconds.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$subscriptions_change_plan_request = new \RevKeen\Model\SubscriptionsChangePlanRequest(); // \RevKeen\Model\SubscriptionsChangePlanRequest

try {
    $result = $apiInstance->subscriptionsChangePlan($id, $idempotency_key, $subscriptions_change_plan_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->subscriptionsChangePlan: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Subscription UUID | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **subscriptions_change_plan_request** | [**\RevKeen\Model\SubscriptionsChangePlanRequest**](../Model/SubscriptionsChangePlanRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\SubscriptionChangePlanResponse**](../Model/SubscriptionChangePlanResponse.md)

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

Create a new subscription for a customer.  **The first period is billed at creation**, at the price's amount for the quantity. On card the saved `paymentMethodId` is charged straight away (it is required unless the subscription starts in a trial). On Direct Debit the first collection is scheduled with advance notice, typically 5–7 working days after creation. With a trial, nothing is billed until the trial ends.  Set `paymentRail: direct_debit` with an active `mandateId` to create a Direct Debit subscription (GBP only). This needs a signed-in team member or an OAuth app; API keys are refused with 403.  ---  **Related endpoints**  - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/preview-change-plan` — Preview a plan change - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `422 unprocessable_entity` — business-rule failure (for example, refunding more than the original charge).  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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

Retrieve detailed information about a specific subscription  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/preview-change-plan` — Preview a plan change - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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

Retrieve a paginated list of subscriptions with optional filters.  Every query parameter is optional: a bare call lists the merchant's subscriptions, newest first, with a default page size of 20. `customerId` must name a customer of the authenticated merchant; an unknown id is rejected with 404 `resource_missing` rather than returning an empty list, so a mistyped filter is not mistaken for a customer who has no subscriptions.  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/preview-change-plan` — Preview a plan change - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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

## `subscriptionsPause()`

```php
subscriptionsPause($id, $idempotency_key, $body): \RevKeen\Model\SubscriptionPauseResponse
```

Pause subscription

Pause an `active` or `trialing` subscription, immediately. While it is paused: - The subscription status is `paused` and no renewal invoices are generated or collected. - Nothing already issued is voided, cancelled or recalled. Invoices that are already open stay open. - A Direct Debit subscription also stops collecting: its open invoices are listed in `dd_collection_stopped` and are not collected automatically.  It takes no parameters (send no body, or an empty object). Resume with `POST /v2/subscriptions/{id}/resume`; a pause does not end by itself.  A subscription in any other status is refused with `400 invalid_status` and nothing is changed. Emits `subscription.paused`.  Requires the `subscriptions:write` scope and the `subscription:pause` permission. Send an `Idempotency-Key` header to make retries safe.  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/preview-change-plan` — Preview a plan change - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `429 rate_limit_error` — code `rate_limit_exceeded`. Back off using the `Retry-After` header (whole seconds); `X-RateLimit-Reset` is a UNIX timestamp in seconds.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$body = array('key' => new \stdClass); // object

try {
    $result = $apiInstance->subscriptionsPause($id, $idempotency_key, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->subscriptionsPause: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Subscription UUID | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **body** | **object**|  | [optional] |

### Return type

[**\RevKeen\Model\SubscriptionPauseResponse**](../Model/SubscriptionPauseResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subscriptionsPreviewChangePlan()`

```php
subscriptionsPreviewChangePlan($id, $idempotency_key, $preview_subscription_plan_change_input): \RevKeen\Model\SubscriptionChangePlanPreviewResponse
```

Preview a plan change

Show what `POST /v2/subscriptions/{id}/change-plan` would do with the same body: the new renewal amount, this change's proration and what the next renewal invoice would add or credit. **Nothing is changed and nothing is recorded.**  It uses the same calculation and the same checks as the change, so it is refused for the same reasons (`400`, and `409` for a Direct Debit subscription). The figures are as of the request: a change made later prorates over fewer remaining days.  Requires the `subscriptions:read` scope and the `subscription:read` permission.  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `429 rate_limit_error` — code `rate_limit_exceeded`. Back off using the `Retry-After` header (whole seconds); `X-RateLimit-Reset` is a UNIX timestamp in seconds.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$preview_subscription_plan_change_input = new \RevKeen\Model\PreviewSubscriptionPlanChangeInput(); // \RevKeen\Model\PreviewSubscriptionPlanChangeInput

try {
    $result = $apiInstance->subscriptionsPreviewChangePlan($id, $idempotency_key, $preview_subscription_plan_change_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->subscriptionsPreviewChangePlan: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Subscription UUID | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **preview_subscription_plan_change_input** | [**\RevKeen\Model\PreviewSubscriptionPlanChangeInput**](../Model/PreviewSubscriptionPlanChangeInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\SubscriptionChangePlanPreviewResponse**](../Model/SubscriptionChangePlanPreviewResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subscriptionsResume()`

```php
subscriptionsResume($id, $idempotency_key): \RevKeen\Model\SubscriptionResumeResponse
```

Resume subscription

Resume a `paused` subscription. The status returns to `active` and renewals continue.  **The periods that elapsed while it was paused are not billed.** The subscription keeps its billing day and its next charge is the next billing date after the resume, never one charge per paused period.  Invoices that were already open when it was paused stay open; resuming does not collect them.  **Direct Debit.** A Direct Debit subscription resumes only if its mandate can collect now. Otherwise the call is refused with `409 mandate_not_usable` (or `409 direct_debit_not_configured`), the subscription stays paused, and `details.mandate_usability_code` says why. A card subscription has no such check.  A subscription that is not `paused` is refused with `400 invalid_status`. It takes no body. Emits `subscription.resumed`.  Requires the `subscriptions:write` scope and the `subscription:resume` permission. Send an `Idempotency-Key` header to make retries safe.  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `PATCH /subscriptions/{id}` — Update subscription details - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/preview-change-plan` — Preview a plan change - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `429 rate_limit_error` — code `rate_limit_exceeded`. Back off using the `Retry-After` header (whole seconds); `X-RateLimit-Reset` is a UNIX timestamp in seconds.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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

try {
    $result = $apiInstance->subscriptionsResume($id, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionsApi->subscriptionsResume: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Subscription UUID | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |

### Return type

[**\RevKeen\Model\SubscriptionResumeResponse**](../Model/SubscriptionResumeResponse.md)

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
subscriptionsUpdate($id, $idempotency_key, $subscription_update_input): \RevKeen\Model\SubscriptionUpdateResponse
```

Update subscription details

Update a subscription's metadata.  Only `metadata` is accepted; any other field is refused with 400. To cancel a subscription use `POST /subscriptions/{id}/cancel`.  ---  **Related endpoints**  - `POST /subscriptions` — Create a new subscription - `GET /subscriptions` — List subscriptions - `GET /subscriptions/{id}` — Get subscription by ID - `DELETE /subscriptions/{id}` — Delete subscription - `POST /subscriptions/{id}/change-plan` — Change subscription plan - `POST /subscriptions/{id}/preview-change-plan` — Preview a plan change - `POST /subscriptions/{id}/change-quantity` — Change subscription quantity - `POST /subscriptions/{id}/preview-renewal` — Preview subscription renewal  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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
$subscription_update_input = new \RevKeen\Model\SubscriptionUpdateInput(); // \RevKeen\Model\SubscriptionUpdateInput

try {
    $result = $apiInstance->subscriptionsUpdate($id, $idempotency_key, $subscription_update_input);
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
| **subscription_update_input** | [**\RevKeen\Model\SubscriptionUpdateInput**](../Model/SubscriptionUpdateInput.md)|  | [optional] |

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
