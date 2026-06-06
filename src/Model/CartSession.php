<?php
/**
 * CartSession
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `cart:read` | View cart session details (REV-3511) | |  | `cart:write` | Create and mutate cart sessions, line items, add-ons (REV-3511) | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Direct Debit** | `mandates:read` | View Direct Debit mandates and collection status | |  | `mandates:write` | Create, suspend, reinstate, and cancel Direct Debit mandates | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Staging** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
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
 * CartSession Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CartSession implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CartSession';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'object' => 'string',
        'merchant_id' => 'string',
        'customer_id' => 'string',
        'currency' => 'string',
        'mode' => 'string',
        'status' => '\RevKeen\Model\CartSessionStatus',
        'line_items' => '\RevKeen\Model\CartLineItem[]',
        'add_ons_offered' => 'string[]',
        'add_ons_selected' => 'string[]',
        'discount_code' => 'string',
        'subtotal_minor' => 'int',
        'total_minor' => 'int',
        'metadata' => 'array<string,mixed>',
        'converted_to_checkout_session_id' => 'string',
        'public_token' => 'string',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime',
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
        'merchant_id' => 'uuid',
        'customer_id' => 'uuid',
        'currency' => null,
        'mode' => null,
        'status' => null,
        'line_items' => null,
        'add_ons_offered' => 'uuid',
        'add_ons_selected' => 'uuid',
        'discount_code' => null,
        'subtotal_minor' => null,
        'total_minor' => null,
        'metadata' => null,
        'converted_to_checkout_session_id' => 'uuid',
        'public_token' => null,
        'created_at' => 'date-time',
        'updated_at' => 'date-time',
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
        'merchant_id' => false,
        'customer_id' => true,
        'currency' => false,
        'mode' => false,
        'status' => false,
        'line_items' => false,
        'add_ons_offered' => false,
        'add_ons_selected' => false,
        'discount_code' => true,
        'subtotal_minor' => false,
        'total_minor' => false,
        'metadata' => false,
        'converted_to_checkout_session_id' => true,
        'public_token' => false,
        'created_at' => false,
        'updated_at' => false,
        'expires_at' => false
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
        'merchant_id' => 'merchant_id',
        'customer_id' => 'customer_id',
        'currency' => 'currency',
        'mode' => 'mode',
        'status' => 'status',
        'line_items' => 'line_items',
        'add_ons_offered' => 'add_ons_offered',
        'add_ons_selected' => 'add_ons_selected',
        'discount_code' => 'discount_code',
        'subtotal_minor' => 'subtotal_minor',
        'total_minor' => 'total_minor',
        'metadata' => 'metadata',
        'converted_to_checkout_session_id' => 'converted_to_checkout_session_id',
        'public_token' => 'public_token',
        'created_at' => 'created_at',
        'updated_at' => 'updated_at',
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
        'merchant_id' => 'setMerchantId',
        'customer_id' => 'setCustomerId',
        'currency' => 'setCurrency',
        'mode' => 'setMode',
        'status' => 'setStatus',
        'line_items' => 'setLineItems',
        'add_ons_offered' => 'setAddOnsOffered',
        'add_ons_selected' => 'setAddOnsSelected',
        'discount_code' => 'setDiscountCode',
        'subtotal_minor' => 'setSubtotalMinor',
        'total_minor' => 'setTotalMinor',
        'metadata' => 'setMetadata',
        'converted_to_checkout_session_id' => 'setConvertedToCheckoutSessionId',
        'public_token' => 'setPublicToken',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
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
        'merchant_id' => 'getMerchantId',
        'customer_id' => 'getCustomerId',
        'currency' => 'getCurrency',
        'mode' => 'getMode',
        'status' => 'getStatus',
        'line_items' => 'getLineItems',
        'add_ons_offered' => 'getAddOnsOffered',
        'add_ons_selected' => 'getAddOnsSelected',
        'discount_code' => 'getDiscountCode',
        'subtotal_minor' => 'getSubtotalMinor',
        'total_minor' => 'getTotalMinor',
        'metadata' => 'getMetadata',
        'converted_to_checkout_session_id' => 'getConvertedToCheckoutSessionId',
        'public_token' => 'getPublicToken',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
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

    public const OBJECT_CART_SESSION = 'cart_session';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getObjectAllowableValues()
    {
        return [
            self::OBJECT_CART_SESSION,
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
        $this->setIfExists('merchant_id', $data ?? [], null);
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('mode', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('line_items', $data ?? [], null);
        $this->setIfExists('add_ons_offered', $data ?? [], null);
        $this->setIfExists('add_ons_selected', $data ?? [], null);
        $this->setIfExists('discount_code', $data ?? [], null);
        $this->setIfExists('subtotal_minor', $data ?? [], null);
        $this->setIfExists('total_minor', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('converted_to_checkout_session_id', $data ?? [], null);
        $this->setIfExists('public_token', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
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

        if ($this->container['merchant_id'] === null) {
            $invalidProperties[] = "'merchant_id' can't be null";
        }
        if ($this->container['customer_id'] === null && !$this->isNullableSetToNull('customer_id')) {
            $invalidProperties[] = "'customer_id' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ((mb_strlen($this->container['currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be smaller than or equal to 3.";
        }

        if ((mb_strlen($this->container['currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be bigger than or equal to 3.";
        }

        if ($this->container['mode'] === null) {
            $invalidProperties[] = "'mode' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['line_items'] === null) {
            $invalidProperties[] = "'line_items' can't be null";
        }
        if ($this->container['add_ons_offered'] === null) {
            $invalidProperties[] = "'add_ons_offered' can't be null";
        }
        if ($this->container['add_ons_selected'] === null) {
            $invalidProperties[] = "'add_ons_selected' can't be null";
        }
        if ($this->container['discount_code'] === null && !$this->isNullableSetToNull('discount_code')) {
            $invalidProperties[] = "'discount_code' can't be null";
        }
        if ($this->container['subtotal_minor'] === null) {
            $invalidProperties[] = "'subtotal_minor' can't be null";
        }
        if (($this->container['subtotal_minor'] < 0)) {
            $invalidProperties[] = "invalid value for 'subtotal_minor', must be bigger than or equal to 0.";
        }

        if ($this->container['total_minor'] === null) {
            $invalidProperties[] = "'total_minor' can't be null";
        }
        if (($this->container['total_minor'] < 0)) {
            $invalidProperties[] = "invalid value for 'total_minor', must be bigger than or equal to 0.";
        }

        if ($this->container['metadata'] === null) {
            $invalidProperties[] = "'metadata' can't be null";
        }
        if ($this->container['converted_to_checkout_session_id'] === null && !$this->isNullableSetToNull('converted_to_checkout_session_id')) {
            $invalidProperties[] = "'converted_to_checkout_session_id' can't be null";
        }
        if ($this->container['public_token'] === null) {
            $invalidProperties[] = "'public_token' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
        }
        if ($this->container['expires_at'] === null) {
            $invalidProperties[] = "'expires_at' can't be null";
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
     * @param string $object object
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
     * @param string $currency currency
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        if ((mb_strlen($currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling CartSession., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling CartSession., must be bigger than or equal to 3.');
        }

        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->container['mode'];
    }

    /**
     * Sets mode
     *
     * @param string $mode mode
     *
     * @return self
     */
    public function setMode($mode)
    {
        if (is_null($mode)) {
            throw new \InvalidArgumentException('non-nullable mode cannot be null');
        }
        $this->container['mode'] = $mode;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \RevKeen\Model\CartSessionStatus
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \RevKeen\Model\CartSessionStatus $status status
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
     * Gets line_items
     *
     * @return \RevKeen\Model\CartLineItem[]
     */
    public function getLineItems()
    {
        return $this->container['line_items'];
    }

    /**
     * Sets line_items
     *
     * @param \RevKeen\Model\CartLineItem[] $line_items line_items
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
     * Gets add_ons_offered
     *
     * @return string[]
     */
    public function getAddOnsOffered()
    {
        return $this->container['add_ons_offered'];
    }

    /**
     * Sets add_ons_offered
     *
     * @param string[] $add_ons_offered add_ons_offered
     *
     * @return self
     */
    public function setAddOnsOffered($add_ons_offered)
    {
        if (is_null($add_ons_offered)) {
            throw new \InvalidArgumentException('non-nullable add_ons_offered cannot be null');
        }
        $this->container['add_ons_offered'] = $add_ons_offered;

        return $this;
    }

    /**
     * Gets add_ons_selected
     *
     * @return string[]
     */
    public function getAddOnsSelected()
    {
        return $this->container['add_ons_selected'];
    }

    /**
     * Sets add_ons_selected
     *
     * @param string[] $add_ons_selected add_ons_selected
     *
     * @return self
     */
    public function setAddOnsSelected($add_ons_selected)
    {
        if (is_null($add_ons_selected)) {
            throw new \InvalidArgumentException('non-nullable add_ons_selected cannot be null');
        }
        $this->container['add_ons_selected'] = $add_ons_selected;

        return $this;
    }

    /**
     * Gets discount_code
     *
     * @return string|null
     */
    public function getDiscountCode()
    {
        return $this->container['discount_code'];
    }

    /**
     * Sets discount_code
     *
     * @param string|null $discount_code discount_code
     *
     * @return self
     */
    public function setDiscountCode($discount_code)
    {
        if (is_null($discount_code)) {
            array_push($this->openAPINullablesSetToNull, 'discount_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('discount_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['discount_code'] = $discount_code;

        return $this;
    }

    /**
     * Gets subtotal_minor
     *
     * @return int
     */
    public function getSubtotalMinor()
    {
        return $this->container['subtotal_minor'];
    }

    /**
     * Sets subtotal_minor
     *
     * @param int $subtotal_minor subtotal_minor
     *
     * @return self
     */
    public function setSubtotalMinor($subtotal_minor)
    {
        if (is_null($subtotal_minor)) {
            throw new \InvalidArgumentException('non-nullable subtotal_minor cannot be null');
        }

        if (($subtotal_minor < 0)) {
            throw new \InvalidArgumentException('invalid value for $subtotal_minor when calling CartSession., must be bigger than or equal to 0.');
        }

        $this->container['subtotal_minor'] = $subtotal_minor;

        return $this;
    }

    /**
     * Gets total_minor
     *
     * @return int
     */
    public function getTotalMinor()
    {
        return $this->container['total_minor'];
    }

    /**
     * Sets total_minor
     *
     * @param int $total_minor total_minor
     *
     * @return self
     */
    public function setTotalMinor($total_minor)
    {
        if (is_null($total_minor)) {
            throw new \InvalidArgumentException('non-nullable total_minor cannot be null');
        }

        if (($total_minor < 0)) {
            throw new \InvalidArgumentException('invalid value for $total_minor when calling CartSession., must be bigger than or equal to 0.');
        }

        $this->container['total_minor'] = $total_minor;

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
     * @param array<string,mixed> $metadata metadata
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
     * Gets converted_to_checkout_session_id
     *
     * @return string|null
     */
    public function getConvertedToCheckoutSessionId()
    {
        return $this->container['converted_to_checkout_session_id'];
    }

    /**
     * Sets converted_to_checkout_session_id
     *
     * @param string|null $converted_to_checkout_session_id converted_to_checkout_session_id
     *
     * @return self
     */
    public function setConvertedToCheckoutSessionId($converted_to_checkout_session_id)
    {
        if (is_null($converted_to_checkout_session_id)) {
            array_push($this->openAPINullablesSetToNull, 'converted_to_checkout_session_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('converted_to_checkout_session_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['converted_to_checkout_session_id'] = $converted_to_checkout_session_id;

        return $this;
    }

    /**
     * Gets public_token
     *
     * @return string
     */
    public function getPublicToken()
    {
        return $this->container['public_token'];
    }

    /**
     * Sets public_token
     *
     * @param string $public_token Anon-access token. Use to build /c/[cart_session_id]?token=... URLs for customer-facing cart checkout. Becomes useless once the cart leaves status='open'.
     *
     * @return self
     */
    public function setPublicToken($public_token)
    {
        if (is_null($public_token)) {
            throw new \InvalidArgumentException('non-nullable public_token cannot be null');
        }
        $this->container['public_token'] = $public_token;

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
     * Gets expires_at
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param \DateTime $expires_at expires_at
     *
     * @return self
     */
    public function setExpiresAt($expires_at)
    {
        if (is_null($expires_at)) {
            throw new \InvalidArgumentException('non-nullable expires_at cannot be null');
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


