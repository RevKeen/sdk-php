# RevKeen\DirectDebitApi



All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**ddMandateRequestsGet()**](DirectDebitApi.md#ddMandateRequestsGet) | **GET** /dd/mandate-requests/{token} | Look up a pending signed mandate request |
| [**ddPreview()**](DirectDebitApi.md#ddPreview) | **POST** /dd/preview | Preview the Direct Debit collection date chain |
| [**ddValidate()**](DirectDebitApi.md#ddValidate) | **POST** /dd/validate | Validate a UK bank account for Direct Debit |


## `ddMandateRequestsGet()`

```php
ddMandateRequestsGet($token): \RevKeen\Model\MandateRequestLookupResponse
```

Look up a pending signed mandate request

Public lookup of a pending signed mandate request by its emailed token. Rate-limited; returns 404 for unknown, consumed, cancelled, or expired tokens.  ---  **Related endpoints**  - `POST /dd/validate` — Validate a UK bank account for Direct Debit - `POST /dd/preview` — Preview the Direct Debit collection date chain  **Common errors**  - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `429 rate_limit_error` — code `rate_limit_exceeded`. Back off using the `Retry-After` header (whole seconds); `X-RateLimit-Reset` is a UNIX timestamp in seconds.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new RevKeen\Api\DirectDebitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Signed mandate-request token from the emailed link

try {
    $result = $apiInstance->ddMandateRequestsGet($token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DirectDebitApi->ddMandateRequestsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Signed mandate-request token from the emailed link | |

### Return type

[**\RevKeen\Model\MandateRequestLookupResponse**](../Model/MandateRequestLookupResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ddPreview()`

```php
ddPreview($idempotency_key, $preview_collection_request): \RevKeen\Model\PreviewCollectionResponse
```

Preview the Direct Debit collection date chain

Returns the backend-owned working-day date chain (advance notice → submission → collection → settlement) for a Direct Debit collection. Clients never compute these dates.  ---  **Related endpoints**  - `GET /dd/mandate-requests/{token}` — Look up a pending signed mandate request - `POST /dd/validate` — Validate a UK bank account for Direct Debit  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\DirectDebitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$preview_collection_request = new \RevKeen\Model\PreviewCollectionRequest(); // \RevKeen\Model\PreviewCollectionRequest

try {
    $result = $apiInstance->ddPreview($idempotency_key, $preview_collection_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DirectDebitApi->ddPreview: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **preview_collection_request** | [**\RevKeen\Model\PreviewCollectionRequest**](../Model/PreviewCollectionRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\PreviewCollectionResponse**](../Model/PreviewCollectionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ddValidate()`

```php
ddValidate($idempotency_key, $validate_bank_account_request): \RevKeen\Model\ValidateBankAccountResponse
```

Validate a UK bank account for Direct Debit

Validates UK bank account details (sort code + account number) for Direct Debit eligibility with the bureau.  ---  **Related endpoints**  - `GET /dd/mandate-requests/{token}` — Look up a pending signed mandate request - `POST /dd/preview` — Preview the Direct Debit collection date chain  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\DirectDebitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$validate_bank_account_request = new \RevKeen\Model\ValidateBankAccountRequest(); // \RevKeen\Model\ValidateBankAccountRequest

try {
    $result = $apiInstance->ddValidate($idempotency_key, $validate_bank_account_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DirectDebitApi->ddValidate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **validate_bank_account_request** | [**\RevKeen\Model\ValidateBankAccountRequest**](../Model/ValidateBankAccountRequest.md)|  | [optional] |

### Return type

[**\RevKeen\Model\ValidateBankAccountResponse**](../Model/ValidateBankAccountResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
