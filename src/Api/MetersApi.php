<?php

/**
 * MetersApi
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
 * MetersApi Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MetersApi
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
        'metersCreate' => [
            'application/json',
        ],
        'metersGet' => [
            'application/json',
        ],
        'metersList' => [
            'application/json',
        ],
        'metersQuantities' => [
            'application/json',
        ],
        'metersUpdate' => [
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
     * Operation metersCreate
     *
     * Create a meter
     *
     * @param  \RevKeen\Model\CreateMeterRequest|null $create_meter_request create_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\CreateMeterResponse|\RevKeen\Model\MeterError|\RevKeen\Model\AuthenticationError
     */
    public function metersCreate($create_meter_request = null, string $contentType = self::contentTypes['metersCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->metersCreateWithHttpInfo($create_meter_request, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation metersCreateWithHttpInfo
     *
     * Create a meter
     *
     * @param  \RevKeen\Model\CreateMeterRequest|null $create_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\CreateMeterResponse|\RevKeen\Model\MeterError|\RevKeen\Model\AuthenticationError, HTTP status code, HTTP response headers (array of strings)
     */
    public function metersCreateWithHttpInfo($create_meter_request = null, string $contentType = self::contentTypes['metersCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->metersCreateRequest($create_meter_request, $contentType);

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
                case 201:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\CreateMeterResponse',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\MeterError',
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
                '\RevKeen\Model\CreateMeterResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\CreateMeterResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\MeterError',
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
     * Operation metersCreateAsync
     *
     * Create a meter
     *
     * @param  \RevKeen\Model\CreateMeterRequest|null $create_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersCreateAsync($create_meter_request = null, string $contentType = self::contentTypes['metersCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->metersCreateAsyncWithHttpInfo($create_meter_request, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation metersCreateAsyncWithHttpInfo
     *
     * Create a meter
     *
     * @param  \RevKeen\Model\CreateMeterRequest|null $create_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersCreateAsyncWithHttpInfo($create_meter_request = null, string $contentType = self::contentTypes['metersCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\CreateMeterResponse';
        $request = $this->metersCreateRequest($create_meter_request, $contentType);

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
     * Create request for operation 'metersCreate'
     *
     * @param  \RevKeen\Model\CreateMeterRequest|null $create_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function metersCreateRequest($create_meter_request = null, string $contentType = self::contentTypes['metersCreate'][0])
    {



        $resourcePath = '/meters';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_meter_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_meter_request));
            } else {
                $httpBody = $create_meter_request;
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
     * Operation metersGet
     *
     * Get a meter
     *
     * @param  string $id Meter ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\MeterGetResponse|\RevKeen\Model\AuthenticationError|\RevKeen\Model\MeterError
     */
    public function metersGet($id, string $contentType = self::contentTypes['metersGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->metersGetWithHttpInfo($id, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation metersGetWithHttpInfo
     *
     * Get a meter
     *
     * @param  string $id Meter ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\MeterGetResponse|\RevKeen\Model\AuthenticationError|\RevKeen\Model\MeterError, HTTP status code, HTTP response headers (array of strings)
     */
    public function metersGetWithHttpInfo($id, string $contentType = self::contentTypes['metersGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->metersGetRequest($id, $contentType);

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
                        '\RevKeen\Model\MeterGetResponse',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\AuthenticationError',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\MeterError',
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
                '\RevKeen\Model\MeterGetResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\MeterGetResponse',
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
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\MeterError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation metersGetAsync
     *
     * Get a meter
     *
     * @param  string $id Meter ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersGetAsync($id, string $contentType = self::contentTypes['metersGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->metersGetAsyncWithHttpInfo($id, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation metersGetAsyncWithHttpInfo
     *
     * Get a meter
     *
     * @param  string $id Meter ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersGetAsyncWithHttpInfo($id, string $contentType = self::contentTypes['metersGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\MeterGetResponse';
        $request = $this->metersGetRequest($id, $contentType);

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
     * Create request for operation 'metersGet'
     *
     * @param  string $id Meter ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function metersGetRequest($id, string $contentType = self::contentTypes['metersGet'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling metersGet'
            );
        }


        $resourcePath = '/meters/{id}';
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
     * Operation metersList
     *
     * List meters
     *
     * @param  string|null $include_archived Include archived meters (optional)
     * @param  string|null $limit Max results (default 50, max 100) (optional)
     * @param  string|null $offset Pagination offset (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\MeterListResponse|\RevKeen\Model\AuthenticationError
     */
    public function metersList($include_archived = null, $limit = null, $offset = null, string $contentType = self::contentTypes['metersList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->metersListWithHttpInfo($include_archived, $limit, $offset, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation metersListWithHttpInfo
     *
     * List meters
     *
     * @param  string|null $include_archived Include archived meters (optional)
     * @param  string|null $limit Max results (default 50, max 100) (optional)
     * @param  string|null $offset Pagination offset (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\MeterListResponse|\RevKeen\Model\AuthenticationError, HTTP status code, HTTP response headers (array of strings)
     */
    public function metersListWithHttpInfo($include_archived = null, $limit = null, $offset = null, string $contentType = self::contentTypes['metersList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->metersListRequest($include_archived, $limit, $offset, $contentType);

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
                        '\RevKeen\Model\MeterListResponse',
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
                '\RevKeen\Model\MeterListResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\MeterListResponse',
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
     * Operation metersListAsync
     *
     * List meters
     *
     * @param  string|null $include_archived Include archived meters (optional)
     * @param  string|null $limit Max results (default 50, max 100) (optional)
     * @param  string|null $offset Pagination offset (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersListAsync($include_archived = null, $limit = null, $offset = null, string $contentType = self::contentTypes['metersList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->metersListAsyncWithHttpInfo($include_archived, $limit, $offset, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation metersListAsyncWithHttpInfo
     *
     * List meters
     *
     * @param  string|null $include_archived Include archived meters (optional)
     * @param  string|null $limit Max results (default 50, max 100) (optional)
     * @param  string|null $offset Pagination offset (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersListAsyncWithHttpInfo($include_archived = null, $limit = null, $offset = null, string $contentType = self::contentTypes['metersList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\MeterListResponse';
        $request = $this->metersListRequest($include_archived, $limit, $offset, $contentType);

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
     * Create request for operation 'metersList'
     *
     * @param  string|null $include_archived Include archived meters (optional)
     * @param  string|null $limit Max results (default 50, max 100) (optional)
     * @param  string|null $offset Pagination offset (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function metersListRequest($include_archived = null, $limit = null, $offset = null, string $contentType = self::contentTypes['metersList'][0])
    {





        $resourcePath = '/meters';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $include_archived,
            'include_archived', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $offset,
            'offset', // param base name
            'string', // openApiType
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
     * Operation metersQuantities
     *
     * Get meter quantities
     *
     * @param  string $id Meter ID (required)
     * @param  \DateTime $start_timestamp Start timestamp (ISO 8601, UTC) (required)
     * @param  \DateTime $end_timestamp End timestamp (ISO 8601, UTC) (required)
     * @param  string $interval Bucket width. UTC date_trunc semantics; week is ISO (Monday). (required)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  string|null $external_customer_id Filter by the merchant&#39;s external customer ID (optional)
     * @param  string|null $subscription_id Filter by subscription ID (optional)
     * @param  string|null $timezone Only UTC is supported. Omit or pass UTC. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersQuantities'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\MeterQuantitiesResponse|\RevKeen\Model\MeterError|\RevKeen\Model\AuthenticationError|\RevKeen\Model\MeterError
     */
    public function metersQuantities($id, $start_timestamp, $end_timestamp, $interval, $customer_id = null, $external_customer_id = null, $subscription_id = null, $timezone = null, string $contentType = self::contentTypes['metersQuantities'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->metersQuantitiesWithHttpInfo($id, $start_timestamp, $end_timestamp, $interval, $customer_id, $external_customer_id, $subscription_id, $timezone, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation metersQuantitiesWithHttpInfo
     *
     * Get meter quantities
     *
     * @param  string $id Meter ID (required)
     * @param  \DateTime $start_timestamp Start timestamp (ISO 8601, UTC) (required)
     * @param  \DateTime $end_timestamp End timestamp (ISO 8601, UTC) (required)
     * @param  string $interval Bucket width. UTC date_trunc semantics; week is ISO (Monday). (required)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  string|null $external_customer_id Filter by the merchant&#39;s external customer ID (optional)
     * @param  string|null $subscription_id Filter by subscription ID (optional)
     * @param  string|null $timezone Only UTC is supported. Omit or pass UTC. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersQuantities'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\MeterQuantitiesResponse|\RevKeen\Model\MeterError|\RevKeen\Model\AuthenticationError|\RevKeen\Model\MeterError, HTTP status code, HTTP response headers (array of strings)
     */
    public function metersQuantitiesWithHttpInfo($id, $start_timestamp, $end_timestamp, $interval, $customer_id = null, $external_customer_id = null, $subscription_id = null, $timezone = null, string $contentType = self::contentTypes['metersQuantities'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->metersQuantitiesRequest($id, $start_timestamp, $end_timestamp, $interval, $customer_id, $external_customer_id, $subscription_id, $timezone, $contentType);

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
                        '\RevKeen\Model\MeterQuantitiesResponse',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\MeterError',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\AuthenticationError',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\MeterError',
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
                '\RevKeen\Model\MeterQuantitiesResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\MeterQuantitiesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\MeterError',
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
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\MeterError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation metersQuantitiesAsync
     *
     * Get meter quantities
     *
     * @param  string $id Meter ID (required)
     * @param  \DateTime $start_timestamp Start timestamp (ISO 8601, UTC) (required)
     * @param  \DateTime $end_timestamp End timestamp (ISO 8601, UTC) (required)
     * @param  string $interval Bucket width. UTC date_trunc semantics; week is ISO (Monday). (required)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  string|null $external_customer_id Filter by the merchant&#39;s external customer ID (optional)
     * @param  string|null $subscription_id Filter by subscription ID (optional)
     * @param  string|null $timezone Only UTC is supported. Omit or pass UTC. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersQuantities'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersQuantitiesAsync($id, $start_timestamp, $end_timestamp, $interval, $customer_id = null, $external_customer_id = null, $subscription_id = null, $timezone = null, string $contentType = self::contentTypes['metersQuantities'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->metersQuantitiesAsyncWithHttpInfo($id, $start_timestamp, $end_timestamp, $interval, $customer_id, $external_customer_id, $subscription_id, $timezone, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation metersQuantitiesAsyncWithHttpInfo
     *
     * Get meter quantities
     *
     * @param  string $id Meter ID (required)
     * @param  \DateTime $start_timestamp Start timestamp (ISO 8601, UTC) (required)
     * @param  \DateTime $end_timestamp End timestamp (ISO 8601, UTC) (required)
     * @param  string $interval Bucket width. UTC date_trunc semantics; week is ISO (Monday). (required)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  string|null $external_customer_id Filter by the merchant&#39;s external customer ID (optional)
     * @param  string|null $subscription_id Filter by subscription ID (optional)
     * @param  string|null $timezone Only UTC is supported. Omit or pass UTC. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersQuantities'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersQuantitiesAsyncWithHttpInfo($id, $start_timestamp, $end_timestamp, $interval, $customer_id = null, $external_customer_id = null, $subscription_id = null, $timezone = null, string $contentType = self::contentTypes['metersQuantities'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\MeterQuantitiesResponse';
        $request = $this->metersQuantitiesRequest($id, $start_timestamp, $end_timestamp, $interval, $customer_id, $external_customer_id, $subscription_id, $timezone, $contentType);

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
     * Create request for operation 'metersQuantities'
     *
     * @param  string $id Meter ID (required)
     * @param  \DateTime $start_timestamp Start timestamp (ISO 8601, UTC) (required)
     * @param  \DateTime $end_timestamp End timestamp (ISO 8601, UTC) (required)
     * @param  string $interval Bucket width. UTC date_trunc semantics; week is ISO (Monday). (required)
     * @param  string|null $customer_id Filter by customer ID (optional)
     * @param  string|null $external_customer_id Filter by the merchant&#39;s external customer ID (optional)
     * @param  string|null $subscription_id Filter by subscription ID (optional)
     * @param  string|null $timezone Only UTC is supported. Omit or pass UTC. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersQuantities'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function metersQuantitiesRequest($id, $start_timestamp, $end_timestamp, $interval, $customer_id = null, $external_customer_id = null, $subscription_id = null, $timezone = null, string $contentType = self::contentTypes['metersQuantities'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling metersQuantities'
            );
        }

        // verify the required parameter 'start_timestamp' is set
        if ($start_timestamp === null || (is_array($start_timestamp) && count($start_timestamp) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $start_timestamp when calling metersQuantities'
            );
        }

        // verify the required parameter 'end_timestamp' is set
        if ($end_timestamp === null || (is_array($end_timestamp) && count($end_timestamp) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $end_timestamp when calling metersQuantities'
            );
        }

        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling metersQuantities'
            );
        }






        $resourcePath = '/meters/{id}/quantities';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $start_timestamp,
            'start_timestamp', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $end_timestamp,
            'end_timestamp', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $interval,
            'interval', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $customer_id,
            'customer_id', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $external_customer_id,
            'external_customer_id', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $subscription_id,
            'subscription_id', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $timezone,
            'timezone', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


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
     * Operation metersUpdate
     *
     * Update a meter
     *
     * @param  string $id Meter ID (required)
     * @param  \RevKeen\Model\UpdateMeterRequest|null $update_meter_request update_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersUpdate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\UpdateMeterResponse|\RevKeen\Model\MeterError|\RevKeen\Model\AuthenticationError
     */
    public function metersUpdate($id, $update_meter_request = null, string $contentType = self::contentTypes['metersUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->metersUpdateWithHttpInfo($id, $update_meter_request, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation metersUpdateWithHttpInfo
     *
     * Update a meter
     *
     * @param  string $id Meter ID (required)
     * @param  \RevKeen\Model\UpdateMeterRequest|null $update_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersUpdate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\UpdateMeterResponse|\RevKeen\Model\MeterError|\RevKeen\Model\AuthenticationError, HTTP status code, HTTP response headers (array of strings)
     */
    public function metersUpdateWithHttpInfo($id, $update_meter_request = null, string $contentType = self::contentTypes['metersUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->metersUpdateRequest($id, $update_meter_request, $contentType);

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
                        '\RevKeen\Model\UpdateMeterResponse',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\MeterError',
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
                '\RevKeen\Model\UpdateMeterResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\UpdateMeterResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\MeterError',
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
     * Operation metersUpdateAsync
     *
     * Update a meter
     *
     * @param  string $id Meter ID (required)
     * @param  \RevKeen\Model\UpdateMeterRequest|null $update_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersUpdateAsync($id, $update_meter_request = null, string $contentType = self::contentTypes['metersUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->metersUpdateAsyncWithHttpInfo($id, $update_meter_request, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation metersUpdateAsyncWithHttpInfo
     *
     * Update a meter
     *
     * @param  string $id Meter ID (required)
     * @param  \RevKeen\Model\UpdateMeterRequest|null $update_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function metersUpdateAsyncWithHttpInfo($id, $update_meter_request = null, string $contentType = self::contentTypes['metersUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\UpdateMeterResponse';
        $request = $this->metersUpdateRequest($id, $update_meter_request, $contentType);

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
     * Create request for operation 'metersUpdate'
     *
     * @param  string $id Meter ID (required)
     * @param  \RevKeen\Model\UpdateMeterRequest|null $update_meter_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['metersUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function metersUpdateRequest($id, $update_meter_request = null, string $contentType = self::contentTypes['metersUpdate'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling metersUpdate'
            );
        }



        $resourcePath = '/meters/{id}';
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
        if (isset($update_meter_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_meter_request));
            } else {
                $httpBody = $update_meter_request;
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
            'PATCH',
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
