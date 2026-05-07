<?php
/**
 * Order
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

namespace RevKeen\Model;

use \ArrayAccess;
use \RevKeen\ObjectSerializer;

/**
 * Order Class Doc Comment
 *
 * @category Class
 * @description An order represents a one-off purchase with lifecycle operations: create, pay, cancel, and fulfill.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Order implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Order';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'object' => 'string',
        'public_id' => 'string',
        'customer_id' => 'string',
        'status' => 'string',
        'billing_type' => 'string',
        'fulfillment_status' => 'string',
        'currency' => 'string',
        'subtotal' => 'int',
        'discount' => 'int',
        'tax' => 'int',
        'total' => 'int',
        'amount_paid' => 'int',
        'amount_refunded' => 'int',
        'amount_due' => 'int',
        'line_items' => '\RevKeen\Model\OrderLineItem[]',
        'metadata' => 'array<string,mixed>',
        'notes' => 'string',
        'invoice_id' => 'string',
        'subscription_id' => 'string',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime',
        'paid_at' => '\DateTime',
        'canceled_at' => '\DateTime',
        'fulfilled_at' => '\DateTime',
        'expires_at' => '\DateTime'
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
        'customer_id' => 'uuid',
        'status' => null,
        'billing_type' => null,
        'fulfillment_status' => null,
        'currency' => null,
        'subtotal' => null,
        'discount' => null,
        'tax' => null,
        'total' => null,
        'amount_paid' => null,
        'amount_refunded' => null,
        'amount_due' => null,
        'line_items' => null,
        'metadata' => null,
        'notes' => null,
        'invoice_id' => 'uuid',
        'subscription_id' => 'uuid',
        'created_at' => 'date-time',
        'updated_at' => 'date-time',
        'paid_at' => 'date-time',
        'canceled_at' => 'date-time',
        'fulfilled_at' => 'date-time',
        'expires_at' => 'date-time'
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
        'customer_id' => true,
        'status' => false,
        'billing_type' => false,
        'fulfillment_status' => true,
        'currency' => false,
        'subtotal' => false,
        'discount' => false,
        'tax' => false,
        'total' => false,
        'amount_paid' => false,
        'amount_refunded' => false,
        'amount_due' => false,
        'line_items' => false,
        'metadata' => false,
        'notes' => true,
        'invoice_id' => true,
        'subscription_id' => true,
        'created_at' => false,
        'updated_at' => false,
        'paid_at' => true,
        'canceled_at' => true,
        'fulfilled_at' => true,
        'expires_at' => true
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
        'customer_id' => 'customer_id',
        'status' => 'status',
        'billing_type' => 'billing_type',
        'fulfillment_status' => 'fulfillment_status',
        'currency' => 'currency',
        'subtotal' => 'subtotal',
        'discount' => 'discount',
        'tax' => 'tax',
        'total' => 'total',
        'amount_paid' => 'amount_paid',
        'amount_refunded' => 'amount_refunded',
        'amount_due' => 'amount_due',
        'line_items' => 'line_items',
        'metadata' => 'metadata',
        'notes' => 'notes',
        'invoice_id' => 'invoice_id',
        'subscription_id' => 'subscription_id',
        'created_at' => 'created_at',
        'updated_at' => 'updated_at',
        'paid_at' => 'paid_at',
        'canceled_at' => 'canceled_at',
        'fulfilled_at' => 'fulfilled_at',
        'expires_at' => 'expires_at'
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
        'customer_id' => 'setCustomerId',
        'status' => 'setStatus',
        'billing_type' => 'setBillingType',
        'fulfillment_status' => 'setFulfillmentStatus',
        'currency' => 'setCurrency',
        'subtotal' => 'setSubtotal',
        'discount' => 'setDiscount',
        'tax' => 'setTax',
        'total' => 'setTotal',
        'amount_paid' => 'setAmountPaid',
        'amount_refunded' => 'setAmountRefunded',
        'amount_due' => 'setAmountDue',
        'line_items' => 'setLineItems',
        'metadata' => 'setMetadata',
        'notes' => 'setNotes',
        'invoice_id' => 'setInvoiceId',
        'subscription_id' => 'setSubscriptionId',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'paid_at' => 'setPaidAt',
        'canceled_at' => 'setCanceledAt',
        'fulfilled_at' => 'setFulfilledAt',
        'expires_at' => 'setExpiresAt'
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
        'customer_id' => 'getCustomerId',
        'status' => 'getStatus',
        'billing_type' => 'getBillingType',
        'fulfillment_status' => 'getFulfillmentStatus',
        'currency' => 'getCurrency',
        'subtotal' => 'getSubtotal',
        'discount' => 'getDiscount',
        'tax' => 'getTax',
        'total' => 'getTotal',
        'amount_paid' => 'getAmountPaid',
        'amount_refunded' => 'getAmountRefunded',
        'amount_due' => 'getAmountDue',
        'line_items' => 'getLineItems',
        'metadata' => 'getMetadata',
        'notes' => 'getNotes',
        'invoice_id' => 'getInvoiceId',
        'subscription_id' => 'getSubscriptionId',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
        'paid_at' => 'getPaidAt',
        'canceled_at' => 'getCanceledAt',
        'fulfilled_at' => 'getFulfilledAt',
        'expires_at' => 'getExpiresAt'
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

    public const OBJECT_ORDER = 'order';
    public const STATUS_DRAFT = 'draft';
    public const STATUS_PENDING = 'pending';
    public const STATUS_PAID = 'paid';
    public const STATUS_PARTIALLY_PAID = 'partially_paid';
    public const STATUS_REFUNDED = 'refunded';
    public const STATUS_CANCELED = 'canceled';
    public const STATUS_FULFILLED = 'fulfilled';
    public const BILLING_TYPE_ONE_TIME = 'one_time';
    public const BILLING_TYPE_RECURRING = 'recurring';
    public const FULFILLMENT_STATUS_UNFULFILLED = 'unfulfilled';
    public const FULFILLMENT_STATUS_PARTIAL = 'partial';
    public const FULFILLMENT_STATUS_FULFILLED = 'fulfilled';
    public const FULFILLMENT_STATUS_RETURNED = 'returned';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getObjectAllowableValues()
    {
        return [
            self::OBJECT_ORDER,
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
            self::STATUS_DRAFT,
            self::STATUS_PENDING,
            self::STATUS_PAID,
            self::STATUS_PARTIALLY_PAID,
            self::STATUS_REFUNDED,
            self::STATUS_CANCELED,
            self::STATUS_FULFILLED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBillingTypeAllowableValues()
    {
        return [
            self::BILLING_TYPE_ONE_TIME,
            self::BILLING_TYPE_RECURRING,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFulfillmentStatusAllowableValues()
    {
        return [
            self::FULFILLMENT_STATUS_UNFULFILLED,
            self::FULFILLMENT_STATUS_PARTIAL,
            self::FULFILLMENT_STATUS_FULFILLED,
            self::FULFILLMENT_STATUS_RETURNED,
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
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('billing_type', $data ?? [], null);
        $this->setIfExists('fulfillment_status', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('subtotal', $data ?? [], null);
        $this->setIfExists('discount', $data ?? [], null);
        $this->setIfExists('tax', $data ?? [], null);
        $this->setIfExists('total', $data ?? [], null);
        $this->setIfExists('amount_paid', $data ?? [], null);
        $this->setIfExists('amount_refunded', $data ?? [], null);
        $this->setIfExists('amount_due', $data ?? [], null);
        $this->setIfExists('line_items', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('notes', $data ?? [], null);
        $this->setIfExists('invoice_id', $data ?? [], null);
        $this->setIfExists('subscription_id', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('paid_at', $data ?? [], null);
        $this->setIfExists('canceled_at', $data ?? [], null);
        $this->setIfExists('fulfilled_at', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
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

        if ($this->container['billing_type'] === null) {
            $invalidProperties[] = "'billing_type' can't be null";
        }
        $allowedValues = $this->getBillingTypeAllowableValues();
        if (!is_null($this->container['billing_type']) && !in_array($this->container['billing_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'billing_type', must be one of '%s'",
                $this->container['billing_type'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getFulfillmentStatusAllowableValues();
        if (!is_null($this->container['fulfillment_status']) && !in_array($this->container['fulfillment_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'fulfillment_status', must be one of '%s'",
                $this->container['fulfillment_status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['subtotal'] === null) {
            $invalidProperties[] = "'subtotal' can't be null";
        }
        if ($this->container['discount'] === null) {
            $invalidProperties[] = "'discount' can't be null";
        }
        if ($this->container['tax'] === null) {
            $invalidProperties[] = "'tax' can't be null";
        }
        if ($this->container['total'] === null) {
            $invalidProperties[] = "'total' can't be null";
        }
        if ($this->container['amount_paid'] === null) {
            $invalidProperties[] = "'amount_paid' can't be null";
        }
        if ($this->container['amount_refunded'] === null) {
            $invalidProperties[] = "'amount_refunded' can't be null";
        }
        if ($this->container['amount_due'] === null) {
            $invalidProperties[] = "'amount_due' can't be null";
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
     * @param string $id Unique identifier for the order
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
     * @param string $public_id Public-facing order ID
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
     * @param string|null $customer_id ID of the customer
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
     * @param string $status Order status. draft: Being built. pending: Awaiting payment. paid: Fully paid. partially_paid: Partial payment received. refunded: Refunded. canceled: Canceled. fulfilled: Shipped/delivered.
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
     * Gets billing_type
     *
     * @return string
     */
    public function getBillingType()
    {
        return $this->container['billing_type'];
    }

    /**
     * Sets billing_type
     *
     * @param string $billing_type Billing type. one_time: Single purchase. recurring: Subscription-based.
     *
     * @return self
     */
    public function setBillingType($billing_type)
    {
        if (is_null($billing_type)) {
            throw new \InvalidArgumentException('non-nullable billing_type cannot be null');
        }
        $allowedValues = $this->getBillingTypeAllowableValues();
        if (!in_array($billing_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'billing_type', must be one of '%s'",
                    $billing_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['billing_type'] = $billing_type;

        return $this;
    }

    /**
     * Gets fulfillment_status
     *
     * @return string|null
     */
    public function getFulfillmentStatus()
    {
        return $this->container['fulfillment_status'];
    }

    /**
     * Sets fulfillment_status
     *
     * @param string|null $fulfillment_status Fulfillment status for physical goods.
     *
     * @return self
     */
    public function setFulfillmentStatus($fulfillment_status)
    {
        if (is_null($fulfillment_status)) {
            array_push($this->openAPINullablesSetToNull, 'fulfillment_status');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('fulfillment_status', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getFulfillmentStatusAllowableValues();
        if (!is_null($fulfillment_status) && !in_array($fulfillment_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'fulfillment_status', must be one of '%s'",
                    $fulfillment_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['fulfillment_status'] = $fulfillment_status;

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
     * Gets subtotal
     *
     * @return int
     */
    public function getSubtotal()
    {
        return $this->container['subtotal'];
    }

    /**
     * Sets subtotal
     *
     * @param int $subtotal Subtotal in cents
     *
     * @return self
     */
    public function setSubtotal($subtotal)
    {
        if (is_null($subtotal)) {
            throw new \InvalidArgumentException('non-nullable subtotal cannot be null');
        }
        $this->container['subtotal'] = $subtotal;

        return $this;
    }

    /**
     * Gets discount
     *
     * @return int
     */
    public function getDiscount()
    {
        return $this->container['discount'];
    }

    /**
     * Sets discount
     *
     * @param int $discount Total discount in cents
     *
     * @return self
     */
    public function setDiscount($discount)
    {
        if (is_null($discount)) {
            throw new \InvalidArgumentException('non-nullable discount cannot be null');
        }
        $this->container['discount'] = $discount;

        return $this;
    }

    /**
     * Gets tax
     *
     * @return int
     */
    public function getTax()
    {
        return $this->container['tax'];
    }

    /**
     * Sets tax
     *
     * @param int $tax Total tax in cents
     *
     * @return self
     */
    public function setTax($tax)
    {
        if (is_null($tax)) {
            throw new \InvalidArgumentException('non-nullable tax cannot be null');
        }
        $this->container['tax'] = $tax;

        return $this;
    }

    /**
     * Gets total
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->container['total'];
    }

    /**
     * Sets total
     *
     * @param int $total Total amount in cents
     *
     * @return self
     */
    public function setTotal($total)
    {
        if (is_null($total)) {
            throw new \InvalidArgumentException('non-nullable total cannot be null');
        }
        $this->container['total'] = $total;

        return $this;
    }

    /**
     * Gets amount_paid
     *
     * @return int
     */
    public function getAmountPaid()
    {
        return $this->container['amount_paid'];
    }

    /**
     * Sets amount_paid
     *
     * @param int $amount_paid Amount paid in cents
     *
     * @return self
     */
    public function setAmountPaid($amount_paid)
    {
        if (is_null($amount_paid)) {
            throw new \InvalidArgumentException('non-nullable amount_paid cannot be null');
        }
        $this->container['amount_paid'] = $amount_paid;

        return $this;
    }

    /**
     * Gets amount_refunded
     *
     * @return int
     */
    public function getAmountRefunded()
    {
        return $this->container['amount_refunded'];
    }

    /**
     * Sets amount_refunded
     *
     * @param int $amount_refunded Amount refunded in cents
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
     * Gets amount_due
     *
     * @return int
     */
    public function getAmountDue()
    {
        return $this->container['amount_due'];
    }

    /**
     * Sets amount_due
     *
     * @param int $amount_due Amount still due in cents
     *
     * @return self
     */
    public function setAmountDue($amount_due)
    {
        if (is_null($amount_due)) {
            throw new \InvalidArgumentException('non-nullable amount_due cannot be null');
        }
        $this->container['amount_due'] = $amount_due;

        return $this;
    }

    /**
     * Gets line_items
     *
     * @return \RevKeen\Model\OrderLineItem[]|null
     */
    public function getLineItems()
    {
        return $this->container['line_items'];
    }

    /**
     * Sets line_items
     *
     * @param \RevKeen\Model\OrderLineItem[]|null $line_items line_items
     *
     * @return self
     */
    public function setLineItems($line_items)
    {
        if (is_null($line_items)) {
            throw new \InvalidArgumentException('non-nullable line_items cannot be null');
        }
        $this->container['line_items'] = $line_items;

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
     * Gets notes
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->container['notes'];
    }

    /**
     * Sets notes
     *
     * @param string|null $notes notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        if (is_null($notes)) {
            array_push($this->openAPINullablesSetToNull, 'notes');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('notes', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['notes'] = $notes;

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
     * @param string|null $invoice_id ID of the linked invoice (Commercial Truth)
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
     * Gets subscription_id
     *
     * @return string|null
     */
    public function getSubscriptionId()
    {
        return $this->container['subscription_id'];
    }

    /**
     * Sets subscription_id
     *
     * @param string|null $subscription_id ID of the linked subscription (for recurring fulfillment)
     *
     * @return self
     */
    public function setSubscriptionId($subscription_id)
    {
        if (is_null($subscription_id)) {
            array_push($this->openAPINullablesSetToNull, 'subscription_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('subscription_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['subscription_id'] = $subscription_id;

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
     * Gets paid_at
     *
     * @return \DateTime|null
     */
    public function getPaidAt()
    {
        return $this->container['paid_at'];
    }

    /**
     * Sets paid_at
     *
     * @param \DateTime|null $paid_at paid_at
     *
     * @return self
     */
    public function setPaidAt($paid_at)
    {
        if (is_null($paid_at)) {
            array_push($this->openAPINullablesSetToNull, 'paid_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('paid_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['paid_at'] = $paid_at;

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
     * @param \DateTime|null $canceled_at canceled_at
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
     * Gets fulfilled_at
     *
     * @return \DateTime|null
     */
    public function getFulfilledAt()
    {
        return $this->container['fulfilled_at'];
    }

    /**
     * Sets fulfilled_at
     *
     * @param \DateTime|null $fulfilled_at fulfilled_at
     *
     * @return self
     */
    public function setFulfilledAt($fulfilled_at)
    {
        if (is_null($fulfilled_at)) {
            array_push($this->openAPINullablesSetToNull, 'fulfilled_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('fulfilled_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['fulfilled_at'] = $fulfilled_at;

        return $this;
    }

    /**
     * Gets expires_at
     *
     * @return \DateTime|null
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param \DateTime|null $expires_at expires_at
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


