<?php
/**
 * UsageBalanceMeter
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
 * UsageBalanceMeter Class Doc Comment
 *
 * @category Class
 * @description Current-period usage for a single meter, including consumed units, included allowance, overage, and estimated cost.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UsageBalanceMeter implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UsageBalanceMeter';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'meter_id' => 'string',
        'meter_name' => 'string',
        'unit_name' => 'string',
        'current_value' => 'float',
        'included_quantity' => 'float',
        'used_quantity' => 'float',
        'remaining_included' => 'float',
        'overage_quantity' => 'float',
        'estimated_amount_minor' => 'float',
        'total_cost_minor' => 'float',
        'margin_minor' => 'float',
        'currency' => 'string',
        'period_start' => 'string',
        'period_end' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'meter_id' => null,
        'meter_name' => null,
        'unit_name' => null,
        'current_value' => null,
        'included_quantity' => null,
        'used_quantity' => null,
        'remaining_included' => null,
        'overage_quantity' => null,
        'estimated_amount_minor' => null,
        'total_cost_minor' => null,
        'margin_minor' => null,
        'currency' => null,
        'period_start' => null,
        'period_end' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'meter_id' => false,
        'meter_name' => false,
        'unit_name' => true,
        'current_value' => false,
        'included_quantity' => false,
        'used_quantity' => false,
        'remaining_included' => false,
        'overage_quantity' => false,
        'estimated_amount_minor' => false,
        'total_cost_minor' => true,
        'margin_minor' => true,
        'currency' => false,
        'period_start' => false,
        'period_end' => false
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
        'meter_id' => 'meter_id',
        'meter_name' => 'meter_name',
        'unit_name' => 'unit_name',
        'current_value' => 'current_value',
        'included_quantity' => 'included_quantity',
        'used_quantity' => 'used_quantity',
        'remaining_included' => 'remaining_included',
        'overage_quantity' => 'overage_quantity',
        'estimated_amount_minor' => 'estimated_amount_minor',
        'total_cost_minor' => 'total_cost_minor',
        'margin_minor' => 'margin_minor',
        'currency' => 'currency',
        'period_start' => 'period_start',
        'period_end' => 'period_end'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'meter_id' => 'setMeterId',
        'meter_name' => 'setMeterName',
        'unit_name' => 'setUnitName',
        'current_value' => 'setCurrentValue',
        'included_quantity' => 'setIncludedQuantity',
        'used_quantity' => 'setUsedQuantity',
        'remaining_included' => 'setRemainingIncluded',
        'overage_quantity' => 'setOverageQuantity',
        'estimated_amount_minor' => 'setEstimatedAmountMinor',
        'total_cost_minor' => 'setTotalCostMinor',
        'margin_minor' => 'setMarginMinor',
        'currency' => 'setCurrency',
        'period_start' => 'setPeriodStart',
        'period_end' => 'setPeriodEnd'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'meter_id' => 'getMeterId',
        'meter_name' => 'getMeterName',
        'unit_name' => 'getUnitName',
        'current_value' => 'getCurrentValue',
        'included_quantity' => 'getIncludedQuantity',
        'used_quantity' => 'getUsedQuantity',
        'remaining_included' => 'getRemainingIncluded',
        'overage_quantity' => 'getOverageQuantity',
        'estimated_amount_minor' => 'getEstimatedAmountMinor',
        'total_cost_minor' => 'getTotalCostMinor',
        'margin_minor' => 'getMarginMinor',
        'currency' => 'getCurrency',
        'period_start' => 'getPeriodStart',
        'period_end' => 'getPeriodEnd'
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
        $this->setIfExists('meter_id', $data ?? [], null);
        $this->setIfExists('meter_name', $data ?? [], null);
        $this->setIfExists('unit_name', $data ?? [], null);
        $this->setIfExists('current_value', $data ?? [], null);
        $this->setIfExists('included_quantity', $data ?? [], null);
        $this->setIfExists('used_quantity', $data ?? [], null);
        $this->setIfExists('remaining_included', $data ?? [], null);
        $this->setIfExists('overage_quantity', $data ?? [], null);
        $this->setIfExists('estimated_amount_minor', $data ?? [], null);
        $this->setIfExists('total_cost_minor', $data ?? [], null);
        $this->setIfExists('margin_minor', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('period_start', $data ?? [], null);
        $this->setIfExists('period_end', $data ?? [], null);
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

        if ($this->container['meter_id'] === null) {
            $invalidProperties[] = "'meter_id' can't be null";
        }
        if ($this->container['meter_name'] === null) {
            $invalidProperties[] = "'meter_name' can't be null";
        }
        if ($this->container['unit_name'] === null && !$this->isNullableSetToNull('unit_name')) {
            $invalidProperties[] = "'unit_name' can't be null";
        }
        if ($this->container['current_value'] === null) {
            $invalidProperties[] = "'current_value' can't be null";
        }
        if ($this->container['included_quantity'] === null) {
            $invalidProperties[] = "'included_quantity' can't be null";
        }
        if ($this->container['used_quantity'] === null) {
            $invalidProperties[] = "'used_quantity' can't be null";
        }
        if ($this->container['remaining_included'] === null) {
            $invalidProperties[] = "'remaining_included' can't be null";
        }
        if ($this->container['overage_quantity'] === null) {
            $invalidProperties[] = "'overage_quantity' can't be null";
        }
        if ($this->container['estimated_amount_minor'] === null) {
            $invalidProperties[] = "'estimated_amount_minor' can't be null";
        }
        if ($this->container['total_cost_minor'] === null && !$this->isNullableSetToNull('total_cost_minor')) {
            $invalidProperties[] = "'total_cost_minor' can't be null";
        }
        if ($this->container['margin_minor'] === null && !$this->isNullableSetToNull('margin_minor')) {
            $invalidProperties[] = "'margin_minor' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['period_start'] === null) {
            $invalidProperties[] = "'period_start' can't be null";
        }
        if ($this->container['period_end'] === null) {
            $invalidProperties[] = "'period_end' can't be null";
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
     * Gets meter_id
     *
     * @return string
     */
    public function getMeterId()
    {
        return $this->container['meter_id'];
    }

    /**
     * Sets meter_id
     *
     * @param string $meter_id Meter ID
     *
     * @return self
     */
    public function setMeterId($meter_id)
    {
        if (is_null($meter_id)) {
            throw new \InvalidArgumentException('non-nullable meter_id cannot be null');
        }
        $this->container['meter_id'] = $meter_id;

        return $this;
    }

    /**
     * Gets meter_name
     *
     * @return string
     */
    public function getMeterName()
    {
        return $this->container['meter_name'];
    }

    /**
     * Sets meter_name
     *
     * @param string $meter_name Meter display name
     *
     * @return self
     */
    public function setMeterName($meter_name)
    {
        if (is_null($meter_name)) {
            throw new \InvalidArgumentException('non-nullable meter_name cannot be null');
        }
        $this->container['meter_name'] = $meter_name;

        return $this;
    }

    /**
     * Gets unit_name
     *
     * @return string|null
     */
    public function getUnitName()
    {
        return $this->container['unit_name'];
    }

    /**
     * Sets unit_name
     *
     * @param string|null $unit_name Unit display name
     *
     * @return self
     */
    public function setUnitName($unit_name)
    {
        if (is_null($unit_name)) {
            array_push($this->openAPINullablesSetToNull, 'unit_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('unit_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['unit_name'] = $unit_name;

        return $this;
    }

    /**
     * Gets current_value
     *
     * @return float
     */
    public function getCurrentValue()
    {
        return $this->container['current_value'];
    }

    /**
     * Sets current_value
     *
     * @param float $current_value Aggregated usage in current period
     *
     * @return self
     */
    public function setCurrentValue($current_value)
    {
        if (is_null($current_value)) {
            throw new \InvalidArgumentException('non-nullable current_value cannot be null');
        }
        $this->container['current_value'] = $current_value;

        return $this;
    }

    /**
     * Gets included_quantity
     *
     * @return float
     */
    public function getIncludedQuantity()
    {
        return $this->container['included_quantity'];
    }

    /**
     * Sets included_quantity
     *
     * @param float $included_quantity Units included in plan (0 if pure metered)
     *
     * @return self
     */
    public function setIncludedQuantity($included_quantity)
    {
        if (is_null($included_quantity)) {
            throw new \InvalidArgumentException('non-nullable included_quantity cannot be null');
        }
        $this->container['included_quantity'] = $included_quantity;

        return $this;
    }

    /**
     * Gets used_quantity
     *
     * @return float
     */
    public function getUsedQuantity()
    {
        return $this->container['used_quantity'];
    }

    /**
     * Sets used_quantity
     *
     * @param float $used_quantity Usage consumed (same as current_value)
     *
     * @return self
     */
    public function setUsedQuantity($used_quantity)
    {
        if (is_null($used_quantity)) {
            throw new \InvalidArgumentException('non-nullable used_quantity cannot be null');
        }
        $this->container['used_quantity'] = $used_quantity;

        return $this;
    }

    /**
     * Gets remaining_included
     *
     * @return float
     */
    public function getRemainingIncluded()
    {
        return $this->container['remaining_included'];
    }

    /**
     * Sets remaining_included
     *
     * @param float $remaining_included Remaining included units (max 0)
     *
     * @return self
     */
    public function setRemainingIncluded($remaining_included)
    {
        if (is_null($remaining_included)) {
            throw new \InvalidArgumentException('non-nullable remaining_included cannot be null');
        }
        $this->container['remaining_included'] = $remaining_included;

        return $this;
    }

    /**
     * Gets overage_quantity
     *
     * @return float
     */
    public function getOverageQuantity()
    {
        return $this->container['overage_quantity'];
    }

    /**
     * Sets overage_quantity
     *
     * @param float $overage_quantity Units over allowance (max 0)
     *
     * @return self
     */
    public function setOverageQuantity($overage_quantity)
    {
        if (is_null($overage_quantity)) {
            throw new \InvalidArgumentException('non-nullable overage_quantity cannot be null');
        }
        $this->container['overage_quantity'] = $overage_quantity;

        return $this;
    }

    /**
     * Gets estimated_amount_minor
     *
     * @return float
     */
    public function getEstimatedAmountMinor()
    {
        return $this->container['estimated_amount_minor'];
    }

    /**
     * Sets estimated_amount_minor
     *
     * @param float $estimated_amount_minor Estimated charge for overage in minor units
     *
     * @return self
     */
    public function setEstimatedAmountMinor($estimated_amount_minor)
    {
        if (is_null($estimated_amount_minor)) {
            throw new \InvalidArgumentException('non-nullable estimated_amount_minor cannot be null');
        }
        $this->container['estimated_amount_minor'] = $estimated_amount_minor;

        return $this;
    }

    /**
     * Gets total_cost_minor
     *
     * @return float|null
     */
    public function getTotalCostMinor()
    {
        return $this->container['total_cost_minor'];
    }

    /**
     * Sets total_cost_minor
     *
     * @param float|null $total_cost_minor Sum of event cost annotations (null if no cost data)
     *
     * @return self
     */
    public function setTotalCostMinor($total_cost_minor)
    {
        if (is_null($total_cost_minor)) {
            array_push($this->openAPINullablesSetToNull, 'total_cost_minor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('total_cost_minor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['total_cost_minor'] = $total_cost_minor;

        return $this;
    }

    /**
     * Gets margin_minor
     *
     * @return float|null
     */
    public function getMarginMinor()
    {
        return $this->container['margin_minor'];
    }

    /**
     * Sets margin_minor
     *
     * @param float|null $margin_minor Estimated margin: revenue - cost (null if no cost data)
     *
     * @return self
     */
    public function setMarginMinor($margin_minor)
    {
        if (is_null($margin_minor)) {
            array_push($this->openAPINullablesSetToNull, 'margin_minor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('margin_minor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['margin_minor'] = $margin_minor;

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
     * @param string $currency Currency code
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
     * Gets period_start
     *
     * @return string
     */
    public function getPeriodStart()
    {
        return $this->container['period_start'];
    }

    /**
     * Sets period_start
     *
     * @param string $period_start Current billing period start (ISO 8601)
     *
     * @return self
     */
    public function setPeriodStart($period_start)
    {
        if (is_null($period_start)) {
            throw new \InvalidArgumentException('non-nullable period_start cannot be null');
        }
        $this->container['period_start'] = $period_start;

        return $this;
    }

    /**
     * Gets period_end
     *
     * @return string
     */
    public function getPeriodEnd()
    {
        return $this->container['period_end'];
    }

    /**
     * Sets period_end
     *
     * @param string $period_end Current billing period end (ISO 8601)
     *
     * @return self
     */
    public function setPeriodEnd($period_end)
    {
        if (is_null($period_end)) {
            throw new \InvalidArgumentException('non-nullable period_end cannot be null');
        }
        $this->container['period_end'] = $period_end;

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


