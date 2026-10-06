<?php

/**
 * InvoicesApi
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your merchant API key in the `x-api-key` header, or as `Authorization: Bearer <key>` — both are accepted. Create and manage keys in the [Dashboard](https://app.revkeen.com/dashboard/settings/general?tab=developer). Use `rk_sandbox_*` for staging/test and `rk_live_*` for production. Keys are scoped, rollable, IP-lockable and revocable; the raw secret is shown once, at creation.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Access tokens are opaque, prefixed `rkoa_`, and sent via `Authorization: Bearer rkoa_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `cart:read` | View cart session details | |  | `cart:write` | Create and mutate cart sessions, line items, add-ons | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `entitlements:read` | View customer entitlements / feature access | |  | `entitlements:write` | Grant and revoke customer entitlements | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Direct Debit** | `mandates:read` | View Direct Debit mandates and collection status | |  | `mandates:write` | Create, suspend, reinstate, and cancel Direct Debit mandates | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Errors  Every non-2xx response uses one envelope: `{ \"error\": { \"type\", \"code\", \"message\", ... } }`. Branch on `error.type` and `error.code`; treat `error.message` as display text only. Error bodies never echo the credential you presented.  | Status | `error.type` | Notes | |--------|--------------|-------| | `400` | `invalid_request_error` | Schema validation failed. `details.fields` maps each rejected parameter to its reasons. | | `401` | `authentication_error` | Missing, invalid, expired or revoked credential. Always carries `WWW-Authenticate: Bearer realm=\"revkeen-api\"`. | | `402` | `card_error` | Declined by the issuer or processor; see `decline_code`. | | `403` | `authorization_error` | The caller is identified but the action is denied — scope, IP allowlist, origin, or merchant mismatch. | | `409` | `invalid_request_error` or `idempotency_error` | Resource-state conflict, or an `Idempotency-Key` replayed with a different body. | | `429` | `rate_limit_error` | See Rate Limits below. | | `500` | `api_error` | Retry with exponential backoff, quoting `error.request_id`. |  `401` codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`.  `403` codes: `insufficient_permissions`, `forbidden`, `ip_not_allowed`, `tenant_scope_mismatch`, `no_organization`, `no_merchant`, `merchant_mismatch`, `cart_disabled`, `origin_not_allowed`, `verification_required`, `read_only_impersonation_blocked`, `publishable_key_restricted`, `internal_only`.  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  Each API key (`rk_live_*`, `rk_sandbox_*`, `rk_pk_*`) may make **600 requests per minute**, in production and staging alike. The limit is per key, counted over a 60-second window, with no separate burst allowance. Some endpoints apply their own, lower limits.  An over-limit key is still valid: it receives `429`, never `401`. Wait for `Retry-After` and retry; do not re-authenticate or rotate the key.  A rate-limited request returns `429` with `type: rate_limit_error`, `code: rate_limit_exceeded` and `details.retry_after` in whole seconds.  | Header | Meaning | |--------|---------| | `Retry-After` | Whole seconds to wait before retrying. Present on every `429`. | | `X-RateLimit-Limit` | Requests permitted in the current window, when the limiter publishes one. | | `X-RateLimit-Remaining` | Requests left in the current window. | | `X-RateLimit-Reset` | UNIX timestamp in **seconds** at which the window resets. |
 *
 * The version of the OpenAPI document: 2026-05-01
 * Contact: support@revkeen.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.24.0
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
use RevKeen\Runtime\ClientFactory;
use RevKeen\Runtime\RequestOptions as RevKeenRequestOptions;

/**
 * InvoicesApi Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class InvoicesApi
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
        'invoiceUsageExplain' => [
            'application/json',
        ],
        'invoicesCreate' => [
            'application/json',
        ],
        'invoicesFinalize' => [
            'application/json',
        ],
        'invoicesGet' => [
            'application/json',
        ],
        'invoicesList' => [
            'application/json',
        ],
        'invoicesMarginEstimate' => [
            'application/json',
        ],
        'invoicesSend' => [
            'application/json',
        ],
        'invoicesUpdate' => [
            'application/json',
        ],
        'invoicesVoid' => [
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
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->client = ClientFactory::wrap($client ?: new Client(), $this->config);
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
     * Operation invoiceUsageExplain
     *
     * Explain invoice usage charges
     *
     * @param  string $id Invoice UUID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoiceUsageExplain'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\InvoiceUsageExplain200Response
     */
    public function invoiceUsageExplain($id, string $contentType = self::contentTypes['invoiceUsageExplain'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->invoiceUsageExplainWithHttpInfo($id, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation invoiceUsageExplainWithHttpInfo
     *
     * Explain invoice usage charges
     *
     * @param  string $id Invoice UUID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoiceUsageExplain'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\InvoiceUsageExplain200Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function invoiceUsageExplainWithHttpInfo($id, string $contentType = self::contentTypes['invoiceUsageExplain'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->invoiceUsageExplainRequest($id, $contentType);

        try {
            $options = array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, false)
            );
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw ApiException::fromTransportException($e);
            } catch (ConnectException $e) {
                throw ApiException::fromTransportException($e);
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\InvoiceUsageExplain200Response',
                        $request,
                        $response,
                    );
            }



            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\RevKeen\Model\InvoiceUsageExplain200Response',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\InvoiceUsageExplain200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation invoiceUsageExplainAsync
     *
     * Explain invoice usage charges
     *
     * @param  string $id Invoice UUID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoiceUsageExplain'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoiceUsageExplainAsync($id, string $contentType = self::contentTypes['invoiceUsageExplain'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->invoiceUsageExplainAsyncWithHttpInfo($id, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation invoiceUsageExplainAsyncWithHttpInfo
     *
     * Explain invoice usage charges
     *
     * @param  string $id Invoice UUID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoiceUsageExplain'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoiceUsageExplainAsyncWithHttpInfo($id, string $contentType = self::contentTypes['invoiceUsageExplain'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\InvoiceUsageExplain200Response';
        $request = $this->invoiceUsageExplainRequest($id, $contentType);

        return $this->client
            ->sendAsync($request, array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, false)
            ))
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    if ($exception instanceof ApiException) {
                        throw $exception;
                    }
                    throw ApiException::fromTransportException($exception);
                }
            );
    }

    /**
     * Create request for operation 'invoiceUsageExplain'
     *
     * @param  string $id Invoice UUID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoiceUsageExplain'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function invoiceUsageExplainRequest($id, string $contentType = self::contentTypes['invoiceUsageExplain'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling invoiceUsageExplain'
            );
        }


        $resourcePath = '/invoices/{id}/usage-explain';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
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
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation invoicesCreate
     *
     * Create invoice
     *
     * @param  \RevKeen\Model\InvoicesCreateRequest $invoices_create_request Invoice creation details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\InvoiceResponse|\RevKeen\Model\ErrorResponse
     */
    public function invoicesCreate($invoices_create_request, string $contentType = self::contentTypes['invoicesCreate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->invoicesCreateWithHttpInfo($invoices_create_request, $contentType, $idempotency_key, $request_options);
        return $response;
    }

    /**
     * Operation invoicesCreateWithHttpInfo
     *
     * Create invoice
     *
     * @param  \RevKeen\Model\InvoicesCreateRequest $invoices_create_request Invoice creation details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\InvoiceResponse|\RevKeen\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function invoicesCreateWithHttpInfo($invoices_create_request, string $contentType = self::contentTypes['invoicesCreate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->invoicesCreateRequest($invoices_create_request, $contentType, $idempotency_key);

        try {
            $options = array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            );
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw ApiException::fromTransportException($e);
            } catch (ConnectException $e) {
                throw ApiException::fromTransportException($e);
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 201:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\InvoiceResponse',
                        $request,
                        $response,
                    );
                default:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ErrorResponse',
                        $request,
                        $response,
                    );
            }



            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\RevKeen\Model\InvoiceResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\InvoiceResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation invoicesCreateAsync
     *
     * Create invoice
     *
     * @param  \RevKeen\Model\InvoicesCreateRequest $invoices_create_request Invoice creation details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesCreateAsync($invoices_create_request, string $contentType = self::contentTypes['invoicesCreate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        return $this->invoicesCreateAsyncWithHttpInfo($invoices_create_request, $contentType, $idempotency_key, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation invoicesCreateAsyncWithHttpInfo
     *
     * Create invoice
     *
     * @param  \RevKeen\Model\InvoicesCreateRequest $invoices_create_request Invoice creation details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesCreateAsyncWithHttpInfo($invoices_create_request, string $contentType = self::contentTypes['invoicesCreate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\InvoiceResponse';
        $request = $this->invoicesCreateRequest($invoices_create_request, $contentType, $idempotency_key);

        return $this->client
            ->sendAsync($request, array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            ))
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    if ($exception instanceof ApiException) {
                        throw $exception;
                    }
                    throw ApiException::fromTransportException($exception);
                }
            );
    }

    /**
     * Create request for operation 'invoicesCreate'
     *
     * @param  \RevKeen\Model\InvoicesCreateRequest $invoices_create_request Invoice creation details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function invoicesCreateRequest($invoices_create_request, string $contentType = self::contentTypes['invoicesCreate'][0], ?string $idempotency_key = null)
    {

        // verify the required parameter 'invoices_create_request' is set
        if ($invoices_create_request === null || (is_array($invoices_create_request) && count($invoices_create_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoices_create_request when calling invoicesCreate'
            );
        }

        if ($idempotency_key !== null && !preg_match("/^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/", $idempotency_key)) {
            throw new \InvalidArgumentException("invalid value for \"idempotency_key\" when calling InvoicesApi.invoicesCreate, must conform to the pattern /^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/.");
        }


        $resourcePath = '/invoices';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($idempotency_key !== null) {
            $headerParams['Idempotency-Key'] = ObjectSerializer::toHeaderValue($idempotency_key);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($invoices_create_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($invoices_create_request));
            } else {
                $httpBody = $invoices_create_request;
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
     * Operation invoicesFinalize
     *
     * Finalize an invoice
     *
     * @param  string $id id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesFinalizeRequest|null $invoices_finalize_request Finalization options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesFinalize'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\InvoiceResponse
     */
    public function invoicesFinalize($id, $invoices_finalize_request = null, string $contentType = self::contentTypes['invoicesFinalize'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->invoicesFinalizeWithHttpInfo($id, $invoices_finalize_request, $contentType, $idempotency_key, $request_options);
        return $response;
    }

    /**
     * Operation invoicesFinalizeWithHttpInfo
     *
     * Finalize an invoice
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesFinalizeRequest|null $invoices_finalize_request Finalization options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesFinalize'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\InvoiceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function invoicesFinalizeWithHttpInfo($id, $invoices_finalize_request = null, string $contentType = self::contentTypes['invoicesFinalize'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->invoicesFinalizeRequest($id, $invoices_finalize_request, $contentType, $idempotency_key);

        try {
            $options = array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            );
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw ApiException::fromTransportException($e);
            } catch (ConnectException $e) {
                throw ApiException::fromTransportException($e);
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\InvoiceResponse',
                        $request,
                        $response,
                    );
            }



            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\RevKeen\Model\InvoiceResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\InvoiceResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation invoicesFinalizeAsync
     *
     * Finalize an invoice
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesFinalizeRequest|null $invoices_finalize_request Finalization options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesFinalize'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesFinalizeAsync($id, $invoices_finalize_request = null, string $contentType = self::contentTypes['invoicesFinalize'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        return $this->invoicesFinalizeAsyncWithHttpInfo($id, $invoices_finalize_request, $contentType, $idempotency_key, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation invoicesFinalizeAsyncWithHttpInfo
     *
     * Finalize an invoice
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesFinalizeRequest|null $invoices_finalize_request Finalization options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesFinalize'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesFinalizeAsyncWithHttpInfo($id, $invoices_finalize_request = null, string $contentType = self::contentTypes['invoicesFinalize'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\InvoiceResponse';
        $request = $this->invoicesFinalizeRequest($id, $invoices_finalize_request, $contentType, $idempotency_key);

        return $this->client
            ->sendAsync($request, array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            ))
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    if ($exception instanceof ApiException) {
                        throw $exception;
                    }
                    throw ApiException::fromTransportException($exception);
                }
            );
    }

    /**
     * Create request for operation 'invoicesFinalize'
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesFinalizeRequest|null $invoices_finalize_request Finalization options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesFinalize'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function invoicesFinalizeRequest($id, $invoices_finalize_request = null, string $contentType = self::contentTypes['invoicesFinalize'][0], ?string $idempotency_key = null)
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling invoicesFinalize'
            );
        }

        if ($idempotency_key !== null && !preg_match("/^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/", $idempotency_key)) {
            throw new \InvalidArgumentException("invalid value for \"idempotency_key\" when calling InvoicesApi.invoicesFinalize, must conform to the pattern /^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/.");
        }



        $resourcePath = '/invoices/{id}/finalize';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($idempotency_key !== null) {
            $headerParams['Idempotency-Key'] = ObjectSerializer::toHeaderValue($idempotency_key);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($invoices_finalize_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($invoices_finalize_request));
            } else {
                $httpBody = $invoices_finalize_request;
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
     * Operation invoicesGet
     *
     * Get invoice
     *
     * @param  string $id id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\InvoiceResponse|\RevKeen\Model\ErrorResponse
     */
    public function invoicesGet($id, string $contentType = self::contentTypes['invoicesGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->invoicesGetWithHttpInfo($id, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation invoicesGetWithHttpInfo
     *
     * Get invoice
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\InvoiceResponse|\RevKeen\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function invoicesGetWithHttpInfo($id, string $contentType = self::contentTypes['invoicesGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->invoicesGetRequest($id, $contentType);

        try {
            $options = array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, false)
            );
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw ApiException::fromTransportException($e);
            } catch (ConnectException $e) {
                throw ApiException::fromTransportException($e);
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\InvoiceResponse',
                        $request,
                        $response,
                    );
                default:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ErrorResponse',
                        $request,
                        $response,
                    );
            }



            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\RevKeen\Model\InvoiceResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\InvoiceResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation invoicesGetAsync
     *
     * Get invoice
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesGetAsync($id, string $contentType = self::contentTypes['invoicesGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->invoicesGetAsyncWithHttpInfo($id, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation invoicesGetAsyncWithHttpInfo
     *
     * Get invoice
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesGetAsyncWithHttpInfo($id, string $contentType = self::contentTypes['invoicesGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\InvoiceResponse';
        $request = $this->invoicesGetRequest($id, $contentType);

        return $this->client
            ->sendAsync($request, array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, false)
            ))
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    if ($exception instanceof ApiException) {
                        throw $exception;
                    }
                    throw ApiException::fromTransportException($exception);
                }
            );
    }

    /**
     * Create request for operation 'invoicesGet'
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function invoicesGetRequest($id, string $contentType = self::contentTypes['invoicesGet'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling invoicesGet'
            );
        }


        $resourcePath = '/invoices/{id}';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
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
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation invoicesList
     *
     * List invoices
     *
     * @param  string|null $status Filter by invoice status (optional)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  int|null $offset Number of results to skip (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\InvoiceListResponse|\RevKeen\Model\ErrorResponse
     */
    public function invoicesList($status = null, $customer_id = null, $limit = 20, $offset = 0, string $contentType = self::contentTypes['invoicesList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->invoicesListWithHttpInfo($status, $customer_id, $limit, $offset, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation invoicesListWithHttpInfo
     *
     * List invoices
     *
     * @param  string|null $status Filter by invoice status (optional)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  int|null $offset Number of results to skip (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\InvoiceListResponse|\RevKeen\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function invoicesListWithHttpInfo($status = null, $customer_id = null, $limit = 20, $offset = 0, string $contentType = self::contentTypes['invoicesList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->invoicesListRequest($status, $customer_id, $limit, $offset, $contentType);

        try {
            $options = array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, false)
            );
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw ApiException::fromTransportException($e);
            } catch (ConnectException $e) {
                throw ApiException::fromTransportException($e);
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\InvoiceListResponse',
                        $request,
                        $response,
                    );
                default:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ErrorResponse',
                        $request,
                        $response,
                    );
            }



            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\RevKeen\Model\InvoiceListResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\InvoiceListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation invoicesListAsync
     *
     * List invoices
     *
     * @param  string|null $status Filter by invoice status (optional)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  int|null $offset Number of results to skip (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesListAsync($status = null, $customer_id = null, $limit = 20, $offset = 0, string $contentType = self::contentTypes['invoicesList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->invoicesListAsyncWithHttpInfo($status, $customer_id, $limit, $offset, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation invoicesListAsyncWithHttpInfo
     *
     * List invoices
     *
     * @param  string|null $status Filter by invoice status (optional)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  int|null $offset Number of results to skip (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesListAsyncWithHttpInfo($status = null, $customer_id = null, $limit = 20, $offset = 0, string $contentType = self::contentTypes['invoicesList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\InvoiceListResponse';
        $request = $this->invoicesListRequest($status, $customer_id, $limit, $offset, $contentType);

        return $this->client
            ->sendAsync($request, array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, false)
            ))
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    if ($exception instanceof ApiException) {
                        throw $exception;
                    }
                    throw ApiException::fromTransportException($exception);
                }
            );
    }

    /**
     * Create request for operation 'invoicesList'
     *
     * @param  string|null $status Filter by invoice status (optional)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  int|null $offset Number of results to skip (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function invoicesListRequest($status = null, $customer_id = null, $limit = 20, $offset = 0, string $contentType = self::contentTypes['invoicesList'][0])
    {



        if ($limit !== null && $limit > 100) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling InvoicesApi.invoicesList, must be smaller than or equal to 100.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling InvoicesApi.invoicesList, must be bigger than or equal to 1.');
        }

        if ($offset !== null && $offset < 0) {
            throw new \InvalidArgumentException('invalid value for "$offset" when calling InvoicesApi.invoicesList, must be bigger than or equal to 0.');
        }


        $resourcePath = '/invoices';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $status,
            'status', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $customer_id,
            'customerId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $offset,
            'offset', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
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
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation invoicesMarginEstimate
     *
     * Estimate invoice net by payment rail
     *
     * @param  string $id Invoice ID. (required)
     * @param  \RevKeen\Model\InvoicesMarginEstimateRequest $invoices_margin_estimate_request Margin estimate inputs (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesMarginEstimate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\InvoicesMarginEstimate200Response
     */
    public function invoicesMarginEstimate($id, $invoices_margin_estimate_request, string $contentType = self::contentTypes['invoicesMarginEstimate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->invoicesMarginEstimateWithHttpInfo($id, $invoices_margin_estimate_request, $contentType, $idempotency_key, $request_options);
        return $response;
    }

    /**
     * Operation invoicesMarginEstimateWithHttpInfo
     *
     * Estimate invoice net by payment rail
     *
     * @param  string $id Invoice ID. (required)
     * @param  \RevKeen\Model\InvoicesMarginEstimateRequest $invoices_margin_estimate_request Margin estimate inputs (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesMarginEstimate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\InvoicesMarginEstimate200Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function invoicesMarginEstimateWithHttpInfo($id, $invoices_margin_estimate_request, string $contentType = self::contentTypes['invoicesMarginEstimate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->invoicesMarginEstimateRequest($id, $invoices_margin_estimate_request, $contentType, $idempotency_key);

        try {
            $options = array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            );
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw ApiException::fromTransportException($e);
            } catch (ConnectException $e) {
                throw ApiException::fromTransportException($e);
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\InvoicesMarginEstimate200Response',
                        $request,
                        $response,
                    );
            }



            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\RevKeen\Model\InvoicesMarginEstimate200Response',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\InvoicesMarginEstimate200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation invoicesMarginEstimateAsync
     *
     * Estimate invoice net by payment rail
     *
     * @param  string $id Invoice ID. (required)
     * @param  \RevKeen\Model\InvoicesMarginEstimateRequest $invoices_margin_estimate_request Margin estimate inputs (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesMarginEstimate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesMarginEstimateAsync($id, $invoices_margin_estimate_request, string $contentType = self::contentTypes['invoicesMarginEstimate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        return $this->invoicesMarginEstimateAsyncWithHttpInfo($id, $invoices_margin_estimate_request, $contentType, $idempotency_key, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation invoicesMarginEstimateAsyncWithHttpInfo
     *
     * Estimate invoice net by payment rail
     *
     * @param  string $id Invoice ID. (required)
     * @param  \RevKeen\Model\InvoicesMarginEstimateRequest $invoices_margin_estimate_request Margin estimate inputs (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesMarginEstimate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesMarginEstimateAsyncWithHttpInfo($id, $invoices_margin_estimate_request, string $contentType = self::contentTypes['invoicesMarginEstimate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\InvoicesMarginEstimate200Response';
        $request = $this->invoicesMarginEstimateRequest($id, $invoices_margin_estimate_request, $contentType, $idempotency_key);

        return $this->client
            ->sendAsync($request, array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            ))
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    if ($exception instanceof ApiException) {
                        throw $exception;
                    }
                    throw ApiException::fromTransportException($exception);
                }
            );
    }

    /**
     * Create request for operation 'invoicesMarginEstimate'
     *
     * @param  string $id Invoice ID. (required)
     * @param  \RevKeen\Model\InvoicesMarginEstimateRequest $invoices_margin_estimate_request Margin estimate inputs (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesMarginEstimate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function invoicesMarginEstimateRequest($id, $invoices_margin_estimate_request, string $contentType = self::contentTypes['invoicesMarginEstimate'][0], ?string $idempotency_key = null)
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling invoicesMarginEstimate'
            );
        }

        // verify the required parameter 'invoices_margin_estimate_request' is set
        if ($invoices_margin_estimate_request === null || (is_array($invoices_margin_estimate_request) && count($invoices_margin_estimate_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoices_margin_estimate_request when calling invoicesMarginEstimate'
            );
        }

        if ($idempotency_key !== null && !preg_match("/^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/", $idempotency_key)) {
            throw new \InvalidArgumentException("invalid value for \"idempotency_key\" when calling InvoicesApi.invoicesMarginEstimate, must conform to the pattern /^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/.");
        }


        $resourcePath = '/invoices/{id}/margin-estimate';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($idempotency_key !== null) {
            $headerParams['Idempotency-Key'] = ObjectSerializer::toHeaderValue($idempotency_key);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($invoices_margin_estimate_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($invoices_margin_estimate_request));
            } else {
                $httpBody = $invoices_margin_estimate_request;
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
     * Operation invoicesSend
     *
     * Send an invoice
     *
     * @param  string $id id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesSendRequest|null $invoices_send_request Send options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesSend'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\InvoiceResponse
     */
    public function invoicesSend($id, $invoices_send_request = null, string $contentType = self::contentTypes['invoicesSend'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->invoicesSendWithHttpInfo($id, $invoices_send_request, $contentType, $idempotency_key, $request_options);
        return $response;
    }

    /**
     * Operation invoicesSendWithHttpInfo
     *
     * Send an invoice
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesSendRequest|null $invoices_send_request Send options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesSend'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\InvoiceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function invoicesSendWithHttpInfo($id, $invoices_send_request = null, string $contentType = self::contentTypes['invoicesSend'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->invoicesSendRequest($id, $invoices_send_request, $contentType, $idempotency_key);

        try {
            $options = array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            );
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw ApiException::fromTransportException($e);
            } catch (ConnectException $e) {
                throw ApiException::fromTransportException($e);
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\InvoiceResponse',
                        $request,
                        $response,
                    );
            }



            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\RevKeen\Model\InvoiceResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\InvoiceResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation invoicesSendAsync
     *
     * Send an invoice
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesSendRequest|null $invoices_send_request Send options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesSend'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesSendAsync($id, $invoices_send_request = null, string $contentType = self::contentTypes['invoicesSend'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        return $this->invoicesSendAsyncWithHttpInfo($id, $invoices_send_request, $contentType, $idempotency_key, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation invoicesSendAsyncWithHttpInfo
     *
     * Send an invoice
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesSendRequest|null $invoices_send_request Send options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesSend'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesSendAsyncWithHttpInfo($id, $invoices_send_request = null, string $contentType = self::contentTypes['invoicesSend'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\InvoiceResponse';
        $request = $this->invoicesSendRequest($id, $invoices_send_request, $contentType, $idempotency_key);

        return $this->client
            ->sendAsync($request, array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            ))
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    if ($exception instanceof ApiException) {
                        throw $exception;
                    }
                    throw ApiException::fromTransportException($exception);
                }
            );
    }

    /**
     * Create request for operation 'invoicesSend'
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesSendRequest|null $invoices_send_request Send options (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesSend'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function invoicesSendRequest($id, $invoices_send_request = null, string $contentType = self::contentTypes['invoicesSend'][0], ?string $idempotency_key = null)
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling invoicesSend'
            );
        }

        if ($idempotency_key !== null && !preg_match("/^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/", $idempotency_key)) {
            throw new \InvalidArgumentException("invalid value for \"idempotency_key\" when calling InvoicesApi.invoicesSend, must conform to the pattern /^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/.");
        }



        $resourcePath = '/invoices/{id}/send';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($idempotency_key !== null) {
            $headerParams['Idempotency-Key'] = ObjectSerializer::toHeaderValue($idempotency_key);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($invoices_send_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($invoices_send_request));
            } else {
                $httpBody = $invoices_send_request;
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
     * Operation invoicesUpdate
     *
     * Update invoice
     *
     * @param  string $id id (required)
     * @param  \RevKeen\Model\InvoicesUpdateRequest $invoices_update_request Invoice update details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesUpdate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\InvoiceResponse|\RevKeen\Model\ErrorResponse
     */
    public function invoicesUpdate($id, $invoices_update_request, string $contentType = self::contentTypes['invoicesUpdate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->invoicesUpdateWithHttpInfo($id, $invoices_update_request, $contentType, $idempotency_key, $request_options);
        return $response;
    }

    /**
     * Operation invoicesUpdateWithHttpInfo
     *
     * Update invoice
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\InvoicesUpdateRequest $invoices_update_request Invoice update details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesUpdate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\InvoiceResponse|\RevKeen\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function invoicesUpdateWithHttpInfo($id, $invoices_update_request, string $contentType = self::contentTypes['invoicesUpdate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->invoicesUpdateRequest($id, $invoices_update_request, $contentType, $idempotency_key);

        try {
            $options = array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            );
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw ApiException::fromTransportException($e);
            } catch (ConnectException $e) {
                throw ApiException::fromTransportException($e);
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\InvoiceResponse',
                        $request,
                        $response,
                    );
                default:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ErrorResponse',
                        $request,
                        $response,
                    );
            }



            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\RevKeen\Model\InvoiceResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\InvoiceResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation invoicesUpdateAsync
     *
     * Update invoice
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\InvoicesUpdateRequest $invoices_update_request Invoice update details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesUpdateAsync($id, $invoices_update_request, string $contentType = self::contentTypes['invoicesUpdate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        return $this->invoicesUpdateAsyncWithHttpInfo($id, $invoices_update_request, $contentType, $idempotency_key, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation invoicesUpdateAsyncWithHttpInfo
     *
     * Update invoice
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\InvoicesUpdateRequest $invoices_update_request Invoice update details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesUpdateAsyncWithHttpInfo($id, $invoices_update_request, string $contentType = self::contentTypes['invoicesUpdate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\InvoiceResponse';
        $request = $this->invoicesUpdateRequest($id, $invoices_update_request, $contentType, $idempotency_key);

        return $this->client
            ->sendAsync($request, array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            ))
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    if ($exception instanceof ApiException) {
                        throw $exception;
                    }
                    throw ApiException::fromTransportException($exception);
                }
            );
    }

    /**
     * Create request for operation 'invoicesUpdate'
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\InvoicesUpdateRequest $invoices_update_request Invoice update details (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function invoicesUpdateRequest($id, $invoices_update_request, string $contentType = self::contentTypes['invoicesUpdate'][0], ?string $idempotency_key = null)
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling invoicesUpdate'
            );
        }

        // verify the required parameter 'invoices_update_request' is set
        if ($invoices_update_request === null || (is_array($invoices_update_request) && count($invoices_update_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoices_update_request when calling invoicesUpdate'
            );
        }

        if ($idempotency_key !== null && !preg_match("/^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/", $idempotency_key)) {
            throw new \InvalidArgumentException("invalid value for \"idempotency_key\" when calling InvoicesApi.invoicesUpdate, must conform to the pattern /^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/.");
        }


        $resourcePath = '/invoices/{id}';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($idempotency_key !== null) {
            $headerParams['Idempotency-Key'] = ObjectSerializer::toHeaderValue($idempotency_key);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($invoices_update_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($invoices_update_request));
            } else {
                $httpBody = $invoices_update_request;
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
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation invoicesVoid
     *
     * Void an invoice
     *
     * @param  string $id id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesVoidRequest|null $invoices_void_request Void details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesVoid'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\InvoiceResponse
     */
    public function invoicesVoid($id, $invoices_void_request = null, string $contentType = self::contentTypes['invoicesVoid'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->invoicesVoidWithHttpInfo($id, $invoices_void_request, $contentType, $idempotency_key, $request_options);
        return $response;
    }

    /**
     * Operation invoicesVoidWithHttpInfo
     *
     * Void an invoice
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesVoidRequest|null $invoices_void_request Void details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesVoid'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\InvoiceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function invoicesVoidWithHttpInfo($id, $invoices_void_request = null, string $contentType = self::contentTypes['invoicesVoid'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->invoicesVoidRequest($id, $invoices_void_request, $contentType, $idempotency_key);

        try {
            $options = array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            );
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw ApiException::fromTransportException($e);
            } catch (ConnectException $e) {
                throw ApiException::fromTransportException($e);
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\InvoiceResponse',
                        $request,
                        $response,
                    );
            }



            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\RevKeen\Model\InvoiceResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\InvoiceResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation invoicesVoidAsync
     *
     * Void an invoice
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesVoidRequest|null $invoices_void_request Void details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesVoid'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesVoidAsync($id, $invoices_void_request = null, string $contentType = self::contentTypes['invoicesVoid'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        return $this->invoicesVoidAsyncWithHttpInfo($id, $invoices_void_request, $contentType, $idempotency_key, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation invoicesVoidAsyncWithHttpInfo
     *
     * Void an invoice
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesVoidRequest|null $invoices_void_request Void details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesVoid'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function invoicesVoidAsyncWithHttpInfo($id, $invoices_void_request = null, string $contentType = self::contentTypes['invoicesVoid'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\InvoiceResponse';
        $request = $this->invoicesVoidRequest($id, $invoices_void_request, $contentType, $idempotency_key);

        return $this->client
            ->sendAsync($request, array_replace(
                $this->createHttpClientOption(),
                ClientFactory::requestOptions($request_options, true)
            ))
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    if ($exception instanceof ApiException) {
                        throw $exception;
                    }
                    throw ApiException::fromTransportException($exception);
                }
            );
    }

    /**
     * Create request for operation 'invoicesVoid'
     *
     * @param  string $id (required)
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\InvoicesVoidRequest|null $invoices_void_request Void details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['invoicesVoid'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function invoicesVoidRequest($id, $invoices_void_request = null, string $contentType = self::contentTypes['invoicesVoid'][0], ?string $idempotency_key = null)
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling invoicesVoid'
            );
        }

        if ($idempotency_key !== null && !preg_match("/^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/", $idempotency_key)) {
            throw new \InvalidArgumentException("invalid value for \"idempotency_key\" when calling InvoicesApi.invoicesVoid, must conform to the pattern /^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/.");
        }



        $resourcePath = '/invoices/{id}/void';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($idempotency_key !== null) {
            $headerParams['Idempotency-Key'] = ObjectSerializer::toHeaderValue($idempotency_key);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($invoices_void_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($invoices_void_request));
            } else {
                $httpBody = $invoices_void_request;
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
