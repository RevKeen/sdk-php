<?php
/**
 * TerminalPayment
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
 * TerminalPayment Class Doc Comment
 *
 * @category Class
 * @description A card-present payment processed through a POS terminal, with device details and card entry mode.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class TerminalPayment implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'TerminalPayment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'invoice_id' => 'string',
        'device_id' => 'string',
        'type' => 'string',
        'status' => 'string',
        'amount_minor' => 'float',
        'currency' => 'string',
        'reference' => 'string',
        'terminal_serial' => 'string',
        'uti' => 'string',
        'auth_code' => 'string',
        'response_code' => 'string',
        'rrn' => 'string',
        'card_scheme' => 'string',
        'masked_pan' => 'string',
        'entry_mode' => 'string',
        'error_message' => 'string',
        'created_at' => 'string',
        'completed_at' => 'string'
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
        'invoice_id' => 'uuid',
        'device_id' => 'uuid',
        'type' => null,
        'status' => null,
        'amount_minor' => null,
        'currency' => null,
        'reference' => null,
        'terminal_serial' => null,
        'uti' => null,
        'auth_code' => null,
        'response_code' => null,
        'rrn' => null,
        'card_scheme' => null,
        'masked_pan' => null,
        'entry_mode' => null,
        'error_message' => null,
        'created_at' => null,
        'completed_at' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'invoice_id' => true,
        'device_id' => true,
        'type' => false,
        'status' => false,
        'amount_minor' => false,
        'currency' => false,
        'reference' => true,
        'terminal_serial' => true,
        'uti' => true,
        'auth_code' => true,
        'response_code' => true,
        'rrn' => true,
        'card_scheme' => true,
        'masked_pan' => true,
        'entry_mode' => true,
        'error_message' => true,
        'created_at' => false,
        'completed_at' => true
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
        'invoice_id' => 'invoice_id',
        'device_id' => 'device_id',
        'type' => 'type',
        'status' => 'status',
        'amount_minor' => 'amount_minor',
        'currency' => 'currency',
        'reference' => 'reference',
        'terminal_serial' => 'terminal_serial',
        'uti' => 'uti',
        'auth_code' => 'auth_code',
        'response_code' => 'response_code',
        'rrn' => 'rrn',
        'card_scheme' => 'card_scheme',
        'masked_pan' => 'masked_pan',
        'entry_mode' => 'entry_mode',
        'error_message' => 'error_message',
        'created_at' => 'created_at',
        'completed_at' => 'completed_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'invoice_id' => 'setInvoiceId',
        'device_id' => 'setDeviceId',
        'type' => 'setType',
        'status' => 'setStatus',
        'amount_minor' => 'setAmountMinor',
        'currency' => 'setCurrency',
        'reference' => 'setReference',
        'terminal_serial' => 'setTerminalSerial',
        'uti' => 'setUti',
        'auth_code' => 'setAuthCode',
        'response_code' => 'setResponseCode',
        'rrn' => 'setRrn',
        'card_scheme' => 'setCardScheme',
        'masked_pan' => 'setMaskedPan',
        'entry_mode' => 'setEntryMode',
        'error_message' => 'setErrorMessage',
        'created_at' => 'setCreatedAt',
        'completed_at' => 'setCompletedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'invoice_id' => 'getInvoiceId',
        'device_id' => 'getDeviceId',
        'type' => 'getType',
        'status' => 'getStatus',
        'amount_minor' => 'getAmountMinor',
        'currency' => 'getCurrency',
        'reference' => 'getReference',
        'terminal_serial' => 'getTerminalSerial',
        'uti' => 'getUti',
        'auth_code' => 'getAuthCode',
        'response_code' => 'getResponseCode',
        'rrn' => 'getRrn',
        'card_scheme' => 'getCardScheme',
        'masked_pan' => 'getMaskedPan',
        'entry_mode' => 'getEntryMode',
        'error_message' => 'getErrorMessage',
        'created_at' => 'getCreatedAt',
        'completed_at' => 'getCompletedAt'
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

    public const TYPE_SALE = 'sale';
    public const TYPE_REFUND = 'refund';
    public const TYPE_VOID = 'void';
    public const STATUS_REQUESTED = 'requested';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_DECLINED = 'declined';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_ERROR = 'error';
    public const STATUS_TIMED_OUT = 'timed_out';
    public const STATUS_STANDALONE_APPROVED = 'standalone_approved';
    public const STATUS_STANDALONE_DECLINED = 'standalone_declined';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_SALE,
            self::TYPE_REFUND,
            self::TYPE_VOID,
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
            self::STATUS_REQUESTED,
            self::STATUS_IN_PROGRESS,
            self::STATUS_APPROVED,
            self::STATUS_DECLINED,
            self::STATUS_CANCELLED,
            self::STATUS_ERROR,
            self::STATUS_TIMED_OUT,
            self::STATUS_STANDALONE_APPROVED,
            self::STATUS_STANDALONE_DECLINED,
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
        $this->setIfExists('invoice_id', $data ?? [], null);
        $this->setIfExists('device_id', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('amount_minor', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('reference', $data ?? [], null);
        $this->setIfExists('terminal_serial', $data ?? [], null);
        $this->setIfExists('uti', $data ?? [], null);
        $this->setIfExists('auth_code', $data ?? [], null);
        $this->setIfExists('response_code', $data ?? [], null);
        $this->setIfExists('rrn', $data ?? [], null);
        $this->setIfExists('card_scheme', $data ?? [], null);
        $this->setIfExists('masked_pan', $data ?? [], null);
        $this->setIfExists('entry_mode', $data ?? [], null);
        $this->setIfExists('error_message', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('completed_at', $data ?? [], null);
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
        if ($this->container['invoice_id'] === null && !$this->isNullableSetToNull('invoice_id')) {
            $invalidProperties[] = "'invoice_id' can't be null";
        }
        if ($this->container['device_id'] === null && !$this->isNullableSetToNull('device_id')) {
            $invalidProperties[] = "'device_id' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
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

        if ($this->container['amount_minor'] === null) {
            $invalidProperties[] = "'amount_minor' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['reference'] === null && !$this->isNullableSetToNull('reference')) {
            $invalidProperties[] = "'reference' can't be null";
        }
        if ($this->container['terminal_serial'] === null && !$this->isNullableSetToNull('terminal_serial')) {
            $invalidProperties[] = "'terminal_serial' can't be null";
        }
        if ($this->container['uti'] === null && !$this->isNullableSetToNull('uti')) {
            $invalidProperties[] = "'uti' can't be null";
        }
        if ($this->container['auth_code'] === null && !$this->isNullableSetToNull('auth_code')) {
            $invalidProperties[] = "'auth_code' can't be null";
        }
        if ($this->container['response_code'] === null && !$this->isNullableSetToNull('response_code')) {
            $invalidProperties[] = "'response_code' can't be null";
        }
        if ($this->container['rrn'] === null && !$this->isNullableSetToNull('rrn')) {
            $invalidProperties[] = "'rrn' can't be null";
        }
        if ($this->container['card_scheme'] === null && !$this->isNullableSetToNull('card_scheme')) {
            $invalidProperties[] = "'card_scheme' can't be null";
        }
        if ($this->container['masked_pan'] === null && !$this->isNullableSetToNull('masked_pan')) {
            $invalidProperties[] = "'masked_pan' can't be null";
        }
        if ($this->container['entry_mode'] === null && !$this->isNullableSetToNull('entry_mode')) {
            $invalidProperties[] = "'entry_mode' can't be null";
        }
        if ($this->container['error_message'] === null && !$this->isNullableSetToNull('error_message')) {
            $invalidProperties[] = "'error_message' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['completed_at'] === null && !$this->isNullableSetToNull('completed_at')) {
            $invalidProperties[] = "'completed_at' can't be null";
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
     * @param string $id Unique identifier for this terminal payment attempt
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
     * @param string|null $invoice_id Associated invoice ID, or null for walk-in/ad-hoc payments
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
     * Gets device_id
     *
     * @return string|null
     */
    public function getDeviceId()
    {
        return $this->container['device_id'];
    }

    /**
     * Sets device_id
     *
     * @param string|null $device_id The terminal device that processed (or is processing) this payment
     *
     * @return self
     */
    public function setDeviceId($device_id)
    {
        if (is_null($device_id)) {
            array_push($this->openAPINullablesSetToNull, 'device_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('device_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['device_id'] = $device_id;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Transaction type. sale: original charge. refund: money returned. void: pre-settlement cancellation.
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

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
     * @param string $status Payment lifecycle status. requested: command sent, awaiting card. in_progress: terminal processing. approved: payment succeeded. declined: issuer declined. cancelled: merchant cancelled. error: terminal error. timed_out: no response within 3 minutes.
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
     * Gets amount_minor
     *
     * @return float
     */
    public function getAmountMinor()
    {
        return $this->container['amount_minor'];
    }

    /**
     * Sets amount_minor
     *
     * @param float $amount_minor Amount in minor units (e.g., pence for GBP, cents for USD)
     *
     * @return self
     */
    public function setAmountMinor($amount_minor)
    {
        if (is_null($amount_minor)) {
            throw new \InvalidArgumentException('non-nullable amount_minor cannot be null');
        }
        $this->container['amount_minor'] = $amount_minor;

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
     * @param string $currency ISO 4217 currency code
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
     * Gets reference
     *
     * @return string|null
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string|null $reference Payment reference (invoice number or custom reference)
     *
     * @return self
     */
    public function setReference($reference)
    {
        if (is_null($reference)) {
            array_push($this->openAPINullablesSetToNull, 'reference');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('reference', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets terminal_serial
     *
     * @return string|null
     */
    public function getTerminalSerial()
    {
        return $this->container['terminal_serial'];
    }

    /**
     * Sets terminal_serial
     *
     * @param string|null $terminal_serial Serial number of the PAX terminal that processed this payment
     *
     * @return self
     */
    public function setTerminalSerial($terminal_serial)
    {
        if (is_null($terminal_serial)) {
            array_push($this->openAPINullablesSetToNull, 'terminal_serial');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('terminal_serial', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['terminal_serial'] = $terminal_serial;

        return $this;
    }

    /**
     * Gets uti
     *
     * @return string|null
     */
    public function getUti()
    {
        return $this->container['uti'];
    }

    /**
     * Sets uti
     *
     * @param string|null $uti Unique Transaction Identifier from the terminal
     *
     * @return self
     */
    public function setUti($uti)
    {
        if (is_null($uti)) {
            array_push($this->openAPINullablesSetToNull, 'uti');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('uti', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['uti'] = $uti;

        return $this;
    }

    /**
     * Gets auth_code
     *
     * @return string|null
     */
    public function getAuthCode()
    {
        return $this->container['auth_code'];
    }

    /**
     * Sets auth_code
     *
     * @param string|null $auth_code Authorization code from the payment processor. Present when approved.
     *
     * @return self
     */
    public function setAuthCode($auth_code)
    {
        if (is_null($auth_code)) {
            array_push($this->openAPINullablesSetToNull, 'auth_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('auth_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['auth_code'] = $auth_code;

        return $this;
    }

    /**
     * Gets response_code
     *
     * @return string|null
     */
    public function getResponseCode()
    {
        return $this->container['response_code'];
    }

    /**
     * Sets response_code
     *
     * @param string|null $response_code Terminal response code. '00' indicates approval.
     *
     * @return self
     */
    public function setResponseCode($response_code)
    {
        if (is_null($response_code)) {
            array_push($this->openAPINullablesSetToNull, 'response_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('response_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['response_code'] = $response_code;

        return $this;
    }

    /**
     * Gets rrn
     *
     * @return string|null
     */
    public function getRrn()
    {
        return $this->container['rrn'];
    }

    /**
     * Sets rrn
     *
     * @param string|null $rrn Retrieval Reference Number for settlement reconciliation
     *
     * @return self
     */
    public function setRrn($rrn)
    {
        if (is_null($rrn)) {
            array_push($this->openAPINullablesSetToNull, 'rrn');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('rrn', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['rrn'] = $rrn;

        return $this;
    }

    /**
     * Gets card_scheme
     *
     * @return string|null
     */
    public function getCardScheme()
    {
        return $this->container['card_scheme'];
    }

    /**
     * Sets card_scheme
     *
     * @param string|null $card_scheme Card network (e.g., VISA, MASTERCARD, AMEX)
     *
     * @return self
     */
    public function setCardScheme($card_scheme)
    {
        if (is_null($card_scheme)) {
            array_push($this->openAPINullablesSetToNull, 'card_scheme');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('card_scheme', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['card_scheme'] = $card_scheme;

        return $this;
    }

    /**
     * Gets masked_pan
     *
     * @return string|null
     */
    public function getMaskedPan()
    {
        return $this->container['masked_pan'];
    }

    /**
     * Sets masked_pan
     *
     * @param string|null $masked_pan Masked card number — only the last 4 digits are visible
     *
     * @return self
     */
    public function setMaskedPan($masked_pan)
    {
        if (is_null($masked_pan)) {
            array_push($this->openAPINullablesSetToNull, 'masked_pan');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('masked_pan', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['masked_pan'] = $masked_pan;

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
     * @param string|null $entry_mode How the card was read: contactless (NFC tap), emv_chip (chip insert), magnetic_stripe (swipe), manual_entry (keyed), or fallback (chip-to-swipe)
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
        $this->container['entry_mode'] = $entry_mode;

        return $this;
    }

    /**
     * Gets error_message
     *
     * @return string|null
     */
    public function getErrorMessage()
    {
        return $this->container['error_message'];
    }

    /**
     * Sets error_message
     *
     * @param string|null $error_message Human-readable error message when status is error or timed_out
     *
     * @return self
     */
    public function setErrorMessage($error_message)
    {
        if (is_null($error_message)) {
            array_push($this->openAPINullablesSetToNull, 'error_message');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('error_message', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['error_message'] = $error_message;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at ISO 8601 timestamp when the payment was initiated
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
     * @param string|null $completed_at ISO 8601 timestamp when the terminal returned a result, or null if still in progress
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


