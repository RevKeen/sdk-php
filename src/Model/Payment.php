<?php
/**
 * Payment
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
 * Payment Class Doc Comment
 *
 * @category Class
 * @description A completed or in-progress money movement. Payments represent funds transferred between a customer and your account across all channels — online, terminal, and recurring.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Payment implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Payment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'object' => 'string',
        'invoice_id' => 'string',
        'customer_id' => 'string',
        'status' => 'string',
        'currency' => 'string',
        'amount' => 'int',
        'amount_captured' => 'int',
        'amount_refunded' => 'int',
        'gateway' => 'string',
        'gateway_transaction_id' => 'string',
        'gateway_response_code' => 'string',
        'gateway_response_text' => 'string',
        'payment_method_type' => 'string',
        'card_brand' => 'string',
        'card_last_four' => 'string',
        'payment_channel' => 'string',
        'entry_mode' => 'string',
        'metadata' => 'array<string,mixed>',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime',
        'authorized_at' => '\DateTime',
        'captured_at' => '\DateTime',
        'voided_at' => '\DateTime',
        'refunded_at' => '\DateTime'
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
        'invoice_id' => 'uuid',
        'customer_id' => 'uuid',
        'status' => null,
        'currency' => null,
        'amount' => null,
        'amount_captured' => null,
        'amount_refunded' => null,
        'gateway' => null,
        'gateway_transaction_id' => null,
        'gateway_response_code' => null,
        'gateway_response_text' => null,
        'payment_method_type' => null,
        'card_brand' => null,
        'card_last_four' => null,
        'payment_channel' => null,
        'entry_mode' => null,
        'metadata' => null,
        'created_at' => 'date-time',
        'updated_at' => 'date-time',
        'authorized_at' => 'date-time',
        'captured_at' => 'date-time',
        'voided_at' => 'date-time',
        'refunded_at' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'object' => false,
        'invoice_id' => true,
        'customer_id' => true,
        'status' => false,
        'currency' => false,
        'amount' => false,
        'amount_captured' => true,
        'amount_refunded' => false,
        'gateway' => true,
        'gateway_transaction_id' => true,
        'gateway_response_code' => true,
        'gateway_response_text' => true,
        'payment_method_type' => true,
        'card_brand' => true,
        'card_last_four' => true,
        'payment_channel' => true,
        'entry_mode' => true,
        'metadata' => false,
        'created_at' => false,
        'updated_at' => false,
        'authorized_at' => true,
        'captured_at' => true,
        'voided_at' => true,
        'refunded_at' => true
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
        'invoice_id' => 'invoice_id',
        'customer_id' => 'customer_id',
        'status' => 'status',
        'currency' => 'currency',
        'amount' => 'amount',
        'amount_captured' => 'amount_captured',
        'amount_refunded' => 'amount_refunded',
        'gateway' => 'gateway',
        'gateway_transaction_id' => 'gateway_transaction_id',
        'gateway_response_code' => 'gateway_response_code',
        'gateway_response_text' => 'gateway_response_text',
        'payment_method_type' => 'payment_method_type',
        'card_brand' => 'card_brand',
        'card_last_four' => 'card_last_four',
        'payment_channel' => 'payment_channel',
        'entry_mode' => 'entry_mode',
        'metadata' => 'metadata',
        'created_at' => 'created_at',
        'updated_at' => 'updated_at',
        'authorized_at' => 'authorized_at',
        'captured_at' => 'captured_at',
        'voided_at' => 'voided_at',
        'refunded_at' => 'refunded_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'object' => 'setObject',
        'invoice_id' => 'setInvoiceId',
        'customer_id' => 'setCustomerId',
        'status' => 'setStatus',
        'currency' => 'setCurrency',
        'amount' => 'setAmount',
        'amount_captured' => 'setAmountCaptured',
        'amount_refunded' => 'setAmountRefunded',
        'gateway' => 'setGateway',
        'gateway_transaction_id' => 'setGatewayTransactionId',
        'gateway_response_code' => 'setGatewayResponseCode',
        'gateway_response_text' => 'setGatewayResponseText',
        'payment_method_type' => 'setPaymentMethodType',
        'card_brand' => 'setCardBrand',
        'card_last_four' => 'setCardLastFour',
        'payment_channel' => 'setPaymentChannel',
        'entry_mode' => 'setEntryMode',
        'metadata' => 'setMetadata',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'authorized_at' => 'setAuthorizedAt',
        'captured_at' => 'setCapturedAt',
        'voided_at' => 'setVoidedAt',
        'refunded_at' => 'setRefundedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'object' => 'getObject',
        'invoice_id' => 'getInvoiceId',
        'customer_id' => 'getCustomerId',
        'status' => 'getStatus',
        'currency' => 'getCurrency',
        'amount' => 'getAmount',
        'amount_captured' => 'getAmountCaptured',
        'amount_refunded' => 'getAmountRefunded',
        'gateway' => 'getGateway',
        'gateway_transaction_id' => 'getGatewayTransactionId',
        'gateway_response_code' => 'getGatewayResponseCode',
        'gateway_response_text' => 'getGatewayResponseText',
        'payment_method_type' => 'getPaymentMethodType',
        'card_brand' => 'getCardBrand',
        'card_last_four' => 'getCardLastFour',
        'payment_channel' => 'getPaymentChannel',
        'entry_mode' => 'getEntryMode',
        'metadata' => 'getMetadata',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
        'authorized_at' => 'getAuthorizedAt',
        'captured_at' => 'getCapturedAt',
        'voided_at' => 'getVoidedAt',
        'refunded_at' => 'getRefundedAt'
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

    public const OBJECT_PAYMENT = 'payment';
    public const STATUS_PENDING = 'pending';
    public const STATUS_AUTHORIZED = 'authorized';
    public const STATUS_CAPTURED = 'captured';
    public const STATUS_SUCCEEDED = 'succeeded';
    public const STATUS_FAILED = 'failed';
    public const STATUS_VOIDED = 'voided';
    public const STATUS_REFUNDED = 'refunded';
    public const STATUS_PARTIALLY_REFUNDED = 'partially_refunded';
    public const PAYMENT_CHANNEL_CARD_PRESENT = 'card_present';
    public const PAYMENT_CHANNEL_CARD_NOT_PRESENT = 'card_not_present';
    public const PAYMENT_CHANNEL_BANK_TRANSFER = 'bank_transfer';
    public const PAYMENT_CHANNEL_MANUAL = 'manual';
    public const ENTRY_MODE_EMV_CHIP = 'emv_chip';
    public const ENTRY_MODE_CONTACTLESS = 'contactless';
    public const ENTRY_MODE_MAGNETIC_STRIPE = 'magnetic_stripe';
    public const ENTRY_MODE_MANUAL_ENTRY = 'manual_entry';
    public const ENTRY_MODE_FALLBACK = 'fallback';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getObjectAllowableValues()
    {
        return [
            self::OBJECT_PAYMENT,
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
            self::STATUS_PENDING,
            self::STATUS_AUTHORIZED,
            self::STATUS_CAPTURED,
            self::STATUS_SUCCEEDED,
            self::STATUS_FAILED,
            self::STATUS_VOIDED,
            self::STATUS_REFUNDED,
            self::STATUS_PARTIALLY_REFUNDED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPaymentChannelAllowableValues()
    {
        return [
            self::PAYMENT_CHANNEL_CARD_PRESENT,
            self::PAYMENT_CHANNEL_CARD_NOT_PRESENT,
            self::PAYMENT_CHANNEL_BANK_TRANSFER,
            self::PAYMENT_CHANNEL_MANUAL,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEntryModeAllowableValues()
    {
        return [
            self::ENTRY_MODE_EMV_CHIP,
            self::ENTRY_MODE_CONTACTLESS,
            self::ENTRY_MODE_MAGNETIC_STRIPE,
            self::ENTRY_MODE_MANUAL_ENTRY,
            self::ENTRY_MODE_FALLBACK,
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
        $this->setIfExists('invoice_id', $data ?? [], null);
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('amount_captured', $data ?? [], null);
        $this->setIfExists('amount_refunded', $data ?? [], 0);
        $this->setIfExists('gateway', $data ?? [], null);
        $this->setIfExists('gateway_transaction_id', $data ?? [], null);
        $this->setIfExists('gateway_response_code', $data ?? [], null);
        $this->setIfExists('gateway_response_text', $data ?? [], null);
        $this->setIfExists('payment_method_type', $data ?? [], null);
        $this->setIfExists('card_brand', $data ?? [], null);
        $this->setIfExists('card_last_four', $data ?? [], null);
        $this->setIfExists('payment_channel', $data ?? [], null);
        $this->setIfExists('entry_mode', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('authorized_at', $data ?? [], null);
        $this->setIfExists('captured_at', $data ?? [], null);
        $this->setIfExists('voided_at', $data ?? [], null);
        $this->setIfExists('refunded_at', $data ?? [], null);
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

        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        $allowedValues = $this->getPaymentChannelAllowableValues();
        if (!is_null($this->container['payment_channel']) && !in_array($this->container['payment_channel'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'payment_channel', must be one of '%s'",
                $this->container['payment_channel'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getEntryModeAllowableValues();
        if (!is_null($this->container['entry_mode']) && !in_array($this->container['entry_mode'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'entry_mode', must be one of '%s'",
                $this->container['entry_mode'],
                implode("', '", $allowedValues)
            );
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
     * @param string $id Unique identifier for the payment
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
     * @param string $object Object type
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
     * Gets invoice_id
     *
     * @return string|null
     */
    public function getInvoiceId()
    {
        return $this->container['invoice_id'];
    }

    /**
     * Sets invoice_id
     *
     * @param string|null $invoice_id Associated invoice ID
     *
     * @return self
     */
    public function setInvoiceId($invoice_id)
    {
        if (is_null($invoice_id)) {
            array_push($this->openAPINullablesSetToNull, 'invoice_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('invoice_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['invoice_id'] = $invoice_id;

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
     * @param string|null $customer_id Customer ID
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
     * @param string $status Payment status. pending: Processing. authorized: Funds reserved. captured/succeeded: Funds collected. failed: Payment failed. voided: Canceled before capture. refunded/partially_refunded: Returned to customer.
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
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency Three-letter ISO currency code
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param int $amount Payment amount in cents
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets amount_captured
     *
     * @return int|null
     */
    public function getAmountCaptured()
    {
        return $this->container['amount_captured'];
    }

    /**
     * Sets amount_captured
     *
     * @param int|null $amount_captured Amount captured in cents (for auth-capture flow)
     *
     * @return self
     */
    public function setAmountCaptured($amount_captured)
    {
        if (is_null($amount_captured)) {
            array_push($this->openAPINullablesSetToNull, 'amount_captured');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('amount_captured', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['amount_captured'] = $amount_captured;

        return $this;
    }

    /**
     * Gets amount_refunded
     *
     * @return int|null
     */
    public function getAmountRefunded()
    {
        return $this->container['amount_refunded'];
    }

    /**
     * Sets amount_refunded
     *
     * @param int|null $amount_refunded Amount refunded in cents
     *
     * @return self
     */
    public function setAmountRefunded($amount_refunded)
    {
        if (is_null($amount_refunded)) {
            throw new \InvalidArgumentException('non-nullable amount_refunded cannot be null');
        }
        $this->container['amount_refunded'] = $amount_refunded;

        return $this;
    }

    /**
     * Gets gateway
     *
     * @return string|null
     */
    public function getGateway()
    {
        return $this->container['gateway'];
    }

    /**
     * Sets gateway
     *
     * @param string|null $gateway Name of the payment processor that handled this payment
     *
     * @return self
     */
    public function setGateway($gateway)
    {
        if (is_null($gateway)) {
            array_push($this->openAPINullablesSetToNull, 'gateway');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gateway', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gateway'] = $gateway;

        return $this;
    }

    /**
     * Gets gateway_transaction_id
     *
     * @return string|null
     */
    public function getGatewayTransactionId()
    {
        return $this->container['gateway_transaction_id'];
    }

    /**
     * Sets gateway_transaction_id
     *
     * @param string|null $gateway_transaction_id Processor's transaction reference
     *
     * @return self
     */
    public function setGatewayTransactionId($gateway_transaction_id)
    {
        if (is_null($gateway_transaction_id)) {
            array_push($this->openAPINullablesSetToNull, 'gateway_transaction_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gateway_transaction_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gateway_transaction_id'] = $gateway_transaction_id;

        return $this;
    }

    /**
     * Gets gateway_response_code
     *
     * @return string|null
     */
    public function getGatewayResponseCode()
    {
        return $this->container['gateway_response_code'];
    }

    /**
     * Sets gateway_response_code
     *
     * @param string|null $gateway_response_code Normalized response code from the processor
     *
     * @return self
     */
    public function setGatewayResponseCode($gateway_response_code)
    {
        if (is_null($gateway_response_code)) {
            array_push($this->openAPINullablesSetToNull, 'gateway_response_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gateway_response_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gateway_response_code'] = $gateway_response_code;

        return $this;
    }

    /**
     * Gets gateway_response_text
     *
     * @return string|null
     */
    public function getGatewayResponseText()
    {
        return $this->container['gateway_response_text'];
    }

    /**
     * Sets gateway_response_text
     *
     * @param string|null $gateway_response_text Human-readable response message from the processor
     *
     * @return self
     */
    public function setGatewayResponseText($gateway_response_text)
    {
        if (is_null($gateway_response_text)) {
            array_push($this->openAPINullablesSetToNull, 'gateway_response_text');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gateway_response_text', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gateway_response_text'] = $gateway_response_text;

        return $this;
    }

    /**
     * Gets payment_method_type
     *
     * @return string|null
     */
    public function getPaymentMethodType()
    {
        return $this->container['payment_method_type'];
    }

    /**
     * Sets payment_method_type
     *
     * @param string|null $payment_method_type Payment method type (card, ach, wallet)
     *
     * @return self
     */
    public function setPaymentMethodType($payment_method_type)
    {
        if (is_null($payment_method_type)) {
            array_push($this->openAPINullablesSetToNull, 'payment_method_type');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('payment_method_type', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['payment_method_type'] = $payment_method_type;

        return $this;
    }

    /**
     * Gets card_brand
     *
     * @return string|null
     */
    public function getCardBrand()
    {
        return $this->container['card_brand'];
    }

    /**
     * Sets card_brand
     *
     * @param string|null $card_brand Card brand (visa, mastercard, etc.)
     *
     * @return self
     */
    public function setCardBrand($card_brand)
    {
        if (is_null($card_brand)) {
            array_push($this->openAPINullablesSetToNull, 'card_brand');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('card_brand', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['card_brand'] = $card_brand;

        return $this;
    }

    /**
     * Gets card_last_four
     *
     * @return string|null
     */
    public function getCardLastFour()
    {
        return $this->container['card_last_four'];
    }

    /**
     * Sets card_last_four
     *
     * @param string|null $card_last_four Last 4 digits of card
     *
     * @return self
     */
    public function setCardLastFour($card_last_four)
    {
        if (is_null($card_last_four)) {
            array_push($this->openAPINullablesSetToNull, 'card_last_four');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('card_last_four', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['card_last_four'] = $card_last_four;

        return $this;
    }

    /**
     * Gets payment_channel
     *
     * @return string|null
     */
    public function getPaymentChannel()
    {
        return $this->container['payment_channel'];
    }

    /**
     * Sets payment_channel
     *
     * @param string|null $payment_channel Payment channel. card_present: terminal/POS payment. card_not_present: online or recurring payment. bank_transfer: ACH/direct debit. manual: manually recorded.
     *
     * @return self
     */
    public function setPaymentChannel($payment_channel)
    {
        if (is_null($payment_channel)) {
            array_push($this->openAPINullablesSetToNull, 'payment_channel');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('payment_channel', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getPaymentChannelAllowableValues();
        if (!is_null($payment_channel) && !in_array($payment_channel, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'payment_channel', must be one of '%s'",
                    $payment_channel,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['payment_channel'] = $payment_channel;

        return $this;
    }

    /**
     * Gets entry_mode
     *
     * @return string|null
     */
    public function getEntryMode()
    {
        return $this->container['entry_mode'];
    }

    /**
     * Sets entry_mode
     *
     * @param string|null $entry_mode Card entry mode for card-present (terminal) payments. null for online payments.
     *
     * @return self
     */
    public function setEntryMode($entry_mode)
    {
        if (is_null($entry_mode)) {
            array_push($this->openAPINullablesSetToNull, 'entry_mode');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('entry_mode', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getEntryModeAllowableValues();
        if (!is_null($entry_mode) && !in_array($entry_mode, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'entry_mode', must be one of '%s'",
                    $entry_mode,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['entry_mode'] = $entry_mode;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return array<string,mixed>|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param array<string,mixed>|null $metadata Custom key-value metadata
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
     * @param \DateTime $created_at created_at
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
     * @param \DateTime $updated_at updated_at
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
     * Gets authorized_at
     *
     * @return \DateTime|null
     */
    public function getAuthorizedAt()
    {
        return $this->container['authorized_at'];
    }

    /**
     * Sets authorized_at
     *
     * @param \DateTime|null $authorized_at authorized_at
     *
     * @return self
     */
    public function setAuthorizedAt($authorized_at)
    {
        if (is_null($authorized_at)) {
            array_push($this->openAPINullablesSetToNull, 'authorized_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('authorized_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['authorized_at'] = $authorized_at;

        return $this;
    }

    /**
     * Gets captured_at
     *
     * @return \DateTime|null
     */
    public function getCapturedAt()
    {
        return $this->container['captured_at'];
    }

    /**
     * Sets captured_at
     *
     * @param \DateTime|null $captured_at captured_at
     *
     * @return self
     */
    public function setCapturedAt($captured_at)
    {
        if (is_null($captured_at)) {
            array_push($this->openAPINullablesSetToNull, 'captured_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('captured_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['captured_at'] = $captured_at;

        return $this;
    }

    /**
     * Gets voided_at
     *
     * @return \DateTime|null
     */
    public function getVoidedAt()
    {
        return $this->container['voided_at'];
    }

    /**
     * Sets voided_at
     *
     * @param \DateTime|null $voided_at voided_at
     *
     * @return self
     */
    public function setVoidedAt($voided_at)
    {
        if (is_null($voided_at)) {
            array_push($this->openAPINullablesSetToNull, 'voided_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('voided_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['voided_at'] = $voided_at;

        return $this;
    }

    /**
     * Gets refunded_at
     *
     * @return \DateTime|null
     */
    public function getRefundedAt()
    {
        return $this->container['refunded_at'];
    }

    /**
     * Sets refunded_at
     *
     * @param \DateTime|null $refunded_at refunded_at
     *
     * @return self
     */
    public function setRefundedAt($refunded_at)
    {
        if (is_null($refunded_at)) {
            array_push($this->openAPINullablesSetToNull, 'refunded_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('refunded_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['refunded_at'] = $refunded_at;

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


