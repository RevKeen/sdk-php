# RevKeen\TransactionsApi

Transactions represent all financial movements in the unified transaction model. This includes sales, refunds, voids, captures, disputes, and adjustments. Every transaction is linked to an invoice and child transactions reference their parent.  **Required Scopes:** - &#x60;payments:read&#x60; - List and retrieve transactions

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**transactionsList()**](TransactionsApi.md#transactionsList) | **GET** /transactions | List transactions |
| [**transactionsRetrieve()**](TransactionsApi.md#transactionsRetrieve) | **GET** /transactions/{id} | Get transaction by ID |


## `transactionsList()`

```php
transactionsList($type, $status, $customer_id, $invoice_id, $created_gte, $created_lte, $limit, $starting_after, $ending_before): \RevKeen\Model\TransactionListResponse
```

List transactions

List all transactions for the authenticated merchant. Transactions represent the unified financial truth — every sale, refund, void, capture, dispute, and adjustment.

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


$apiInstance = new RevKeen\Api\TransactionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type = 'type_example'; // string | Filter by transaction type
$status = 'status_example'; // string | Filter by status
$customer_id = 'customer_id_example'; // string | Filter by customer ID
$invoice_id = 'invoice_id_example'; // string | Filter by invoice ID
$created_gte = 3.4; // float | Filter by created_at >= (Unix timestamp)
$created_lte = 3.4; // float | Filter by created_at <= (Unix timestamp)
$limit = 20; // int | Maximum number of results (1-100)
$starting_after = 'starting_after_example'; // string | Cursor for pagination - return results after this ID
$ending_before = 'ending_before_example'; // string | Cursor for pagination - return results before this ID

try {
    $result = $apiInstance->transactionsList($type, $status, $customer_id, $invoice_id, $created_gte, $created_lte, $limit, $starting_after, $ending_before);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionsApi->transactionsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | **string**| Filter by transaction type | [optional] |
| **status** | **string**| Filter by status | [optional] |
| **customer_id** | **string**| Filter by customer ID | [optional] |
| **invoice_id** | **string**| Filter by invoice ID | [optional] |
| **created_gte** | **float**| Filter by created_at &gt;&#x3D; (Unix timestamp) | [optional] |
| **created_lte** | **float**| Filter by created_at &lt;&#x3D; (Unix timestamp) | [optional] |
| **limit** | **int**| Maximum number of results (1-100) | [optional] [default to 20] |
| **starting_after** | **string**| Cursor for pagination - return results after this ID | [optional] |
| **ending_before** | **string**| Cursor for pagination - return results before this ID | [optional] |

### Return type

[**\RevKeen\Model\TransactionListResponse**](../Model/TransactionListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `transactionsRetrieve()`

```php
transactionsRetrieve($id): \RevKeen\Model\TransactionRetrieveResponse
```

Get transaction by ID

Retrieve a single transaction by its ID.

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


$apiInstance = new RevKeen\Api\TransactionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Transaction UUID

try {
    $result = $apiInstance->transactionsRetrieve($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionsApi->transactionsRetrieve: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Transaction UUID | |

### Return type

[**\RevKeen\Model\TransactionRetrieveResponse**](../Model/TransactionRetrieveResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
