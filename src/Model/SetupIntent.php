<?php
/**
 * SetupIntent
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Sandbox** | `https://sandbox-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Sandbox** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
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
 * SetupIntent Class Doc Comment
 *
 * @category Class
 * @description A SetupIntent saves a payment method for future use WITHOUT charging the customer. Use it to collect and verify card details before storing them.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SetupIntent implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SetupIntent';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'object' => 'string',
        'public_id' => 'string',
        'status' => 'string',
        'customer_id' => 'string',
        'payment_method_id' => 'string',
        'payment_method_types' => 'string[]',
        'usage' => 'string',
        'next_action' => '\RevKeen\Model\SetupIntentNextAction',
        'client_secret' => 'string',
        'gateway' => 'string',
        'last_error' => '\RevKeen\Model\SetupIntentError',
        'cancellation_reason' => 'string',
        'description' => 'string',
        'metadata' => 'array<string,mixed>',
        'confirmed_at' => '\DateTime',
        'canceled_at' => '\DateTime',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => 'uuid',
        'object' => null,
        'public_id' => null,
        'status' => null,
        'customer_id' => 'uuid',
        'payment_method_id' => 'uuid',
        'payment_method_types' => null,
        'usage' => null,
        'next_action' => null,
        'client_secret' => null,
        'gateway' => null,
        'last_error' => null,
        'cancellation_reason' => null,
        'description' => null,
        'metadata' => null,
        'confirmed_at' => 'date-time',
        'canceled_at' => 'date-time',
        'created_at' => 'date-time',
        'updated_at' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'object' => false,
        'public_id' => false,
        'status' => false,
        'customer_id' => true,
        'payment_method_id' => true,
        'payment_method_types' => false,
        'usage' => false,
        'next_action' => false,
        'client_secret' => false,
        'gateway' => false,
        'last_error' => false,
        'cancellation_reason' => true,
        'description' => true,
        'metadata' => false,
        'confirmed_at' => true,
        'canceled_at' => true,
        'created_at' => false,
        'updated_at' => false
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
        'object' => 'object',
        'public_id' => 'public_id',
        'status' => 'status',
        'customer_id' => 'customer_id',
        'payment_method_id' => 'payment_method_id',
        'payment_method_types' => 'payment_method_types',
        'usage' => 'usage',
        'next_action' => 'next_action',
        'client_secret' => 'client_secret',
        'gateway' => 'gateway',
        'last_error' => 'last_error',
        'cancellation_reason' => 'cancellation_reason',
        'description' => 'description',
        'metadata' => 'metadata',
        'confirmed_at' => 'confirmed_at',
        'canceled_at' => 'canceled_at',
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
        'object' => 'setObject',
        'public_id' => 'setPublicId',
        'status' => 'setStatus',
        'customer_id' => 'setCustomerId',
        'payment_method_id' => 'setPaymentMethodId',
        'payment_method_types' => 'setPaymentMethodTypes',
        'usage' => 'setUsage',
        'next_action' => 'setNextAction',
        'client_secret' => 'setClientSecret',
        'gateway' => 'setGateway',
        'last_error' => 'setLastError',
        'cancellation_reason' => 'setCancellationReason',
        'description' => 'setDescription',
        'metadata' => 'setMetadata',
        'confirmed_at' => 'setConfirmedAt',
        'canceled_at' => 'setCanceledAt',
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
        'object' => 'getObject',
        'public_id' => 'getPublicId',
        'status' => 'getStatus',
        'customer_id' => 'getCustomerId',
        'payment_method_id' => 'getPaymentMethodId',
        'payment_method_types' => 'getPaymentMethodTypes',
        'usage' => 'getUsage',
        'next_action' => 'getNextAction',
        'client_secret' => 'getClientSecret',
        'gateway' => 'getGateway',
        'last_error' => 'getLastError',
        'cancellation_reason' => 'getCancellationReason',
        'description' => 'getDescription',
        'metadata' => 'getMetadata',
        'confirmed_at' => 'getConfirmedAt',
        'canceled_at' => 'getCanceledAt',
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

    public const OBJECT_SETUP_INTENT = 'setup_intent';
    public const STATUS_REQUIRES_PAYMENT_METHOD = 'requires_payment_method';
    public const STATUS_REQUIRES_CONFIRMATION = 'requires_confirmation';
    public const STATUS_REQUIRES_ACTION = 'requires_action';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_SUCCEEDED = 'succeeded';
    public const STATUS_CANCELED = 'canceled';
    public const USAGE_ON_SESSION = 'on_session';
    public const USAGE_OFF_SESSION = 'off_session';
    public const CANCELLATION_REASON_ABANDONED = 'abandoned';
    public const CANCELLATION_REASON_REQUESTED_BY_CUSTOMER = 'requested_by_customer';
    public const CANCELLATION_REASON_DUPLICATE = 'duplicate';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getObjectAllowableValues()
    {
        return [
            self::OBJECT_SETUP_INTENT,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_REQUIRES_PAYMENT_METHOD,
            self::STATUS_REQUIRES_CONFIRMATION,
            self::STATUS_REQUIRES_ACTION,
            self::STATUS_PROCESSING,
            self::STATUS_SUCCEEDED,
            self::STATUS_CANCELED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getUsageAllowableValues()
    {
        return [
            self::USAGE_ON_SESSION,
            self::USAGE_OFF_SESSION,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCancellationReasonAllowableValues()
    {
        return [
            self::CANCELLATION_REASON_ABANDONED,
            self::CANCELLATION_REASON_REQUESTED_BY_CUSTOMER,
            self::CANCELLATION_REASON_DUPLICATE,
        ];
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
        $this->setIfExists('object', $data ?? [], null);
        $this->setIfExists('public_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('payment_method_id', $data ?? [], null);
        $this->setIfExists('payment_method_types', $data ?? [], null);
        $this->setIfExists('usage', $data ?? [], null);
        $this->setIfExists('next_action', $data ?? [], null);
        $this->setIfExists('client_secret', $data ?? [], null);
        $this->setIfExists('gateway', $data ?? [], null);
        $this->setIfExists('last_error', $data ?? [], null);
        $this->setIfExists('cancellation_reason', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('confirmed_at', $data ?? [], null);
        $this->setIfExists('canceled_at', $data ?? [], null);
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
        if ($this->container['object'] === null) {
            $invalidProperties[] = "'object' can't be null";
        }
        $allowedValues = $this->getObjectAllowableValues();
        if (!is_null($this->container['object']) && !in_array($this->container['object'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'object', must be one of '%s'",
                $this->container['object'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['public_id'] === null) {
            $invalidProperties[] = "'public_id' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['customer_id'] === null && !$this->isNullableSetToNull('customer_id')) {
            $invalidProperties[] = "'customer_id' can't be null";
        }
        if ($this->container['payment_method_id'] === null && !$this->isNullableSetToNull('payment_method_id')) {
            $invalidProperties[] = "'payment_method_id' can't be null";
        }
        if ($this->container['payment_method_types'] === null) {
            $invalidProperties[] = "'payment_method_types' can't be null";
        }
        if ($this->container['usage'] === null) {
            $invalidProperties[] = "'usage' can't be null";
        }
        $allowedValues = $this->getUsageAllowableValues();
        if (!is_null($this->container['usage']) && !in_array($this->container['usage'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'usage', must be one of '%s'",
                $this->container['usage'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['next_action'] === null) {
            $invalidProperties[] = "'next_action' can't be null";
        }
        if ($this->container['client_secret'] === null) {
            $invalidProperties[] = "'client_secret' can't be null";
        }
        if ($this->container['gateway'] === null) {
            $invalidProperties[] = "'gateway' can't be null";
        }
        if ($this->container['last_error'] === null) {
            $invalidProperties[] = "'last_error' can't be null";
        }
        if ($this->container['cancellation_reason'] === null && !$this->isNullableSetToNull('cancellation_reason')) {
            $invalidProperties[] = "'cancellation_reason' can't be null";
        }
        $allowedValues = $this->getCancellationReasonAllowableValues();
        if (!is_null($this->container['cancellation_reason']) && !in_array($this->container['cancellation_reason'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'cancellation_reason', must be one of '%s'",
                $this->container['cancellation_reason'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['description'] === null && !$this->isNullableSetToNull('description')) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ($this->container['metadata'] === null) {
            $invalidProperties[] = "'metadata' can't be null";
        }
        if ($this->container['confirmed_at'] === null && !$this->isNullableSetToNull('confirmed_at')) {
            $invalidProperties[] = "'confirmed_at' can't be null";
        }
        if ($this->container['canceled_at'] === null && !$this->isNullableSetToNull('canceled_at')) {
            $invalidProperties[] = "'canceled_at' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['updated_at'] === null) {
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
     * @param string $id Unique identifier for the setup intent
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
     * Gets object
     *
     * @return string
     */
    public function getObject()
    {
        return $this->container['object'];
    }

    /**
     * Sets object
     *
     * @param string $object Object type, always 'setup_intent'
     *
     * @return self
     */
    public function setObject($object)
    {
        if (is_null($object)) {
            throw new \InvalidArgumentException('non-nullable object cannot be null');
        }
        $allowedValues = $this->getObjectAllowableValues();
        if (!in_array($object, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'object', must be one of '%s'",
                    $object,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['object'] = $object;

        return $this;
    }

    /**
     * Gets public_id
     *
     * @return string
     */
    public function getPublicId()
    {
        return $this->container['public_id'];
    }

    /**
     * Sets public_id
     *
     * @param string $public_id Public ID visible in API responses (seti_xxx format)
     *
     * @return self
     */
    public function setPublicId($public_id)
    {
        if (is_null($public_id)) {
            throw new \InvalidArgumentException('non-nullable public_id cannot be null');
        }
        $this->container['public_id'] = $public_id;

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
     * @param string $status The status of the setup intent
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

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
     * @param string|null $customer_id ID of the customer this setup intent is for
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
     * Gets payment_method_id
     *
     * @return string|null
     */
    public function getPaymentMethodId()
    {
        return $this->container['payment_method_id'];
    }

    /**
     * Sets payment_method_id
     *
     * @param string|null $payment_method_id ID of the payment method being set up
     *
     * @return self
     */
    public function setPaymentMethodId($payment_method_id)
    {
        if (is_null($payment_method_id)) {
            array_push($this->openAPINullablesSetToNull, 'payment_method_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('payment_method_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['payment_method_id'] = $payment_method_id;

        return $this;
    }

    /**
     * Gets payment_method_types
     *
     * @return string[]
     */
    public function getPaymentMethodTypes()
    {
        return $this->container['payment_method_types'];
    }

    /**
     * Sets payment_method_types
     *
     * @param string[] $payment_method_types Allowed payment method types for this setup
     *
     * @return self
     */
    public function setPaymentMethodTypes($payment_method_types)
    {
        if (is_null($payment_method_types)) {
            throw new \InvalidArgumentException('non-nullable payment_method_types cannot be null');
        }
        $this->container['payment_method_types'] = $payment_method_types;

        return $this;
    }

    /**
     * Gets usage
     *
     * @return string
     */
    public function getUsage()
    {
        return $this->container['usage'];
    }

    /**
     * Sets usage
     *
     * @param string $usage Indicates how the payment method will be used
     *
     * @return self
     */
    public function setUsage($usage)
    {
        if (is_null($usage)) {
            throw new \InvalidArgumentException('non-nullable usage cannot be null');
        }
        $allowedValues = $this->getUsageAllowableValues();
        if (!in_array($usage, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'usage', must be one of '%s'",
                    $usage,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['usage'] = $usage;

        return $this;
    }

    /**
     * Gets next_action
     *
     * @return \RevKeen\Model\SetupIntentNextAction
     */
    public function getNextAction()
    {
        return $this->container['next_action'];
    }

    /**
     * Sets next_action
     *
     * @param \RevKeen\Model\SetupIntentNextAction $next_action next_action
     *
     * @return self
     */
    public function setNextAction($next_action)
    {
        if (is_null($next_action)) {
            throw new \InvalidArgumentException('non-nullable next_action cannot be null');
        }
        $this->container['next_action'] = $next_action;

        return $this;
    }

    /**
     * Gets client_secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->container['client_secret'];
    }

    /**
     * Sets client_secret
     *
     * @param string $client_secret Client secret for frontend confirmation
     *
     * @return self
     */
    public function setClientSecret($client_secret)
    {
        if (is_null($client_secret)) {
            throw new \InvalidArgumentException('non-nullable client_secret cannot be null');
        }
        $this->container['client_secret'] = $client_secret;

        return $this;
    }

    /**
     * Gets gateway
     *
     * @return string
     */
    public function getGateway()
    {
        return $this->container['gateway'];
    }

    /**
     * Sets gateway
     *
     * @param string $gateway Name of the payment processor that handled this setup intent
     *
     * @return self
     */
    public function setGateway($gateway)
    {
        if (is_null($gateway)) {
            throw new \InvalidArgumentException('non-nullable gateway cannot be null');
        }
        $this->container['gateway'] = $gateway;

        return $this;
    }

    /**
     * Gets last_error
     *
     * @return \RevKeen\Model\SetupIntentError
     */
    public function getLastError()
    {
        return $this->container['last_error'];
    }

    /**
     * Sets last_error
     *
     * @param \RevKeen\Model\SetupIntentError $last_error last_error
     *
     * @return self
     */
    public function setLastError($last_error)
    {
        if (is_null($last_error)) {
            throw new \InvalidArgumentException('non-nullable last_error cannot be null');
        }
        $this->container['last_error'] = $last_error;

        return $this;
    }

    /**
     * Gets cancellation_reason
     *
     * @return string|null
     */
    public function getCancellationReason()
    {
        return $this->container['cancellation_reason'];
    }

    /**
     * Sets cancellation_reason
     *
     * @param string|null $cancellation_reason Reason for cancellation if canceled
     *
     * @return self
     */
    public function setCancellationReason($cancellation_reason)
    {
        if (is_null($cancellation_reason)) {
            array_push($this->openAPINullablesSetToNull, 'cancellation_reason');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cancellation_reason', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getCancellationReasonAllowableValues();
        if (!is_null($cancellation_reason) && !in_array($cancellation_reason, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'cancellation_reason', must be one of '%s'",
                    $cancellation_reason,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['cancellation_reason'] = $cancellation_reason;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Merchant description for reference
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            array_push($this->openAPINullablesSetToNull, 'description');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('description', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return array<string,mixed>
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param array<string,mixed> $metadata Custom metadata attached to the setup intent
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        if (is_null($metadata)) {
            throw new \InvalidArgumentException('non-nullable metadata cannot be null');
        }
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets confirmed_at
     *
     * @return \DateTime|null
     */
    public function getConfirmedAt()
    {
        return $this->container['confirmed_at'];
    }

    /**
     * Sets confirmed_at
     *
     * @param \DateTime|null $confirmed_at When the setup intent was confirmed
     *
     * @return self
     */
    public function setConfirmedAt($confirmed_at)
    {
        if (is_null($confirmed_at)) {
            array_push($this->openAPINullablesSetToNull, 'confirmed_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('confirmed_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['confirmed_at'] = $confirmed_at;

        return $this;
    }

    /**
     * Gets canceled_at
     *
     * @return \DateTime|null
     */
    public function getCanceledAt()
    {
        return $this->container['canceled_at'];
    }

    /**
     * Sets canceled_at
     *
     * @param \DateTime|null $canceled_at When the setup intent was canceled
     *
     * @return self
     */
    public function setCanceledAt($canceled_at)
    {
        if (is_null($canceled_at)) {
            array_push($this->openAPINullablesSetToNull, 'canceled_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('canceled_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['canceled_at'] = $canceled_at;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at When the setup intent was created
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime $updated_at When the setup intent was last updated
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_null($updated_at)) {
            throw new \InvalidArgumentException('non-nullable updated_at cannot be null');
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


