# RevKeen\InvoicesApi

Invoices are the canonical record of what a customer owes or has paid. Every subscription cycle generates an invoice automatically, and you can also create one-off invoices for ad-hoc charges. Invoices progress through a lifecycle: &#x60;draft&#x60; → &#x60;open&#x60; → &#x60;finalized&#x60; → &#x60;paid&#x60;.  **Required Scopes:** - &#x60;invoices:read&#x60; - List and retrieve invoices - &#x60;invoices:write&#x60; - Create, update, send, finalize invoices  **MCP Tools:** &#x60;invoices_list&#x60;, &#x60;invoices_get&#x60;, &#x60;invoices_create&#x60;, &#x60;invoices_send&#x60;, &#x60;invoices_finalize&#x60;

All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**invoiceUsageExplain()**](InvoicesApi.md#invoiceUsageExplain) | **GET** /invoices/{id}/usage-explain | Explain invoice usage charges |
| [**invoicesCreate()**](InvoicesApi.md#invoicesCreate) | **POST** /invoices | Create invoice |
| [**invoicesFinalize()**](InvoicesApi.md#invoicesFinalize) | **POST** /invoices/{id}/finalize | Finalize an invoice |
| [**invoicesGet()**](InvoicesApi.md#invoicesGet) | **GET** /invoices/{id} | Get invoice |
| [**invoicesGetPdf()**](InvoicesApi.md#invoicesGetPdf) | **GET** /invoices/{id}/pdf | Get invoice PDF link |
| [**invoicesList()**](InvoicesApi.md#invoicesList) | **GET** /invoices | List invoices |
| [**invoicesMarginEstimate()**](InvoicesApi.md#invoicesMarginEstimate) | **POST** /invoices/{id}/margin-estimate | Estimate invoice net by payment rail |
| [**invoicesPay()**](InvoicesApi.md#invoicesPay) | **POST** /invoices/{id}/pay | Record or collect a payment |
| [**invoicesSend()**](InvoicesApi.md#invoicesSend) | **POST** /invoices/{id}/send | Send an invoice |
| [**invoicesUpdate()**](InvoicesApi.md#invoicesUpdate) | **PATCH** /invoices/{id} | Update invoice |
| [**invoicesVoid()**](InvoicesApi.md#invoicesVoid) | **POST** /invoices/{id}/void | Void an invoice |


## `invoiceUsageExplain()`

```php
invoiceUsageExplain($id): \RevKeen\Model\InvoiceUsageExplain200Response
```

Explain invoice usage charges

Return why this invoice billed the amount it did: line-item attribution plus usage provenance counts for usage lines. Use this instead of chaining invoices_get + invoice_line_items_list_usage_events.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices` — List invoices - `POST /invoices` — Create invoice - `GET /invoices/{id}` — Get invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link - `POST /invoices/{id}/margin-estimate` — Estimate invoice net by payment rail  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Invoice UUID

try {
    $result = $apiInstance->invoiceUsageExplain($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoiceUsageExplain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Invoice UUID | |

### Return type

[**\RevKeen\Model\InvoiceUsageExplain200Response**](../Model/InvoiceUsageExplain200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesCreate()`

```php
invoicesCreate($invoices_create_request, $idempotency_key): \RevKeen\Model\InvoiceResponse
```

Create invoice

Create a new invoice.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `GET /invoices` — List invoices - `GET /invoices/{id}` — Get invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link - `POST /invoices/{id}/margin-estimate` — Estimate invoice net by payment rail  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoices_create_request = new \RevKeen\Model\InvoicesCreateRequest(); // \RevKeen\Model\InvoicesCreateRequest | Invoice creation details
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.

try {
    $result = $apiInstance->invoicesCreate($invoices_create_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **invoices_create_request** | [**\RevKeen\Model\InvoicesCreateRequest**](../Model/InvoicesCreateRequest.md)| Invoice creation details | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesFinalize()`

```php
invoicesFinalize($id, $idempotency_key, $invoices_finalize_request): \RevKeen\Model\InvoiceResponse
```

Finalize an invoice

Finalizes a draft invoice: its status becomes `finalized`, it gets a public token, and its financial fields become immutable. A draft with no line items can be finalized when its `total_minor` is above zero; a zero total is refused.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `GET /invoices` — List invoices - `POST /invoices` — Create invoice - `GET /invoices/{id}` — Get invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$invoices_finalize_request = new \RevKeen\Model\InvoicesFinalizeRequest(); // \RevKeen\Model\InvoicesFinalizeRequest | Finalization options

try {
    $result = $apiInstance->invoicesFinalize($id, $idempotency_key, $invoices_finalize_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesFinalize: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **invoices_finalize_request** | [**\RevKeen\Model\InvoicesFinalizeRequest**](../Model/InvoicesFinalizeRequest.md)| Finalization options | [optional] |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesGet()`

```php
invoicesGet($id): \RevKeen\Model\InvoiceResponse
```

Get invoice

Get a single invoice by ID.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `GET /invoices` — List invoices - `POST /invoices` — Create invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link - `POST /invoices/{id}/margin-estimate` — Estimate invoice net by payment rail

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->invoicesGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesGetPdf()`

```php
invoicesGetPdf($id): \RevKeen\Model\InvoicePdfResponse
```

Get invoice PDF link

Returns a short-lived presigned URL (valid for 5 minutes) that downloads the invoice PDF. The response never contains the PDF itself. Only invoices that already have a rendered PDF can be downloaded: for any other invoice, such as a draft or an open invoice, the response is 409 invoice_pdf_not_ready, and this request does not generate one. Treat the URL as a secret and do not log it.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `GET /invoices` — List invoices - `POST /invoices` — Create invoice - `GET /invoices/{id}` — Get invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `POST /invoices/{id}/margin-estimate` — Estimate invoice net by payment rail  **Common errors**  - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `429 rate_limit_error` — code `rate_limit_exceeded`. Back off using the `Retry-After` header (whole seconds); `X-RateLimit-Reset` is a UNIX timestamp in seconds.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->invoicesGetPdf($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesGetPdf: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\InvoicePdfResponse**](../Model/InvoicePdfResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesList()`

```php
invoicesList($status, $customer_id, $limit, $offset): \RevKeen\Model\InvoiceListResponse
```

List invoices

List invoices with pagination and filtering.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `POST /invoices` — Create invoice - `GET /invoices/{id}` — Get invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link - `POST /invoices/{id}/margin-estimate` — Estimate invoice net by payment rail  **Common errors**  - `400 invalid_request` — malformed payload or failed validation.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$status = 'status_example'; // string | Filter by invoice status
$customer_id = 'customer_id_example'; // string | Filter by customer ID (UUID)
$limit = 20; // int | Maximum number of results (1-100)
$offset = 0; // int | Number of results to skip

try {
    $result = $apiInstance->invoicesList($status, $customer_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **status** | **string**| Filter by invoice status | [optional] |
| **customer_id** | **string**| Filter by customer ID (UUID) | [optional] |
| **limit** | **int**| Maximum number of results (1-100) | [optional] [default to 20] |
| **offset** | **int**| Number of results to skip | [optional] [default to 0] |

### Return type

[**\RevKeen\Model\InvoiceListResponse**](../Model/InvoiceListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesMarginEstimate()`

```php
invoicesMarginEstimate($id, $invoices_margin_estimate_request, $idempotency_key): \RevKeen\Model\InvoicesMarginEstimate200Response
```

Estimate invoice net by payment rail

Estimate per-rail processing fees and net-after-fees for an invoice amount.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `GET /invoices` — List invoices - `POST /invoices` — Create invoice - `GET /invoices/{id}` — Get invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link  **Common errors**  - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Invoice ID.
$invoices_margin_estimate_request = new \RevKeen\Model\InvoicesMarginEstimateRequest(); // \RevKeen\Model\InvoicesMarginEstimateRequest | Margin estimate inputs
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.

try {
    $result = $apiInstance->invoicesMarginEstimate($id, $invoices_margin_estimate_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesMarginEstimate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Invoice ID. | |
| **invoices_margin_estimate_request** | [**\RevKeen\Model\InvoicesMarginEstimateRequest**](../Model/InvoicesMarginEstimateRequest.md)| Margin estimate inputs | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |

### Return type

[**\RevKeen\Model\InvoicesMarginEstimate200Response**](../Model/InvoicesMarginEstimate200Response.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesPay()`

```php
invoicesPay($id, $pay_invoice_request, $idempotency_key): \RevKeen\Model\InvoiceResponse
```

Record or collect a payment

Records a payment the customer made outside RevKeen (`mode: \"record\"`), or asks RevKeen to collect the invoice by Direct Debit (`mode: \"collect\"`).  ### Record  Records a payment the customer made outside RevKeen, such as a bank transfer, cash or a cheque, and applies it to the invoice. RevKeen collects no money in this mode.  `mode`, `payment_method`, `reference` and `amount_minor` are all required and nothing is defaulted. A payment that covers the whole outstanding amount moves the invoice to `paid`; a smaller one moves it to `partially_paid`. An amount larger than the invoice total less what is already paid is refused.  A payment record is written for every call, and an invoice is never marked paid without one. To mark an invoice paid, use this operation: setting `status` to `paid` or `partially_paid` through `PATCH /v2/invoices/{id}` is refused.  **Refused with 409, and nothing is changed**, when the invoice is already paid, void, a draft, or not recordable here, or when a Direct Debit collection for it is still pending (cancel the collection first; recording a payment would let the customer be charged twice).  The recorded payment fires the same events as a payment recorded in the dashboard, including `invoice.paid` and `payment.succeeded`. Recording requires the `invoice:mark_paid` permission.  ### Collect by Direct Debit  Schedules a Direct Debit collection of the invoice's **outstanding amount** (the amount due) against the customer's active mandate, and returns `202`. Only `payment_method: \"direct_debit\"` is accepted; card collection is not available through this operation. The amount is never taken from the request: a body with any other field, such as `amount_minor`, is refused with `400`.  The collection is scheduled, not completed. **The invoice stays unpaid** and becomes paid only when the collection settles. The customer is sent the Direct Debit advance notice first; when that notice is still being delivered, `collection.status` is `awaiting_advance_notice` and the collection is submitted once delivery is confirmed.  **Refused with 409, and nothing is scheduled**, when the invoice is already paid, void, a draft or not collectable, when a Direct Debit collection for it is already pending (`invoice_has_pending_dd_collection`), when the customer has no usable Direct Debit mandate (`mandate_not_usable`, including more than one active mandate), or when Direct Debit is not enabled for your account (`direct_debit_not_configured`).  Collecting requires the `direct_debit:submit_collection` permission and, for an API key, the `mandates:write` scope as well as `invoices:write`. An API key is decided as the team member who issued it. Your account owners and admins are emailed whenever an API key starts a collection.  ### Both modes  Requires the `invoices:write` scope. Send an `Idempotency-Key` header: a replay with the same key records or schedules nothing a second time and returns the stored response. A response, including an error, is stored for the key, so use a new key to retry after a failure.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `GET /invoices` — List invoices - `POST /invoices` — Create invoice - `GET /invoices/{id}` — Get invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `403 authorization_error` — the caller is identified but the action is denied. Codes include `insufficient_permissions`, `ip_not_allowed`, `merchant_mismatch`, and `origin_not_allowed`. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict. - `429 rate_limit_error` — code `rate_limit_exceeded`. Back off using the `Retry-After` header (whole seconds); `X-RateLimit-Reset` is a UNIX timestamp in seconds.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$pay_invoice_request = new \RevKeen\Model\PayInvoiceRequest(); // \RevKeen\Model\PayInvoiceRequest | Payment details
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.

try {
    $result = $apiInstance->invoicesPay($id, $pay_invoice_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesPay: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **pay_invoice_request** | [**\RevKeen\Model\PayInvoiceRequest**](../Model/PayInvoiceRequest.md)| Payment details | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesSend()`

```php
invoicesSend($id, $idempotency_key, $invoices_send_request): \RevKeen\Model\InvoiceResponse
```

Send an invoice

Sends an invoice to the customer via the specified channel (email, SMS, or WhatsApp). A draft is approved first; a finalized invoice becomes `sent`. The send is refused, and nothing changes, when the invoice has no customer, the customer has no address for the channel, or nothing is due.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `GET /invoices` — List invoices - `POST /invoices` — Create invoice - `GET /invoices/{id}` — Get invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$invoices_send_request = new \RevKeen\Model\InvoicesSendRequest(); // \RevKeen\Model\InvoicesSendRequest | Send options

try {
    $result = $apiInstance->invoicesSend($id, $idempotency_key, $invoices_send_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesSend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **invoices_send_request** | [**\RevKeen\Model\InvoicesSendRequest**](../Model/InvoicesSendRequest.md)| Send options | [optional] |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesUpdate()`

```php
invoicesUpdate($id, $invoices_update_request, $idempotency_key): \RevKeen\Model\InvoiceResponse
```

Update invoice

Update an existing invoice.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `GET /invoices` — List invoices - `POST /invoices` — Create invoice - `GET /invoices/{id}` — Get invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link - `POST /invoices/{id}/margin-estimate` — Estimate invoice net by payment rail  **Common errors**  - `400 invalid_request` — malformed payload or failed validation.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$invoices_update_request = new \RevKeen\Model\InvoicesUpdateRequest(); // \RevKeen\Model\InvoicesUpdateRequest | Invoice update details
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.

try {
    $result = $apiInstance->invoicesUpdate($id, $invoices_update_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **invoices_update_request** | [**\RevKeen\Model\InvoicesUpdateRequest**](../Model/InvoicesUpdateRequest.md)| Invoice update details | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `invoicesVoid()`

```php
invoicesVoid($id, $idempotency_key, $invoices_void_request): \RevKeen\Model\InvoiceResponse
```

Void an invoice

Voids an invoice. Only invoices without recorded payments can be voided. Use refund instead for paid invoices.  ---  **Related endpoints**  - `PUT /invoices/external/batch` — Batch upsert invoices by external ID - `GET /invoices/{id}/usage-explain` — Explain invoice usage charges - `GET /invoices` — List invoices - `POST /invoices` — Create invoice - `GET /invoices/{id}` — Get invoice - `PATCH /invoices/{id}` — Update invoice - `DELETE /invoices/{id}` — Delete invoice - `GET /invoices/{id}/pdf` — Get invoice PDF link  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\InvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$idempotency_key = 'idempotency_key_example'; // string | Stable caller-owned key for this logical mutation. Reuse only with an identical request.
$invoices_void_request = new \RevKeen\Model\InvoicesVoidRequest(); // \RevKeen\Model\InvoicesVoidRequest | Void details

try {
    $result = $apiInstance->invoicesVoid($id, $idempotency_key, $invoices_void_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicesApi->invoicesVoid: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **idempotency_key** | **string**| Stable caller-owned key for this logical mutation. Reuse only with an identical request. | [optional] |
| **invoices_void_request** | [**\RevKeen\Model\InvoicesVoidRequest**](../Model/InvoicesVoidRequest.md)| Void details | [optional] |

### Return type

[**\RevKeen\Model\InvoiceResponse**](../Model/InvoiceResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
