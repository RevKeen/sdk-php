<?php
/**
 * PaymentIntentsApi
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Direct Debit** | `mandates:read` | View Direct Debit mandates and collection status | |  | `mandates:write` | Create, suspend, reinstate, and cancel Direct Debit mandates | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Staging** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
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
 * PaymentIntentsApi Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentIntentsApi
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
        'paymentIntentsCancel' => [
            'application/json',
        ],
        'paymentIntentsCapture' => [
            'application/json',
        ],
        'paymentIntentsConfirm' => [
            'application/json',
        ],
        'paymentIntentsCreate' => [
            'application/json',
        ],
        'paymentIntentsGet' => [
            'application/json',
        ],
        'paymentIntentsList' => [
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
     * Operation paymentIntentsCancel
     *
     * Cancel a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CancelPaymentIntentRequest|null $cancel_payment_intent_request cancel_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCancel'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse|\RevKeen\Model\PaymentIntentErrorResponse
     */
    public function paymentIntentsCancel($id, $cancel_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCancel'][0])
    {
        list($response) = $this->paymentIntentsCancelWithHttpInfo($id, $cancel_payment_intent_request, $contentType);
        return $response;
    }

    /**
     * Operation paymentIntentsCancelWithHttpInfo
     *
     * Cancel a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CancelPaymentIntentRequest|null $cancel_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCancel'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse|\RevKeen\Model\PaymentIntentErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function paymentIntentsCancelWithHttpInfo($id, $cancel_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCancel'][0])
    {
        $request = $this->paymentIntentsCancelRequest($id, $cancel_payment_intent_request, $contentType);

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
                        '\RevKeen\Model\PaymentIntent',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
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
                '\RevKeen\Model\PaymentIntent',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntent',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation paymentIntentsCancelAsync
     *
     * Cancel a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CancelPaymentIntentRequest|null $cancel_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCancel'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsCancelAsync($id, $cancel_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCancel'][0])
    {
        return $this->paymentIntentsCancelAsyncWithHttpInfo($id, $cancel_payment_intent_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation paymentIntentsCancelAsyncWithHttpInfo
     *
     * Cancel a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CancelPaymentIntentRequest|null $cancel_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCancel'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsCancelAsyncWithHttpInfo($id, $cancel_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCancel'][0])
    {
        $returnType = '\RevKeen\Model\PaymentIntent';
        $request = $this->paymentIntentsCancelRequest($id, $cancel_payment_intent_request, $contentType);

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
     * Create request for operation 'paymentIntentsCancel'
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CancelPaymentIntentRequest|null $cancel_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCancel'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function paymentIntentsCancelRequest($id, $cancel_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCancel'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling paymentIntentsCancel'
            );
        }



        $resourcePath = '/payment-intents/{id}/cancel';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
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
        if (isset($cancel_payment_intent_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($cancel_payment_intent_request));
            } else {
                $httpBody = $cancel_payment_intent_request;
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
     * Operation paymentIntentsCapture
     *
     * Capture a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CapturePaymentIntentRequest|null $capture_payment_intent_request capture_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCapture'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse|\RevKeen\Model\PaymentIntentErrorResponse
     */
    public function paymentIntentsCapture($id, $capture_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCapture'][0])
    {
        list($response) = $this->paymentIntentsCaptureWithHttpInfo($id, $capture_payment_intent_request, $contentType);
        return $response;
    }

    /**
     * Operation paymentIntentsCaptureWithHttpInfo
     *
     * Capture a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CapturePaymentIntentRequest|null $capture_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCapture'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse|\RevKeen\Model\PaymentIntentErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function paymentIntentsCaptureWithHttpInfo($id, $capture_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCapture'][0])
    {
        $request = $this->paymentIntentsCaptureRequest($id, $capture_payment_intent_request, $contentType);

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
                        '\RevKeen\Model\PaymentIntent',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
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
                '\RevKeen\Model\PaymentIntent',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntent',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation paymentIntentsCaptureAsync
     *
     * Capture a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CapturePaymentIntentRequest|null $capture_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCapture'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsCaptureAsync($id, $capture_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCapture'][0])
    {
        return $this->paymentIntentsCaptureAsyncWithHttpInfo($id, $capture_payment_intent_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation paymentIntentsCaptureAsyncWithHttpInfo
     *
     * Capture a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CapturePaymentIntentRequest|null $capture_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCapture'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsCaptureAsyncWithHttpInfo($id, $capture_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCapture'][0])
    {
        $returnType = '\RevKeen\Model\PaymentIntent';
        $request = $this->paymentIntentsCaptureRequest($id, $capture_payment_intent_request, $contentType);

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
     * Create request for operation 'paymentIntentsCapture'
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\CapturePaymentIntentRequest|null $capture_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCapture'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function paymentIntentsCaptureRequest($id, $capture_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCapture'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling paymentIntentsCapture'
            );
        }



        $resourcePath = '/payment-intents/{id}/capture';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
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
        if (isset($capture_payment_intent_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($capture_payment_intent_request));
            } else {
                $httpBody = $capture_payment_intent_request;
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
     * Operation paymentIntentsConfirm
     *
     * Confirm a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\ConfirmPaymentIntentRequest|null $confirm_payment_intent_request confirm_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsConfirm'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse|\RevKeen\Model\PaymentIntentErrorResponse
     */
    public function paymentIntentsConfirm($id, $confirm_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsConfirm'][0])
    {
        list($response) = $this->paymentIntentsConfirmWithHttpInfo($id, $confirm_payment_intent_request, $contentType);
        return $response;
    }

    /**
     * Operation paymentIntentsConfirmWithHttpInfo
     *
     * Confirm a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\ConfirmPaymentIntentRequest|null $confirm_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsConfirm'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse|\RevKeen\Model\PaymentIntentErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function paymentIntentsConfirmWithHttpInfo($id, $confirm_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsConfirm'][0])
    {
        $request = $this->paymentIntentsConfirmRequest($id, $confirm_payment_intent_request, $contentType);

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
                        '\RevKeen\Model\PaymentIntent',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
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
                '\RevKeen\Model\PaymentIntent',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntent',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation paymentIntentsConfirmAsync
     *
     * Confirm a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\ConfirmPaymentIntentRequest|null $confirm_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsConfirm'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsConfirmAsync($id, $confirm_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsConfirm'][0])
    {
        return $this->paymentIntentsConfirmAsyncWithHttpInfo($id, $confirm_payment_intent_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation paymentIntentsConfirmAsyncWithHttpInfo
     *
     * Confirm a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\ConfirmPaymentIntentRequest|null $confirm_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsConfirm'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsConfirmAsyncWithHttpInfo($id, $confirm_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsConfirm'][0])
    {
        $returnType = '\RevKeen\Model\PaymentIntent';
        $request = $this->paymentIntentsConfirmRequest($id, $confirm_payment_intent_request, $contentType);

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
     * Create request for operation 'paymentIntentsConfirm'
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  \RevKeen\Model\ConfirmPaymentIntentRequest|null $confirm_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsConfirm'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function paymentIntentsConfirmRequest($id, $confirm_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsConfirm'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling paymentIntentsConfirm'
            );
        }



        $resourcePath = '/payment-intents/{id}/confirm';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
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
        if (isset($confirm_payment_intent_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($confirm_payment_intent_request));
            } else {
                $httpBody = $confirm_payment_intent_request;
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
     * Operation paymentIntentsCreate
     *
     * Create a payment intent
     *
     * @param  \RevKeen\Model\CreatePaymentIntentRequest|null $create_payment_intent_request create_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse|\RevKeen\Model\PaymentIntentErrorResponse
     */
    public function paymentIntentsCreate($create_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCreate'][0])
    {
        list($response) = $this->paymentIntentsCreateWithHttpInfo($create_payment_intent_request, $contentType);
        return $response;
    }

    /**
     * Operation paymentIntentsCreateWithHttpInfo
     *
     * Create a payment intent
     *
     * @param  \RevKeen\Model\CreatePaymentIntentRequest|null $create_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCreate'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse|\RevKeen\Model\PaymentIntentErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function paymentIntentsCreateWithHttpInfo($create_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCreate'][0])
    {
        $request = $this->paymentIntentsCreateRequest($create_payment_intent_request, $contentType);

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
                        '\RevKeen\Model\PaymentIntent',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
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
                '\RevKeen\Model\PaymentIntent',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntent',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation paymentIntentsCreateAsync
     *
     * Create a payment intent
     *
     * @param  \RevKeen\Model\CreatePaymentIntentRequest|null $create_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsCreateAsync($create_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCreate'][0])
    {
        return $this->paymentIntentsCreateAsyncWithHttpInfo($create_payment_intent_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation paymentIntentsCreateAsyncWithHttpInfo
     *
     * Create a payment intent
     *
     * @param  \RevKeen\Model\CreatePaymentIntentRequest|null $create_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsCreateAsyncWithHttpInfo($create_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCreate'][0])
    {
        $returnType = '\RevKeen\Model\PaymentIntent';
        $request = $this->paymentIntentsCreateRequest($create_payment_intent_request, $contentType);

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
     * Create request for operation 'paymentIntentsCreate'
     *
     * @param  \RevKeen\Model\CreatePaymentIntentRequest|null $create_payment_intent_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsCreate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function paymentIntentsCreateRequest($create_payment_intent_request = null, string $contentType = self::contentTypes['paymentIntentsCreate'][0])
    {



        $resourcePath = '/payment-intents';
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
        if (isset($create_payment_intent_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_payment_intent_request));
            } else {
                $httpBody = $create_payment_intent_request;
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
     * Operation paymentIntentsGet
     *
     * Retrieve a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse
     */
    public function paymentIntentsGet($id, string $contentType = self::contentTypes['paymentIntentsGet'][0])
    {
        list($response) = $this->paymentIntentsGetWithHttpInfo($id, $contentType);
        return $response;
    }

    /**
     * Operation paymentIntentsGetWithHttpInfo
     *
     * Retrieve a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsGet'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\PaymentIntent|\RevKeen\Model\PaymentIntentErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function paymentIntentsGetWithHttpInfo($id, string $contentType = self::contentTypes['paymentIntentsGet'][0])
    {
        $request = $this->paymentIntentsGetRequest($id, $contentType);

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
                        '\RevKeen\Model\PaymentIntent',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
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
                '\RevKeen\Model\PaymentIntent',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntent',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation paymentIntentsGetAsync
     *
     * Retrieve a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsGetAsync($id, string $contentType = self::contentTypes['paymentIntentsGet'][0])
    {
        return $this->paymentIntentsGetAsyncWithHttpInfo($id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation paymentIntentsGetAsyncWithHttpInfo
     *
     * Retrieve a payment intent
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsGetAsyncWithHttpInfo($id, string $contentType = self::contentTypes['paymentIntentsGet'][0])
    {
        $returnType = '\RevKeen\Model\PaymentIntent';
        $request = $this->paymentIntentsGetRequest($id, $contentType);

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
     * Create request for operation 'paymentIntentsGet'
     *
     * @param  string $id Payment intent ID (pi_xxx) (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function paymentIntentsGetRequest($id, string $contentType = self::contentTypes['paymentIntentsGet'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling paymentIntentsGet'
            );
        }


        $resourcePath = '/payment-intents/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
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
     * Operation paymentIntentsList
     *
     * List payment intents
     *
     * @param  string|null $customer Filter by customer ID (optional)
     * @param  string|null $status Filter by status (optional)
     * @param  float|null $created_gte Filter by created_at &gt;&#x3D; (Unix timestamp) (optional)
     * @param  float|null $created_lte Filter by created_at &lt;&#x3D; (Unix timestamp) (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $starting_after Cursor for pagination - return results after this ID (pi_xxx) (optional)
     * @param  string|null $ending_before Cursor for pagination - return results before this ID (pi_xxx) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \RevKeen\Model\PaymentIntentListResponse|\RevKeen\Model\PaymentIntentErrorResponse
     */
    public function paymentIntentsList($customer = null, $status = null, $created_gte = null, $created_lte = null, $limit = 20, $starting_after = null, $ending_before = null, string $contentType = self::contentTypes['paymentIntentsList'][0])
    {
        list($response) = $this->paymentIntentsListWithHttpInfo($customer, $status, $created_gte, $created_lte, $limit, $starting_after, $ending_before, $contentType);
        return $response;
    }

    /**
     * Operation paymentIntentsListWithHttpInfo
     *
     * List payment intents
     *
     * @param  string|null $customer Filter by customer ID (optional)
     * @param  string|null $status Filter by status (optional)
     * @param  float|null $created_gte Filter by created_at &gt;&#x3D; (Unix timestamp) (optional)
     * @param  float|null $created_lte Filter by created_at &lt;&#x3D; (Unix timestamp) (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $starting_after Cursor for pagination - return results after this ID (pi_xxx) (optional)
     * @param  string|null $ending_before Cursor for pagination - return results before this ID (pi_xxx) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsList'] to see the possible values for this operation
     *
     * @throws \RevKeen\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \RevKeen\Model\PaymentIntentListResponse|\RevKeen\Model\PaymentIntentErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function paymentIntentsListWithHttpInfo($customer = null, $status = null, $created_gte = null, $created_lte = null, $limit = 20, $starting_after = null, $ending_before = null, string $contentType = self::contentTypes['paymentIntentsList'][0])
    {
        $request = $this->paymentIntentsListRequest($customer, $status, $created_gte, $created_lte, $limit, $starting_after, $ending_before, $contentType);

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
                        '\RevKeen\Model\PaymentIntentListResponse',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\RevKeen\Model\PaymentIntentErrorResponse',
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
                '\RevKeen\Model\PaymentIntentListResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\RevKeen\Model\PaymentIntentErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation paymentIntentsListAsync
     *
     * List payment intents
     *
     * @param  string|null $customer Filter by customer ID (optional)
     * @param  string|null $status Filter by status (optional)
     * @param  float|null $created_gte Filter by created_at &gt;&#x3D; (Unix timestamp) (optional)
     * @param  float|null $created_lte Filter by created_at &lt;&#x3D; (Unix timestamp) (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $starting_after Cursor for pagination - return results after this ID (pi_xxx) (optional)
     * @param  string|null $ending_before Cursor for pagination - return results before this ID (pi_xxx) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsListAsync($customer = null, $status = null, $created_gte = null, $created_lte = null, $limit = 20, $starting_after = null, $ending_before = null, string $contentType = self::contentTypes['paymentIntentsList'][0])
    {
        return $this->paymentIntentsListAsyncWithHttpInfo($customer, $status, $created_gte, $created_lte, $limit, $starting_after, $ending_before, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation paymentIntentsListAsyncWithHttpInfo
     *
     * List payment intents
     *
     * @param  string|null $customer Filter by customer ID (optional)
     * @param  string|null $status Filter by status (optional)
     * @param  float|null $created_gte Filter by created_at &gt;&#x3D; (Unix timestamp) (optional)
     * @param  float|null $created_lte Filter by created_at &lt;&#x3D; (Unix timestamp) (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $starting_after Cursor for pagination - return results after this ID (pi_xxx) (optional)
     * @param  string|null $ending_before Cursor for pagination - return results before this ID (pi_xxx) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function paymentIntentsListAsyncWithHttpInfo($customer = null, $status = null, $created_gte = null, $created_lte = null, $limit = 20, $starting_after = null, $ending_before = null, string $contentType = self::contentTypes['paymentIntentsList'][0])
    {
        $returnType = '\RevKeen\Model\PaymentIntentListResponse';
        $request = $this->paymentIntentsListRequest($customer, $status, $created_gte, $created_lte, $limit, $starting_after, $ending_before, $contentType);

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
     * Create request for operation 'paymentIntentsList'
     *
     * @param  string|null $customer Filter by customer ID (optional)
     * @param  string|null $status Filter by status (optional)
     * @param  float|null $created_gte Filter by created_at &gt;&#x3D; (Unix timestamp) (optional)
     * @param  float|null $created_lte Filter by created_at &lt;&#x3D; (Unix timestamp) (optional)
     * @param  int|null $limit Maximum number of results (1-100) (optional, default to 20)
     * @param  string|null $starting_after Cursor for pagination - return results after this ID (pi_xxx) (optional)
     * @param  string|null $ending_before Cursor for pagination - return results before this ID (pi_xxx) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['paymentIntentsList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function paymentIntentsListRequest($customer = null, $status = null, $created_gte = null, $created_lte = null, $limit = 20, $starting_after = null, $ending_before = null, string $contentType = self::contentTypes['paymentIntentsList'][0])
    {





        if ($limit !== null && $limit > 100) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling PaymentIntentsApi.paymentIntentsList, must be smaller than or equal to 100.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling PaymentIntentsApi.paymentIntentsList, must be bigger than or equal to 1.');
        }
        



        $resourcePath = '/payment-intents';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $customer,
            'customer', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
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
            $created_gte,
            'created_gte', // param base name
            'number', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $created_lte,
            'created_lte', // param base name
            'number', // openApiType
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
            $starting_after,
            'starting_after', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ending_before,
            'ending_before', // param base name
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
