# RevKeen\InvoiceLineItemsApi



All URIs are relative to https://api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**invoiceLineItemsListUsageEvents()**](InvoiceLineItemsApi.md#invoiceLineItemsListUsageEvents) | **GET** /invoice-line-items/{id}/usage-events | List usage events for an invoice line |


## `invoiceLineItemsListUsageEvents()`

```php
invoiceLineItemsListUsageEvents($id, $starting_after, $limit, $include_excluded): \RevKeen\Model\InvoiceLineUsageEventsList
```

List usage events for an invoice line

Trace a usage invoice line back to the billing entries, meter matches, and events that produced it (REV-6228). FK-driven; does not re-rate from live prices.  ---  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 authentication_error` — missing, invalid, expired, or revoked credential. Codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`. Carries a `WWW-Authenticate: Bearer` challenge. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.  **Pagination**  Offset-based with `limit` (default 25, max 100) and `offset`. The response `pagination` block includes `total` and `hasMore`. See [the pagination guide](/docs/fundamentals/pagination) for SDK auto-paging helpers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = RevKeen\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RevKeen\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');


$apiInstance = new RevKeen\Api\InvoiceLineItemsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 11111111-1111-4111-8111-111111111111; // string | Invoice line item ID
$starting_after = 'starting_after_example'; // string | Cursor: return entries with id greater than this value
$limit = 50; // string | Max billed entries to return (default 50, max 100)
$include_excluded = false; // string | When true, also return excluded-but-considered decisions for the line period

try {
    $result = $apiInstance->invoiceLineItemsListUsageEvents($id, $starting_after, $limit, $include_excluded);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoiceLineItemsApi->invoiceLineItemsListUsageEvents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Invoice line item ID | |
| **starting_after** | **string**| Cursor: return entries with id greater than this value | [optional] |
| **limit** | **string**| Max billed entries to return (default 50, max 100) | [optional] |
| **include_excluded** | **string**| When true, also return excluded-but-considered decisions for the line period | [optional] |

### Return type

[**\RevKeen\Model\InvoiceLineUsageEventsList**](../Model/InvoiceLineUsageEventsList.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
