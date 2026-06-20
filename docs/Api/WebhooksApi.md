# RevKeen\WebhooksApi

Receive real-time event notifications. Configure endpoints for payment events, invoice updates, and more.  ## Signature Verification  All webhooks include a signature in the &#x60;X-Revkeen-Signature&#x60; header for verification:  &#x60;&#x60;&#x60; X-Revkeen-Signature: t&#x3D;1705689600,v1&#x3D;abc123... &#x60;&#x60;&#x60;  **Node.js Example:** &#x60;&#x60;&#x60;javascript const crypto &#x3D; require(&#39;crypto&#39;);  function verifyWebhook(payload, signature, secret) {   const [timestamp, hash] &#x3D; signature.split(&#39;,&#39;).map(s &#x3D;&gt; s.split(&#39;&#x3D;&#39;)[1]);   const expectedHash &#x3D; crypto     .createHmac(&#39;sha256&#39;, secret)     .update(&#x60;${timestamp}.${payload}&#x60;)     .digest(&#39;hex&#39;);   return crypto.timingSafeEqual(Buffer.from(hash), Buffer.from(expectedHash)); } &#x60;&#x60;&#x60;  ## Event Types  Events use dot notation: &#x60;{resource}.{action}&#x60; - &#x60;payment.succeeded&#x60;, &#x60;payment.failed&#x60; - &#x60;invoice.created&#x60;, &#x60;invoice.paid&#x60;, &#x60;invoice.overdue&#x60; - &#x60;subscription.created&#x60;, &#x60;subscription.canceled&#x60;, &#x60;subscription.renewed&#x60; - &#x60;customer.created&#x60;, &#x60;customer.updated&#x60; - &#x60;checkout.session.completed&#x60;, &#x60;checkout.session.expired&#x60; - &#x60;usage.threshold.reached&#x60;, &#x60;usage.period_finalized&#x60;, &#x60;usage.event.rejected&#x60;  Use wildcards in endpoint configuration: &#x60;invoice.*&#x60; or &#x60;*&#x60; for all events.

