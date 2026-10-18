# RevKeen\PaymentMethodsApi



All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**paymentMethodsDetach()**](PaymentMethodsApi.md#paymentMethodsDetach) | **POST** /payment-methods/{id}/detach | Detach a payment method from its customer |
| [**paymentMethodsSetDefault()**](PaymentMethodsApi.md#paymentMethodsSetDefault) | **POST** /payment-methods/{id}/set-default | Set a payment method as its customer&#39;s default |


## `paymentMethodsDetach()`

```php
paymentMethodsDetach($id, $idempotency_key): \RevKeen\Model\PaymentMethod
```

Detach a payment method from its customer

Detaches a payment method from its customer. After detaching, the payment method can no longer be used for payments.  This operation soft-deletes the payment method by setting its status to `inactive`; nothing is deleted from the card vault.  **Refused with `409 payment_method_in_use`** (and nothing is changed) when the payment method is:  - the customer's default payment method (set another default first), or - the payment method of a subscription that is `active`, `trialing` or `past_due` (move the subscription to another payment method first).  Detaching a payment method that is already inactive returns it unchanged.  Requires the `payment_methods:write` scope and the `payment_method:detach` permission. Send an `Idempotency-Key` header to make retries safe.  ---  **Related endpoints**  - `POST /payment-methods/{id}/set-default` — Set a payment method as its customer's default  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `429 rate_limit_error` — code `rate_limit_exceeded`. Back off using the `Retry-After` header (whole seconds); `X-RateLimit-Reset` is a UNIX timestamp in seconds.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\PaymentMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string | Payment method UUID
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.

try {
    $result = $apiInstance->paymentMethodsDetach($id, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentMethodsApi->paymentMethodsDetach: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment method UUID | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |

### Return type

[**\RevKeen\Model\PaymentMethod**](../Model/PaymentMethod.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentMethodsSetDefault()`

```php
paymentMethodsSetDefault($id, $idempotency_key): \RevKeen\Model\PaymentMethod
```

Set a payment method as its customer's default

Makes this payment method the default payment method of the customer it belongs to. The previous default, if any, stops being the default.  This sets the **customer's default only**. It does not move any existing subscription to this payment method: a subscription keeps the payment method it already bills on.  A payment method that is not active (detached or expired) is refused with `409 payment_method_not_active` and nothing is changed. Setting a payment method that is already the default is a no-op that returns it.  Requires the `payment_methods:write` scope and the `payment_method:set_default` permission. Send an `Idempotency-Key` header to make retries safe.  ---  **Related endpoints**  - `POST /payment-methods/{id}/detach` — Detach a payment method from its customer  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `429 rate_limit_error` — code `rate_limit_exceeded`. Back off using the `Retry-After` header (whole seconds); `X-RateLimit-Reset` is a UNIX timestamp in seconds.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\PaymentMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string | Payment method UUID
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.

try {
    $result = $apiInstance->paymentMethodsSetDefault($id, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentMethodsApi->paymentMethodsSetDefault: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment method UUID | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |

### Return type

[**\RevKeen\Model\PaymentMethod**](../Model/PaymentMethod.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
