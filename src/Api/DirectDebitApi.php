<?php

/**
 * DirectDebitApi
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
 * DirectDebitApi Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DirectDebitApi
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
        'ddMandateRequestsGet' => [
            'application/json',
        ],
        'ddPreview' => [
            'application/json',
        ],
        'ddValidate' => [
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
     * Operation ddMandateRequestsGet
     *
     * Look up a pending signed mandate request
     *
     * @param  string $token Signed mandate-request token from the emailed link (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddMandateRequestsGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\MandateRequestLookupResponse|\RevKeen\Model\RateLimitError
     */
    public function ddMandateRequestsGet($token, string $contentType = self::contentTypes['ddMandateRequestsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->ddMandateRequestsGetWithHttpInfo($token, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation ddMandateRequestsGetWithHttpInfo
     *
     * Look up a pending signed mandate request
     *
     * @param  string $token Signed mandate-request token from the emailed link (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddMandateRequestsGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\MandateRequestLookupResponse|\RevKeen\Model\RateLimitError, HTTP status code, HTTP response headers (array of strings)
     */
    public function ddMandateRequestsGetWithHttpInfo($token, string $contentType = self::contentTypes['ddMandateRequestsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->ddMandateRequestsGetRequest($token, $contentType);

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
                        '\RevKeen\Model\MandateRequestLookupResponse',
                        $request,
                        $response,
                    );
                case 429:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\RateLimitError',
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
                '\RevKeen\Model\MandateRequestLookupResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\MandateRequestLookupResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\RateLimitError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation ddMandateRequestsGetAsync
     *
     * Look up a pending signed mandate request
     *
     * @param  string $token Signed mandate-request token from the emailed link (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddMandateRequestsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ddMandateRequestsGetAsync($token, string $contentType = self::contentTypes['ddMandateRequestsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->ddMandateRequestsGetAsyncWithHttpInfo($token, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ddMandateRequestsGetAsyncWithHttpInfo
     *
     * Look up a pending signed mandate request
     *
     * @param  string $token Signed mandate-request token from the emailed link (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddMandateRequestsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ddMandateRequestsGetAsyncWithHttpInfo($token, string $contentType = self::contentTypes['ddMandateRequestsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\MandateRequestLookupResponse';
        $request = $this->ddMandateRequestsGetRequest($token, $contentType);

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
     * Create request for operation 'ddMandateRequestsGet'
     *
     * @param  string $token Signed mandate-request token from the emailed link (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddMandateRequestsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function ddMandateRequestsGetRequest($token, string $contentType = self::contentTypes['ddMandateRequestsGet'][0])
    {

        // verify the required parameter 'token' is set
        if ($token === null || (is_array($token) && count($token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $token when calling ddMandateRequestsGet'
            );
        }


        $resourcePath = '/dd/mandate-requests/{token}';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($token !== null) {
            $resourcePath = str_replace(
                '{token}',
                ObjectSerializer::toPathValue($token),
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
     * Operation ddPreview
     *
     * Preview the Direct Debit collection date chain
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\PreviewCollectionRequest|null $preview_collection_request preview_collection_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddPreview'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\PreviewCollectionResponse|\RevKeen\Model\AuthenticationError
     */
    public function ddPreview($preview_collection_request = null, string $contentType = self::contentTypes['ddPreview'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->ddPreviewWithHttpInfo($preview_collection_request, $contentType, $idempotency_key, $request_options);
        return $response;
    }

    /**
     * Operation ddPreviewWithHttpInfo
     *
     * Preview the Direct Debit collection date chain
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\PreviewCollectionRequest|null $preview_collection_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddPreview'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\PreviewCollectionResponse|\RevKeen\Model\AuthenticationError, HTTP status code, HTTP response headers (array of strings)
     */
    public function ddPreviewWithHttpInfo($preview_collection_request = null, string $contentType = self::contentTypes['ddPreview'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->ddPreviewRequest($preview_collection_request, $contentType, $idempotency_key);

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
                        '\RevKeen\Model\PreviewCollectionResponse',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\AuthenticationError',
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
                '\RevKeen\Model\PreviewCollectionResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PreviewCollectionResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\AuthenticationError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation ddPreviewAsync
     *
     * Preview the Direct Debit collection date chain
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\PreviewCollectionRequest|null $preview_collection_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddPreview'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ddPreviewAsync($preview_collection_request = null, string $contentType = self::contentTypes['ddPreview'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        return $this->ddPreviewAsyncWithHttpInfo($preview_collection_request, $contentType, $idempotency_key, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ddPreviewAsyncWithHttpInfo
     *
     * Preview the Direct Debit collection date chain
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\PreviewCollectionRequest|null $preview_collection_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddPreview'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ddPreviewAsyncWithHttpInfo($preview_collection_request = null, string $contentType = self::contentTypes['ddPreview'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\PreviewCollectionResponse';
        $request = $this->ddPreviewRequest($preview_collection_request, $contentType, $idempotency_key);

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
     * Create request for operation 'ddPreview'
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\PreviewCollectionRequest|null $preview_collection_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddPreview'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function ddPreviewRequest($preview_collection_request = null, string $contentType = self::contentTypes['ddPreview'][0], ?string $idempotency_key = null)
    {

        if ($idempotency_key !== null && !preg_match("/^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/", $idempotency_key)) {
            throw new \InvalidArgumentException("invalid value for \"idempotency_key\" when calling DirectDebitApi.ddPreview, must conform to the pattern /^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/.");
        }



        $resourcePath = '/dd/preview';
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
        if (isset($preview_collection_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($preview_collection_request));
            } else {
                $httpBody = $preview_collection_request;
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
     * Operation ddValidate
     *
     * Validate a UK bank account for Direct Debit
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\ValidateBankAccountRequest|null $validate_bank_account_request validate_bank_account_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddValidate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ValidateBankAccountResponse|\RevKeen\Model\AuthenticationError
     */
    public function ddValidate($validate_bank_account_request = null, string $contentType = self::contentTypes['ddValidate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->ddValidateWithHttpInfo($validate_bank_account_request, $contentType, $idempotency_key, $request_options);
        return $response;
    }

    /**
     * Operation ddValidateWithHttpInfo
     *
     * Validate a UK bank account for Direct Debit
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\ValidateBankAccountRequest|null $validate_bank_account_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddValidate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ValidateBankAccountResponse|\RevKeen\Model\AuthenticationError, HTTP status code, HTTP response headers (array of strings)
     */
    public function ddValidateWithHttpInfo($validate_bank_account_request = null, string $contentType = self::contentTypes['ddValidate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->ddValidateRequest($validate_bank_account_request, $contentType, $idempotency_key);

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
                        '\RevKeen\Model\ValidateBankAccountResponse',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\AuthenticationError',
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
                '\RevKeen\Model\ValidateBankAccountResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ValidateBankAccountResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\AuthenticationError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation ddValidateAsync
     *
     * Validate a UK bank account for Direct Debit
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\ValidateBankAccountRequest|null $validate_bank_account_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddValidate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ddValidateAsync($validate_bank_account_request = null, string $contentType = self::contentTypes['ddValidate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        return $this->ddValidateAsyncWithHttpInfo($validate_bank_account_request, $contentType, $idempotency_key, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ddValidateAsyncWithHttpInfo
     *
     * Validate a UK bank account for Direct Debit
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\ValidateBankAccountRequest|null $validate_bank_account_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddValidate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ddValidateAsyncWithHttpInfo($validate_bank_account_request = null, string $contentType = self::contentTypes['ddValidate'][0], ?string $idempotency_key = null, ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ValidateBankAccountResponse';
        $request = $this->ddValidateRequest($validate_bank_account_request, $contentType, $idempotency_key);

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
     * Create request for operation 'ddValidate'
     *
     * @param  string|null $idempotency_key Stable caller-owned key for this logical mutation. Reuse only with an identical request. (optional)
     * @param  \RevKeen\Model\ValidateBankAccountRequest|null $validate_bank_account_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['ddValidate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function ddValidateRequest($validate_bank_account_request = null, string $contentType = self::contentTypes['ddValidate'][0], ?string $idempotency_key = null)
    {

        if ($idempotency_key !== null && !preg_match("/^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/", $idempotency_key)) {
            throw new \InvalidArgumentException("invalid value for \"idempotency_key\" when calling DirectDebitApi.ddValidate, must conform to the pattern /^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/.");
        }



        $resourcePath = '/dd/validate';
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
        if (isset($validate_bank_account_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($validate_bank_account_request));
            } else {
                $httpBody = $validate_bank_account_request;
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
