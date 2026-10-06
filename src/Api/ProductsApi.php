<?php

/**
 * ProductsApi
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
 * ProductsApi Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ProductsApi
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
        'productCollectionsCreate' => [
            'application/json',
        ],
        'productCollectionsDelete' => [
            'application/json',
        ],
        'productCollectionsGet' => [
            'application/json',
        ],
        'productCollectionsList' => [
            'application/json',
        ],
        'productCollectionsUpdate' => [
            'application/json',
        ],
        'productsCreate' => [
            'application/json',
        ],
        'productsGet' => [
            'application/json',
        ],
        'productsList' => [
            'application/json',
        ],
        'productsUpdate' => [
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
     * Operation productCollectionsCreate
     *
     * Create a product collection
     *
     * @param  \RevKeen\Model\ProductCollectionCreateRequest|null $product_collection_create_request product_collection_create_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ProductCollectionCreateResponse|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError
     */
    public function productCollectionsCreate($product_collection_create_request = null, string $contentType = self::contentTypes['productCollectionsCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->productCollectionsCreateWithHttpInfo($product_collection_create_request, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation productCollectionsCreateWithHttpInfo
     *
     * Create a product collection
     *
     * @param  \RevKeen\Model\ProductCollectionCreateRequest|null $product_collection_create_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ProductCollectionCreateResponse|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError, HTTP status code, HTTP response headers (array of strings)
     */
    public function productCollectionsCreateWithHttpInfo($product_collection_create_request = null, string $contentType = self::contentTypes['productCollectionsCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->productCollectionsCreateRequest($product_collection_create_request, $contentType);

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
                        '\RevKeen\Model\ProductCollectionCreateResponse',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
                        $request,
                        $response,
                    );
                case 409:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
                        $request,
                        $response,
                    );
                case 422:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
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
                '\RevKeen\Model\ProductCollectionCreateResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionCreateResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation productCollectionsCreateAsync
     *
     * Create a product collection
     *
     * @param  \RevKeen\Model\ProductCollectionCreateRequest|null $product_collection_create_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsCreateAsync($product_collection_create_request = null, string $contentType = self::contentTypes['productCollectionsCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->productCollectionsCreateAsyncWithHttpInfo($product_collection_create_request, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation productCollectionsCreateAsyncWithHttpInfo
     *
     * Create a product collection
     *
     * @param  \RevKeen\Model\ProductCollectionCreateRequest|null $product_collection_create_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsCreateAsyncWithHttpInfo($product_collection_create_request = null, string $contentType = self::contentTypes['productCollectionsCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ProductCollectionCreateResponse';
        $request = $this->productCollectionsCreateRequest($product_collection_create_request, $contentType);

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
     * Create request for operation 'productCollectionsCreate'
     *
     * @param  \RevKeen\Model\ProductCollectionCreateRequest|null $product_collection_create_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function productCollectionsCreateRequest($product_collection_create_request = null, string $contentType = self::contentTypes['productCollectionsCreate'][0])
    {



        $resourcePath = '/product-collections';
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
        if (isset($product_collection_create_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($product_collection_create_request));
            } else {
                $httpBody = $product_collection_create_request;
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
     * Operation productCollectionsDelete
     *
     * Delete a product collection
     *
     * @param  string $id id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsDelete'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ProductCollectionDeletedResponse|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError
     */
    public function productCollectionsDelete($id, string $contentType = self::contentTypes['productCollectionsDelete'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->productCollectionsDeleteWithHttpInfo($id, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation productCollectionsDeleteWithHttpInfo
     *
     * Delete a product collection
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsDelete'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ProductCollectionDeletedResponse|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError, HTTP status code, HTTP response headers (array of strings)
     */
    public function productCollectionsDeleteWithHttpInfo($id, string $contentType = self::contentTypes['productCollectionsDelete'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->productCollectionsDeleteRequest($id, $contentType);

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
                        '\RevKeen\Model\ProductCollectionDeletedResponse',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
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
                '\RevKeen\Model\ProductCollectionDeletedResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionDeletedResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation productCollectionsDeleteAsync
     *
     * Delete a product collection
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsDeleteAsync($id, string $contentType = self::contentTypes['productCollectionsDelete'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->productCollectionsDeleteAsyncWithHttpInfo($id, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation productCollectionsDeleteAsyncWithHttpInfo
     *
     * Delete a product collection
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsDeleteAsyncWithHttpInfo($id, string $contentType = self::contentTypes['productCollectionsDelete'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ProductCollectionDeletedResponse';
        $request = $this->productCollectionsDeleteRequest($id, $contentType);

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
     * Create request for operation 'productCollectionsDelete'
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function productCollectionsDeleteRequest($id, string $contentType = self::contentTypes['productCollectionsDelete'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling productCollectionsDelete'
            );
        }


        $resourcePath = '/product-collections/{id}';
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation productCollectionsGet
     *
     * Get a product collection
     *
     * @param  string $id Collection id or URL handle. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ProductCollectionResponse|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError
     */
    public function productCollectionsGet($id, string $contentType = self::contentTypes['productCollectionsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->productCollectionsGetWithHttpInfo($id, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation productCollectionsGetWithHttpInfo
     *
     * Get a product collection
     *
     * @param  string $id Collection id or URL handle. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ProductCollectionResponse|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError, HTTP status code, HTTP response headers (array of strings)
     */
    public function productCollectionsGetWithHttpInfo($id, string $contentType = self::contentTypes['productCollectionsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->productCollectionsGetRequest($id, $contentType);

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
                        '\RevKeen\Model\ProductCollectionResponse',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
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
                '\RevKeen\Model\ProductCollectionResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation productCollectionsGetAsync
     *
     * Get a product collection
     *
     * @param  string $id Collection id or URL handle. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsGetAsync($id, string $contentType = self::contentTypes['productCollectionsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->productCollectionsGetAsyncWithHttpInfo($id, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation productCollectionsGetAsyncWithHttpInfo
     *
     * Get a product collection
     *
     * @param  string $id Collection id or URL handle. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsGetAsyncWithHttpInfo($id, string $contentType = self::contentTypes['productCollectionsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ProductCollectionResponse';
        $request = $this->productCollectionsGetRequest($id, $contentType);

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
     * Create request for operation 'productCollectionsGet'
     *
     * @param  string $id Collection id or URL handle. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function productCollectionsGetRequest($id, string $contentType = self::contentTypes['productCollectionsGet'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling productCollectionsGet'
            );
        }
        if (strlen($id) > 80) {
            throw new \InvalidArgumentException('invalid length for "$id" when calling ProductsApi.productCollectionsGet, must be smaller than or equal to 80.');
        }
        if (strlen($id) < 1) {
            throw new \InvalidArgumentException('invalid length for "$id" when calling ProductsApi.productCollectionsGet, must be bigger than or equal to 1.');
        }


        $resourcePath = '/product-collections/{id}';
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
     * Operation productCollectionsList
     *
     * List product collections
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ProductCollectionListResponse|\RevKeen\Model\ProductCollectionError
     */
    public function productCollectionsList(string $contentType = self::contentTypes['productCollectionsList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->productCollectionsListWithHttpInfo($contentType, $request_options);
        return $response;
    }

    /**
     * Operation productCollectionsListWithHttpInfo
     *
     * List product collections
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ProductCollectionListResponse|\RevKeen\Model\ProductCollectionError, HTTP status code, HTTP response headers (array of strings)
     */
    public function productCollectionsListWithHttpInfo(string $contentType = self::contentTypes['productCollectionsList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->productCollectionsListRequest($contentType);

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
                        '\RevKeen\Model\ProductCollectionListResponse',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
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
                '\RevKeen\Model\ProductCollectionListResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation productCollectionsListAsync
     *
     * List product collections
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsListAsync(string $contentType = self::contentTypes['productCollectionsList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->productCollectionsListAsyncWithHttpInfo($contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation productCollectionsListAsyncWithHttpInfo
     *
     * List product collections
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsListAsyncWithHttpInfo(string $contentType = self::contentTypes['productCollectionsList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ProductCollectionListResponse';
        $request = $this->productCollectionsListRequest($contentType);

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
     * Create request for operation 'productCollectionsList'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function productCollectionsListRequest(string $contentType = self::contentTypes['productCollectionsList'][0])
    {


        $resourcePath = '/product-collections';
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
     * Operation productCollectionsUpdate
     *
     * Update a product collection
     *
     * @param  string $id id (required)
     * @param  \RevKeen\Model\ProductCollectionUpdateRequest|null $product_collection_update_request product_collection_update_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsUpdate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ProductCollectionUpdateResponse|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError
     */
    public function productCollectionsUpdate($id, $product_collection_update_request = null, string $contentType = self::contentTypes['productCollectionsUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->productCollectionsUpdateWithHttpInfo($id, $product_collection_update_request, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation productCollectionsUpdateWithHttpInfo
     *
     * Update a product collection
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\ProductCollectionUpdateRequest|null $product_collection_update_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsUpdate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ProductCollectionUpdateResponse|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError|\RevKeen\Model\ProductCollectionError, HTTP status code, HTTP response headers (array of strings)
     */
    public function productCollectionsUpdateWithHttpInfo($id, $product_collection_update_request = null, string $contentType = self::contentTypes['productCollectionsUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->productCollectionsUpdateRequest($id, $product_collection_update_request, $contentType);

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
                        '\RevKeen\Model\ProductCollectionUpdateResponse',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
                        $request,
                        $response,
                    );
                case 409:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
                        $request,
                        $response,
                    );
                case 422:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductCollectionError',
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
                '\RevKeen\Model\ProductCollectionUpdateResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionUpdateResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCollectionError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation productCollectionsUpdateAsync
     *
     * Update a product collection
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\ProductCollectionUpdateRequest|null $product_collection_update_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsUpdateAsync($id, $product_collection_update_request = null, string $contentType = self::contentTypes['productCollectionsUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->productCollectionsUpdateAsyncWithHttpInfo($id, $product_collection_update_request, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation productCollectionsUpdateAsyncWithHttpInfo
     *
     * Update a product collection
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\ProductCollectionUpdateRequest|null $product_collection_update_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productCollectionsUpdateAsyncWithHttpInfo($id, $product_collection_update_request = null, string $contentType = self::contentTypes['productCollectionsUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ProductCollectionUpdateResponse';
        $request = $this->productCollectionsUpdateRequest($id, $product_collection_update_request, $contentType);

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
     * Create request for operation 'productCollectionsUpdate'
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\ProductCollectionUpdateRequest|null $product_collection_update_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productCollectionsUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function productCollectionsUpdateRequest($id, $product_collection_update_request = null, string $contentType = self::contentTypes['productCollectionsUpdate'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling productCollectionsUpdate'
            );
        }



        $resourcePath = '/product-collections/{id}';
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
        if (isset($product_collection_update_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($product_collection_update_request));
            } else {
                $httpBody = $product_collection_update_request;
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
     * Operation productsCreate
     *
     * Create product
     *
     * @param  \RevKeen\Model\CreateProductRequest $create_product_request Product creation details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ProductCreateResponse|\RevKeen\Model\ProductsList401Response|\RevKeen\Model\ProductsList401Response
     */
    public function productsCreate($create_product_request, string $contentType = self::contentTypes['productsCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->productsCreateWithHttpInfo($create_product_request, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation productsCreateWithHttpInfo
     *
     * Create product
     *
     * @param  \RevKeen\Model\CreateProductRequest $create_product_request Product creation details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ProductCreateResponse|\RevKeen\Model\ProductsList401Response|\RevKeen\Model\ProductsList401Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function productsCreateWithHttpInfo($create_product_request, string $contentType = self::contentTypes['productsCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->productsCreateRequest($create_product_request, $contentType);

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
                        '\RevKeen\Model\ProductCreateResponse',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductsList401Response',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductsList401Response',
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
                '\RevKeen\Model\ProductCreateResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductCreateResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductsList401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductsList401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation productsCreateAsync
     *
     * Create product
     *
     * @param  \RevKeen\Model\CreateProductRequest $create_product_request Product creation details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productsCreateAsync($create_product_request, string $contentType = self::contentTypes['productsCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->productsCreateAsyncWithHttpInfo($create_product_request, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation productsCreateAsyncWithHttpInfo
     *
     * Create product
     *
     * @param  \RevKeen\Model\CreateProductRequest $create_product_request Product creation details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productsCreateAsyncWithHttpInfo($create_product_request, string $contentType = self::contentTypes['productsCreate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ProductCreateResponse';
        $request = $this->productsCreateRequest($create_product_request, $contentType);

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
     * Create request for operation 'productsCreate'
     *
     * @param  \RevKeen\Model\CreateProductRequest $create_product_request Product creation details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function productsCreateRequest($create_product_request, string $contentType = self::contentTypes['productsCreate'][0])
    {

        // verify the required parameter 'create_product_request' is set
        if ($create_product_request === null || (is_array($create_product_request) && count($create_product_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_product_request when calling productsCreate'
            );
        }


        $resourcePath = '/products';
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
        if (isset($create_product_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_product_request));
            } else {
                $httpBody = $create_product_request;
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
     * Operation productsGet
     *
     * Get product by ID
     *
     * @param  string $id id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ProductRetrieveResponse|\RevKeen\Model\ProductsList401Response|\RevKeen\Model\ProductsList401Response
     */
    public function productsGet($id, string $contentType = self::contentTypes['productsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->productsGetWithHttpInfo($id, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation productsGetWithHttpInfo
     *
     * Get product by ID
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ProductRetrieveResponse|\RevKeen\Model\ProductsList401Response|\RevKeen\Model\ProductsList401Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function productsGetWithHttpInfo($id, string $contentType = self::contentTypes['productsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->productsGetRequest($id, $contentType);

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
                        '\RevKeen\Model\ProductRetrieveResponse',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductsList401Response',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductsList401Response',
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
                '\RevKeen\Model\ProductRetrieveResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductRetrieveResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductsList401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductsList401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation productsGetAsync
     *
     * Get product by ID
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productsGetAsync($id, string $contentType = self::contentTypes['productsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->productsGetAsyncWithHttpInfo($id, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation productsGetAsyncWithHttpInfo
     *
     * Get product by ID
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productsGetAsyncWithHttpInfo($id, string $contentType = self::contentTypes['productsGet'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ProductRetrieveResponse';
        $request = $this->productsGetRequest($id, $contentType);

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
     * Create request for operation 'productsGet'
     *
     * @param  string $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function productsGetRequest($id, string $contentType = self::contentTypes['productsGet'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling productsGet'
            );
        }


        $resourcePath = '/products/{id}';
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
     * Operation productsList
     *
     * List products
     *
     * @param  int|null $page Page number (optional, default to 1)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $search Search term to filter products (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ProductListResponse|\RevKeen\Model\ProductErrorResponse|\RevKeen\Model\ProductsList401Response
     */
    public function productsList($page = 1, $limit = 20, $search = null, string $contentType = self::contentTypes['productsList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->productsListWithHttpInfo($page, $limit, $search, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation productsListWithHttpInfo
     *
     * List products
     *
     * @param  int|null $page Page number (optional, default to 1)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $search Search term to filter products (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ProductListResponse|\RevKeen\Model\ProductErrorResponse|\RevKeen\Model\ProductsList401Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function productsListWithHttpInfo($page = 1, $limit = 20, $search = null, string $contentType = self::contentTypes['productsList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->productsListRequest($page, $limit, $search, $contentType);

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
                        '\RevKeen\Model\ProductListResponse',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductErrorResponse',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductsList401Response',
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
                '\RevKeen\Model\ProductListResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductsList401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation productsListAsync
     *
     * List products
     *
     * @param  int|null $page Page number (optional, default to 1)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $search Search term to filter products (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productsListAsync($page = 1, $limit = 20, $search = null, string $contentType = self::contentTypes['productsList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->productsListAsyncWithHttpInfo($page, $limit, $search, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation productsListAsyncWithHttpInfo
     *
     * List products
     *
     * @param  int|null $page Page number (optional, default to 1)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $search Search term to filter products (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productsListAsyncWithHttpInfo($page = 1, $limit = 20, $search = null, string $contentType = self::contentTypes['productsList'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ProductListResponse';
        $request = $this->productsListRequest($page, $limit, $search, $contentType);

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
     * Create request for operation 'productsList'
     *
     * @param  int|null $page Page number (optional, default to 1)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $search Search term to filter products (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function productsListRequest($page = 1, $limit = 20, $search = null, string $contentType = self::contentTypes['productsList'][0])
    {

        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling ProductsApi.productsList, must be bigger than or equal to 1.');
        }

        if ($limit !== null && $limit > 100) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling ProductsApi.productsList, must be smaller than or equal to 100.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling ProductsApi.productsList, must be bigger than or equal to 1.');
        }



        $resourcePath = '/products';
        ClientFactory::assertApiKeyCapability($this->config, $resourcePath);
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
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
            $search,
            'search', // param base name
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
     * Operation productsUpdate
     *
     * Update product
     *
     * @param  string $id id (required)
     * @param  \RevKeen\Model\UpdateProductRequest $update_product_request Product update details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsUpdate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\ProductUpdateResponse|\RevKeen\Model\ProductsList401Response|\RevKeen\Model\ProductsList401Response|\RevKeen\Model\ProductsList401Response
     */
    public function productsUpdate($id, $update_product_request, string $contentType = self::contentTypes['productsUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        list($response) = $this->productsUpdateWithHttpInfo($id, $update_product_request, $contentType, $request_options);
        return $response;
    }

    /**
     * Operation productsUpdateWithHttpInfo
     *
     * Update product
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\UpdateProductRequest $update_product_request Product update details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsUpdate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\ProductUpdateResponse|\RevKeen\Model\ProductsList401Response|\RevKeen\Model\ProductsList401Response|\RevKeen\Model\ProductsList401Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function productsUpdateWithHttpInfo($id, $update_product_request, string $contentType = self::contentTypes['productsUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $request = $this->productsUpdateRequest($id, $update_product_request, $contentType);

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
                        '\RevKeen\Model\ProductUpdateResponse',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductsList401Response',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductsList401Response',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\ProductsList401Response',
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
                '\RevKeen\Model\ProductUpdateResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductUpdateResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductsList401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductsList401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\ProductsList401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }


            throw $e;
        }
    }

    /**
     * Operation productsUpdateAsync
     *
     * Update product
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\UpdateProductRequest $update_product_request Product update details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productsUpdateAsync($id, $update_product_request, string $contentType = self::contentTypes['productsUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        return $this->productsUpdateAsyncWithHttpInfo($id, $update_product_request, $contentType, $request_options)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation productsUpdateAsyncWithHttpInfo
     *
     * Update product
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\UpdateProductRequest $update_product_request Product update details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function productsUpdateAsyncWithHttpInfo($id, $update_product_request, string $contentType = self::contentTypes['productsUpdate'][0], ?RevKeenRequestOptions $request_options = null)
    {
        $returnType = '\RevKeen\Model\ProductUpdateResponse';
        $request = $this->productsUpdateRequest($id, $update_product_request, $contentType);

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
     * Create request for operation 'productsUpdate'
     *
     * @param  string $id (required)
     * @param  \RevKeen\Model\UpdateProductRequest $update_product_request Product update details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['productsUpdate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function productsUpdateRequest($id, $update_product_request, string $contentType = self::contentTypes['productsUpdate'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling productsUpdate'
            );
        }

        // verify the required parameter 'update_product_request' is set
        if ($update_product_request === null || (is_array($update_product_request) && count($update_product_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_product_request when calling productsUpdate'
            );
        }


        $resourcePath = '/products/{id}';
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
        if (isset($update_product_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_product_request));
            } else {
                $httpBody = $update_product_request;
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
