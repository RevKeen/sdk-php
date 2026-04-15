<?php
/**
 * AnalyticsApi
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-01-15` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Sandbox** | `https://sandbox-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Sandbox** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
 *
 * The version of the OpenAPI document: 2026-01-15
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
 * AnalyticsApi Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AnalyticsApi
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
        'analyticsCollectionsGetDso' => [
            'application/json',
        ],
        'analyticsCustomersGetLtv' => [
            'application/json',
        ],
        'analyticsInvoicesGetArAging' => [
            'application/json',
        ],
        'analyticsRevenueGetMrrSummary' => [
            'application/json',
        ],
        'analyticsRevenueGetTimeSeries' => [
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
     * Operation analyticsCollectionsGetDso
     *
     * Days Sales Outstanding
     *
     * @param  \DateTime|null $start_date Start date (ISO 8601) (optional)
     * @param  \DateTime|null $end_date End date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCollectionsGetDso'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\AnalyticsCollectionsGetDso200Response
     */
    public function analyticsCollectionsGetDso($start_date = null, $end_date = null, string $contentType = self::contentTypes['analyticsCollectionsGetDso'][0])
    {
        list($response) = $this->analyticsCollectionsGetDsoWithHttpInfo($start_date, $end_date, $contentType);
        return $response;
    }

    /**
     * Operation analyticsCollectionsGetDsoWithHttpInfo
     *
     * Days Sales Outstanding
     *
     * @param  \DateTime|null $start_date Start date (ISO 8601) (optional)
     * @param  \DateTime|null $end_date End date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCollectionsGetDso'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\AnalyticsCollectionsGetDso200Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function analyticsCollectionsGetDsoWithHttpInfo($start_date = null, $end_date = null, string $contentType = self::contentTypes['analyticsCollectionsGetDso'][0])
    {
        $request = $this->analyticsCollectionsGetDsoRequest($start_date, $end_date, $contentType);

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


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\AnalyticsCollectionsGetDso200Response',
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
                '\RevKeen\Model\AnalyticsCollectionsGetDso200Response',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\AnalyticsCollectionsGetDso200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation analyticsCollectionsGetDsoAsync
     *
     * Days Sales Outstanding
     *
     * @param  \DateTime|null $start_date Start date (ISO 8601) (optional)
     * @param  \DateTime|null $end_date End date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCollectionsGetDso'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsCollectionsGetDsoAsync($start_date = null, $end_date = null, string $contentType = self::contentTypes['analyticsCollectionsGetDso'][0])
    {
        return $this->analyticsCollectionsGetDsoAsyncWithHttpInfo($start_date, $end_date, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation analyticsCollectionsGetDsoAsyncWithHttpInfo
     *
     * Days Sales Outstanding
     *
     * @param  \DateTime|null $start_date Start date (ISO 8601) (optional)
     * @param  \DateTime|null $end_date End date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCollectionsGetDso'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsCollectionsGetDsoAsyncWithHttpInfo($start_date = null, $end_date = null, string $contentType = self::contentTypes['analyticsCollectionsGetDso'][0])
    {
        $returnType = '\RevKeen\Model\AnalyticsCollectionsGetDso200Response';
        $request = $this->analyticsCollectionsGetDsoRequest($start_date, $end_date, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
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
     * Create request for operation 'analyticsCollectionsGetDso'
     *
     * @param  \DateTime|null $start_date Start date (ISO 8601) (optional)
     * @param  \DateTime|null $end_date End date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCollectionsGetDso'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function analyticsCollectionsGetDsoRequest($start_date = null, $end_date = null, string $contentType = self::contentTypes['analyticsCollectionsGetDso'][0])
    {




        $resourcePath = '/analytics/collections/dso';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $start_date,
            'startDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $end_date,
            'endDate', // param base name
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
     * Operation analyticsCustomersGetLtv
     *
     * Customer LTV
     *
     * @param  float|null $top_n Number of top customers to return (1-100) (optional, default to 10)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCustomersGetLtv'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\AnalyticsCustomersGetLtv200Response
     */
    public function analyticsCustomersGetLtv($top_n = 10, string $contentType = self::contentTypes['analyticsCustomersGetLtv'][0])
    {
        list($response) = $this->analyticsCustomersGetLtvWithHttpInfo($top_n, $contentType);
        return $response;
    }

    /**
     * Operation analyticsCustomersGetLtvWithHttpInfo
     *
     * Customer LTV
     *
     * @param  float|null $top_n Number of top customers to return (1-100) (optional, default to 10)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCustomersGetLtv'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\AnalyticsCustomersGetLtv200Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function analyticsCustomersGetLtvWithHttpInfo($top_n = 10, string $contentType = self::contentTypes['analyticsCustomersGetLtv'][0])
    {
        $request = $this->analyticsCustomersGetLtvRequest($top_n, $contentType);

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


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\AnalyticsCustomersGetLtv200Response',
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
                '\RevKeen\Model\AnalyticsCustomersGetLtv200Response',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\AnalyticsCustomersGetLtv200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation analyticsCustomersGetLtvAsync
     *
     * Customer LTV
     *
     * @param  float|null $top_n Number of top customers to return (1-100) (optional, default to 10)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCustomersGetLtv'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsCustomersGetLtvAsync($top_n = 10, string $contentType = self::contentTypes['analyticsCustomersGetLtv'][0])
    {
        return $this->analyticsCustomersGetLtvAsyncWithHttpInfo($top_n, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation analyticsCustomersGetLtvAsyncWithHttpInfo
     *
     * Customer LTV
     *
     * @param  float|null $top_n Number of top customers to return (1-100) (optional, default to 10)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCustomersGetLtv'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsCustomersGetLtvAsyncWithHttpInfo($top_n = 10, string $contentType = self::contentTypes['analyticsCustomersGetLtv'][0])
    {
        $returnType = '\RevKeen\Model\AnalyticsCustomersGetLtv200Response';
        $request = $this->analyticsCustomersGetLtvRequest($top_n, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
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
     * Create request for operation 'analyticsCustomersGetLtv'
     *
     * @param  float|null $top_n Number of top customers to return (1-100) (optional, default to 10)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsCustomersGetLtv'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function analyticsCustomersGetLtvRequest($top_n = 10, string $contentType = self::contentTypes['analyticsCustomersGetLtv'][0])
    {

        if ($top_n !== null && $top_n > 100) {
            throw new \InvalidArgumentException('invalid value for "$top_n" when calling AnalyticsApi.analyticsCustomersGetLtv, must be smaller than or equal to 100.');
        }
        if ($top_n !== null && $top_n < 1) {
            throw new \InvalidArgumentException('invalid value for "$top_n" when calling AnalyticsApi.analyticsCustomersGetLtv, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/analytics/customers/ltv';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $top_n,
            'topN', // param base name
            'number', // openApiType
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
     * Operation analyticsInvoicesGetArAging
     *
     * A/R Aging Report
     *
     * @param  \DateTime|null $as_of_date Calculate aging as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsInvoicesGetArAging'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\AnalyticsInvoicesGetArAging200Response
     */
    public function analyticsInvoicesGetArAging($as_of_date = null, string $contentType = self::contentTypes['analyticsInvoicesGetArAging'][0])
    {
        list($response) = $this->analyticsInvoicesGetArAgingWithHttpInfo($as_of_date, $contentType);
        return $response;
    }

    /**
     * Operation analyticsInvoicesGetArAgingWithHttpInfo
     *
     * A/R Aging Report
     *
     * @param  \DateTime|null $as_of_date Calculate aging as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsInvoicesGetArAging'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\AnalyticsInvoicesGetArAging200Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function analyticsInvoicesGetArAgingWithHttpInfo($as_of_date = null, string $contentType = self::contentTypes['analyticsInvoicesGetArAging'][0])
    {
        $request = $this->analyticsInvoicesGetArAgingRequest($as_of_date, $contentType);

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


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\AnalyticsInvoicesGetArAging200Response',
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
                '\RevKeen\Model\AnalyticsInvoicesGetArAging200Response',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\AnalyticsInvoicesGetArAging200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation analyticsInvoicesGetArAgingAsync
     *
     * A/R Aging Report
     *
     * @param  \DateTime|null $as_of_date Calculate aging as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsInvoicesGetArAging'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsInvoicesGetArAgingAsync($as_of_date = null, string $contentType = self::contentTypes['analyticsInvoicesGetArAging'][0])
    {
        return $this->analyticsInvoicesGetArAgingAsyncWithHttpInfo($as_of_date, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation analyticsInvoicesGetArAgingAsyncWithHttpInfo
     *
     * A/R Aging Report
     *
     * @param  \DateTime|null $as_of_date Calculate aging as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsInvoicesGetArAging'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsInvoicesGetArAgingAsyncWithHttpInfo($as_of_date = null, string $contentType = self::contentTypes['analyticsInvoicesGetArAging'][0])
    {
        $returnType = '\RevKeen\Model\AnalyticsInvoicesGetArAging200Response';
        $request = $this->analyticsInvoicesGetArAgingRequest($as_of_date, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
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
     * Create request for operation 'analyticsInvoicesGetArAging'
     *
     * @param  \DateTime|null $as_of_date Calculate aging as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsInvoicesGetArAging'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function analyticsInvoicesGetArAgingRequest($as_of_date = null, string $contentType = self::contentTypes['analyticsInvoicesGetArAging'][0])
    {



        $resourcePath = '/analytics/invoices/ar-aging';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $as_of_date,
            'asOfDate', // param base name
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
     * Operation analyticsRevenueGetMrrSummary
     *
     * MRR Summary
     *
     * @param  \DateTime|null $as_of_date Calculate MRR as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetMrrSummary'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\AnalyticsRevenueGetMrrSummary200Response
     */
    public function analyticsRevenueGetMrrSummary($as_of_date = null, string $contentType = self::contentTypes['analyticsRevenueGetMrrSummary'][0])
    {
        list($response) = $this->analyticsRevenueGetMrrSummaryWithHttpInfo($as_of_date, $contentType);
        return $response;
    }

    /**
     * Operation analyticsRevenueGetMrrSummaryWithHttpInfo
     *
     * MRR Summary
     *
     * @param  \DateTime|null $as_of_date Calculate MRR as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetMrrSummary'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\AnalyticsRevenueGetMrrSummary200Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function analyticsRevenueGetMrrSummaryWithHttpInfo($as_of_date = null, string $contentType = self::contentTypes['analyticsRevenueGetMrrSummary'][0])
    {
        $request = $this->analyticsRevenueGetMrrSummaryRequest($as_of_date, $contentType);

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


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\AnalyticsRevenueGetMrrSummary200Response',
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
                '\RevKeen\Model\AnalyticsRevenueGetMrrSummary200Response',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\AnalyticsRevenueGetMrrSummary200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation analyticsRevenueGetMrrSummaryAsync
     *
     * MRR Summary
     *
     * @param  \DateTime|null $as_of_date Calculate MRR as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetMrrSummary'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsRevenueGetMrrSummaryAsync($as_of_date = null, string $contentType = self::contentTypes['analyticsRevenueGetMrrSummary'][0])
    {
        return $this->analyticsRevenueGetMrrSummaryAsyncWithHttpInfo($as_of_date, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation analyticsRevenueGetMrrSummaryAsyncWithHttpInfo
     *
     * MRR Summary
     *
     * @param  \DateTime|null $as_of_date Calculate MRR as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetMrrSummary'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsRevenueGetMrrSummaryAsyncWithHttpInfo($as_of_date = null, string $contentType = self::contentTypes['analyticsRevenueGetMrrSummary'][0])
    {
        $returnType = '\RevKeen\Model\AnalyticsRevenueGetMrrSummary200Response';
        $request = $this->analyticsRevenueGetMrrSummaryRequest($as_of_date, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
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
     * Create request for operation 'analyticsRevenueGetMrrSummary'
     *
     * @param  \DateTime|null $as_of_date Calculate MRR as of this date (ISO 8601) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetMrrSummary'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function analyticsRevenueGetMrrSummaryRequest($as_of_date = null, string $contentType = self::contentTypes['analyticsRevenueGetMrrSummary'][0])
    {



        $resourcePath = '/analytics/revenue/mrr-summary';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $as_of_date,
            'asOfDate', // param base name
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
     * Operation analyticsRevenueGetTimeSeries
     *
     * Revenue Time Series
     *
     * @param  \DateTime $start_date Start date (ISO 8601) (required)
     * @param  \DateTime $end_date End date (ISO 8601) (required)
     * @param  string|null $granularity Time granularity for data points (optional, default to 'month')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetTimeSeries'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\AnalyticsRevenueGetTimeSeries200Response
     */
    public function analyticsRevenueGetTimeSeries($start_date, $end_date, $granularity = 'month', string $contentType = self::contentTypes['analyticsRevenueGetTimeSeries'][0])
    {
        list($response) = $this->analyticsRevenueGetTimeSeriesWithHttpInfo($start_date, $end_date, $granularity, $contentType);
        return $response;
    }

    /**
     * Operation analyticsRevenueGetTimeSeriesWithHttpInfo
     *
     * Revenue Time Series
     *
     * @param  \DateTime $start_date Start date (ISO 8601) (required)
     * @param  \DateTime $end_date End date (ISO 8601) (required)
     * @param  string|null $granularity Time granularity for data points (optional, default to 'month')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetTimeSeries'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\AnalyticsRevenueGetTimeSeries200Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function analyticsRevenueGetTimeSeriesWithHttpInfo($start_date, $end_date, $granularity = 'month', string $contentType = self::contentTypes['analyticsRevenueGetTimeSeries'][0])
    {
        $request = $this->analyticsRevenueGetTimeSeriesRequest($start_date, $end_date, $granularity, $contentType);

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


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\AnalyticsRevenueGetTimeSeries200Response',
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
                '\RevKeen\Model\AnalyticsRevenueGetTimeSeries200Response',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\AnalyticsRevenueGetTimeSeries200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation analyticsRevenueGetTimeSeriesAsync
     *
     * Revenue Time Series
     *
     * @param  \DateTime $start_date Start date (ISO 8601) (required)
     * @param  \DateTime $end_date End date (ISO 8601) (required)
     * @param  string|null $granularity Time granularity for data points (optional, default to 'month')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetTimeSeries'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsRevenueGetTimeSeriesAsync($start_date, $end_date, $granularity = 'month', string $contentType = self::contentTypes['analyticsRevenueGetTimeSeries'][0])
    {
        return $this->analyticsRevenueGetTimeSeriesAsyncWithHttpInfo($start_date, $end_date, $granularity, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation analyticsRevenueGetTimeSeriesAsyncWithHttpInfo
     *
     * Revenue Time Series
     *
     * @param  \DateTime $start_date Start date (ISO 8601) (required)
     * @param  \DateTime $end_date End date (ISO 8601) (required)
     * @param  string|null $granularity Time granularity for data points (optional, default to 'month')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetTimeSeries'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function analyticsRevenueGetTimeSeriesAsyncWithHttpInfo($start_date, $end_date, $granularity = 'month', string $contentType = self::contentTypes['analyticsRevenueGetTimeSeries'][0])
    {
        $returnType = '\RevKeen\Model\AnalyticsRevenueGetTimeSeries200Response';
        $request = $this->analyticsRevenueGetTimeSeriesRequest($start_date, $end_date, $granularity, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
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
     * Create request for operation 'analyticsRevenueGetTimeSeries'
     *
     * @param  \DateTime $start_date Start date (ISO 8601) (required)
     * @param  \DateTime $end_date End date (ISO 8601) (required)
     * @param  string|null $granularity Time granularity for data points (optional, default to 'month')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['analyticsRevenueGetTimeSeries'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function analyticsRevenueGetTimeSeriesRequest($start_date, $end_date, $granularity = 'month', string $contentType = self::contentTypes['analyticsRevenueGetTimeSeries'][0])
    {

        // verify the required parameter 'start_date' is set
        if ($start_date === null || (is_array($start_date) && count($start_date) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $start_date when calling analyticsRevenueGetTimeSeries'
            );
        }

        // verify the required parameter 'end_date' is set
        if ($end_date === null || (is_array($end_date) && count($end_date) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $end_date when calling analyticsRevenueGetTimeSeries'
            );
        }



        $resourcePath = '/analytics/revenue/time-series';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $start_date,
            'startDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $end_date,
            'endDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $granularity,
            'granularity', // param base name
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
