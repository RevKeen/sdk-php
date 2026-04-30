<?php
/**
 * CreatePriceRequest
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
 * CreatePriceRequest Class Doc Comment
 *
 * @category Class
 * @description Parameters for creating a new price. Specify the product, amount, currency, and billing interval.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreatePriceRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreatePriceRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'product_id' => 'string',
        'currency' => 'string',
        'unit_amount' => 'int',
        'type' => 'string',
        'pricing_model' => 'string',
        'interval' => 'string',
        'interval_count' => 'int',
        'trial_period_days' => 'int',
        'minimum_amount' => 'int',
        'maximum_amount' => 'int',
        'suggested_amount' => 'int',
        'preset_amounts' => 'int[]',
        'nickname' => 'string',
        'lookup_key' => 'string',
        'billing_scheme' => 'string',
        'tiers_mode' => 'string',
        'tiers' => '\RevKeen\Model\PriceTier[]',
        'transform_quantity' => '\RevKeen\Model\TransformQuantity',
        'metadata' => 'array<string,mixed>'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'product_id' => 'uuid',
        'currency' => null,
        'unit_amount' => null,
        'type' => null,
        'pricing_model' => null,
        'interval' => null,
        'interval_count' => null,
        'trial_period_days' => null,
        'minimum_amount' => null,
        'maximum_amount' => null,
        'suggested_amount' => null,
        'preset_amounts' => null,
        'nickname' => null,
        'lookup_key' => null,
        'billing_scheme' => null,
        'tiers_mode' => null,
        'tiers' => null,
        'transform_quantity' => null,
        'metadata' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'product_id' => false,
        'currency' => false,
        'unit_amount' => false,
        'type' => false,
        'pricing_model' => false,
        'interval' => false,
        'interval_count' => false,
        'trial_period_days' => false,
        'minimum_amount' => false,
        'maximum_amount' => false,
        'suggested_amount' => false,
        'preset_amounts' => false,
        'nickname' => false,
        'lookup_key' => false,
        'billing_scheme' => false,
        'tiers_mode' => false,
        'tiers' => false,
        'transform_quantity' => false,
        'metadata' => false
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
        'product_id' => 'product_id',
        'currency' => 'currency',
        'unit_amount' => 'unit_amount',
        'type' => 'type',
        'pricing_model' => 'pricing_model',
        'interval' => 'interval',
        'interval_count' => 'interval_count',
        'trial_period_days' => 'trial_period_days',
        'minimum_amount' => 'minimum_amount',
        'maximum_amount' => 'maximum_amount',
        'suggested_amount' => 'suggested_amount',
        'preset_amounts' => 'preset_amounts',
        'nickname' => 'nickname',
        'lookup_key' => 'lookup_key',
        'billing_scheme' => 'billing_scheme',
        'tiers_mode' => 'tiers_mode',
        'tiers' => 'tiers',
        'transform_quantity' => 'transform_quantity',
        'metadata' => 'metadata'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'product_id' => 'setProductId',
        'currency' => 'setCurrency',
        'unit_amount' => 'setUnitAmount',
        'type' => 'setType',
        'pricing_model' => 'setPricingModel',
        'interval' => 'setInterval',
        'interval_count' => 'setIntervalCount',
        'trial_period_days' => 'setTrialPeriodDays',
        'minimum_amount' => 'setMinimumAmount',
        'maximum_amount' => 'setMaximumAmount',
        'suggested_amount' => 'setSuggestedAmount',
        'preset_amounts' => 'setPresetAmounts',
        'nickname' => 'setNickname',
        'lookup_key' => 'setLookupKey',
        'billing_scheme' => 'setBillingScheme',
        'tiers_mode' => 'setTiersMode',
        'tiers' => 'setTiers',
        'transform_quantity' => 'setTransformQuantity',
        'metadata' => 'setMetadata'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'product_id' => 'getProductId',
        'currency' => 'getCurrency',
        'unit_amount' => 'getUnitAmount',
        'type' => 'getType',
        'pricing_model' => 'getPricingModel',
        'interval' => 'getInterval',
        'interval_count' => 'getIntervalCount',
        'trial_period_days' => 'getTrialPeriodDays',
        'minimum_amount' => 'getMinimumAmount',
        'maximum_amount' => 'getMaximumAmount',
        'suggested_amount' => 'getSuggestedAmount',
        'preset_amounts' => 'getPresetAmounts',
        'nickname' => 'getNickname',
        'lookup_key' => 'getLookupKey',
        'billing_scheme' => 'getBillingScheme',
        'tiers_mode' => 'getTiersMode',
        'tiers' => 'getTiers',
        'transform_quantity' => 'getTransformQuantity',
        'metadata' => 'getMetadata'
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

    public const TYPE_ONE_TIME = 'one_time';
    public const TYPE_RECURRING = 'recurring';
    public const PRICING_MODEL_FIXED = 'fixed';
    public const PRICING_MODEL_PAY_WHAT_YOU_WANT = 'pay_what_you_want';
    public const PRICING_MODEL_FREE = 'free';
    public const INTERVAL_DAY = 'day';
    public const INTERVAL_WEEK = 'week';
    public const INTERVAL_MONTH = 'month';
    public const INTERVAL_YEAR = 'year';
    public const BILLING_SCHEME_PER_UNIT = 'per_unit';
    public const BILLING_SCHEME_TIERED = 'tiered';
    public const TIERS_MODE_GRADUATED = 'graduated';
    public const TIERS_MODE_VOLUME = 'volume';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_ONE_TIME,
            self::TYPE_RECURRING,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPricingModelAllowableValues()
    {
        return [
            self::PRICING_MODEL_FIXED,
            self::PRICING_MODEL_PAY_WHAT_YOU_WANT,
            self::PRICING_MODEL_FREE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getIntervalAllowableValues()
    {
        return [
            self::INTERVAL_DAY,
            self::INTERVAL_WEEK,
            self::INTERVAL_MONTH,
            self::INTERVAL_YEAR,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBillingSchemeAllowableValues()
    {
        return [
            self::BILLING_SCHEME_PER_UNIT,
            self::BILLING_SCHEME_TIERED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTiersModeAllowableValues()
    {
        return [
            self::TIERS_MODE_GRADUATED,
            self::TIERS_MODE_VOLUME,
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
        $this->setIfExists('product_id', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], 'usd');
        $this->setIfExists('unit_amount', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], 'one_time');
        $this->setIfExists('pricing_model', $data ?? [], 'fixed');
        $this->setIfExists('interval', $data ?? [], null);
        $this->setIfExists('interval_count', $data ?? [], null);
        $this->setIfExists('trial_period_days', $data ?? [], null);
        $this->setIfExists('minimum_amount', $data ?? [], null);
        $this->setIfExists('maximum_amount', $data ?? [], null);
        $this->setIfExists('suggested_amount', $data ?? [], null);
        $this->setIfExists('preset_amounts', $data ?? [], null);
        $this->setIfExists('nickname', $data ?? [], null);
        $this->setIfExists('lookup_key', $data ?? [], null);
        $this->setIfExists('billing_scheme', $data ?? [], null);
        $this->setIfExists('tiers_mode', $data ?? [], null);
        $this->setIfExists('tiers', $data ?? [], null);
        $this->setIfExists('transform_quantity', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
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

        if ($this->container['product_id'] === null) {
            $invalidProperties[] = "'product_id' can't be null";
        }
        if (!is_null($this->container['currency']) && (mb_strlen($this->container['currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['currency']) && (mb_strlen($this->container['currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be bigger than or equal to 3.";
        }

        if (!is_null($this->container['unit_amount']) && ($this->container['unit_amount'] < 0)) {
            $invalidProperties[] = "invalid value for 'unit_amount', must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPricingModelAllowableValues();
        if (!is_null($this->container['pricing_model']) && !in_array($this->container['pricing_model'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'pricing_model', must be one of '%s'",
                $this->container['pricing_model'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getIntervalAllowableValues();
        if (!is_null($this->container['interval']) && !in_array($this->container['interval'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'interval', must be one of '%s'",
                $this->container['interval'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['interval_count']) && ($this->container['interval_count'] > 12)) {
            $invalidProperties[] = "invalid value for 'interval_count', must be smaller than or equal to 12.";
        }

        if (!is_null($this->container['interval_count']) && ($this->container['interval_count'] < 1)) {
            $invalidProperties[] = "invalid value for 'interval_count', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['trial_period_days']) && ($this->container['trial_period_days'] > 730)) {
            $invalidProperties[] = "invalid value for 'trial_period_days', must be smaller than or equal to 730.";
        }

        if (!is_null($this->container['trial_period_days']) && ($this->container['trial_period_days'] < 0)) {
            $invalidProperties[] = "invalid value for 'trial_period_days', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['minimum_amount']) && ($this->container['minimum_amount'] < 0)) {
            $invalidProperties[] = "invalid value for 'minimum_amount', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['maximum_amount']) && ($this->container['maximum_amount'] < 0)) {
            $invalidProperties[] = "invalid value for 'maximum_amount', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['suggested_amount']) && ($this->container['suggested_amount'] < 0)) {
            $invalidProperties[] = "invalid value for 'suggested_amount', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['preset_amounts']) && (count($this->container['preset_amounts']) > 10)) {
            $invalidProperties[] = "invalid value for 'preset_amounts', number of items must be less than or equal to 10.";
        }

        if (!is_null($this->container['nickname']) && (mb_strlen($this->container['nickname']) > 100)) {
            $invalidProperties[] = "invalid value for 'nickname', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['lookup_key']) && (mb_strlen($this->container['lookup_key']) > 100)) {
            $invalidProperties[] = "invalid value for 'lookup_key', the character length must be smaller than or equal to 100.";
        }

        $allowedValues = $this->getBillingSchemeAllowableValues();
        if (!is_null($this->container['billing_scheme']) && !in_array($this->container['billing_scheme'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'billing_scheme', must be one of '%s'",
                $this->container['billing_scheme'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getTiersModeAllowableValues();
        if (!is_null($this->container['tiers_mode']) && !in_array($this->container['tiers_mode'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'tiers_mode', must be one of '%s'",
                $this->container['tiers_mode'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['tiers']) && (count($this->container['tiers']) > 50)) {
            $invalidProperties[] = "invalid value for 'tiers', number of items must be less than or equal to 50.";
        }

        if (!is_null($this->container['tiers']) && (count($this->container['tiers']) < 2)) {
            $invalidProperties[] = "invalid value for 'tiers', number of items must be greater than or equal to 2.";
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
     * Gets product_id
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->container['product_id'];
    }

    /**
     * Sets product_id
     *
     * @param string $product_id ID of the product this price belongs to
     *
     * @return self
     */
    public function setProductId($product_id)
    {
        if (is_null($product_id)) {
            throw new \InvalidArgumentException('non-nullable product_id cannot be null');
        }
        $this->container['product_id'] = $product_id;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string|null $currency Three-letter ISO currency code
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        if ((mb_strlen($currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling CreatePriceRequest., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling CreatePriceRequest., must be bigger than or equal to 3.');
        }

        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets unit_amount
     *
     * @return int|null
     */
    public function getUnitAmount()
    {
        return $this->container['unit_amount'];
    }

    /**
     * Sets unit_amount
     *
     * @param int|null $unit_amount Price in minor units (cents). Required for fixed pricing.
     *
     * @return self
     */
    public function setUnitAmount($unit_amount)
    {
        if (is_null($unit_amount)) {
            throw new \InvalidArgumentException('non-nullable unit_amount cannot be null');
        }

        if (($unit_amount < 0)) {
            throw new \InvalidArgumentException('invalid value for $unit_amount when calling CreatePriceRequest., must be bigger than or equal to 0.');
        }

        $this->container['unit_amount'] = $unit_amount;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type Price type
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
     * Gets pricing_model
     *
     * @return string|null
     */
    public function getPricingModel()
    {
        return $this->container['pricing_model'];
    }

    /**
     * Sets pricing_model
     *
     * @param string|null $pricing_model Pricing model
     *
     * @return self
     */
    public function setPricingModel($pricing_model)
    {
        if (is_null($pricing_model)) {
            throw new \InvalidArgumentException('non-nullable pricing_model cannot be null');
        }
        $allowedValues = $this->getPricingModelAllowableValues();
        if (!in_array($pricing_model, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'pricing_model', must be one of '%s'",
                    $pricing_model,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['pricing_model'] = $pricing_model;

        return $this;
    }

    /**
     * Gets interval
     *
     * @return string|null
     */
    public function getInterval()
    {
        return $this->container['interval'];
    }

    /**
     * Sets interval
     *
     * @param string|null $interval Billing interval (required for recurring)
     *
     * @return self
     */
    public function setInterval($interval)
    {
        if (is_null($interval)) {
            throw new \InvalidArgumentException('non-nullable interval cannot be null');
        }
        $allowedValues = $this->getIntervalAllowableValues();
        if (!in_array($interval, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'interval', must be one of '%s'",
                    $interval,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['interval'] = $interval;

        return $this;
    }

    /**
     * Gets interval_count
     *
     * @return int|null
     */
    public function getIntervalCount()
    {
        return $this->container['interval_count'];
    }

    /**
     * Sets interval_count
     *
     * @param int|null $interval_count Number of intervals between billings (1-12)
     *
     * @return self
     */
    public function setIntervalCount($interval_count)
    {
        if (is_null($interval_count)) {
            throw new \InvalidArgumentException('non-nullable interval_count cannot be null');
        }

        if (($interval_count > 12)) {
            throw new \InvalidArgumentException('invalid value for $interval_count when calling CreatePriceRequest., must be smaller than or equal to 12.');
        }
        if (($interval_count < 1)) {
            throw new \InvalidArgumentException('invalid value for $interval_count when calling CreatePriceRequest., must be bigger than or equal to 1.');
        }

        $this->container['interval_count'] = $interval_count;

        return $this;
    }

    /**
     * Gets trial_period_days
     *
     * @return int|null
     */
    public function getTrialPeriodDays()
    {
        return $this->container['trial_period_days'];
    }

    /**
     * Sets trial_period_days
     *
     * @param int|null $trial_period_days Trial period in days (0-730)
     *
     * @return self
     */
    public function setTrialPeriodDays($trial_period_days)
    {
        if (is_null($trial_period_days)) {
            throw new \InvalidArgumentException('non-nullable trial_period_days cannot be null');
        }

        if (($trial_period_days > 730)) {
            throw new \InvalidArgumentException('invalid value for $trial_period_days when calling CreatePriceRequest., must be smaller than or equal to 730.');
        }
        if (($trial_period_days < 0)) {
            throw new \InvalidArgumentException('invalid value for $trial_period_days when calling CreatePriceRequest., must be bigger than or equal to 0.');
        }

        $this->container['trial_period_days'] = $trial_period_days;

        return $this;
    }

    /**
     * Gets minimum_amount
     *
     * @return int|null
     */
    public function getMinimumAmount()
    {
        return $this->container['minimum_amount'];
    }

    /**
     * Sets minimum_amount
     *
     * @param int|null $minimum_amount PWYW: minimum amount in cents
     *
     * @return self
     */
    public function setMinimumAmount($minimum_amount)
    {
        if (is_null($minimum_amount)) {
            throw new \InvalidArgumentException('non-nullable minimum_amount cannot be null');
        }

        if (($minimum_amount < 0)) {
            throw new \InvalidArgumentException('invalid value for $minimum_amount when calling CreatePriceRequest., must be bigger than or equal to 0.');
        }

        $this->container['minimum_amount'] = $minimum_amount;

        return $this;
    }

    /**
     * Gets maximum_amount
     *
     * @return int|null
     */
    public function getMaximumAmount()
    {
        return $this->container['maximum_amount'];
    }

    /**
     * Sets maximum_amount
     *
     * @param int|null $maximum_amount PWYW: maximum amount in cents
     *
     * @return self
     */
    public function setMaximumAmount($maximum_amount)
    {
        if (is_null($maximum_amount)) {
            throw new \InvalidArgumentException('non-nullable maximum_amount cannot be null');
        }

        if (($maximum_amount < 0)) {
            throw new \InvalidArgumentException('invalid value for $maximum_amount when calling CreatePriceRequest., must be bigger than or equal to 0.');
        }

        $this->container['maximum_amount'] = $maximum_amount;

        return $this;
    }

    /**
     * Gets suggested_amount
     *
     * @return int|null
     */
    public function getSuggestedAmount()
    {
        return $this->container['suggested_amount'];
    }

    /**
     * Sets suggested_amount
     *
     * @param int|null $suggested_amount PWYW: suggested amount in cents
     *
     * @return self
     */
    public function setSuggestedAmount($suggested_amount)
    {
        if (is_null($suggested_amount)) {
            throw new \InvalidArgumentException('non-nullable suggested_amount cannot be null');
        }

        if (($suggested_amount < 0)) {
            throw new \InvalidArgumentException('invalid value for $suggested_amount when calling CreatePriceRequest., must be bigger than or equal to 0.');
        }

        $this->container['suggested_amount'] = $suggested_amount;

        return $this;
    }

    /**
     * Gets preset_amounts
     *
     * @return int[]|null
     */
    public function getPresetAmounts()
    {
        return $this->container['preset_amounts'];
    }

    /**
     * Sets preset_amounts
     *
     * @param int[]|null $preset_amounts PWYW: quick-select amounts (max 10)
     *
     * @return self
     */
    public function setPresetAmounts($preset_amounts)
    {
        if (is_null($preset_amounts)) {
            throw new \InvalidArgumentException('non-nullable preset_amounts cannot be null');
        }

        if ((count($preset_amounts) > 10)) {
            throw new \InvalidArgumentException('invalid value for $preset_amounts when calling CreatePriceRequest., number of items must be less than or equal to 10.');
        }
        $this->container['preset_amounts'] = $preset_amounts;

        return $this;
    }

    /**
     * Gets nickname
     *
     * @return string|null
     */
    public function getNickname()
    {
        return $this->container['nickname'];
    }

    /**
     * Sets nickname
     *
     * @param string|null $nickname Display name (e.g., 'Monthly', 'Annual')
     *
     * @return self
     */
    public function setNickname($nickname)
    {
        if (is_null($nickname)) {
            throw new \InvalidArgumentException('non-nullable nickname cannot be null');
        }
        if ((mb_strlen($nickname) > 100)) {
            throw new \InvalidArgumentException('invalid length for $nickname when calling CreatePriceRequest., must be smaller than or equal to 100.');
        }

        $this->container['nickname'] = $nickname;

        return $this;
    }

    /**
     * Gets lookup_key
     *
     * @return string|null
     */
    public function getLookupKey()
    {
        return $this->container['lookup_key'];
    }

    /**
     * Sets lookup_key
     *
     * @param string|null $lookup_key Stable key for API lookups
     *
     * @return self
     */
    public function setLookupKey($lookup_key)
    {
        if (is_null($lookup_key)) {
            throw new \InvalidArgumentException('non-nullable lookup_key cannot be null');
        }
        if ((mb_strlen($lookup_key) > 100)) {
            throw new \InvalidArgumentException('invalid length for $lookup_key when calling CreatePriceRequest., must be smaller than or equal to 100.');
        }

        $this->container['lookup_key'] = $lookup_key;

        return $this;
    }

    /**
     * Gets billing_scheme
     *
     * @return string|null
     */
    public function getBillingScheme()
    {
        return $this->container['billing_scheme'];
    }

    /**
     * Sets billing_scheme
     *
     * @param string|null $billing_scheme Billing scheme. Defaults to `per_unit`. Set to `tiered` with `tiers_mode` + `tiers` for graduated or volume pricing.
     *
     * @return self
     */
    public function setBillingScheme($billing_scheme)
    {
        if (is_null($billing_scheme)) {
            throw new \InvalidArgumentException('non-nullable billing_scheme cannot be null');
        }
        $allowedValues = $this->getBillingSchemeAllowableValues();
        if (!in_array($billing_scheme, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'billing_scheme', must be one of '%s'",
                    $billing_scheme,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['billing_scheme'] = $billing_scheme;

        return $this;
    }

    /**
     * Gets tiers_mode
     *
     * @return string|null
     */
    public function getTiersMode()
    {
        return $this->container['tiers_mode'];
    }

    /**
     * Sets tiers_mode
     *
     * @param string|null $tiers_mode Tiered pricing mode. Required when `billing_scheme` is `tiered`, must be omitted otherwise.
     *
     * @return self
     */
    public function setTiersMode($tiers_mode)
    {
        if (is_null($tiers_mode)) {
            throw new \InvalidArgumentException('non-nullable tiers_mode cannot be null');
        }
        $allowedValues = $this->getTiersModeAllowableValues();
        if (!in_array($tiers_mode, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'tiers_mode', must be one of '%s'",
                    $tiers_mode,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['tiers_mode'] = $tiers_mode;

        return $this;
    }

    /**
     * Gets tiers
     *
     * @return \RevKeen\Model\PriceTier[]|null
     */
    public function getTiers()
    {
        return $this->container['tiers'];
    }

    /**
     * Sets tiers
     *
     * @param \RevKeen\Model\PriceTier[]|null $tiers Price tiers (ordered by `up_to`, min 2, max 50). Required when `billing_scheme` is `tiered`. Final tier MUST have `up_to: null`.
     *
     * @return self
     */
    public function setTiers($tiers)
    {
        if (is_null($tiers)) {
            throw new \InvalidArgumentException('non-nullable tiers cannot be null');
        }

        if ((count($tiers) > 50)) {
            throw new \InvalidArgumentException('invalid value for $tiers when calling CreatePriceRequest., number of items must be less than or equal to 50.');
        }
        if ((count($tiers) < 2)) {
            throw new \InvalidArgumentException('invalid length for $tiers when calling CreatePriceRequest., number of items must be greater than or equal to 2.');
        }
        $this->container['tiers'] = $tiers;

        return $this;
    }

    /**
     * Gets transform_quantity
     *
     * @return \RevKeen\Model\TransformQuantity|null
     */
    public function getTransformQuantity()
    {
        return $this->container['transform_quantity'];
    }

    /**
     * Sets transform_quantity
     *
     * @param \RevKeen\Model\TransformQuantity|null $transform_quantity transform_quantity
     *
     * @return self
     */
    public function setTransformQuantity($transform_quantity)
    {
        if (is_null($transform_quantity)) {
            throw new \InvalidArgumentException('non-nullable transform_quantity cannot be null');
        }
        $this->container['transform_quantity'] = $transform_quantity;

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


