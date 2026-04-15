# RevKeen\EntitlementsApi

Entitlements grant customers access to features, benefits, or content tied to their subscription or purchase. Use these endpoints to list granted entitlements for a customer and to check whether a customer currently has access to a specific benefit.  **Required Scopes:** - &#x60;entitlements:read&#x60; - List and check customer entitlements

All URIs are relative to https://sandbox-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**entitlementsCheck()**](EntitlementsApi.md#entitlementsCheck) | **GET** /entitlements/check | Check entitlement access |
| [**entitlementsList()**](EntitlementsApi.md#entitlementsList) | **GET** /entitlements | List entitlements |


## `entitlementsCheck()`

```php
entitlementsCheck($customer_id, $benefit_key): \RevKeen\Model\EntitlementCheckResponse
```

Check entitlement access

Check if a customer has access to a specific benefit by key. This is the primary endpoint for feature gating and licensing checks.

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


$apiInstance = new RevKeen\Api\EntitlementsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 'customer_id_example'; // string | Customer UUID (required)
$benefit_key = 'benefit_key_example'; // string | Benefit key to check

try {
    $result = $apiInstance->entitlementsCheck($customer_id, $benefit_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EntitlementsApi->entitlementsCheck: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**| Customer UUID (required) | |
| **benefit_key** | **string**| Benefit key to check | |

### Return type

[**\RevKeen\Model\EntitlementCheckResponse**](../Model/EntitlementCheckResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `entitlementsList()`

```php
entitlementsList($customer_id, $include_expired, $benefit_type, $category, $limit, $offset): \RevKeen\Model\EntitlementListResponse
```

List entitlements

Retrieve all entitlements for a customer. Pass `customer_id` as a query parameter. Includes computed access status based on subscription state.

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


$apiInstance = new RevKeen\Api\EntitlementsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 'customer_id_example'; // string | Customer UUID (required)
$include_expired = false; // bool | Include expired entitlements
$benefit_type = 'benefit_type_example'; // string | Filter by benefit type
$category = 'category_example'; // string | Filter by category
$limit = 50; // int | Maximum results (1-100)
$offset = 0; // int | Results to skip

try {
    $result = $apiInstance->entitlementsList($customer_id, $include_expired, $benefit_type, $category, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EntitlementsApi->entitlementsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**| Customer UUID (required) | |
| **include_expired** | **bool**| Include expired entitlements | [optional] [default to false] |
| **benefit_type** | **string**| Filter by benefit type | [optional] |
| **category** | **string**| Filter by category | [optional] |
| **limit** | **int**| Maximum results (1-100) | [optional] [default to 50] |
| **offset** | **int**| Results to skip | [optional] [default to 0] |

### Return type

[**\RevKeen\Model\EntitlementListResponse**](../Model/EntitlementListResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