All URIs are relative to https://staging-api.revkeen.com/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**webhooksCheckoutSessionCompleted()**](WebhooksApi.md#webhooksCheckoutSessionCompleted) | **POST** /checkout.session.completed | Checkout session completed |
| [**webhooksCheckoutSessionExpired()**](WebhooksApi.md#webhooksCheckoutSessionExpired) | **POST** /checkout.session.expired | Checkout session expired |
| [**webhooksCollectionFailed()**](WebhooksApi.md#webhooksCollectionFailed) | **POST** /collection.failed | Collection failed |
| [**webhooksCollectionIndemnityClaimed()**](WebhooksApi.md#webhooksCollectionIndemnityClaimed) | **POST** /collection.indemnity_claimed | Indemnity claimed |
| [**webhooksCollectionNoticeSent()**](WebhooksApi.md#webhooksCollectionNoticeSent) | **POST** /collection.notice_sent | Advance notice sent |
| [**webhooksCollectionScheduled()**](WebhooksApi.md#webhooksCollectionScheduled) | **POST** /collection.scheduled | Collection scheduled |
| [**webhooksCollectionSucceeded()**](WebhooksApi.md#webhooksCollectionSucceeded) | **POST** /collection.succeeded | Collection succeeded |
| [**webhooksCreditNoteCreated()**](WebhooksApi.md#webhooksCreditNoteCreated) | **POST** /credit_note.created | Credit note created |
| [**webhooksCreditNoteIssued()**](WebhooksApi.md#webhooksCreditNoteIssued) | **POST** /credit_note.issued | Credit note issued |
| [**webhooksCreditNoteVoided()**](WebhooksApi.md#webhooksCreditNoteVoided) | **POST** /credit_note.voided | Credit note voided |
| [**webhooksCustomerCreated()**](WebhooksApi.md#webhooksCustomerCreated) | **POST** /customer.created | Customer created |
| [**webhooksCustomerUpdated()**](WebhooksApi.md#webhooksCustomerUpdated) | **POST** /customer.updated | Customer updated |
| [**webhooksInvoiceCreated()**](WebhooksApi.md#webhooksInvoiceCreated) | **POST** /invoice.created | Invoice created |
| [**webhooksInvoiceOverdue()**](WebhooksApi.md#webhooksInvoiceOverdue) | **POST** /invoice.overdue | Invoice overdue |
| [**webhooksInvoicePaid()**](WebhooksApi.md#webhooksInvoicePaid) | **POST** /invoice.paid | Invoice paid |
| [**webhooksMandateActivated()**](WebhooksApi.md#webhooksMandateActivated) | **POST** /mandate.activated | Mandate activated |
| [**webhooksMandateAuddisRejected()**](WebhooksApi.md#webhooksMandateAuddisRejected) | **POST** /mandate.auddis_rejected | Mandate rejected (AUDDIS) |
| [**webhooksMandateCancelled()**](WebhooksApi.md#webhooksMandateCancelled) | **POST** /mandate.cancelled | Mandate cancelled |
| [**webhooksMandateCreated()**](WebhooksApi.md#webhooksMandateCreated) | **POST** /mandate.created | Mandate created |
| [**webhooksMandateSuspended()**](WebhooksApi.md#webhooksMandateSuspended) | **POST** /mandate.suspended | Mandate suspended |
| [**webhooksOrderCreated()**](WebhooksApi.md#webhooksOrderCreated) | **POST** /order.created | Order created |
| [**webhooksOrderFulfilled()**](WebhooksApi.md#webhooksOrderFulfilled) | **POST** /order.fulfilled | Order fulfilled |
| [**webhooksOrderPaid()**](WebhooksApi.md#webhooksOrderPaid) | **POST** /order.paid | Order paid |
| [**webhooksPaymentFailed()**](WebhooksApi.md#webhooksPaymentFailed) | **POST** /payment.failed | Payment failed |
| [**webhooksPaymentSucceeded()**](WebhooksApi.md#webhooksPaymentSucceeded) | **POST** /payment.succeeded | Payment succeeded |
| [**webhooksRefundCreated()**](WebhooksApi.md#webhooksRefundCreated) | **POST** /refund.created | Refund created |
| [**webhooksRefundSucceeded()**](WebhooksApi.md#webhooksRefundSucceeded) | **POST** /refund.succeeded | Refund succeeded |
| [**webhooksSettlementCreated()**](WebhooksApi.md#webhooksSettlementCreated) | **POST** /settlement.created | Settlement created |
| [**webhooksSubscriptionActivated()**](WebhooksApi.md#webhooksSubscriptionActivated) | **POST** /subscription.activated | Subscription activated |
| [**webhooksSubscriptionCanceled()**](WebhooksApi.md#webhooksSubscriptionCanceled) | **POST** /subscription.canceled | Subscription canceled |
| [**webhooksSubscriptionCreated()**](WebhooksApi.md#webhooksSubscriptionCreated) | **POST** /subscription.created | Subscription created |
| [**webhooksSubscriptionRenewed()**](WebhooksApi.md#webhooksSubscriptionRenewed) | **POST** /subscription.renewed | Subscription renewed |
| [**webhooksTerminalPaymentCancelled()**](WebhooksApi.md#webhooksTerminalPaymentCancelled) | **POST** /terminal_payment.cancelled | Terminal payment cancelled |
| [**webhooksTerminalPaymentDeclined()**](WebhooksApi.md#webhooksTerminalPaymentDeclined) | **POST** /terminal_payment.declined | Terminal payment declined |
| [**webhooksTerminalPaymentError()**](WebhooksApi.md#webhooksTerminalPaymentError) | **POST** /terminal_payment.error | Terminal payment error |
| [**webhooksTerminalPaymentRequested()**](WebhooksApi.md#webhooksTerminalPaymentRequested) | **POST** /terminal_payment.requested | Terminal payment requested |
| [**webhooksTerminalPaymentSucceeded()**](WebhooksApi.md#webhooksTerminalPaymentSucceeded) | **POST** /terminal_payment.succeeded | Terminal payment succeeded |
| [**webhooksTerminalRefundSucceeded()**](WebhooksApi.md#webhooksTerminalRefundSucceeded) | **POST** /terminal_refund.succeeded | Terminal refund succeeded |
| [**webhooksTerminalVoidSucceeded()**](WebhooksApi.md#webhooksTerminalVoidSucceeded) | **POST** /terminal_void.succeeded | Terminal void succeeded |
| [**webhooksUsageEventRejected()**](WebhooksApi.md#webhooksUsageEventRejected) | **POST** /usage.event.rejected | Usage event rejected |
| [**webhooksUsagePeriodFinalized()**](WebhooksApi.md#webhooksUsagePeriodFinalized) | **POST** /usage.period_finalized | Usage period finalized |
| [**webhooksUsageThresholdReached()**](WebhooksApi.md#webhooksUsageThresholdReached) | **POST** /usage.threshold.reached | Usage threshold reached |
| [**webhooksVoidCreated()**](WebhooksApi.md#webhooksVoidCreated) | **POST** /void.created | Void created |
| [**webhooksVoidFailed()**](WebhooksApi.md#webhooksVoidFailed) | **POST** /void.failed | Void failed |
| [**webhooksVoidSucceeded()**](WebhooksApi.md#webhooksVoidSucceeded) | **POST** /void.succeeded | Void succeeded |


## `webhooksCheckoutSessionCompleted()`

```php
webhooksCheckoutSessionCompleted($webhook_event)
```

Checkout session completed

Sent when a checkout session is successfully completed. **Action required:** Fulfill the customer's order.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_k0t1u2v3w4x5","type":"checkout.session.completed","created":1705689600,"livemode":true,"data":{"object":{"id":"cs_abc123","object":"checkout_session","customer_id":"cus_xyz789","payment_id":"pay_abc123","invoice_id":"inv_def456","amount_total":9900,"currency":"usd","status":"complete","success_url":"https://example.com/success"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCheckoutSessionCompleted($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCheckoutSessionCompleted: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCheckoutSessionExpired()`

```php
webhooksCheckoutSessionExpired($webhook_event)
```

Checkout session expired

Sent when a checkout session expires before completion.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_l1u2v3w4x5y6","type":"checkout.session.expired","created":1705689600,"livemode":true,"data":{"object":{"id":"cs_expired456","object":"checkout_session","invoice_id":"inv_def456","amount_total":9900,"currency":"usd","status":"expired","expires_at":"2025-01-20T15:30:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCheckoutSessionExpired($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCheckoutSessionExpired: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCollectionFailed()`

```php
webhooksCollectionFailed($webhook_event)
```

Collection failed

Sent when a Direct Debit collection fails (e.g. insufficient funds). Contains the Bacs reason code. **Action required:** RevKeen Recovery may retry or fall back to a stored card per your policy.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_4c5o6l7l8e9c","type":"collection.failed","created":1706140800,"livemode":true,"data":{"object":{"id":"col_1a2b3c4d5e6f","object":"collection","amount":2500,"currency":"gbp","status":"failed","collection_date":"2026-07-01","mandate_id":"man_8a7b6c5d4e3f","invoice_id":"inv_def456","failure_code":"insufficient_funds","failure_message":"The collection was returned by the customer's bank."}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCollectionFailed($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCollectionFailed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCollectionIndemnityClaimed()`

```php
webhooksCollectionIndemnityClaimed($webhook_event)
```

Indemnity claimed

Sent when a customer raises a Direct Debit indemnity claim (the Bacs chargeback equivalent) and the collection is reversed. **Action required:** Review the disputed collection.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_5c6o7l8l9e0c","type":"collection.indemnity_claimed","created":1706227200,"livemode":true,"data":{"object":{"id":"col_1a2b3c4d5e6f","object":"collection","amount":2500,"currency":"gbp","status":"indemnity_claimed","mandate_id":"man_8a7b6c5d4e3f","invoice_id":"inv_def456"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCollectionIndemnityClaimed($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCollectionIndemnityClaimed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCollectionNoticeSent()`

```php
webhooksCollectionNoticeSent($webhook_event)
```

Advance notice sent

Sent when the mandatory advance notice for an upcoming collection has been issued to the customer.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_2c3o4l5l6e7c","type":"collection.notice_sent","created":1705689600,"livemode":true,"data":{"object":{"id":"col_1a2b3c4d5e6f","object":"collection","amount":2500,"currency":"gbp","status":"scheduled","collection_date":"2026-07-01","notice_date":"2026-06-20","mandate_id":"man_8a7b6c5d4e3f"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCollectionNoticeSent($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCollectionNoticeSent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCollectionScheduled()`

```php
webhooksCollectionScheduled($webhook_event)
```

Collection scheduled

Sent when a Direct Debit collection is scheduled against an active mandate. Includes the working-day collection date.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_1c2o3l4l5e6c","type":"collection.scheduled","created":1705689600,"livemode":true,"data":{"object":{"id":"col_1a2b3c4d5e6f","object":"collection","amount":2500,"currency":"gbp","status":"scheduled","collection_date":"2026-07-01","mandate_id":"man_8a7b6c5d4e3f","invoice_id":"inv_def456"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCollectionScheduled($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCollectionScheduled: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCollectionSucceeded()`

```php
webhooksCollectionSucceeded($webhook_event)
```

Collection succeeded

Sent when a Direct Debit collection is successfully taken. **Action required:** Provision goods or services to your customer.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_3c4o5l6l7e8c","type":"collection.succeeded","created":1706140800,"livemode":true,"data":{"object":{"id":"col_1a2b3c4d5e6f","object":"collection","amount":2500,"currency":"gbp","status":"succeeded","collection_date":"2026-07-01","mandate_id":"man_8a7b6c5d4e3f","invoice_id":"inv_def456"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCollectionSucceeded($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCollectionSucceeded: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCreditNoteCreated()`

```php
webhooksCreditNoteCreated($webhook_event)
```

Credit note created

Sent when a credit note is created for an invoice.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_h7q8r9s0t1u2","type":"credit_note.created","created":1705689600,"livemode":true,"data":{"object":{"id":"cn_abc123","object":"credit_note","invoice_id":"inv_abc123","customer_id":"cus_xyz789","amount_minor":2500,"currency":"usd","status":"draft","reason":"Billing error — incorrect quantity","reason_code":"billing_error"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCreditNoteCreated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCreditNoteCreated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCreditNoteIssued()`

```php
webhooksCreditNoteIssued($webhook_event)
```

Credit note issued

Sent when a credit note is issued (finalized) and its PDF is generated.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_i8r9s0t1u2v3","type":"credit_note.issued","created":1705689600,"livemode":true,"data":{"object":{"id":"cn_abc123","object":"credit_note","credit_note_number":"CN-2025-0007","invoice_id":"inv_abc123","customer_id":"cus_xyz789","amount_minor":2500,"currency":"usd","status":"issued","reason_code":"billing_error","credit_method":"refund_to_payment_method","issued_at":"2025-01-20T14:30:00Z","pdf_url":"https://api.revkeen.com/v2/credit-notes/cn_abc123/pdf"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCreditNoteIssued($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCreditNoteIssued: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCreditNoteVoided()`

```php
webhooksCreditNoteVoided($webhook_event)
```

Credit note voided

Sent when a credit note is voided (accounting reversal).

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_j9s0t1u2v3w4","type":"credit_note.voided","created":1705689600,"livemode":true,"data":{"object":{"id":"cn_abc123","object":"credit_note","credit_note_number":"CN-2025-0007","invoice_id":"inv_abc123","amount_minor":2500,"currency":"usd","status":"void","voided_at":"2025-01-21T10:00:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCreditNoteVoided($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCreditNoteVoided: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCustomerCreated()`

```php
webhooksCustomerCreated($webhook_event)
```

Customer created

Sent when a new customer is created.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_a0j1k2l3m4n5","type":"customer.created","created":1705689600,"livemode":true,"data":{"object":{"id":"cus_new123","object":"customer","email":"jane@example.com","name":"Jane Smith","phone":"+15551234567","created_at":"2025-01-20T14:30:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCustomerCreated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCustomerCreated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksCustomerUpdated()`

```php
webhooksCustomerUpdated($webhook_event)
```

Customer updated

Sent when customer information is updated.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_b1k2l3m4n5o6","type":"customer.updated","created":1705689600,"livemode":true,"data":{"object":{"id":"cus_xyz789","object":"customer","email":"jane.updated@example.com","name":"Jane Smith-Jones","phone":"+15551234567","updated_at":"2025-01-20T15:45:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksCustomerUpdated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCustomerUpdated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksInvoiceCreated()`

```php
webhooksInvoiceCreated($webhook_event)
```

Invoice created

Sent when a new invoice is created, either manually or from a subscription renewal.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_3c4d5e6f7g8h","type":"invoice.created","created":1705689600,"livemode":true,"data":{"object":{"id":"inv_abc123","object":"invoice","customer_id":"cus_xyz789","invoice_number":"INV-2025-0042","total_minor":9900,"currency":"usd","status":"draft","due_date":"2025-02-19T00:00:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksInvoiceCreated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksInvoiceCreated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksInvoiceOverdue()`

```php
webhooksInvoiceOverdue($webhook_event)
```

Invoice overdue

Sent when an invoice becomes overdue. Consider sending payment reminders.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_5e6f7g8h9i0j","type":"invoice.overdue","created":1705689600,"livemode":true,"data":{"object":{"id":"inv_abc123","object":"invoice","customer_id":"cus_xyz789","invoice_number":"INV-2025-0042","total_minor":9900,"currency":"usd","status":"open","due_date":"2025-01-15T00:00:00Z","days_overdue":5}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksInvoiceOverdue($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksInvoiceOverdue: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksInvoicePaid()`

```php
webhooksInvoicePaid($webhook_event)
```

Invoice paid

Sent when an invoice is fully paid. **Action required:** Fulfill the order or activate the subscription.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_4d5e6f7g8h9i","type":"invoice.paid","created":1705689600,"livemode":true,"data":{"object":{"id":"inv_abc123","object":"invoice","customer_id":"cus_xyz789","invoice_number":"INV-2025-0042","total_minor":9900,"currency":"usd","status":"paid","due_date":"2025-02-19T00:00:00Z","paid_at":"2025-01-20T14:30:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksInvoicePaid($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksInvoicePaid: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksMandateActivated()`

```php
webhooksMandateActivated($webhook_event)
```

Mandate activated

Sent when a mandate is lodged and active. **Action required:** You can now collect from this customer via Direct Debit.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_2m3a4n5d6a7t","type":"mandate.activated","created":1705862400,"livemode":true,"data":{"object":{"id":"man_8a7b6c5d4e3f","object":"mandate","mandate_reference":"RK-A1B2C3","customer_id":"cus_xyz789","status":"active","bank_name":"Barclays","account_number_last4":"1234"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksMandateActivated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksMandateActivated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksMandateAuddisRejected()`

```php
webhooksMandateAuddisRejected($webhook_event)
```

Mandate rejected (AUDDIS)

Sent when the customer's bank rejects the mandate setup (AUDDIS). **Action required:** The mandate cannot be used — re-collect bank details or use another payment method.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_3m4a5n6d7a8t","type":"mandate.auddis_rejected","created":1705862400,"livemode":true,"data":{"object":{"id":"man_8a7b6c5d4e3f","object":"mandate","mandate_reference":"RK-A1B2C3","customer_id":"cus_xyz789","status":"failed","failure_code":"auddis_account_holder_deceased","failure_message":"The bank rejected the Direct Debit instruction."}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksMandateAuddisRejected($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksMandateAuddisRejected: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksMandateCancelled()`

```php
webhooksMandateCancelled($webhook_event)
```

Mandate cancelled

Sent when a mandate is cancelled (by you, the customer, or the bank). It can no longer be collected against.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_5m6a7n8d9a0t","type":"mandate.cancelled","created":1705948800,"livemode":true,"data":{"object":{"id":"man_8a7b6c5d4e3f","object":"mandate","mandate_reference":"RK-A1B2C3","customer_id":"cus_xyz789","status":"cancelled"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksMandateCancelled($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksMandateCancelled: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksMandateCreated()`

```php
webhooksMandateCreated($webhook_event)
```

Mandate created

Sent when a Direct Debit mandate is created and submitted to Bacs for lodgement. The mandate is not yet collectable — wait for `mandate.activated`.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_1m2a3n4d5a6t","type":"mandate.created","created":1705689600,"livemode":true,"data":{"object":{"id":"man_8a7b6c5d4e3f","object":"mandate","mandate_reference":"RK-A1B2C3","customer_id":"cus_xyz789","status":"pending_lodgement","bank_name":"Barclays","account_number_last4":"1234"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksMandateCreated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksMandateCreated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksMandateSuspended()`

```php
webhooksMandateSuspended($webhook_event)
```

Mandate suspended

Sent when a mandate is suspended and can no longer be collected against until reinstated.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_4m5a6n7d8a9t","type":"mandate.suspended","created":1705948800,"livemode":true,"data":{"object":{"id":"man_8a7b6c5d4e3f","object":"mandate","mandate_reference":"RK-A1B2C3","customer_id":"cus_xyz789","status":"suspended"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksMandateSuspended($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksMandateSuspended: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksOrderCreated()`

```php
webhooksOrderCreated($webhook_event)
```

Order created

Sent when a new order is created.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_m2v3w4x5y6z7","type":"order.created","created":1705689600,"livemode":true,"data":{"object":{"id":"ord_abc123","object":"order","customer_id":"cus_xyz789","invoice_id":"inv_def456","status":"pending","items":[{"product_id":"prod_abc123","quantity":2,"unit_amount":2500}]}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksOrderCreated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksOrderCreated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksOrderFulfilled()`

```php
webhooksOrderFulfilled($webhook_event)
```

Order fulfilled

Sent when an order is marked as fulfilled.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_v1e2f3g4h5i6","type":"order.fulfilled","created":1705689600,"livemode":true,"data":{"object":{"id":"ord_abc123","object":"order","customer_id":"cus_xyz789","status":"fulfilled","fulfilled_at":"2025-01-21T10:00:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksOrderFulfilled($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksOrderFulfilled: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksOrderPaid()`

```php
webhooksOrderPaid($webhook_event)
```

Order paid

Sent when an order is fully paid. **Action required:** Begin fulfillment.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_n3w4x5y6z7a8","type":"order.paid","created":1705689600,"livemode":true,"data":{"object":{"id":"ord_abc123","object":"order","customer_id":"cus_xyz789","invoice_id":"inv_def456","status":"paid","paid_at":"2025-01-20T14:30:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksOrderPaid($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksOrderPaid: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksPaymentFailed()`

```php
webhooksPaymentFailed($webhook_event)
```

Payment failed

Sent when a payment attempt fails. Contains failure reason and suggested next steps.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_2b3c4d5e6f7g","type":"payment.failed","created":1705689600,"livemode":true,"data":{"object":{"id":"pay_fail123","object":"payment","amount":5000,"currency":"usd","status":"failed","customer_id":"cus_xyz789","invoice_id":"inv_def456","failure_code":"card_declined","failure_message":"Your card was declined. Please try a different payment method."}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksPaymentFailed($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksPaymentFailed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksPaymentSucceeded()`

```php
webhooksPaymentSucceeded($webhook_event)
```

Payment succeeded

Sent when a payment is successfully captured. **Action required:** Provision goods or services to your customer.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_1a2b3c4d5e6f","type":"payment.succeeded","created":1705689600,"livemode":true,"data":{"object":{"id":"pay_abc123","object":"payment","amount":2500,"currency":"usd","status":"succeeded","customer_id":"cus_xyz789","invoice_id":"inv_def456"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksPaymentSucceeded($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksPaymentSucceeded: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksRefundCreated()`

```php
webhooksRefundCreated($webhook_event)
```

Refund created

Sent when a refund is initiated.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_c2l3m4n5o6p7","type":"refund.created","created":1705689600,"livemode":true,"data":{"object":{"id":"ref_abc123","object":"refund","amount":2500,"currency":"usd","status":"pending","payment_id":"pay_abc123","reason":"customer_request"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksRefundCreated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksRefundCreated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksRefundSucceeded()`

```php
webhooksRefundSucceeded($webhook_event)
```

Refund succeeded

Sent when a refund is successfully processed by the payment gateway.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_d3m4n5o6p7q8","type":"refund.succeeded","created":1705689600,"livemode":true,"data":{"object":{"id":"ref_abc123","object":"refund","amount":2500,"currency":"usd","status":"succeeded","payment_id":"pay_abc123","reason":"customer_request"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksRefundSucceeded($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksRefundSucceeded: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksSettlementCreated()`

```php
webhooksSettlementCreated($webhook_event)
```

Settlement created

Sent when collected Direct Debit funds are settled and a payout is created. Gross settlement — the bureau fee is reported separately and never netted from the payout.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_1s2e3t4t5l6e","type":"settlement.created","created":1706313600,"livemode":true,"data":{"object":{"id":"stl_9z8y7x6w5v4u","object":"settlement","amount":2500,"currency":"gbp","settlement_date":"2026-07-03","payout_id":"po_abc123"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksSettlementCreated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksSettlementCreated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksSubscriptionActivated()`

```php
webhooksSubscriptionActivated($webhook_event)
```

Subscription activated

Sent when a subscription becomes active after successful payment. **Action required:** Grant access to your service.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_7g8h9i0j1k2l","type":"subscription.activated","created":1705689600,"livemode":true,"data":{"object":{"id":"sub_abc123","object":"subscription","customer_id":"cus_xyz789","status":"active","current_period_start":"2025-01-20T00:00:00Z","current_period_end":"2025-02-20T00:00:00Z","items":[{"price_id":"price_abc123","quantity":1}]}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksSubscriptionActivated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksSubscriptionActivated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksSubscriptionCanceled()`

```php
webhooksSubscriptionCanceled($webhook_event)
```

Subscription canceled

Sent when a subscription is canceled. Access continues until the end of the billing period.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_8h9i0j1k2l3m","type":"subscription.canceled","created":1705689600,"livemode":true,"data":{"object":{"id":"sub_abc123","object":"subscription","customer_id":"cus_xyz789","status":"canceled","cancel_at_period_end":true,"current_period_end":"2025-02-20T00:00:00Z","canceled_at":"2025-01-20T14:30:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksSubscriptionCanceled($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksSubscriptionCanceled: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksSubscriptionCreated()`

```php
webhooksSubscriptionCreated($webhook_event)
```

Subscription created

Sent when a new subscription is created (before activation).

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_6f7g8h9i0j1k","type":"subscription.created","created":1705689600,"livemode":true,"data":{"object":{"id":"sub_abc123","object":"subscription","customer_id":"cus_xyz789","status":"pending","current_period_start":"2025-01-20T00:00:00Z","current_period_end":"2025-02-20T00:00:00Z","items":[{"price_id":"price_abc123","quantity":1}]}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksSubscriptionCreated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksSubscriptionCreated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksSubscriptionRenewed()`

```php
webhooksSubscriptionRenewed($webhook_event)
```

Subscription renewed

Sent when a subscription successfully renews. A new invoice has been created and paid.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_9i0j1k2l3m4n","type":"subscription.renewed","created":1705689600,"livemode":true,"data":{"object":{"id":"sub_abc123","object":"subscription","customer_id":"cus_xyz789","status":"active","current_period_start":"2025-02-20T00:00:00Z","current_period_end":"2025-03-20T00:00:00Z","latest_invoice_id":"inv_renewal456"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksSubscriptionRenewed($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksSubscriptionRenewed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksTerminalPaymentCancelled()`

```php
webhooksTerminalPaymentCancelled($webhook_event)
```

Terminal payment cancelled

Sent when a card-present payment is cancelled by the merchant before terminal response.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_r7a8b9c0d1e2","type":"terminal_payment.cancelled","created":1705689600,"livemode":true,"data":{"object":{"id":"tpay_can789","object":"terminal_payment","amount":3500,"currency":"usd","status":"cancelled","device_id":"dev_xyz789","terminal_serial":"PAX-A920-001","cancelled_at":"2025-01-20T14:31:00Z"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksTerminalPaymentCancelled($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksTerminalPaymentCancelled: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksTerminalPaymentDeclined()`

```php
webhooksTerminalPaymentDeclined($webhook_event)
```

Terminal payment declined

Sent when a card-present payment is declined by the terminal or card issuer.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_q6z7a8b9c0d1","type":"terminal_payment.declined","created":1705689600,"livemode":true,"data":{"object":{"id":"tpay_dec456","object":"terminal_payment","amount":3500,"currency":"usd","status":"declined","device_id":"dev_xyz789","terminal_serial":"PAX-A920-001","failure_code":"insufficient_funds","failure_message":"Card declined — insufficient funds"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksTerminalPaymentDeclined($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksTerminalPaymentDeclined: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksTerminalPaymentError()`

```php
webhooksTerminalPaymentError($webhook_event)
```

Terminal payment error

Sent when a card-present payment fails due to timeout, terminal error, or connection loss. Check `failure_reason` field: `timeout`, `terminal_error`, or `connection_lost`.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_s8b9c0d1e2f3","type":"terminal_payment.error","created":1705689600,"livemode":true,"data":{"object":{"id":"tpay_err012","object":"terminal_payment","amount":3500,"currency":"usd","status":"error","device_id":"dev_xyz789","terminal_serial":"PAX-A920-001","failure_reason":"timeout","failure_message":"Terminal did not respond within 60 seconds"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksTerminalPaymentError($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksTerminalPaymentError: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksTerminalPaymentRequested()`

```php
webhooksTerminalPaymentRequested($webhook_event)
```

Terminal payment requested

Sent when a card-present payment is dispatched to a terminal device. The payment is in-progress and awaiting terminal response.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_o4x5y6z7a8b9","type":"terminal_payment.requested","created":1705689600,"livemode":true,"data":{"object":{"id":"tpay_abc123","object":"terminal_payment","amount":3500,"currency":"usd","status":"requested","device_id":"dev_xyz789","terminal_serial":"PAX-A920-001","invoice_id":"inv_def456"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksTerminalPaymentRequested($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksTerminalPaymentRequested: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksTerminalPaymentSucceeded()`

```php
webhooksTerminalPaymentSucceeded($webhook_event)
```

Terminal payment succeeded

Sent when a card-present payment is approved by the terminal. **Action required:** Provide goods or services to the customer.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_p5y6z7a8b9c0","type":"terminal_payment.succeeded","created":1705689600,"livemode":true,"data":{"object":{"id":"tpay_abc123","object":"terminal_payment","amount":3500,"currency":"usd","status":"succeeded","device_id":"dev_xyz789","terminal_serial":"PAX-A920-001","invoice_id":"inv_def456","card_brand":"visa","last_four":"4242","auth_code":"A12345"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksTerminalPaymentSucceeded($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksTerminalPaymentSucceeded: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksTerminalRefundSucceeded()`

```php
webhooksTerminalRefundSucceeded($webhook_event)
```

Terminal refund succeeded

Sent when a card-present refund is approved by the terminal.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_t9c0d1e2f3g4","type":"terminal_refund.succeeded","created":1705689600,"livemode":true,"data":{"object":{"id":"tref_abc123","object":"terminal_refund","amount":1500,"currency":"usd","status":"succeeded","payment_id":"tpay_abc123","device_id":"dev_xyz789","terminal_serial":"PAX-A920-001"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksTerminalRefundSucceeded($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksTerminalRefundSucceeded: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksTerminalVoidSucceeded()`

```php
webhooksTerminalVoidSucceeded($webhook_event)
```

Terminal void succeeded

Sent when a card-present void is approved by the terminal. The original transaction has been reversed.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_u0d1e2f3g4h5","type":"terminal_void.succeeded","created":1705689600,"livemode":true,"data":{"object":{"id":"tvoid_abc123","object":"terminal_void","amount":3500,"currency":"usd","status":"succeeded","payment_id":"tpay_abc123","device_id":"dev_xyz789","terminal_serial":"PAX-A920-001"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksTerminalVoidSucceeded($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksTerminalVoidSucceeded: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksUsageEventRejected()`

```php
webhooksUsageEventRejected($webhook_event)
```

Usage event rejected

Sent when a usage event is rejected during ingestion (validation failure) or asynchronously by ClickHouse (malformed message, ~60s delay).

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_x3g4h5i6j7k8","type":"usage.event.rejected","created":1710518400,"livemode":true,"data":{"object":{"meter_id":"a1b2c3d4-e5f6-7890-abcd-ef1234567890","customer_id":"cus_xyz789","event_id":"usage_evt_abc123","rejection_reason":"validation_failed","rejection_message":"Property 'quantity' must be a positive number"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksUsageEventRejected($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksUsageEventRejected: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksUsagePeriodFinalized()`

```php
webhooksUsagePeriodFinalized($webhook_event)
```

Usage period finalized

Sent when a billing period is finalized with final usage quantities. An invoice will be generated shortly after.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_w2f3g4h5i6j7","type":"usage.period_finalized","created":1710518400,"livemode":true,"data":{"object":{"meter_id":"a1b2c3d4-e5f6-7890-abcd-ef1234567890","customer_id":"cus_xyz789","period_start":"2025-02-01T00:00:00Z","period_end":"2025-03-01T00:00:00Z","total_usage":12500,"included_quantity":10000,"overage_quantity":2500}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksUsagePeriodFinalized($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksUsagePeriodFinalized: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksUsageThresholdReached()`

```php
webhooksUsageThresholdReached($webhook_event)
```

Usage threshold reached

Sent when a customer's usage crosses a configured threshold percentage on a meter. Use this to alert customers approaching or exceeding their included allowance.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_1a2b3c4d5e6f","type":"usage.threshold.reached","created":1710518400,"livemode":true,"data":{"object":{"meter_id":"a1b2c3d4-e5f6-7890-abcd-ef1234567890","customer_id":"cus_xyz789","threshold":80,"current_usage":8500,"included_quantity":10000}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksUsageThresholdReached($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksUsageThresholdReached: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksVoidCreated()`

```php
webhooksVoidCreated($webhook_event)
```

Void created

Sent when a void is initiated for an unsettled transaction.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_e4n5o6p7q8r9","type":"void.created","created":1705689600,"livemode":true,"data":{"object":{"id":"void_abc123","object":"void","amount":5000,"currency":"usd","status":"pending","payment_id":"pay_abc123","reason":"duplicate_charge"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksVoidCreated($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksVoidCreated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksVoidFailed()`

```php
webhooksVoidFailed($webhook_event)
```

Void failed

Sent when a void fails (e.g., transaction already settled). Consider using a refund instead.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_g6p7q8r9s0t1","type":"void.failed","created":1705689600,"livemode":true,"data":{"object":{"id":"void_abc123","object":"void","amount":5000,"currency":"usd","status":"failed","payment_id":"pay_abc123","failure_reason":"Transaction already settled. Use a refund instead."}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksVoidFailed($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksVoidFailed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksVoidSucceeded()`

```php
webhooksVoidSucceeded($webhook_event)
```

Void succeeded

Sent when a void is successfully processed by the payment gateway. The original transaction has been canceled.

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


$apiInstance = new RevKeen\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_event = {"id":"evt_f5o6p7q8r9s0","type":"void.succeeded","created":1705689600,"livemode":true,"data":{"object":{"id":"void_abc123","object":"void","amount":5000,"currency":"usd","status":"succeeded","payment_id":"pay_abc123","reason":"duplicate_charge"}}}; // \RevKeen\Model\WebhookEvent

try {
    $apiInstance->webhooksVoidSucceeded($webhook_event);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksVoidSucceeded: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_event** | [**\RevKeen\Model\WebhookEvent**](../Model/WebhookEvent.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[apiKey](../../README.md#apiKey), [oauth2](../../README.md#oauth2), [oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
