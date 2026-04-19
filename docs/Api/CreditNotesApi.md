# RevKeen\CreditNotesApi



All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**creditNotesCreate()**](CreditNotesApi.md#creditNotesCreate) | **POST** /credit_notes | Create a credit note |
| [**creditNotesGet()**](CreditNotesApi.md#creditNotesGet) | **GET** /credit_notes/{id} | Get credit note by ID |
| [**creditNotesList()**](CreditNotesApi.md#creditNotesList) | **GET** /credit_notes | List credit notes |
| [**creditNotesListLines()**](CreditNotesApi.md#creditNotesListLines) | **GET** /credit_notes/{id}/lines | List line items on a credit note |
| [**creditNotesPreview()**](CreditNotesApi.md#creditNotesPreview) | **POST** /credit_notes/preview | Preview a credit note without creating it |
| [**creditNotesVoid()**](CreditNotesApi.md#creditNotesVoid) | **POST** /credit_notes/{id}/void | Void a credit note |


## `creditNotesCreate()`

```php
creditNotesCreate($create_credit_note_input): \RevKeen\Model\CreditNoteCreateResponse
```

Create a credit note

Issue a credit note for a paid or partially paid invoice. The credit can be applied via refund to payment method, customer balance, or marked as external.

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


$apiInstance = new RevKeen\Api\CreditNotesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_credit_note_input = new \RevKeen\Model\CreateCreditNoteInput(); // \RevKeen\Model\CreateCreditNoteInput

try {
    $result = $apiInstance->creditNotesCreate($create_credit_note_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CreditNotesApi->creditNotesCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_credit_note_input** | [**\RevKeen\Model\CreateCreditNoteInput**](../Model/CreateCreditNoteInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CreditNoteCreateResponse**](../Model/CreditNoteCreateResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `creditNotesGet()`

```php
creditNotesGet($id): \RevKeen\Model\CreditNoteRetrieveResponse
```

Get credit note by ID

Retrieve a single credit note by its UUID.

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


$apiInstance = new RevKeen\Api\CreditNotesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Credit note UUID

try {
    $result = $apiInstance->creditNotesGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CreditNotesApi->creditNotesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Credit note UUID | |

### Return type

[**\RevKeen\Model\CreditNoteRetrieveResponse**](../Model/CreditNoteRetrieveResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `creditNotesList()`

```php
creditNotesList($status, $invoice_id, $customer_id, $credit_method, $created_after, $created_before, $limit, $offset): \RevKeen\Model\CreditNoteListResponse
```

List credit notes

Retrieve a paginated list of credit notes with optional filters. Results are ordered by creation date (newest first).

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


$apiInstance = new RevKeen\Api\CreditNotesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$status = 'status_example'; // string | Filter by credit note status
$invoice_id = 'invoice_id_example'; // string | Filter by invoice ID
$customer_id = 'customer_id_example'; // string | Filter by customer ID
$credit_method = 'credit_method_example'; // string | Filter by credit method
$created_after = 2024-01-01T00:00:00Z; // string | ISO 8601 date - only credit notes created after this date
$created_before = 2024-12-31T23:59:59Z; // string | ISO 8601 date - only credit notes created before this date
$limit = 20; // float | Number of results to return (1-100)
$offset = 0; // float | Number of results to skip

try {
    $result = $apiInstance->creditNotesList($status, $invoice_id, $customer_id, $credit_method, $created_after, $created_before, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CreditNotesApi->creditNotesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **status** | **string**| Filter by credit note status | [optional] |
| **invoice_id** | **string**| Filter by invoice ID | [optional] |
| **customer_id** | **string**| Filter by customer ID | [optional] |
| **credit_method** | **string**| Filter by credit method | [optional] |
| **created_after** | **string**| ISO 8601 date - only credit notes created after this date | [optional] |
| **created_before** | **string**| ISO 8601 date - only credit notes created before this date | [optional] |
| **limit** | **float**| Number of results to return (1-100) | [optional] [default to 20] |
| **offset** | **float**| Number of results to skip | [optional] [default to 0] |

### Return type

[**\RevKeen\Model\CreditNoteListResponse**](../Model/CreditNoteListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `creditNotesListLines()`

```php
creditNotesListLines($id, $limit): \RevKeen\Model\CreditNoteLineList
```

List line items on a credit note

Returns the line items attached to a credit note. Each line describes a portion of the invoice that the credit applies to — either a whole invoice line or a prorated slice. Use this to reconstruct the credit's effect per invoice line (for example, when displaying the credit breakdown in your own UI).

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


$apiInstance = new RevKeen\Api\CreditNotesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Credit note UUID
$limit = 100; // int

try {
    $result = $apiInstance->creditNotesListLines($id, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CreditNotesApi->creditNotesListLines: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Credit note UUID | |
| **limit** | **int**|  | [optional] [default to 100] |

### Return type

[**\RevKeen\Model\CreditNoteLineList**](../Model/CreditNoteLineList.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `creditNotesPreview()`

```php
creditNotesPreview($preview_credit_note_input): \RevKeen\Model\CreditNotePreviewResponse
```

Preview a credit note without creating it

Compute what a credit note would look like against a specific invoice without persisting anything. Use this to validate amounts and show a \"here's what will happen\" UI before the merchant commits. No side effects — no DB writes, no events emitted, no refunds initiated. Mirrors Stripe's `POST /v1/credit_notes/preview`.

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


$apiInstance = new RevKeen\Api\CreditNotesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$preview_credit_note_input = new \RevKeen\Model\PreviewCreditNoteInput(); // \RevKeen\Model\PreviewCreditNoteInput

try {
    $result = $apiInstance->creditNotesPreview($preview_credit_note_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CreditNotesApi->creditNotesPreview: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **preview_credit_note_input** | [**\RevKeen\Model\PreviewCreditNoteInput**](../Model/PreviewCreditNoteInput.md)|  | |

### Return type

[**\RevKeen\Model\CreditNotePreviewResponse**](../Model/CreditNotePreviewResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `creditNotesVoid()`

```php
creditNotesVoid($id): \RevKeen\Model\CreditNoteVoidResponse
```

Void a credit note

Void a credit note that has been issued but not yet fully applied. This is an accounting void — it reverses the credit without creating a new financial transaction.

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


$apiInstance = new RevKeen\Api\CreditNotesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Credit note UUID

try {
    $result = $apiInstance->creditNotesVoid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CreditNotesApi->creditNotesVoid: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Credit note UUID | |

### Return type

[**\RevKeen\Model\CreditNoteVoidResponse**](../Model/CreditNoteVoidResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
