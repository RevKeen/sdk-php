<?php
/**
 * WebhooksApi
 * PHP version 8.1
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * RevKeen API
 *
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `cart:read` | View cart session details (REV-3511) | |  | `cart:write` | Create and mutate cart sessions, line items, add-ons (REV-3511) | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `entitlements:read` | View customer entitlements / feature access | |  | `entitlements:write` | Grant and revoke customer entitlements | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Direct Debit** | `mandates:read` | View Direct Debit mandates and collection status | |  | `mandates:write` | Create, suspend, reinstate, and cancel Direct Debit mandates | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Staging** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
 *
 * The version of the OpenAPI document: 2026-05-01
 * Contact: info@revkeen.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.18.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace RevKeen\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RevKeen\ApiException;
use RevKeen\Configuration;
use RevKeen\FormDataProcessor;
use RevKeen\HeaderSelector;
use RevKeen\ObjectSerializer;

/**
 * WebhooksApi Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class WebhooksApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'webhooksCheckoutSessionCompleted' => [
            'application/json',
        ],
        'webhooksCheckoutSessionExpired' => [
            'application/json',
        ],
        'webhooksCollectionFailed' => [
            'application/json',
        ],
        'webhooksCollectionIndemnityClaimed' => [
            'application/json',
        ],
        'webhooksCollectionNoticeSent' => [
            'application/json',
        ],
        'webhooksCollectionScheduled' => [
            'application/json',
        ],
        'webhooksCollectionSucceeded' => [
            'application/json',
        ],
        'webhooksCreditNoteCreated' => [
            'application/json',
        ],
        'webhooksCreditNoteIssued' => [
            'application/json',
        ],
        'webhooksCreditNoteVoided' => [
            'application/json',
        ],
        'webhooksCustomerCreated' => [
            'application/json',
        ],
        'webhooksCustomerUpdated' => [
            'application/json',
        ],
        'webhooksInvoiceCreated' => [
            'application/json',
        ],
        'webhooksInvoiceOverdue' => [
            'application/json',
        ],
        'webhooksInvoicePaid' => [
            'application/json',
        ],
        'webhooksMandateActivated' => [
            'application/json',
        ],
        'webhooksMandateAuddisRejected' => [
            'application/json',
        ],
        'webhooksMandateCancelled' => [
            'application/json',
        ],
        'webhooksMandateCreated' => [
            'application/json',
        ],
        'webhooksMandateSuspended' => [
            'application/json',
        ],
        'webhooksOrderCreated' => [
            'application/json',
        ],
        'webhooksOrderFulfilled' => [
            'application/json',
        ],
        'webhooksOrderPaid' => [
            'application/json',
        ],
        'webhooksPaymentFailed' => [
            'application/json',
        ],
        'webhooksPaymentSucceeded' => [
            'application/json',
        ],
        'webhooksRefundCreated' => [
            'application/json',
        ],
        'webhooksRefundSucceeded' => [
            'application/json',
        ],
        'webhooksSettlementCreated' => [
            'application/json',
        ],
        'webhooksSubscriptionActivated' => [
            'application/json',
        ],
        'webhooksSubscriptionCanceled' => [
            'application/json',
        ],
        'webhooksSubscriptionCreated' => [
            'application/json',
        ],
        'webhooksSubscriptionRenewed' => [
            'application/json',
        ],
        'webhooksTerminalPaymentCancelled' => [
            'application/json',
        ],
        'webhooksTerminalPaymentDeclined' => [
            'application/json',
        ],
        'webhooksTerminalPaymentError' => [
            'application/json',
        ],
        'webhooksTerminalPaymentRequested' => [
            'application/json',
        ],
        'webhooksTerminalPaymentSucceeded' => [
            'application/json',
        ],
        'webhooksTerminalRefundSucceeded' => [
            'application/json',
        ],
        'webhooksTerminalVoidSucceeded' => [
            'application/json',
        ],
        'webhooksUsageEventRejected' => [
            'application/json',
        ],
        'webhooksUsagePeriodFinalized' => [
            'application/json',
        ],
        'webhooksUsageThresholdReached' => [
            'application/json',
        ],
        'webhooksVoidCreated' => [
            'application/json',
        ],
        'webhooksVoidFailed' => [
            'application/json',
        ],
        'webhooksVoidSucceeded' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ?ClientInterface $client = null,
        ?Configuration $config = null,
        ?HeaderSelector $selector = null,
        int $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation webhooksCheckoutSessionCompleted
     *
     * Checkout session completed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionCompleted'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCheckoutSessionCompleted($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionCompleted'][0])
    {
        $this->webhooksCheckoutSessionCompletedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCheckoutSessionCompletedWithHttpInfo
     *
     * Checkout session completed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionCompleted'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCheckoutSessionCompletedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionCompleted'][0])
    {
        $request = $this->webhooksCheckoutSessionCompletedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCheckoutSessionCompletedAsync
     *
     * Checkout session completed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionCompleted'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCheckoutSessionCompletedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionCompleted'][0])
    {
        return $this->webhooksCheckoutSessionCompletedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCheckoutSessionCompletedAsyncWithHttpInfo
     *
     * Checkout session completed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionCompleted'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCheckoutSessionCompletedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionCompleted'][0])
    {
        $returnType = '';
        $request = $this->webhooksCheckoutSessionCompletedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCheckoutSessionCompleted'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionCompleted'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCheckoutSessionCompletedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionCompleted'][0])
    {



        $resourcePath = '/checkout.session.completed';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCheckoutSessionExpired
     *
     * Checkout session expired
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionExpired'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCheckoutSessionExpired($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionExpired'][0])
    {
        $this->webhooksCheckoutSessionExpiredWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCheckoutSessionExpiredWithHttpInfo
     *
     * Checkout session expired
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionExpired'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCheckoutSessionExpiredWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionExpired'][0])
    {
        $request = $this->webhooksCheckoutSessionExpiredRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCheckoutSessionExpiredAsync
     *
     * Checkout session expired
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionExpired'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCheckoutSessionExpiredAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionExpired'][0])
    {
        return $this->webhooksCheckoutSessionExpiredAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCheckoutSessionExpiredAsyncWithHttpInfo
     *
     * Checkout session expired
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionExpired'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCheckoutSessionExpiredAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionExpired'][0])
    {
        $returnType = '';
        $request = $this->webhooksCheckoutSessionExpiredRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCheckoutSessionExpired'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCheckoutSessionExpired'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCheckoutSessionExpiredRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCheckoutSessionExpired'][0])
    {



        $resourcePath = '/checkout.session.expired';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCollectionFailed
     *
     * Collection failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionFailed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCollectionFailed($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionFailed'][0])
    {
        $this->webhooksCollectionFailedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCollectionFailedWithHttpInfo
     *
     * Collection failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionFailed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCollectionFailedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionFailed'][0])
    {
        $request = $this->webhooksCollectionFailedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCollectionFailedAsync
     *
     * Collection failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionFailed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionFailedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionFailed'][0])
    {
        return $this->webhooksCollectionFailedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCollectionFailedAsyncWithHttpInfo
     *
     * Collection failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionFailed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionFailedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionFailed'][0])
    {
        $returnType = '';
        $request = $this->webhooksCollectionFailedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCollectionFailed'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionFailed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCollectionFailedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionFailed'][0])
    {



        $resourcePath = '/collection.failed';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCollectionIndemnityClaimed
     *
     * Indemnity claimed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionIndemnityClaimed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCollectionIndemnityClaimed($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionIndemnityClaimed'][0])
    {
        $this->webhooksCollectionIndemnityClaimedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCollectionIndemnityClaimedWithHttpInfo
     *
     * Indemnity claimed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionIndemnityClaimed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCollectionIndemnityClaimedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionIndemnityClaimed'][0])
    {
        $request = $this->webhooksCollectionIndemnityClaimedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCollectionIndemnityClaimedAsync
     *
     * Indemnity claimed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionIndemnityClaimed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionIndemnityClaimedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionIndemnityClaimed'][0])
    {
        return $this->webhooksCollectionIndemnityClaimedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCollectionIndemnityClaimedAsyncWithHttpInfo
     *
     * Indemnity claimed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionIndemnityClaimed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionIndemnityClaimedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionIndemnityClaimed'][0])
    {
        $returnType = '';
        $request = $this->webhooksCollectionIndemnityClaimedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCollectionIndemnityClaimed'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionIndemnityClaimed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCollectionIndemnityClaimedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionIndemnityClaimed'][0])
    {



        $resourcePath = '/collection.indemnity_claimed';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCollectionNoticeSent
     *
     * Advance notice sent
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionNoticeSent'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCollectionNoticeSent($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionNoticeSent'][0])
    {
        $this->webhooksCollectionNoticeSentWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCollectionNoticeSentWithHttpInfo
     *
     * Advance notice sent
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionNoticeSent'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCollectionNoticeSentWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionNoticeSent'][0])
    {
        $request = $this->webhooksCollectionNoticeSentRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCollectionNoticeSentAsync
     *
     * Advance notice sent
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionNoticeSent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionNoticeSentAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionNoticeSent'][0])
    {
        return $this->webhooksCollectionNoticeSentAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCollectionNoticeSentAsyncWithHttpInfo
     *
     * Advance notice sent
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionNoticeSent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionNoticeSentAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionNoticeSent'][0])
    {
        $returnType = '';
        $request = $this->webhooksCollectionNoticeSentRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCollectionNoticeSent'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionNoticeSent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCollectionNoticeSentRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionNoticeSent'][0])
    {



        $resourcePath = '/collection.notice_sent';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCollectionScheduled
     *
     * Collection scheduled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionScheduled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCollectionScheduled($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionScheduled'][0])
    {
        $this->webhooksCollectionScheduledWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCollectionScheduledWithHttpInfo
     *
     * Collection scheduled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionScheduled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCollectionScheduledWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionScheduled'][0])
    {
        $request = $this->webhooksCollectionScheduledRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCollectionScheduledAsync
     *
     * Collection scheduled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionScheduled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionScheduledAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionScheduled'][0])
    {
        return $this->webhooksCollectionScheduledAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCollectionScheduledAsyncWithHttpInfo
     *
     * Collection scheduled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionScheduled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionScheduledAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionScheduled'][0])
    {
        $returnType = '';
        $request = $this->webhooksCollectionScheduledRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCollectionScheduled'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionScheduled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCollectionScheduledRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionScheduled'][0])
    {



        $resourcePath = '/collection.scheduled';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCollectionSucceeded
     *
     * Collection succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCollectionSucceeded($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionSucceeded'][0])
    {
        $this->webhooksCollectionSucceededWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCollectionSucceededWithHttpInfo
     *
     * Collection succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCollectionSucceededWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionSucceeded'][0])
    {
        $request = $this->webhooksCollectionSucceededRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCollectionSucceededAsync
     *
     * Collection succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionSucceededAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionSucceeded'][0])
    {
        return $this->webhooksCollectionSucceededAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCollectionSucceededAsyncWithHttpInfo
     *
     * Collection succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCollectionSucceededAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionSucceeded'][0])
    {
        $returnType = '';
        $request = $this->webhooksCollectionSucceededRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCollectionSucceeded'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCollectionSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCollectionSucceededRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCollectionSucceeded'][0])
    {



        $resourcePath = '/collection.succeeded';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCreditNoteCreated
     *
     * Credit note created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCreditNoteCreated($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteCreated'][0])
    {
        $this->webhooksCreditNoteCreatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCreditNoteCreatedWithHttpInfo
     *
     * Credit note created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCreditNoteCreatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteCreated'][0])
    {
        $request = $this->webhooksCreditNoteCreatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCreditNoteCreatedAsync
     *
     * Credit note created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCreditNoteCreatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteCreated'][0])
    {
        return $this->webhooksCreditNoteCreatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCreditNoteCreatedAsyncWithHttpInfo
     *
     * Credit note created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCreditNoteCreatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteCreated'][0])
    {
        $returnType = '';
        $request = $this->webhooksCreditNoteCreatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCreditNoteCreated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCreditNoteCreatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteCreated'][0])
    {



        $resourcePath = '/credit_note.created';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCreditNoteIssued
     *
     * Credit note issued
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteIssued'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCreditNoteIssued($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteIssued'][0])
    {
        $this->webhooksCreditNoteIssuedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCreditNoteIssuedWithHttpInfo
     *
     * Credit note issued
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteIssued'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCreditNoteIssuedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteIssued'][0])
    {
        $request = $this->webhooksCreditNoteIssuedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCreditNoteIssuedAsync
     *
     * Credit note issued
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteIssued'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCreditNoteIssuedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteIssued'][0])
    {
        return $this->webhooksCreditNoteIssuedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCreditNoteIssuedAsyncWithHttpInfo
     *
     * Credit note issued
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteIssued'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCreditNoteIssuedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteIssued'][0])
    {
        $returnType = '';
        $request = $this->webhooksCreditNoteIssuedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCreditNoteIssued'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteIssued'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCreditNoteIssuedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteIssued'][0])
    {



        $resourcePath = '/credit_note.issued';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCreditNoteVoided
     *
     * Credit note voided
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteVoided'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCreditNoteVoided($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteVoided'][0])
    {
        $this->webhooksCreditNoteVoidedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCreditNoteVoidedWithHttpInfo
     *
     * Credit note voided
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteVoided'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCreditNoteVoidedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteVoided'][0])
    {
        $request = $this->webhooksCreditNoteVoidedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCreditNoteVoidedAsync
     *
     * Credit note voided
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteVoided'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCreditNoteVoidedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteVoided'][0])
    {
        return $this->webhooksCreditNoteVoidedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCreditNoteVoidedAsyncWithHttpInfo
     *
     * Credit note voided
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteVoided'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCreditNoteVoidedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteVoided'][0])
    {
        $returnType = '';
        $request = $this->webhooksCreditNoteVoidedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCreditNoteVoided'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCreditNoteVoided'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCreditNoteVoidedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCreditNoteVoided'][0])
    {



        $resourcePath = '/credit_note.voided';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCustomerCreated
     *
     * Customer created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCustomerCreated($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerCreated'][0])
    {
        $this->webhooksCustomerCreatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCustomerCreatedWithHttpInfo
     *
     * Customer created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCustomerCreatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerCreated'][0])
    {
        $request = $this->webhooksCustomerCreatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCustomerCreatedAsync
     *
     * Customer created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCustomerCreatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerCreated'][0])
    {
        return $this->webhooksCustomerCreatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCustomerCreatedAsyncWithHttpInfo
     *
     * Customer created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCustomerCreatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerCreated'][0])
    {
        $returnType = '';
        $request = $this->webhooksCustomerCreatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCustomerCreated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCustomerCreatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerCreated'][0])
    {



        $resourcePath = '/customer.created';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksCustomerUpdated
     *
     * Customer updated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerUpdated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksCustomerUpdated($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerUpdated'][0])
    {
        $this->webhooksCustomerUpdatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksCustomerUpdatedWithHttpInfo
     *
     * Customer updated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerUpdated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksCustomerUpdatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerUpdated'][0])
    {
        $request = $this->webhooksCustomerUpdatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksCustomerUpdatedAsync
     *
     * Customer updated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerUpdated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCustomerUpdatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerUpdated'][0])
    {
        return $this->webhooksCustomerUpdatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksCustomerUpdatedAsyncWithHttpInfo
     *
     * Customer updated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerUpdated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksCustomerUpdatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerUpdated'][0])
    {
        $returnType = '';
        $request = $this->webhooksCustomerUpdatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksCustomerUpdated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksCustomerUpdated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksCustomerUpdatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksCustomerUpdated'][0])
    {



        $resourcePath = '/customer.updated';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksInvoiceCreated
     *
     * Invoice created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksInvoiceCreated($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceCreated'][0])
    {
        $this->webhooksInvoiceCreatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksInvoiceCreatedWithHttpInfo
     *
     * Invoice created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksInvoiceCreatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceCreated'][0])
    {
        $request = $this->webhooksInvoiceCreatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksInvoiceCreatedAsync
     *
     * Invoice created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksInvoiceCreatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceCreated'][0])
    {
        return $this->webhooksInvoiceCreatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksInvoiceCreatedAsyncWithHttpInfo
     *
     * Invoice created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksInvoiceCreatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceCreated'][0])
    {
        $returnType = '';
        $request = $this->webhooksInvoiceCreatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksInvoiceCreated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksInvoiceCreatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceCreated'][0])
    {



        $resourcePath = '/invoice.created';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksInvoiceOverdue
     *
     * Invoice overdue
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceOverdue'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksInvoiceOverdue($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceOverdue'][0])
    {
        $this->webhooksInvoiceOverdueWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksInvoiceOverdueWithHttpInfo
     *
     * Invoice overdue
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceOverdue'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksInvoiceOverdueWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceOverdue'][0])
    {
        $request = $this->webhooksInvoiceOverdueRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksInvoiceOverdueAsync
     *
     * Invoice overdue
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceOverdue'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksInvoiceOverdueAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceOverdue'][0])
    {
        return $this->webhooksInvoiceOverdueAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksInvoiceOverdueAsyncWithHttpInfo
     *
     * Invoice overdue
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceOverdue'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksInvoiceOverdueAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceOverdue'][0])
    {
        $returnType = '';
        $request = $this->webhooksInvoiceOverdueRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksInvoiceOverdue'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoiceOverdue'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksInvoiceOverdueRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoiceOverdue'][0])
    {



        $resourcePath = '/invoice.overdue';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksInvoicePaid
     *
     * Invoice paid
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoicePaid'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksInvoicePaid($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoicePaid'][0])
    {
        $this->webhooksInvoicePaidWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksInvoicePaidWithHttpInfo
     *
     * Invoice paid
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoicePaid'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksInvoicePaidWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoicePaid'][0])
    {
        $request = $this->webhooksInvoicePaidRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksInvoicePaidAsync
     *
     * Invoice paid
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoicePaid'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksInvoicePaidAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoicePaid'][0])
    {
        return $this->webhooksInvoicePaidAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksInvoicePaidAsyncWithHttpInfo
     *
     * Invoice paid
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoicePaid'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksInvoicePaidAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoicePaid'][0])
    {
        $returnType = '';
        $request = $this->webhooksInvoicePaidRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksInvoicePaid'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksInvoicePaid'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksInvoicePaidRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksInvoicePaid'][0])
    {



        $resourcePath = '/invoice.paid';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksMandateActivated
     *
     * Mandate activated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateActivated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksMandateActivated($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateActivated'][0])
    {
        $this->webhooksMandateActivatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksMandateActivatedWithHttpInfo
     *
     * Mandate activated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateActivated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksMandateActivatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateActivated'][0])
    {
        $request = $this->webhooksMandateActivatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksMandateActivatedAsync
     *
     * Mandate activated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateActivated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateActivatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateActivated'][0])
    {
        return $this->webhooksMandateActivatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksMandateActivatedAsyncWithHttpInfo
     *
     * Mandate activated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateActivated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateActivatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateActivated'][0])
    {
        $returnType = '';
        $request = $this->webhooksMandateActivatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksMandateActivated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateActivated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksMandateActivatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateActivated'][0])
    {



        $resourcePath = '/mandate.activated';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksMandateAuddisRejected
     *
     * Mandate rejected (AUDDIS)
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateAuddisRejected'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksMandateAuddisRejected($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateAuddisRejected'][0])
    {
        $this->webhooksMandateAuddisRejectedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksMandateAuddisRejectedWithHttpInfo
     *
     * Mandate rejected (AUDDIS)
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateAuddisRejected'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksMandateAuddisRejectedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateAuddisRejected'][0])
    {
        $request = $this->webhooksMandateAuddisRejectedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksMandateAuddisRejectedAsync
     *
     * Mandate rejected (AUDDIS)
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateAuddisRejected'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateAuddisRejectedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateAuddisRejected'][0])
    {
        return $this->webhooksMandateAuddisRejectedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksMandateAuddisRejectedAsyncWithHttpInfo
     *
     * Mandate rejected (AUDDIS)
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateAuddisRejected'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateAuddisRejectedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateAuddisRejected'][0])
    {
        $returnType = '';
        $request = $this->webhooksMandateAuddisRejectedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksMandateAuddisRejected'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateAuddisRejected'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksMandateAuddisRejectedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateAuddisRejected'][0])
    {



        $resourcePath = '/mandate.auddis_rejected';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksMandateCancelled
     *
     * Mandate cancelled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCancelled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksMandateCancelled($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCancelled'][0])
    {
        $this->webhooksMandateCancelledWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksMandateCancelledWithHttpInfo
     *
     * Mandate cancelled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCancelled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksMandateCancelledWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCancelled'][0])
    {
        $request = $this->webhooksMandateCancelledRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksMandateCancelledAsync
     *
     * Mandate cancelled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCancelled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateCancelledAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCancelled'][0])
    {
        return $this->webhooksMandateCancelledAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksMandateCancelledAsyncWithHttpInfo
     *
     * Mandate cancelled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCancelled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateCancelledAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCancelled'][0])
    {
        $returnType = '';
        $request = $this->webhooksMandateCancelledRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksMandateCancelled'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCancelled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksMandateCancelledRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCancelled'][0])
    {



        $resourcePath = '/mandate.cancelled';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksMandateCreated
     *
     * Mandate created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksMandateCreated($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCreated'][0])
    {
        $this->webhooksMandateCreatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksMandateCreatedWithHttpInfo
     *
     * Mandate created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksMandateCreatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCreated'][0])
    {
        $request = $this->webhooksMandateCreatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksMandateCreatedAsync
     *
     * Mandate created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateCreatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCreated'][0])
    {
        return $this->webhooksMandateCreatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksMandateCreatedAsyncWithHttpInfo
     *
     * Mandate created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateCreatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCreated'][0])
    {
        $returnType = '';
        $request = $this->webhooksMandateCreatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksMandateCreated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksMandateCreatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateCreated'][0])
    {



        $resourcePath = '/mandate.created';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksMandateSuspended
     *
     * Mandate suspended
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateSuspended'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksMandateSuspended($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateSuspended'][0])
    {
        $this->webhooksMandateSuspendedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksMandateSuspendedWithHttpInfo
     *
     * Mandate suspended
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateSuspended'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksMandateSuspendedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateSuspended'][0])
    {
        $request = $this->webhooksMandateSuspendedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksMandateSuspendedAsync
     *
     * Mandate suspended
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateSuspended'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateSuspendedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateSuspended'][0])
    {
        return $this->webhooksMandateSuspendedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksMandateSuspendedAsyncWithHttpInfo
     *
     * Mandate suspended
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateSuspended'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksMandateSuspendedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateSuspended'][0])
    {
        $returnType = '';
        $request = $this->webhooksMandateSuspendedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksMandateSuspended'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksMandateSuspended'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksMandateSuspendedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksMandateSuspended'][0])
    {



        $resourcePath = '/mandate.suspended';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksOrderCreated
     *
     * Order created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksOrderCreated($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderCreated'][0])
    {
        $this->webhooksOrderCreatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksOrderCreatedWithHttpInfo
     *
     * Order created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksOrderCreatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderCreated'][0])
    {
        $request = $this->webhooksOrderCreatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksOrderCreatedAsync
     *
     * Order created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksOrderCreatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderCreated'][0])
    {
        return $this->webhooksOrderCreatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksOrderCreatedAsyncWithHttpInfo
     *
     * Order created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksOrderCreatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderCreated'][0])
    {
        $returnType = '';
        $request = $this->webhooksOrderCreatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksOrderCreated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksOrderCreatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderCreated'][0])
    {



        $resourcePath = '/order.created';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksOrderFulfilled
     *
     * Order fulfilled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderFulfilled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksOrderFulfilled($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderFulfilled'][0])
    {
        $this->webhooksOrderFulfilledWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksOrderFulfilledWithHttpInfo
     *
     * Order fulfilled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderFulfilled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksOrderFulfilledWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderFulfilled'][0])
    {
        $request = $this->webhooksOrderFulfilledRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksOrderFulfilledAsync
     *
     * Order fulfilled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderFulfilled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksOrderFulfilledAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderFulfilled'][0])
    {
        return $this->webhooksOrderFulfilledAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksOrderFulfilledAsyncWithHttpInfo
     *
     * Order fulfilled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderFulfilled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksOrderFulfilledAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderFulfilled'][0])
    {
        $returnType = '';
        $request = $this->webhooksOrderFulfilledRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksOrderFulfilled'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderFulfilled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksOrderFulfilledRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderFulfilled'][0])
    {



        $resourcePath = '/order.fulfilled';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksOrderPaid
     *
     * Order paid
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderPaid'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksOrderPaid($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderPaid'][0])
    {
        $this->webhooksOrderPaidWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksOrderPaidWithHttpInfo
     *
     * Order paid
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderPaid'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksOrderPaidWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderPaid'][0])
    {
        $request = $this->webhooksOrderPaidRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksOrderPaidAsync
     *
     * Order paid
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderPaid'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksOrderPaidAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderPaid'][0])
    {
        return $this->webhooksOrderPaidAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksOrderPaidAsyncWithHttpInfo
     *
     * Order paid
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderPaid'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksOrderPaidAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderPaid'][0])
    {
        $returnType = '';
        $request = $this->webhooksOrderPaidRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksOrderPaid'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksOrderPaid'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksOrderPaidRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksOrderPaid'][0])
    {



        $resourcePath = '/order.paid';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksPaymentFailed
     *
     * Payment failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentFailed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksPaymentFailed($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentFailed'][0])
    {
        $this->webhooksPaymentFailedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksPaymentFailedWithHttpInfo
     *
     * Payment failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentFailed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksPaymentFailedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentFailed'][0])
    {
        $request = $this->webhooksPaymentFailedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksPaymentFailedAsync
     *
     * Payment failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentFailed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksPaymentFailedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentFailed'][0])
    {
        return $this->webhooksPaymentFailedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksPaymentFailedAsyncWithHttpInfo
     *
     * Payment failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentFailed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksPaymentFailedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentFailed'][0])
    {
        $returnType = '';
        $request = $this->webhooksPaymentFailedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksPaymentFailed'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentFailed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksPaymentFailedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentFailed'][0])
    {



        $resourcePath = '/payment.failed';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksPaymentSucceeded
     *
     * Payment succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksPaymentSucceeded($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentSucceeded'][0])
    {
        $this->webhooksPaymentSucceededWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksPaymentSucceededWithHttpInfo
     *
     * Payment succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksPaymentSucceededWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentSucceeded'][0])
    {
        $request = $this->webhooksPaymentSucceededRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksPaymentSucceededAsync
     *
     * Payment succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksPaymentSucceededAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentSucceeded'][0])
    {
        return $this->webhooksPaymentSucceededAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksPaymentSucceededAsyncWithHttpInfo
     *
     * Payment succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksPaymentSucceededAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentSucceeded'][0])
    {
        $returnType = '';
        $request = $this->webhooksPaymentSucceededRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksPaymentSucceeded'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksPaymentSucceededRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksPaymentSucceeded'][0])
    {



        $resourcePath = '/payment.succeeded';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksRefundCreated
     *
     * Refund created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksRefundCreated($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundCreated'][0])
    {
        $this->webhooksRefundCreatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksRefundCreatedWithHttpInfo
     *
     * Refund created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksRefundCreatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundCreated'][0])
    {
        $request = $this->webhooksRefundCreatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksRefundCreatedAsync
     *
     * Refund created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksRefundCreatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundCreated'][0])
    {
        return $this->webhooksRefundCreatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksRefundCreatedAsyncWithHttpInfo
     *
     * Refund created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksRefundCreatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundCreated'][0])
    {
        $returnType = '';
        $request = $this->webhooksRefundCreatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksRefundCreated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksRefundCreatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundCreated'][0])
    {



        $resourcePath = '/refund.created';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksRefundSucceeded
     *
     * Refund succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksRefundSucceeded($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundSucceeded'][0])
    {
        $this->webhooksRefundSucceededWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksRefundSucceededWithHttpInfo
     *
     * Refund succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksRefundSucceededWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundSucceeded'][0])
    {
        $request = $this->webhooksRefundSucceededRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksRefundSucceededAsync
     *
     * Refund succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksRefundSucceededAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundSucceeded'][0])
    {
        return $this->webhooksRefundSucceededAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksRefundSucceededAsyncWithHttpInfo
     *
     * Refund succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksRefundSucceededAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundSucceeded'][0])
    {
        $returnType = '';
        $request = $this->webhooksRefundSucceededRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksRefundSucceeded'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksRefundSucceededRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksRefundSucceeded'][0])
    {



        $resourcePath = '/refund.succeeded';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksSettlementCreated
     *
     * Settlement created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSettlementCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksSettlementCreated($webhook_event = null, string $contentType = self::contentTypes['webhooksSettlementCreated'][0])
    {
        $this->webhooksSettlementCreatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksSettlementCreatedWithHttpInfo
     *
     * Settlement created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSettlementCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksSettlementCreatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSettlementCreated'][0])
    {
        $request = $this->webhooksSettlementCreatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksSettlementCreatedAsync
     *
     * Settlement created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSettlementCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSettlementCreatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksSettlementCreated'][0])
    {
        return $this->webhooksSettlementCreatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksSettlementCreatedAsyncWithHttpInfo
     *
     * Settlement created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSettlementCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSettlementCreatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSettlementCreated'][0])
    {
        $returnType = '';
        $request = $this->webhooksSettlementCreatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksSettlementCreated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSettlementCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksSettlementCreatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksSettlementCreated'][0])
    {



        $resourcePath = '/settlement.created';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksSubscriptionActivated
     *
     * Subscription activated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionActivated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksSubscriptionActivated($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionActivated'][0])
    {
        $this->webhooksSubscriptionActivatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksSubscriptionActivatedWithHttpInfo
     *
     * Subscription activated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionActivated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksSubscriptionActivatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionActivated'][0])
    {
        $request = $this->webhooksSubscriptionActivatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksSubscriptionActivatedAsync
     *
     * Subscription activated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionActivated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSubscriptionActivatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionActivated'][0])
    {
        return $this->webhooksSubscriptionActivatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksSubscriptionActivatedAsyncWithHttpInfo
     *
     * Subscription activated
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionActivated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSubscriptionActivatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionActivated'][0])
    {
        $returnType = '';
        $request = $this->webhooksSubscriptionActivatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksSubscriptionActivated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionActivated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksSubscriptionActivatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionActivated'][0])
    {



        $resourcePath = '/subscription.activated';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksSubscriptionCanceled
     *
     * Subscription canceled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCanceled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksSubscriptionCanceled($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCanceled'][0])
    {
        $this->webhooksSubscriptionCanceledWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksSubscriptionCanceledWithHttpInfo
     *
     * Subscription canceled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCanceled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksSubscriptionCanceledWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCanceled'][0])
    {
        $request = $this->webhooksSubscriptionCanceledRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksSubscriptionCanceledAsync
     *
     * Subscription canceled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCanceled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSubscriptionCanceledAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCanceled'][0])
    {
        return $this->webhooksSubscriptionCanceledAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksSubscriptionCanceledAsyncWithHttpInfo
     *
     * Subscription canceled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCanceled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSubscriptionCanceledAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCanceled'][0])
    {
        $returnType = '';
        $request = $this->webhooksSubscriptionCanceledRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksSubscriptionCanceled'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCanceled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksSubscriptionCanceledRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCanceled'][0])
    {



        $resourcePath = '/subscription.canceled';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksSubscriptionCreated
     *
     * Subscription created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksSubscriptionCreated($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCreated'][0])
    {
        $this->webhooksSubscriptionCreatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksSubscriptionCreatedWithHttpInfo
     *
     * Subscription created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksSubscriptionCreatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCreated'][0])
    {
        $request = $this->webhooksSubscriptionCreatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksSubscriptionCreatedAsync
     *
     * Subscription created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSubscriptionCreatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCreated'][0])
    {
        return $this->webhooksSubscriptionCreatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksSubscriptionCreatedAsyncWithHttpInfo
     *
     * Subscription created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSubscriptionCreatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCreated'][0])
    {
        $returnType = '';
        $request = $this->webhooksSubscriptionCreatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksSubscriptionCreated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksSubscriptionCreatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionCreated'][0])
    {



        $resourcePath = '/subscription.created';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksSubscriptionRenewed
     *
     * Subscription renewed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionRenewed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksSubscriptionRenewed($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionRenewed'][0])
    {
        $this->webhooksSubscriptionRenewedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksSubscriptionRenewedWithHttpInfo
     *
     * Subscription renewed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionRenewed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksSubscriptionRenewedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionRenewed'][0])
    {
        $request = $this->webhooksSubscriptionRenewedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksSubscriptionRenewedAsync
     *
     * Subscription renewed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionRenewed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSubscriptionRenewedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionRenewed'][0])
    {
        return $this->webhooksSubscriptionRenewedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksSubscriptionRenewedAsyncWithHttpInfo
     *
     * Subscription renewed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionRenewed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksSubscriptionRenewedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionRenewed'][0])
    {
        $returnType = '';
        $request = $this->webhooksSubscriptionRenewedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksSubscriptionRenewed'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksSubscriptionRenewed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksSubscriptionRenewedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksSubscriptionRenewed'][0])
    {



        $resourcePath = '/subscription.renewed';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksTerminalPaymentCancelled
     *
     * Terminal payment cancelled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentCancelled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksTerminalPaymentCancelled($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentCancelled'][0])
    {
        $this->webhooksTerminalPaymentCancelledWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksTerminalPaymentCancelledWithHttpInfo
     *
     * Terminal payment cancelled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentCancelled'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksTerminalPaymentCancelledWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentCancelled'][0])
    {
        $request = $this->webhooksTerminalPaymentCancelledRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksTerminalPaymentCancelledAsync
     *
     * Terminal payment cancelled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentCancelled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentCancelledAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentCancelled'][0])
    {
        return $this->webhooksTerminalPaymentCancelledAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksTerminalPaymentCancelledAsyncWithHttpInfo
     *
     * Terminal payment cancelled
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentCancelled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentCancelledAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentCancelled'][0])
    {
        $returnType = '';
        $request = $this->webhooksTerminalPaymentCancelledRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksTerminalPaymentCancelled'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentCancelled'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksTerminalPaymentCancelledRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentCancelled'][0])
    {



        $resourcePath = '/terminal_payment.cancelled';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksTerminalPaymentDeclined
     *
     * Terminal payment declined
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentDeclined'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksTerminalPaymentDeclined($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentDeclined'][0])
    {
        $this->webhooksTerminalPaymentDeclinedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksTerminalPaymentDeclinedWithHttpInfo
     *
     * Terminal payment declined
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentDeclined'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksTerminalPaymentDeclinedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentDeclined'][0])
    {
        $request = $this->webhooksTerminalPaymentDeclinedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksTerminalPaymentDeclinedAsync
     *
     * Terminal payment declined
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentDeclined'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentDeclinedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentDeclined'][0])
    {
        return $this->webhooksTerminalPaymentDeclinedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksTerminalPaymentDeclinedAsyncWithHttpInfo
     *
     * Terminal payment declined
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentDeclined'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentDeclinedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentDeclined'][0])
    {
        $returnType = '';
        $request = $this->webhooksTerminalPaymentDeclinedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksTerminalPaymentDeclined'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentDeclined'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksTerminalPaymentDeclinedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentDeclined'][0])
    {



        $resourcePath = '/terminal_payment.declined';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksTerminalPaymentError
     *
     * Terminal payment error
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentError'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksTerminalPaymentError($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentError'][0])
    {
        $this->webhooksTerminalPaymentErrorWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksTerminalPaymentErrorWithHttpInfo
     *
     * Terminal payment error
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentError'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksTerminalPaymentErrorWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentError'][0])
    {
        $request = $this->webhooksTerminalPaymentErrorRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksTerminalPaymentErrorAsync
     *
     * Terminal payment error
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentError'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentErrorAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentError'][0])
    {
        return $this->webhooksTerminalPaymentErrorAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksTerminalPaymentErrorAsyncWithHttpInfo
     *
     * Terminal payment error
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentError'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentErrorAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentError'][0])
    {
        $returnType = '';
        $request = $this->webhooksTerminalPaymentErrorRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksTerminalPaymentError'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentError'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksTerminalPaymentErrorRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentError'][0])
    {



        $resourcePath = '/terminal_payment.error';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksTerminalPaymentRequested
     *
     * Terminal payment requested
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentRequested'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksTerminalPaymentRequested($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentRequested'][0])
    {
        $this->webhooksTerminalPaymentRequestedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksTerminalPaymentRequestedWithHttpInfo
     *
     * Terminal payment requested
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentRequested'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksTerminalPaymentRequestedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentRequested'][0])
    {
        $request = $this->webhooksTerminalPaymentRequestedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksTerminalPaymentRequestedAsync
     *
     * Terminal payment requested
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentRequested'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentRequestedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentRequested'][0])
    {
        return $this->webhooksTerminalPaymentRequestedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksTerminalPaymentRequestedAsyncWithHttpInfo
     *
     * Terminal payment requested
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentRequested'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentRequestedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentRequested'][0])
    {
        $returnType = '';
        $request = $this->webhooksTerminalPaymentRequestedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksTerminalPaymentRequested'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentRequested'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksTerminalPaymentRequestedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentRequested'][0])
    {



        $resourcePath = '/terminal_payment.requested';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksTerminalPaymentSucceeded
     *
     * Terminal payment succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksTerminalPaymentSucceeded($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentSucceeded'][0])
    {
        $this->webhooksTerminalPaymentSucceededWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksTerminalPaymentSucceededWithHttpInfo
     *
     * Terminal payment succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksTerminalPaymentSucceededWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentSucceeded'][0])
    {
        $request = $this->webhooksTerminalPaymentSucceededRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksTerminalPaymentSucceededAsync
     *
     * Terminal payment succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentSucceededAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentSucceeded'][0])
    {
        return $this->webhooksTerminalPaymentSucceededAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksTerminalPaymentSucceededAsyncWithHttpInfo
     *
     * Terminal payment succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalPaymentSucceededAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentSucceeded'][0])
    {
        $returnType = '';
        $request = $this->webhooksTerminalPaymentSucceededRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksTerminalPaymentSucceeded'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalPaymentSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksTerminalPaymentSucceededRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalPaymentSucceeded'][0])
    {



        $resourcePath = '/terminal_payment.succeeded';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksTerminalRefundSucceeded
     *
     * Terminal refund succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksTerminalRefundSucceeded($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalRefundSucceeded'][0])
    {
        $this->webhooksTerminalRefundSucceededWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksTerminalRefundSucceededWithHttpInfo
     *
     * Terminal refund succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksTerminalRefundSucceededWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalRefundSucceeded'][0])
    {
        $request = $this->webhooksTerminalRefundSucceededRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksTerminalRefundSucceededAsync
     *
     * Terminal refund succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalRefundSucceededAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalRefundSucceeded'][0])
    {
        return $this->webhooksTerminalRefundSucceededAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksTerminalRefundSucceededAsyncWithHttpInfo
     *
     * Terminal refund succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalRefundSucceededAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalRefundSucceeded'][0])
    {
        $returnType = '';
        $request = $this->webhooksTerminalRefundSucceededRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksTerminalRefundSucceeded'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalRefundSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksTerminalRefundSucceededRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalRefundSucceeded'][0])
    {



        $resourcePath = '/terminal_refund.succeeded';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksTerminalVoidSucceeded
     *
     * Terminal void succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksTerminalVoidSucceeded($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalVoidSucceeded'][0])
    {
        $this->webhooksTerminalVoidSucceededWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksTerminalVoidSucceededWithHttpInfo
     *
     * Terminal void succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksTerminalVoidSucceededWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalVoidSucceeded'][0])
    {
        $request = $this->webhooksTerminalVoidSucceededRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksTerminalVoidSucceededAsync
     *
     * Terminal void succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalVoidSucceededAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalVoidSucceeded'][0])
    {
        return $this->webhooksTerminalVoidSucceededAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksTerminalVoidSucceededAsyncWithHttpInfo
     *
     * Terminal void succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksTerminalVoidSucceededAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalVoidSucceeded'][0])
    {
        $returnType = '';
        $request = $this->webhooksTerminalVoidSucceededRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksTerminalVoidSucceeded'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksTerminalVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksTerminalVoidSucceededRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksTerminalVoidSucceeded'][0])
    {



        $resourcePath = '/terminal_void.succeeded';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksUsageEventRejected
     *
     * Usage event rejected
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageEventRejected'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksUsageEventRejected($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageEventRejected'][0])
    {
        $this->webhooksUsageEventRejectedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksUsageEventRejectedWithHttpInfo
     *
     * Usage event rejected
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageEventRejected'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksUsageEventRejectedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageEventRejected'][0])
    {
        $request = $this->webhooksUsageEventRejectedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksUsageEventRejectedAsync
     *
     * Usage event rejected
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageEventRejected'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksUsageEventRejectedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageEventRejected'][0])
    {
        return $this->webhooksUsageEventRejectedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksUsageEventRejectedAsyncWithHttpInfo
     *
     * Usage event rejected
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageEventRejected'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksUsageEventRejectedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageEventRejected'][0])
    {
        $returnType = '';
        $request = $this->webhooksUsageEventRejectedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksUsageEventRejected'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageEventRejected'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksUsageEventRejectedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageEventRejected'][0])
    {



        $resourcePath = '/usage.event.rejected';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksUsagePeriodFinalized
     *
     * Usage period finalized
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsagePeriodFinalized'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksUsagePeriodFinalized($webhook_event = null, string $contentType = self::contentTypes['webhooksUsagePeriodFinalized'][0])
    {
        $this->webhooksUsagePeriodFinalizedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksUsagePeriodFinalizedWithHttpInfo
     *
     * Usage period finalized
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsagePeriodFinalized'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksUsagePeriodFinalizedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksUsagePeriodFinalized'][0])
    {
        $request = $this->webhooksUsagePeriodFinalizedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksUsagePeriodFinalizedAsync
     *
     * Usage period finalized
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsagePeriodFinalized'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksUsagePeriodFinalizedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksUsagePeriodFinalized'][0])
    {
        return $this->webhooksUsagePeriodFinalizedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksUsagePeriodFinalizedAsyncWithHttpInfo
     *
     * Usage period finalized
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsagePeriodFinalized'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksUsagePeriodFinalizedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksUsagePeriodFinalized'][0])
    {
        $returnType = '';
        $request = $this->webhooksUsagePeriodFinalizedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksUsagePeriodFinalized'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsagePeriodFinalized'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksUsagePeriodFinalizedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksUsagePeriodFinalized'][0])
    {



        $resourcePath = '/usage.period_finalized';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksUsageThresholdReached
     *
     * Usage threshold reached
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageThresholdReached'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksUsageThresholdReached($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageThresholdReached'][0])
    {
        $this->webhooksUsageThresholdReachedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksUsageThresholdReachedWithHttpInfo
     *
     * Usage threshold reached
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageThresholdReached'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksUsageThresholdReachedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageThresholdReached'][0])
    {
        $request = $this->webhooksUsageThresholdReachedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksUsageThresholdReachedAsync
     *
     * Usage threshold reached
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageThresholdReached'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksUsageThresholdReachedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageThresholdReached'][0])
    {
        return $this->webhooksUsageThresholdReachedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksUsageThresholdReachedAsyncWithHttpInfo
     *
     * Usage threshold reached
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageThresholdReached'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksUsageThresholdReachedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageThresholdReached'][0])
    {
        $returnType = '';
        $request = $this->webhooksUsageThresholdReachedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksUsageThresholdReached'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksUsageThresholdReached'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksUsageThresholdReachedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksUsageThresholdReached'][0])
    {



        $resourcePath = '/usage.threshold.reached';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksVoidCreated
     *
     * Void created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksVoidCreated($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidCreated'][0])
    {
        $this->webhooksVoidCreatedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksVoidCreatedWithHttpInfo
     *
     * Void created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidCreated'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksVoidCreatedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidCreated'][0])
    {
        $request = $this->webhooksVoidCreatedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksVoidCreatedAsync
     *
     * Void created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksVoidCreatedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidCreated'][0])
    {
        return $this->webhooksVoidCreatedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksVoidCreatedAsyncWithHttpInfo
     *
     * Void created
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksVoidCreatedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidCreated'][0])
    {
        $returnType = '';
        $request = $this->webhooksVoidCreatedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksVoidCreated'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidCreated'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksVoidCreatedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidCreated'][0])
    {



        $resourcePath = '/void.created';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksVoidFailed
     *
     * Void failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidFailed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksVoidFailed($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidFailed'][0])
    {
        $this->webhooksVoidFailedWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksVoidFailedWithHttpInfo
     *
     * Void failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidFailed'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksVoidFailedWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidFailed'][0])
    {
        $request = $this->webhooksVoidFailedRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksVoidFailedAsync
     *
     * Void failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidFailed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksVoidFailedAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidFailed'][0])
    {
        return $this->webhooksVoidFailedAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksVoidFailedAsyncWithHttpInfo
     *
     * Void failed
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidFailed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksVoidFailedAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidFailed'][0])
    {
        $returnType = '';
        $request = $this->webhooksVoidFailedRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksVoidFailed'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidFailed'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksVoidFailedRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidFailed'][0])
    {



        $resourcePath = '/void.failed';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation webhooksVoidSucceeded
     *
     * Void succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function webhooksVoidSucceeded($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidSucceeded'][0])
    {
        $this->webhooksVoidSucceededWithHttpInfo($webhook_event, $contentType);
    }

    /**
     * Operation webhooksVoidSucceededWithHttpInfo
     *
     * Void succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function webhooksVoidSucceededWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidSucceeded'][0])
    {
        $request = $this->webhooksVoidSucceededRequest($webhook_event, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
        

            throw $e;
        }
    }

    /**
     * Operation webhooksVoidSucceededAsync
     *
     * Void succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksVoidSucceededAsync($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidSucceeded'][0])
    {
        return $this->webhooksVoidSucceededAsyncWithHttpInfo($webhook_event, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation webhooksVoidSucceededAsyncWithHttpInfo
     *
     * Void succeeded
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function webhooksVoidSucceededAsyncWithHttpInfo($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidSucceeded'][0])
    {
        $returnType = '';
        $request = $this->webhooksVoidSucceededRequest($webhook_event, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'webhooksVoidSucceeded'
     *
     * @param  \RevKeen\Model\WebhookEvent|null $webhook_event (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['webhooksVoidSucceeded'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function webhooksVoidSucceededRequest($webhook_event = null, string $contentType = self::contentTypes['webhooksVoidSucceeded'][0])
    {



        $resourcePath = '/void.succeeded';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($webhook_event)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($webhook_event));
            } else {
                $httpBody = $webhook_event;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        if ($this->config->getCertFile()) {
            $options[RequestOptions::CERT] = $this->config->getCertFile();
        }

        if ($this->config->getKeyFile()) {
            $options[RequestOptions::SSL_KEY] = $this->config->getKeyFile();
        }

        return $options;
    }

    private function handleResponseWithDataType(
        string $dataType,
        RequestInterface $request,
        ResponseInterface $response
    ): array {
        if ($dataType === '\SplFileObject') {
            $content = $response->getBody(); //stream goes to serializer
        } else {
            $content = (string) $response->getBody();
            if ($dataType !== 'string') {
                try {
                    $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                } catch (\JsonException $exception) {
                    throw new ApiException(
                        sprintf(
                            'Error JSON decoding server response (%s)',
                            $request->getUri()
                        ),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                        $content
                    );
                }
            }
        }

        return [
            ObjectSerializer::deserialize($content, $dataType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    private function responseWithinRangeCode(
        string $rangeCode,
        int $statusCode
    ): bool {
        $left = (int) ($rangeCode[0].'00');
        $right = (int) ($rangeCode[0].'99');

        return $statusCode >= $left && $statusCode <= $right;
    }
}
