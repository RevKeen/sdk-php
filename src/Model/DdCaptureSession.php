<?php
/**
 * DdCaptureSession
 *
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

namespace RevKeen\Model;

use \ArrayAccess;
use \RevKeen\ObjectSerializer;

/**
 * DdCaptureSession Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DdCaptureSession implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DdCaptureSession';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'session_token' => 'string',
        'merchant_id' => 'string',
        'customer_id' => 'string',
        'checkout_session_id' => 'string',
        'mandate_request_id' => 'string',
        'source' => 'string',
        'status' => 'string',
        'account_holder_name' => 'string',
        'sort_code_last2' => 'string',
        'account_number_last4' => 'string',
        'bank_name' => 'string',
        'notice_date' => 'string',
        'submission_date' => 'string',
        'collection_date' => 'string',
        'settlement_date' => 'string',
        'notice_days' => 'int',
        'mandate_id' => 'string',
        'expires_at' => 'string',
        'completed_at' => 'string',
        'abandoned_at' => 'string',
        'created_at' => 'string',
        'updated_at' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'session_token' => null,
        'merchant_id' => null,
        'customer_id' => null,
        'checkout_session_id' => null,
        'mandate_request_id' => null,
        'source' => null,
        'status' => null,
        'account_holder_name' => null,
        'sort_code_last2' => null,
        'account_number_last4' => null,
        'bank_name' => null,
        'notice_date' => null,
        'submission_date' => null,
        'collection_date' => null,
        'settlement_date' => null,
        'notice_days' => null,
        'mandate_id' => null,
        'expires_at' => null,
        'completed_at' => null,
        'abandoned_at' => null,
        'created_at' => null,
        'updated_at' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'session_token' => false,
        'merchant_id' => false,
        'customer_id' => true,
        'checkout_session_id' => true,
        'mandate_request_id' => true,
        'source' => false,
        'status' => false,
        'account_holder_name' => true,
        'sort_code_last2' => true,
        'account_number_last4' => true,
        'bank_name' => true,
        'notice_date' => true,
        'submission_date' => true,
        'collection_date' => true,
        'settlement_date' => true,
        'notice_days' => true,
        'mandate_id' => true,
        'expires_at' => true,
        'completed_at' => true,
        'abandoned_at' => true,
        'created_at' => true,
        'updated_at' => true
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'session_token' => 'session_token',
        'merchant_id' => 'merchant_id',
        'customer_id' => 'customer_id',
        'checkout_session_id' => 'checkout_session_id',
        'mandate_request_id' => 'mandate_request_id',
        'source' => 'source',
        'status' => 'status',
        'account_holder_name' => 'account_holder_name',
        'sort_code_last2' => 'sort_code_last2',
        'account_number_last4' => 'account_number_last4',
        'bank_name' => 'bank_name',
        'notice_date' => 'notice_date',
        'submission_date' => 'submission_date',
        'collection_date' => 'collection_date',
        'settlement_date' => 'settlement_date',
        'notice_days' => 'notice_days',
        'mandate_id' => 'mandate_id',
        'expires_at' => 'expires_at',
        'completed_at' => 'completed_at',
        'abandoned_at' => 'abandoned_at',
        'created_at' => 'created_at',
        'updated_at' => 'updated_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'session_token' => 'setSessionToken',
        'merchant_id' => 'setMerchantId',
        'customer_id' => 'setCustomerId',
        'checkout_session_id' => 'setCheckoutSessionId',
        'mandate_request_id' => 'setMandateRequestId',
        'source' => 'setSource',
        'status' => 'setStatus',
        'account_holder_name' => 'setAccountHolderName',
        'sort_code_last2' => 'setSortCodeLast2',
        'account_number_last4' => 'setAccountNumberLast4',
        'bank_name' => 'setBankName',
        'notice_date' => 'setNoticeDate',
        'submission_date' => 'setSubmissionDate',
        'collection_date' => 'setCollectionDate',
        'settlement_date' => 'setSettlementDate',
        'notice_days' => 'setNoticeDays',
        'mandate_id' => 'setMandateId',
        'expires_at' => 'setExpiresAt',
        'completed_at' => 'setCompletedAt',
        'abandoned_at' => 'setAbandonedAt',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'session_token' => 'getSessionToken',
        'merchant_id' => 'getMerchantId',
        'customer_id' => 'getCustomerId',
        'checkout_session_id' => 'getCheckoutSessionId',
        'mandate_request_id' => 'getMandateRequestId',
        'source' => 'getSource',
        'status' => 'getStatus',
        'account_holder_name' => 'getAccountHolderName',
        'sort_code_last2' => 'getSortCodeLast2',
        'account_number_last4' => 'getAccountNumberLast4',
        'bank_name' => 'getBankName',
        'notice_date' => 'getNoticeDate',
        'submission_date' => 'getSubmissionDate',
        'collection_date' => 'getCollectionDate',
        'settlement_date' => 'getSettlementDate',
        'notice_days' => 'getNoticeDays',
        'mandate_id' => 'getMandateId',
        'expires_at' => 'getExpiresAt',
        'completed_at' => 'getCompletedAt',
        'abandoned_at' => 'getAbandonedAt',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('session_token', $data ?? [], null);
        $this->setIfExists('merchant_id', $data ?? [], null);
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('checkout_session_id', $data ?? [], null);
        $this->setIfExists('mandate_request_id', $data ?? [], null);
        $this->setIfExists('source', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('account_holder_name', $data ?? [], null);
        $this->setIfExists('sort_code_last2', $data ?? [], null);
        $this->setIfExists('account_number_last4', $data ?? [], null);
        $this->setIfExists('bank_name', $data ?? [], null);
        $this->setIfExists('notice_date', $data ?? [], null);
        $this->setIfExists('submission_date', $data ?? [], null);
        $this->setIfExists('collection_date', $data ?? [], null);
        $this->setIfExists('settlement_date', $data ?? [], null);
        $this->setIfExists('notice_days', $data ?? [], null);
        $this->setIfExists('mandate_id', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('completed_at', $data ?? [], null);
        $this->setIfExists('abandoned_at', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['merchant_id'] === null) {
            $invalidProperties[] = "'merchant_id' can't be null";
        }
        if ($this->container['customer_id'] === null && !$this->isNullableSetToNull('customer_id')) {
            $invalidProperties[] = "'customer_id' can't be null";
        }
        if ($this->container['checkout_session_id'] === null && !$this->isNullableSetToNull('checkout_session_id')) {
            $invalidProperties[] = "'checkout_session_id' can't be null";
        }
        if ($this->container['mandate_request_id'] === null && !$this->isNullableSetToNull('mandate_request_id')) {
            $invalidProperties[] = "'mandate_request_id' can't be null";
        }
        if ($this->container['source'] === null) {
            $invalidProperties[] = "'source' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['account_holder_name'] === null && !$this->isNullableSetToNull('account_holder_name')) {
            $invalidProperties[] = "'account_holder_name' can't be null";
        }
        if ($this->container['sort_code_last2'] === null && !$this->isNullableSetToNull('sort_code_last2')) {
            $invalidProperties[] = "'sort_code_last2' can't be null";
        }
        if ($this->container['account_number_last4'] === null && !$this->isNullableSetToNull('account_number_last4')) {
            $invalidProperties[] = "'account_number_last4' can't be null";
        }
        if ($this->container['bank_name'] === null && !$this->isNullableSetToNull('bank_name')) {
            $invalidProperties[] = "'bank_name' can't be null";
        }
        if ($this->container['notice_date'] === null && !$this->isNullableSetToNull('notice_date')) {
            $invalidProperties[] = "'notice_date' can't be null";
        }
        if ($this->container['submission_date'] === null && !$this->isNullableSetToNull('submission_date')) {
            $invalidProperties[] = "'submission_date' can't be null";
        }
        if ($this->container['collection_date'] === null && !$this->isNullableSetToNull('collection_date')) {
            $invalidProperties[] = "'collection_date' can't be null";
        }
        if ($this->container['settlement_date'] === null && !$this->isNullableSetToNull('settlement_date')) {
            $invalidProperties[] = "'settlement_date' can't be null";
        }
        if ($this->container['notice_days'] === null && !$this->isNullableSetToNull('notice_days')) {
            $invalidProperties[] = "'notice_days' can't be null";
        }
        if ($this->container['mandate_id'] === null && !$this->isNullableSetToNull('mandate_id')) {
            $invalidProperties[] = "'mandate_id' can't be null";
        }
        if ($this->container['expires_at'] === null && !$this->isNullableSetToNull('expires_at')) {
            $invalidProperties[] = "'expires_at' can't be null";
        }
        if ($this->container['completed_at'] === null && !$this->isNullableSetToNull('completed_at')) {
            $invalidProperties[] = "'completed_at' can't be null";
        }
        if ($this->container['abandoned_at'] === null && !$this->isNullableSetToNull('abandoned_at')) {
            $invalidProperties[] = "'abandoned_at' can't be null";
        }
        if ($this->container['created_at'] === null && !$this->isNullableSetToNull('created_at')) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['updated_at'] === null && !$this->isNullableSetToNull('updated_at')) {
            $invalidProperties[] = "'updated_at' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id id
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets session_token
     *
     * @return string|null
     */
    public function getSessionToken()
    {
        return $this->container['session_token'];
    }

    /**
     * Sets session_token
     *
     * @param string|null $session_token Plaintext capture-session token. Only present in the response that issues it (create / token re-issue); never returned on subsequent reads.
     *
     * @return self
     */
    public function setSessionToken($session_token)
    {
        if (is_null($session_token)) {
            throw new \InvalidArgumentException('non-nullable session_token cannot be null');
        }
        $this->container['session_token'] = $session_token;

        return $this;
    }

    /**
     * Gets merchant_id
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->container['merchant_id'];
    }

    /**
     * Sets merchant_id
     *
     * @param string $merchant_id merchant_id
     *
     * @return self
     */
    public function setMerchantId($merchant_id)
    {
        if (is_null($merchant_id)) {
            throw new \InvalidArgumentException('non-nullable merchant_id cannot be null');
        }
        $this->container['merchant_id'] = $merchant_id;

        return $this;
    }

    /**
     * Gets customer_id
     *
     * @return string|null
     */
    public function getCustomerId()
    {
        return $this->container['customer_id'];
    }

    /**
     * Sets customer_id
     *
     * @param string|null $customer_id customer_id
     *
     * @return self
     */
    public function setCustomerId($customer_id)
    {
        if (is_null($customer_id)) {
            array_push($this->openAPINullablesSetToNull, 'customer_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('customer_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['customer_id'] = $customer_id;

        return $this;
    }

    /**
     * Gets checkout_session_id
     *
     * @return string|null
     */
    public function getCheckoutSessionId()
    {
        return $this->container['checkout_session_id'];
    }

    /**
     * Sets checkout_session_id
     *
     * @param string|null $checkout_session_id checkout_session_id
     *
     * @return self
     */
    public function setCheckoutSessionId($checkout_session_id)
    {
        if (is_null($checkout_session_id)) {
            array_push($this->openAPINullablesSetToNull, 'checkout_session_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('checkout_session_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['checkout_session_id'] = $checkout_session_id;

        return $this;
    }

    /**
     * Gets mandate_request_id
     *
     * @return string|null
     */
    public function getMandateRequestId()
    {
        return $this->container['mandate_request_id'];
    }

    /**
     * Sets mandate_request_id
     *
     * @param string|null $mandate_request_id mandate_request_id
     *
     * @return self
     */
    public function setMandateRequestId($mandate_request_id)
    {
        if (is_null($mandate_request_id)) {
            array_push($this->openAPINullablesSetToNull, 'mandate_request_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('mandate_request_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['mandate_request_id'] = $mandate_request_id;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string $source source
     *
     * @return self
     */
    public function setSource($source)
    {
        if (is_null($source)) {
            throw new \InvalidArgumentException('non-nullable source cannot be null');
        }
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets account_holder_name
     *
     * @return string|null
     */
    public function getAccountHolderName()
    {
        return $this->container['account_holder_name'];
    }

    /**
     * Sets account_holder_name
     *
     * @param string|null $account_holder_name account_holder_name
     *
     * @return self
     */
    public function setAccountHolderName($account_holder_name)
    {
        if (is_null($account_holder_name)) {
            array_push($this->openAPINullablesSetToNull, 'account_holder_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('account_holder_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['account_holder_name'] = $account_holder_name;

        return $this;
    }

    /**
     * Gets sort_code_last2
     *
     * @return string|null
     */
    public function getSortCodeLast2()
    {
        return $this->container['sort_code_last2'];
    }

    /**
     * Sets sort_code_last2
     *
     * @param string|null $sort_code_last2 Last 2 digits of the sort code — never the full value
     *
     * @return self
     */
    public function setSortCodeLast2($sort_code_last2)
    {
        if (is_null($sort_code_last2)) {
            array_push($this->openAPINullablesSetToNull, 'sort_code_last2');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('sort_code_last2', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['sort_code_last2'] = $sort_code_last2;

        return $this;
    }

    /**
     * Gets account_number_last4
     *
     * @return string|null
     */
    public function getAccountNumberLast4()
    {
        return $this->container['account_number_last4'];
    }

    /**
     * Sets account_number_last4
     *
     * @param string|null $account_number_last4 Last 4 digits of the account number
     *
     * @return self
     */
    public function setAccountNumberLast4($account_number_last4)
    {
        if (is_null($account_number_last4)) {
            array_push($this->openAPINullablesSetToNull, 'account_number_last4');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('account_number_last4', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['account_number_last4'] = $account_number_last4;

        return $this;
    }

    /**
     * Gets bank_name
     *
     * @return string|null
     */
    public function getBankName()
    {
        return $this->container['bank_name'];
    }

    /**
     * Sets bank_name
     *
     * @param string|null $bank_name bank_name
     *
     * @return self
     */
    public function setBankName($bank_name)
    {
        if (is_null($bank_name)) {
            array_push($this->openAPINullablesSetToNull, 'bank_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('bank_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['bank_name'] = $bank_name;

        return $this;
    }

    /**
     * Gets notice_date
     *
     * @return string|null
     */
    public function getNoticeDate()
    {
        return $this->container['notice_date'];
    }

    /**
     * Sets notice_date
     *
     * @param string|null $notice_date Advance-notice date (YYYY-MM-DD)
     *
     * @return self
     */
    public function setNoticeDate($notice_date)
    {
        if (is_null($notice_date)) {
            array_push($this->openAPINullablesSetToNull, 'notice_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('notice_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['notice_date'] = $notice_date;

        return $this;
    }

    /**
     * Gets submission_date
     *
     * @return string|null
     */
    public function getSubmissionDate()
    {
        return $this->container['submission_date'];
    }

    /**
     * Sets submission_date
     *
     * @param string|null $submission_date Bacs submission date (YYYY-MM-DD)
     *
     * @return self
     */
    public function setSubmissionDate($submission_date)
    {
        if (is_null($submission_date)) {
            array_push($this->openAPINullablesSetToNull, 'submission_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('submission_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['submission_date'] = $submission_date;

        return $this;
    }

    /**
     * Gets collection_date
     *
     * @return string|null
     */
    public function getCollectionDate()
    {
        return $this->container['collection_date'];
    }

    /**
     * Sets collection_date
     *
     * @param string|null $collection_date Collection date (YYYY-MM-DD)
     *
     * @return self
     */
    public function setCollectionDate($collection_date)
    {
        if (is_null($collection_date)) {
            array_push($this->openAPINullablesSetToNull, 'collection_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('collection_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['collection_date'] = $collection_date;

        return $this;
    }

    /**
     * Gets settlement_date
     *
     * @return string|null
     */
    public function getSettlementDate()
    {
        return $this->container['settlement_date'];
    }

    /**
     * Sets settlement_date
     *
     * @param string|null $settlement_date Settlement date (YYYY-MM-DD)
     *
     * @return self
     */
    public function setSettlementDate($settlement_date)
    {
        if (is_null($settlement_date)) {
            array_push($this->openAPINullablesSetToNull, 'settlement_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('settlement_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['settlement_date'] = $settlement_date;

        return $this;
    }

    /**
     * Gets notice_days
     *
     * @return int|null
     */
    public function getNoticeDays()
    {
        return $this->container['notice_days'];
    }

    /**
     * Sets notice_days
     *
     * @param int|null $notice_days notice_days
     *
     * @return self
     */
    public function setNoticeDays($notice_days)
    {
        if (is_null($notice_days)) {
            array_push($this->openAPINullablesSetToNull, 'notice_days');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('notice_days', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['notice_days'] = $notice_days;

        return $this;
    }

    /**
     * Gets mandate_id
     *
     * @return string|null
     */
    public function getMandateId()
    {
        return $this->container['mandate_id'];
    }

    /**
     * Sets mandate_id
     *
     * @param string|null $mandate_id Mandate created from this capture session, once completed
     *
     * @return self
     */
    public function setMandateId($mandate_id)
    {
        if (is_null($mandate_id)) {
            array_push($this->openAPINullablesSetToNull, 'mandate_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('mandate_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['mandate_id'] = $mandate_id;

        return $this;
    }

    /**
     * Gets expires_at
     *
     * @return string|null
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param string|null $expires_at expires_at
     *
     * @return self
     */
    public function setExpiresAt($expires_at)
    {
        if (is_null($expires_at)) {
            array_push($this->openAPINullablesSetToNull, 'expires_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('expires_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['expires_at'] = $expires_at;

        return $this;
    }

    /**
     * Gets completed_at
     *
     * @return string|null
     */
    public function getCompletedAt()
    {
        return $this->container['completed_at'];
    }

    /**
     * Sets completed_at
     *
     * @param string|null $completed_at completed_at
     *
     * @return self
     */
    public function setCompletedAt($completed_at)
    {
        if (is_null($completed_at)) {
            array_push($this->openAPINullablesSetToNull, 'completed_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('completed_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['completed_at'] = $completed_at;

        return $this;
    }

    /**
     * Gets abandoned_at
     *
     * @return string|null
     */
    public function getAbandonedAt()
    {
        return $this->container['abandoned_at'];
    }

    /**
     * Sets abandoned_at
     *
     * @param string|null $abandoned_at abandoned_at
     *
     * @return self
     */
    public function setAbandonedAt($abandoned_at)
    {
        if (is_null($abandoned_at)) {
            array_push($this->openAPINullablesSetToNull, 'abandoned_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('abandoned_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['abandoned_at'] = $abandoned_at;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string|null $created_at created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            array_push($this->openAPINullablesSetToNull, 'created_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('created_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string|null $updated_at updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_null($updated_at)) {
            array_push($this->openAPINullablesSetToNull, 'updated_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('updated_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['updated_at'] = $updated_at;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer|string $offset Offset
     *
     * @return boolean
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer|string $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet(mixed $offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer|string $offset Offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


