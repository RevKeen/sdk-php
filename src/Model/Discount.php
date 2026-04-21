<?php
/**
 * Discount
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Staging** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
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
 * Discount Class Doc Comment
 *
 * @category Class
 * @description A discount code that applies a percentage or fixed amount reduction to charges, invoices, or subscriptions.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Discount implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Discount';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'discount_type' => 'string',
        'discount_value' => 'float',
        'applies_to' => 'string',
        'product_ids' => 'string[]',
        'max_redemptions' => 'float',
        'current_redemptions' => 'float',
        'valid_from' => 'string',
        'valid_until' => 'string',
        'recurring_type' => 'string',
        'recurring_cycles' => 'float',
        'first_time_customer' => 'bool',
        'is_active' => 'bool',
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
        'id' => 'uuid',
        'code' => null,
        'name' => null,
        'description' => null,
        'discount_type' => null,
        'discount_value' => null,
        'applies_to' => null,
        'product_ids' => null,
        'max_redemptions' => null,
        'current_redemptions' => null,
        'valid_from' => null,
        'valid_until' => null,
        'recurring_type' => null,
        'recurring_cycles' => null,
        'first_time_customer' => null,
        'is_active' => null,
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
        'code' => false,
        'name' => true,
        'description' => true,
        'discount_type' => false,
        'discount_value' => false,
        'applies_to' => true,
        'product_ids' => true,
        'max_redemptions' => true,
        'current_redemptions' => true,
        'valid_from' => true,
        'valid_until' => true,
        'recurring_type' => true,
        'recurring_cycles' => true,
        'first_time_customer' => true,
        'is_active' => true,
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
        'code' => 'code',
        'name' => 'name',
        'description' => 'description',
        'discount_type' => 'discount_type',
        'discount_value' => 'discount_value',
        'applies_to' => 'applies_to',
        'product_ids' => 'product_ids',
        'max_redemptions' => 'max_redemptions',
        'current_redemptions' => 'current_redemptions',
        'valid_from' => 'valid_from',
        'valid_until' => 'valid_until',
        'recurring_type' => 'recurring_type',
        'recurring_cycles' => 'recurring_cycles',
        'first_time_customer' => 'first_time_customer',
        'is_active' => 'is_active',
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
        'code' => 'setCode',
        'name' => 'setName',
        'description' => 'setDescription',
        'discount_type' => 'setDiscountType',
        'discount_value' => 'setDiscountValue',
        'applies_to' => 'setAppliesTo',
        'product_ids' => 'setProductIds',
        'max_redemptions' => 'setMaxRedemptions',
        'current_redemptions' => 'setCurrentRedemptions',
        'valid_from' => 'setValidFrom',
        'valid_until' => 'setValidUntil',
        'recurring_type' => 'setRecurringType',
        'recurring_cycles' => 'setRecurringCycles',
        'first_time_customer' => 'setFirstTimeCustomer',
        'is_active' => 'setIsActive',
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
        'code' => 'getCode',
        'name' => 'getName',
        'description' => 'getDescription',
        'discount_type' => 'getDiscountType',
        'discount_value' => 'getDiscountValue',
        'applies_to' => 'getAppliesTo',
        'product_ids' => 'getProductIds',
        'max_redemptions' => 'getMaxRedemptions',
        'current_redemptions' => 'getCurrentRedemptions',
        'valid_from' => 'getValidFrom',
        'valid_until' => 'getValidUntil',
        'recurring_type' => 'getRecurringType',
        'recurring_cycles' => 'getRecurringCycles',
        'first_time_customer' => 'getFirstTimeCustomer',
        'is_active' => 'getIsActive',
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
        $this->setIfExists('code', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('discount_type', $data ?? [], null);
        $this->setIfExists('discount_value', $data ?? [], null);
        $this->setIfExists('applies_to', $data ?? [], null);
        $this->setIfExists('product_ids', $data ?? [], null);
        $this->setIfExists('max_redemptions', $data ?? [], null);
        $this->setIfExists('current_redemptions', $data ?? [], null);
        $this->setIfExists('valid_from', $data ?? [], null);
        $this->setIfExists('valid_until', $data ?? [], null);
        $this->setIfExists('recurring_type', $data ?? [], null);
        $this->setIfExists('recurring_cycles', $data ?? [], null);
        $this->setIfExists('first_time_customer', $data ?? [], null);
        $this->setIfExists('is_active', $data ?? [], null);
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
        if ($this->container['code'] === null) {
            $invalidProperties[] = "'code' can't be null";
        }
        if ($this->container['name'] === null && !$this->isNullableSetToNull('name')) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['description'] === null && !$this->isNullableSetToNull('description')) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ($this->container['discount_type'] === null) {
            $invalidProperties[] = "'discount_type' can't be null";
        }
        if ($this->container['discount_value'] === null) {
            $invalidProperties[] = "'discount_value' can't be null";
        }
        if ($this->container['applies_to'] === null && !$this->isNullableSetToNull('applies_to')) {
            $invalidProperties[] = "'applies_to' can't be null";
        }
        if ($this->container['product_ids'] === null && !$this->isNullableSetToNull('product_ids')) {
            $invalidProperties[] = "'product_ids' can't be null";
        }
        if ($this->container['max_redemptions'] === null && !$this->isNullableSetToNull('max_redemptions')) {
            $invalidProperties[] = "'max_redemptions' can't be null";
        }
        if ($this->container['current_redemptions'] === null && !$this->isNullableSetToNull('current_redemptions')) {
            $invalidProperties[] = "'current_redemptions' can't be null";
        }
        if ($this->container['valid_from'] === null && !$this->isNullableSetToNull('valid_from')) {
            $invalidProperties[] = "'valid_from' can't be null";
        }
        if ($this->container['valid_until'] === null && !$this->isNullableSetToNull('valid_until')) {
            $invalidProperties[] = "'valid_until' can't be null";
        }
        if ($this->container['recurring_type'] === null && !$this->isNullableSetToNull('recurring_type')) {
            $invalidProperties[] = "'recurring_type' can't be null";
        }
        if ($this->container['recurring_cycles'] === null && !$this->isNullableSetToNull('recurring_cycles')) {
            $invalidProperties[] = "'recurring_cycles' can't be null";
        }
        if ($this->container['first_time_customer'] === null && !$this->isNullableSetToNull('first_time_customer')) {
            $invalidProperties[] = "'first_time_customer' can't be null";
        }
        if ($this->container['is_active'] === null && !$this->isNullableSetToNull('is_active')) {
            $invalidProperties[] = "'is_active' can't be null";
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
     * Gets code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->container['code'];
    }

    /**
     * Sets code
     *
     * @param string $code code
     *
     * @return self
     */
    public function setCode($code)
    {
        if (is_null($code)) {
            throw new \InvalidArgumentException('non-nullable code cannot be null');
        }
        $this->container['code'] = $code;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            array_push($this->openAPINullablesSetToNull, 'name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['name'] = $name;

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
     * @param string|null $description description
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
     * Gets discount_type
     *
     * @return string
     */
    public function getDiscountType()
    {
        return $this->container['discount_type'];
    }

    /**
     * Sets discount_type
     *
     * @param string $discount_type discount_type
     *
     * @return self
     */
    public function setDiscountType($discount_type)
    {
        if (is_null($discount_type)) {
            throw new \InvalidArgumentException('non-nullable discount_type cannot be null');
        }
        $this->container['discount_type'] = $discount_type;

        return $this;
    }

    /**
     * Gets discount_value
     *
     * @return float
     */
    public function getDiscountValue()
    {
        return $this->container['discount_value'];
    }

    /**
     * Sets discount_value
     *
     * @param float $discount_value Amount off (cents) or percentage
     *
     * @return self
     */
    public function setDiscountValue($discount_value)
    {
        if (is_null($discount_value)) {
            throw new \InvalidArgumentException('non-nullable discount_value cannot be null');
        }
        $this->container['discount_value'] = $discount_value;

        return $this;
    }

    /**
     * Gets applies_to
     *
     * @return string|null
     */
    public function getAppliesTo()
    {
        return $this->container['applies_to'];
    }

    /**
     * Sets applies_to
     *
     * @param string|null $applies_to applies_to
     *
     * @return self
     */
    public function setAppliesTo($applies_to)
    {
        if (is_null($applies_to)) {
            array_push($this->openAPINullablesSetToNull, 'applies_to');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('applies_to', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['applies_to'] = $applies_to;

        return $this;
    }

    /**
     * Gets product_ids
     *
     * @return string[]|null
     */
    public function getProductIds()
    {
        return $this->container['product_ids'];
    }

    /**
     * Sets product_ids
     *
     * @param string[]|null $product_ids product_ids
     *
     * @return self
     */
    public function setProductIds($product_ids)
    {
        if (is_null($product_ids)) {
            array_push($this->openAPINullablesSetToNull, 'product_ids');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('product_ids', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['product_ids'] = $product_ids;

        return $this;
    }

    /**
     * Gets max_redemptions
     *
     * @return float|null
     */
    public function getMaxRedemptions()
    {
        return $this->container['max_redemptions'];
    }

    /**
     * Sets max_redemptions
     *
     * @param float|null $max_redemptions max_redemptions
     *
     * @return self
     */
    public function setMaxRedemptions($max_redemptions)
    {
        if (is_null($max_redemptions)) {
            array_push($this->openAPINullablesSetToNull, 'max_redemptions');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('max_redemptions', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['max_redemptions'] = $max_redemptions;

        return $this;
    }

    /**
     * Gets current_redemptions
     *
     * @return float|null
     */
    public function getCurrentRedemptions()
    {
        return $this->container['current_redemptions'];
    }

    /**
     * Sets current_redemptions
     *
     * @param float|null $current_redemptions current_redemptions
     *
     * @return self
     */
    public function setCurrentRedemptions($current_redemptions)
    {
        if (is_null($current_redemptions)) {
            array_push($this->openAPINullablesSetToNull, 'current_redemptions');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('current_redemptions', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['current_redemptions'] = $current_redemptions;

        return $this;
    }

    /**
     * Gets valid_from
     *
     * @return string|null
     */
    public function getValidFrom()
    {
        return $this->container['valid_from'];
    }

    /**
     * Sets valid_from
     *
     * @param string|null $valid_from valid_from
     *
     * @return self
     */
    public function setValidFrom($valid_from)
    {
        if (is_null($valid_from)) {
            array_push($this->openAPINullablesSetToNull, 'valid_from');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('valid_from', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['valid_from'] = $valid_from;

        return $this;
    }

    /**
     * Gets valid_until
     *
     * @return string|null
     */
    public function getValidUntil()
    {
        return $this->container['valid_until'];
    }

    /**
     * Sets valid_until
     *
     * @param string|null $valid_until valid_until
     *
     * @return self
     */
    public function setValidUntil($valid_until)
    {
        if (is_null($valid_until)) {
            array_push($this->openAPINullablesSetToNull, 'valid_until');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('valid_until', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['valid_until'] = $valid_until;

        return $this;
    }

    /**
     * Gets recurring_type
     *
     * @return string|null
     */
    public function getRecurringType()
    {
        return $this->container['recurring_type'];
    }

    /**
     * Sets recurring_type
     *
     * @param string|null $recurring_type recurring_type
     *
     * @return self
     */
    public function setRecurringType($recurring_type)
    {
        if (is_null($recurring_type)) {
            array_push($this->openAPINullablesSetToNull, 'recurring_type');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('recurring_type', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['recurring_type'] = $recurring_type;

        return $this;
    }

    /**
     * Gets recurring_cycles
     *
     * @return float|null
     */
    public function getRecurringCycles()
    {
        return $this->container['recurring_cycles'];
    }

    /**
     * Sets recurring_cycles
     *
     * @param float|null $recurring_cycles recurring_cycles
     *
     * @return self
     */
    public function setRecurringCycles($recurring_cycles)
    {
        if (is_null($recurring_cycles)) {
            array_push($this->openAPINullablesSetToNull, 'recurring_cycles');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('recurring_cycles', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['recurring_cycles'] = $recurring_cycles;

        return $this;
    }

    /**
     * Gets first_time_customer
     *
     * @return bool|null
     */
    public function getFirstTimeCustomer()
    {
        return $this->container['first_time_customer'];
    }

    /**
     * Sets first_time_customer
     *
     * @param bool|null $first_time_customer first_time_customer
     *
     * @return self
     */
    public function setFirstTimeCustomer($first_time_customer)
    {
        if (is_null($first_time_customer)) {
            array_push($this->openAPINullablesSetToNull, 'first_time_customer');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('first_time_customer', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['first_time_customer'] = $first_time_customer;

        return $this;
    }

    /**
     * Gets is_active
     *
     * @return bool|null
     */
    public function getIsActive()
    {
        return $this->container['is_active'];
    }

    /**
     * Sets is_active
     *
     * @param bool|null $is_active is_active
     *
     * @return self
     */
    public function setIsActive($is_active)
    {
        if (is_null($is_active)) {
            array_push($this->openAPINullablesSetToNull, 'is_active');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('is_active', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['is_active'] = $is_active;

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


