<?php
/**
 * UpdateDiscountInput
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
 * UpdateDiscountInput Class Doc Comment
 *
 * @category Class
 * @description Parameters for updating an existing discount. Active discounts can only have metadata and usage limits modified.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UpdateDiscountInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UpdateDiscountInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'description' => 'string',
        'discount_value' => 'float',
        'applies_to' => 'string',
        'scope' => 'string',
        'product_ids' => 'string[]',
        'max_redemptions' => 'int',
        'max_redemptions_per_user' => 'int',
        'valid_from' => 'string',
        'valid_until' => 'string',
        'is_active' => 'bool',
        'is_archived' => 'bool',
        'recurring_type' => 'string',
        'recurring_cycles' => 'int',
        'first_time_customer' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'name' => null,
        'description' => null,
        'discount_value' => null,
        'applies_to' => null,
        'scope' => null,
        'product_ids' => null,
        'max_redemptions' => null,
        'max_redemptions_per_user' => null,
        'valid_from' => null,
        'valid_until' => null,
        'is_active' => null,
        'is_archived' => null,
        'recurring_type' => null,
        'recurring_cycles' => null,
        'first_time_customer' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'name' => false,
        'description' => true,
        'discount_value' => false,
        'applies_to' => false,
        'scope' => false,
        'product_ids' => true,
        'max_redemptions' => true,
        'max_redemptions_per_user' => false,
        'valid_from' => true,
        'valid_until' => true,
        'is_active' => false,
        'is_archived' => false,
        'recurring_type' => true,
        'recurring_cycles' => true,
        'first_time_customer' => false
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
        'name' => 'name',
        'description' => 'description',
        'discount_value' => 'discount_value',
        'applies_to' => 'applies_to',
        'scope' => 'scope',
        'product_ids' => 'product_ids',
        'max_redemptions' => 'max_redemptions',
        'max_redemptions_per_user' => 'max_redemptions_per_user',
        'valid_from' => 'valid_from',
        'valid_until' => 'valid_until',
        'is_active' => 'is_active',
        'is_archived' => 'is_archived',
        'recurring_type' => 'recurring_type',
        'recurring_cycles' => 'recurring_cycles',
        'first_time_customer' => 'first_time_customer'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'description' => 'setDescription',
        'discount_value' => 'setDiscountValue',
        'applies_to' => 'setAppliesTo',
        'scope' => 'setScope',
        'product_ids' => 'setProductIds',
        'max_redemptions' => 'setMaxRedemptions',
        'max_redemptions_per_user' => 'setMaxRedemptionsPerUser',
        'valid_from' => 'setValidFrom',
        'valid_until' => 'setValidUntil',
        'is_active' => 'setIsActive',
        'is_archived' => 'setIsArchived',
        'recurring_type' => 'setRecurringType',
        'recurring_cycles' => 'setRecurringCycles',
        'first_time_customer' => 'setFirstTimeCustomer'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'description' => 'getDescription',
        'discount_value' => 'getDiscountValue',
        'applies_to' => 'getAppliesTo',
        'scope' => 'getScope',
        'product_ids' => 'getProductIds',
        'max_redemptions' => 'getMaxRedemptions',
        'max_redemptions_per_user' => 'getMaxRedemptionsPerUser',
        'valid_from' => 'getValidFrom',
        'valid_until' => 'getValidUntil',
        'is_active' => 'getIsActive',
        'is_archived' => 'getIsArchived',
        'recurring_type' => 'getRecurringType',
        'recurring_cycles' => 'getRecurringCycles',
        'first_time_customer' => 'getFirstTimeCustomer'
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

    public const APPLIES_TO_ALL = 'all';
    public const APPLIES_TO_SPECIFIC_PRODUCTS = 'specific_products';
    public const SCOPE_ENTIRE_ORDER = 'entire_order';
    public const SCOPE_SPECIFIC_PRODUCTS = 'specific_products';
    public const SCOPE_SUBSCRIPTION_ONLY = 'subscription_only';
    public const SCOPE_ONE_TIME_ONLY = 'one_time_only';
    public const RECURRING_TYPE_ONCE = 'once';
    public const RECURRING_TYPE_FOREVER = 'forever';
    public const RECURRING_TYPE_REPEATING = 'repeating';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAppliesToAllowableValues()
    {
        return [
            self::APPLIES_TO_ALL,
            self::APPLIES_TO_SPECIFIC_PRODUCTS,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getScopeAllowableValues()
    {
        return [
            self::SCOPE_ENTIRE_ORDER,
            self::SCOPE_SPECIFIC_PRODUCTS,
            self::SCOPE_SUBSCRIPTION_ONLY,
            self::SCOPE_ONE_TIME_ONLY,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRecurringTypeAllowableValues()
    {
        return [
            self::RECURRING_TYPE_ONCE,
            self::RECURRING_TYPE_FOREVER,
            self::RECURRING_TYPE_REPEATING,
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
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('discount_value', $data ?? [], null);
        $this->setIfExists('applies_to', $data ?? [], null);
        $this->setIfExists('scope', $data ?? [], null);
        $this->setIfExists('product_ids', $data ?? [], null);
        $this->setIfExists('max_redemptions', $data ?? [], null);
        $this->setIfExists('max_redemptions_per_user', $data ?? [], null);
        $this->setIfExists('valid_from', $data ?? [], null);
        $this->setIfExists('valid_until', $data ?? [], null);
        $this->setIfExists('is_active', $data ?? [], null);
        $this->setIfExists('is_archived', $data ?? [], null);
        $this->setIfExists('recurring_type', $data ?? [], null);
        $this->setIfExists('recurring_cycles', $data ?? [], null);
        $this->setIfExists('first_time_customer', $data ?? [], null);
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

        if (!is_null($this->container['name']) && (mb_strlen($this->container['name']) > 255)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['name']) && (mb_strlen($this->container['name']) < 1)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['description']) && (mb_strlen($this->container['description']) > 1000)) {
            $invalidProperties[] = "invalid value for 'description', the character length must be smaller than or equal to 1000.";
        }

        if (!is_null($this->container['discount_value']) && ($this->container['discount_value'] < 0.01)) {
            $invalidProperties[] = "invalid value for 'discount_value', must be bigger than or equal to 0.01.";
        }

        $allowedValues = $this->getAppliesToAllowableValues();
        if (!is_null($this->container['applies_to']) && !in_array($this->container['applies_to'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'applies_to', must be one of '%s'",
                $this->container['applies_to'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getScopeAllowableValues();
        if (!is_null($this->container['scope']) && !in_array($this->container['scope'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'scope', must be one of '%s'",
                $this->container['scope'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['max_redemptions']) && ($this->container['max_redemptions'] < 1)) {
            $invalidProperties[] = "invalid value for 'max_redemptions', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['max_redemptions_per_user']) && ($this->container['max_redemptions_per_user'] < 0)) {
            $invalidProperties[] = "invalid value for 'max_redemptions_per_user', must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getRecurringTypeAllowableValues();
        if (!is_null($this->container['recurring_type']) && !in_array($this->container['recurring_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'recurring_type', must be one of '%s'",
                $this->container['recurring_type'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['recurring_cycles']) && ($this->container['recurring_cycles'] < 1)) {
            $invalidProperties[] = "invalid value for 'recurring_cycles', must be bigger than or equal to 1.";
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
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        if ((mb_strlen($name) > 255)) {
            throw new \InvalidArgumentException('invalid length for $name when calling UpdateDiscountInput., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $name when calling UpdateDiscountInput., must be bigger than or equal to 1.');
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
        if (!is_null($description) && (mb_strlen($description) > 1000)) {
            throw new \InvalidArgumentException('invalid length for $description when calling UpdateDiscountInput., must be smaller than or equal to 1000.');
        }

        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets discount_value
     *
     * @return float|null
     */
    public function getDiscountValue()
    {
        return $this->container['discount_value'];
    }

    /**
     * Sets discount_value
     *
     * @param float|null $discount_value discount_value
     *
     * @return self
     */
    public function setDiscountValue($discount_value)
    {
        if (is_null($discount_value)) {
            throw new \InvalidArgumentException('non-nullable discount_value cannot be null');
        }

        if (($discount_value < 0.01)) {
            throw new \InvalidArgumentException('invalid value for $discount_value when calling UpdateDiscountInput., must be bigger than or equal to 0.01.');
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
            throw new \InvalidArgumentException('non-nullable applies_to cannot be null');
        }
        $allowedValues = $this->getAppliesToAllowableValues();
        if (!in_array($applies_to, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'applies_to', must be one of '%s'",
                    $applies_to,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['applies_to'] = $applies_to;

        return $this;
    }

    /**
     * Gets scope
     *
     * @return string|null
     */
    public function getScope()
    {
        return $this->container['scope'];
    }

    /**
     * Sets scope
     *
     * @param string|null $scope scope
     *
     * @return self
     */
    public function setScope($scope)
    {
        if (is_null($scope)) {
            throw new \InvalidArgumentException('non-nullable scope cannot be null');
        }
        $allowedValues = $this->getScopeAllowableValues();
        if (!in_array($scope, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'scope', must be one of '%s'",
                    $scope,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['scope'] = $scope;

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
     * @return int|null
     */
    public function getMaxRedemptions()
    {
        return $this->container['max_redemptions'];
    }

    /**
     * Sets max_redemptions
     *
     * @param int|null $max_redemptions max_redemptions
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

        if (!is_null($max_redemptions) && ($max_redemptions < 1)) {
            throw new \InvalidArgumentException('invalid value for $max_redemptions when calling UpdateDiscountInput., must be bigger than or equal to 1.');
        }

        $this->container['max_redemptions'] = $max_redemptions;

        return $this;
    }

    /**
     * Gets max_redemptions_per_user
     *
     * @return int|null
     */
    public function getMaxRedemptionsPerUser()
    {
        return $this->container['max_redemptions_per_user'];
    }

    /**
     * Sets max_redemptions_per_user
     *
     * @param int|null $max_redemptions_per_user max_redemptions_per_user
     *
     * @return self
     */
    public function setMaxRedemptionsPerUser($max_redemptions_per_user)
    {
        if (is_null($max_redemptions_per_user)) {
            throw new \InvalidArgumentException('non-nullable max_redemptions_per_user cannot be null');
        }

        if (($max_redemptions_per_user < 0)) {
            throw new \InvalidArgumentException('invalid value for $max_redemptions_per_user when calling UpdateDiscountInput., must be bigger than or equal to 0.');
        }

        $this->container['max_redemptions_per_user'] = $max_redemptions_per_user;

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
            throw new \InvalidArgumentException('non-nullable is_active cannot be null');
        }
        $this->container['is_active'] = $is_active;

        return $this;
    }

    /**
     * Gets is_archived
     *
     * @return bool|null
     */
    public function getIsArchived()
    {
        return $this->container['is_archived'];
    }

    /**
     * Sets is_archived
     *
     * @param bool|null $is_archived is_archived
     *
     * @return self
     */
    public function setIsArchived($is_archived)
    {
        if (is_null($is_archived)) {
            throw new \InvalidArgumentException('non-nullable is_archived cannot be null');
        }
        $this->container['is_archived'] = $is_archived;

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
        $allowedValues = $this->getRecurringTypeAllowableValues();
        if (!is_null($recurring_type) && !in_array($recurring_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'recurring_type', must be one of '%s'",
                    $recurring_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['recurring_type'] = $recurring_type;

        return $this;
    }

    /**
     * Gets recurring_cycles
     *
     * @return int|null
     */
    public function getRecurringCycles()
    {
        return $this->container['recurring_cycles'];
    }

    /**
     * Sets recurring_cycles
     *
     * @param int|null $recurring_cycles recurring_cycles
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

        if (!is_null($recurring_cycles) && ($recurring_cycles < 1)) {
            throw new \InvalidArgumentException('invalid value for $recurring_cycles when calling UpdateDiscountInput., must be bigger than or equal to 1.');
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
            throw new \InvalidArgumentException('non-nullable first_time_customer cannot be null');
        }
        $this->container['first_time_customer'] = $first_time_customer;

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


