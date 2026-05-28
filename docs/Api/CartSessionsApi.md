# RevKeen\CartSessionsApi



All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cartSessionsAddLineItem()**](CartSessionsApi.md#cartSessionsAddLineItem) | **POST** /cart-sessions/{id}/line-items | Add a line item to a cart session |
| [**cartSessionsApplyDiscountCode()**](CartSessionsApi.md#cartSessionsApplyDiscountCode) | **POST** /cart-sessions/{id}/discount-code | Set or clear a cart discount code |
| [**cartSessionsConvert()**](CartSessionsApi.md#cartSessionsConvert) | **POST** /cart-sessions/{id}/convert | Convert a cart session into a checkout session |
| [**cartSessionsCreate()**](CartSessionsApi.md#cartSessionsCreate) | **POST** /cart-sessions | Create a cart session |
| [**cartSessionsGet()**](CartSessionsApi.md#cartSessionsGet) | **GET** /cart-sessions/{id} | Retrieve a cart session |
| [**cartSessionsRemoveLineItem()**](CartSessionsApi.md#cartSessionsRemoveLineItem) | **DELETE** /cart-sessions/{id}/line-items/{lineId} | Remove a line item from a cart session |
| [**cartSessionsToggleAddOn()**](CartSessionsApi.md#cartSessionsToggleAddOn) | **POST** /cart-sessions/{id}/add-ons | Toggle an add-on on a cart session |
| [**cartSessionsUpdateLineItem()**](CartSessionsApi.md#cartSessionsUpdateLineItem) | **PATCH** /cart-sessions/{id}/line-items/{lineId} | Update a line item&#39;s quantity |


## `cartSessionsAddLineItem()`

```php
cartSessionsAddLineItem($id, $cart_line_item_input): \RevKeen\Model\CartSessionResponse
```

Add a line item to a cart session

Append a line item to an open cart session. Subtotals are recomputed atomically; the updated cart is returned.  ---  **Related endpoints**  - `POST /cart-sessions` — Create a cart session - `GET /cart-sessions/{id}` — Retrieve a cart session - `PATCH /cart-sessions/{id}/line-items/{lineId}` — Update a line item's quantity - `DELETE /cart-sessions/{id}/line-items/{lineId}` — Remove a line item from a cart session - `POST /cart-sessions/{id}/add-ons` — Toggle an add-on on a cart session - `POST /cart-sessions/{id}/discount-code` — Set or clear a cart discount code - `POST /cart-sessions/{id}/convert` — Convert a cart session into a checkout session  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CartSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string
$cart_line_item_input = new \RevKeen\Model\CartLineItemInput(); // \RevKeen\Model\CartLineItemInput

try {
    $result = $apiInstance->cartSessionsAddLineItem($id, $cart_line_item_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartSessionsApi->cartSessionsAddLineItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **cart_line_item_input** | [**\RevKeen\Model\CartLineItemInput**](../Model/CartLineItemInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CartSessionResponse**](../Model/CartSessionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cartSessionsApplyDiscountCode()`

```php
cartSessionsApplyDiscountCode($id, $apply_cart_discount_code_input): \RevKeen\Model\CartSessionResponse
```

Set or clear a cart discount code

Set the cart's discount code. Pass `null` to clear. The code is stored only — discount pricing math has not shipped yet. Convert blocks with `CART_SESSION_DISCOUNT_PENDING` while a code is set.  ---  **Related endpoints**  - `POST /cart-sessions` — Create a cart session - `GET /cart-sessions/{id}` — Retrieve a cart session - `POST /cart-sessions/{id}/line-items` — Add a line item to a cart session - `PATCH /cart-sessions/{id}/line-items/{lineId}` — Update a line item's quantity - `DELETE /cart-sessions/{id}/line-items/{lineId}` — Remove a line item from a cart session - `POST /cart-sessions/{id}/add-ons` — Toggle an add-on on a cart session - `POST /cart-sessions/{id}/convert` — Convert a cart session into a checkout session  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CartSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string
$apply_cart_discount_code_input = new \RevKeen\Model\ApplyCartDiscountCodeInput(); // \RevKeen\Model\ApplyCartDiscountCodeInput

try {
    $result = $apiInstance->cartSessionsApplyDiscountCode($id, $apply_cart_discount_code_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartSessionsApi->cartSessionsApplyDiscountCode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **apply_cart_discount_code_input** | [**\RevKeen\Model\ApplyCartDiscountCodeInput**](../Model/ApplyCartDiscountCodeInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CartSessionResponse**](../Model/CartSessionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cartSessionsConvert()`

```php
cartSessionsConvert($id): \RevKeen\Model\CartConversionResponse
```

Convert a cart session into a checkout session

Atomically materialise a pending checkout session from the cart snapshot, flip the cart to `converted`, and emit `commerce.cart.converted` + `commerce.checkout.started` through the outbox.  Idempotent on re-call (returns the existing checkout session). Concurrency-safe via a compare-and-swap lock on cart status.  Validation that runs inside the lock and rolls back on failure: - `CART_SESSION_EMPTY` — the cart has no line items. - `CART_SESSION_DISCOUNT_PENDING` — the cart has a discount code set; clear it first. - `CART_SESSION_NOT_FOUND` — no cart for this id under the calling merchant. - `CART_SESSION_CLOSED` — the cart is already `abandoned` or `expired`.  On rollback the cart returns to `open` and the customer can retry after fixing the cause.  ---  **Related endpoints**  - `POST /cart-sessions` — Create a cart session - `GET /cart-sessions/{id}` — Retrieve a cart session - `POST /cart-sessions/{id}/line-items` — Add a line item to a cart session - `PATCH /cart-sessions/{id}/line-items/{lineId}` — Update a line item's quantity - `DELETE /cart-sessions/{id}/line-items/{lineId}` — Remove a line item from a cart session - `POST /cart-sessions/{id}/add-ons` — Toggle an add-on on a cart session - `POST /cart-sessions/{id}/discount-code` — Set or clear a cart discount code  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CartSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string

try {
    $result = $apiInstance->cartSessionsConvert($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartSessionsApi->cartSessionsConvert: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\CartConversionResponse**](../Model/CartConversionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cartSessionsCreate()`

```php
cartSessionsCreate($create_cart_session_input): \RevKeen\Model\CartSessionResponse
```

Create a cart session

Create an empty (or pre-populated) cart session. The returned cart is `open` and mutable until it is converted into a checkout session, or until it is swept to `abandoned` / `expired`.  ---  **Related endpoints**  - `GET /cart-sessions/{id}` — Retrieve a cart session - `POST /cart-sessions/{id}/convert` — Convert to a checkout session  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).  ---  **Related endpoints**  - `GET /cart-sessions/{id}` — Retrieve a cart session - `POST /cart-sessions/{id}/line-items` — Add a line item to a cart session - `PATCH /cart-sessions/{id}/line-items/{lineId}` — Update a line item's quantity - `DELETE /cart-sessions/{id}/line-items/{lineId}` — Remove a line item from a cart session - `POST /cart-sessions/{id}/add-ons` — Toggle an add-on on a cart session - `POST /cart-sessions/{id}/discount-code` — Set or clear a cart discount code - `POST /cart-sessions/{id}/convert` — Convert a cart session into a checkout session  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CartSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_cart_session_input = new \RevKeen\Model\CreateCartSessionInput(); // \RevKeen\Model\CreateCartSessionInput

try {
    $result = $apiInstance->cartSessionsCreate($create_cart_session_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartSessionsApi->cartSessionsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_cart_session_input** | [**\RevKeen\Model\CreateCartSessionInput**](../Model/CreateCartSessionInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CartSessionResponse**](../Model/CartSessionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cartSessionsGet()`

```php
cartSessionsGet($id): \RevKeen\Model\CartSessionResponse
```

Retrieve a cart session

Fetch the current state of a cart session by id. Returns the same shape as the create response.  ---  **Related endpoints**  - `POST /cart-sessions` — Create a cart session - `POST /cart-sessions/{id}/line-items` — Add a line item to a cart session - `PATCH /cart-sessions/{id}/line-items/{lineId}` — Update a line item's quantity - `DELETE /cart-sessions/{id}/line-items/{lineId}` — Remove a line item from a cart session - `POST /cart-sessions/{id}/add-ons` — Toggle an add-on on a cart session - `POST /cart-sessions/{id}/discount-code` — Set or clear a cart discount code - `POST /cart-sessions/{id}/convert` — Convert a cart session into a checkout session  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key.

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


$apiInstance = new RevKeen\Api\CartSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string

try {
    $result = $apiInstance->cartSessionsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartSessionsApi->cartSessionsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\RevKeen\Model\CartSessionResponse**](../Model/CartSessionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cartSessionsRemoveLineItem()`

```php
cartSessionsRemoveLineItem($id, $line_id): \RevKeen\Model\CartSessionResponse
```

Remove a line item from a cart session

Remove a line item from an open cart. Subtotals are recomputed; the updated cart is returned.  ---  **Related endpoints**  - `POST /cart-sessions` — Create a cart session - `GET /cart-sessions/{id}` — Retrieve a cart session - `POST /cart-sessions/{id}/line-items` — Add a line item to a cart session - `PATCH /cart-sessions/{id}/line-items/{lineId}` — Update a line item's quantity - `POST /cart-sessions/{id}/add-ons` — Toggle an add-on on a cart session - `POST /cart-sessions/{id}/discount-code` — Set or clear a cart discount code - `POST /cart-sessions/{id}/convert` — Convert a cart session into a checkout session  **Common errors**  - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CartSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string
$line_id = cli_550e8400-e29b-41d4-a716-446655440000; // string | Cart line item id (the `id` field returned on `cart_session.line_items[]`).

try {
    $result = $apiInstance->cartSessionsRemoveLineItem($id, $line_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartSessionsApi->cartSessionsRemoveLineItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **line_id** | **string**| Cart line item id (the &#x60;id&#x60; field returned on &#x60;cart_session.line_items[]&#x60;). | |

### Return type

[**\RevKeen\Model\CartSessionResponse**](../Model/CartSessionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cartSessionsToggleAddOn()`

```php
cartSessionsToggleAddOn($id, $toggle_cart_add_on_input): \RevKeen\Model\CartSessionResponse
```

Toggle an add-on on a cart session

Add or remove an add-on product from `add_ons_selected`. The call is idempotent: sending the same desired state for an add-on already in that state is a no-op and emits no event.  ---  **Related endpoints**  - `POST /cart-sessions` — Create a cart session - `GET /cart-sessions/{id}` — Retrieve a cart session - `POST /cart-sessions/{id}/line-items` — Add a line item to a cart session - `PATCH /cart-sessions/{id}/line-items/{lineId}` — Update a line item's quantity - `DELETE /cart-sessions/{id}/line-items/{lineId}` — Remove a line item from a cart session - `POST /cart-sessions/{id}/discount-code` — Set or clear a cart discount code - `POST /cart-sessions/{id}/convert` — Convert a cart session into a checkout session  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CartSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string
$toggle_cart_add_on_input = new \RevKeen\Model\ToggleCartAddOnInput(); // \RevKeen\Model\ToggleCartAddOnInput

try {
    $result = $apiInstance->cartSessionsToggleAddOn($id, $toggle_cart_add_on_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartSessionsApi->cartSessionsToggleAddOn: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **toggle_cart_add_on_input** | [**\RevKeen\Model\ToggleCartAddOnInput**](../Model/ToggleCartAddOnInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CartSessionResponse**](../Model/CartSessionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cartSessionsUpdateLineItem()`

```php
cartSessionsUpdateLineItem($id, $line_id, $update_cart_line_item_input): \RevKeen\Model\CartSessionResponse
```

Update a line item's quantity

Change the quantity of a single line item on an open cart. Other fields on the line item are immutable; recreate the item to change them.  ---  **Related endpoints**  - `POST /cart-sessions` — Create a cart session - `GET /cart-sessions/{id}` — Retrieve a cart session - `POST /cart-sessions/{id}/line-items` — Add a line item to a cart session - `DELETE /cart-sessions/{id}/line-items/{lineId}` — Remove a line item from a cart session - `POST /cart-sessions/{id}/add-ons` — Toggle an add-on on a cart session - `POST /cart-sessions/{id}/discount-code` — Set or clear a cart discount code - `POST /cart-sessions/{id}/convert` — Convert a cart session into a checkout session  **Common errors**  - `400 invalid_request` — malformed payload or failed validation. - `401 unauthenticated` — missing, malformed, or revoked API key. - `404 resource_missing` — the referenced resource does not exist or is not visible to your key. - `409 conflict` — Idempotency-Key collision with a different body, or a concurrent state-transition conflict.  **Idempotency**  Pass an `Idempotency-Key` header (UUID v4 recommended) to make retries safe. Keys are valid for 24 hours; see [the idempotency guide](/docs/fundamentals/idempotency).

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


$apiInstance = new RevKeen\Api\CartSessionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 550e8400-e29b-41d4-a716-446655440000; // string
$line_id = cli_550e8400-e29b-41d4-a716-446655440000; // string | Cart line item id (the `id` field returned on `cart_session.line_items[]`).
$update_cart_line_item_input = new \RevKeen\Model\UpdateCartLineItemInput(); // \RevKeen\Model\UpdateCartLineItemInput

try {
    $result = $apiInstance->cartSessionsUpdateLineItem($id, $line_id, $update_cart_line_item_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CartSessionsApi->cartSessionsUpdateLineItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **line_id** | **string**| Cart line item id (the &#x60;id&#x60; field returned on &#x60;cart_session.line_items[]&#x60;). | |
| **update_cart_line_item_input** | [**\RevKeen\Model\UpdateCartLineItemInput**](../Model/UpdateCartLineItemInput.md)|  | [optional] |

### Return type

[**\RevKeen\Model\CartSessionResponse**](../Model/CartSessionResponse.md)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
