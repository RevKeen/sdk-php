<?php
/**
 * CreateMeterPriceRequest
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-01-15` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Sandbox** | `https://sandbox-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Sandbox** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
 *
 * The version of the OpenAPI document: 2026-01-15
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
 * CreateMeterPriceRequest Class Doc Comment
 *
 * @category Class
 * @description Parameters for creating a price attached to a usage meter, defining per-unit cost and billing thresholds.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateMeterPriceRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateMeterPriceRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'pricing_model' => 'string',
        'currency' => 'string',
        'unit_amount_minor' => 'int',
        'flat_fee_minor' => 'int',
        'package_size' => 'int',
        'cost_per_unit_minor' => 'int',
        'tiers' => '\RevKeen\Model\CreateMeterPriceRequestTiersInner[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'pricing_model' => null,
        'currency' => null,
        'unit_amount_minor' => null,
        'flat_fee_minor' => null,
        'package_size' => null,
        'cost_per_unit_minor' => null,
        'tiers' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'pricing_model' => false,
        'currency' => false,
        'unit_amount_minor' => false,
        'flat_fee_minor' => false,
        'package_size' => false,
        'cost_per_unit_minor' => false,
        'tiers' => false
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
        'pricing_model' => 'pricing_model',
        'currency' => 'currency',
        'unit_amount_minor' => 'unit_amount_minor',
        'flat_fee_minor' => 'flat_fee_minor',
        'package_size' => 'package_size',
        'cost_per_unit_minor' => 'cost_per_unit_minor',
        'tiers' => 'tiers'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'pricing_model' => 'setPricingModel',
        'currency' => 'setCurrency',
        'unit_amount_minor' => 'setUnitAmountMinor',
        'flat_fee_minor' => 'setFlatFeeMinor',
        'package_size' => 'setPackageSize',
        'cost_per_unit_minor' => 'setCostPerUnitMinor',
        'tiers' => 'setTiers'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'pricing_model' => 'getPricingModel',
        'currency' => 'getCurrency',
        'unit_amount_minor' => 'getUnitAmountMinor',
        'flat_fee_minor' => 'getFlatFeeMinor',
        'package_size' => 'getPackageSize',
        'cost_per_unit_minor' => 'getCostPerUnitMinor',
        'tiers' => 'getTiers'
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

    public const PRICING_MODEL_PER_UNIT = 'per_unit';
    public const PRICING_MODEL_GRADUATED = 'graduated';
    public const PRICING_MODEL_VOLUME = 'volume';
    public const PRICING_MODEL_PACKAGE = 'package';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPricingModelAllowableValues()
    {
        return [
            self::PRICING_MODEL_PER_UNIT,
            self::PRICING_MODEL_GRADUATED,
            self::PRICING_MODEL_VOLUME,
            self::PRICING_MODEL_PACKAGE,
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
        $this->setIfExists('pricing_model', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('unit_amount_minor', $data ?? [], null);
        $this->setIfExists('flat_fee_minor', $data ?? [], null);
        $this->setIfExists('package_size', $data ?? [], null);
        $this->setIfExists('cost_per_unit_minor', $data ?? [], null);
        $this->setIfExists('tiers', $data ?? [], null);
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

        if ($this->container['pricing_model'] === null) {
            $invalidProperties[] = "'pricing_model' can't be null";
        }
        $allowedValues = $this->getPricingModelAllowableValues();
        if (!is_null($this->container['pricing_model']) && !in_array($this->container['pricing_model'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'pricing_model', must be one of '%s'",
                $this->container['pricing_model'],
                implode("', '", $allowedValues)
            );
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

        if (!is_null($this->container['unit_amount_minor']) && ($this->container['unit_amount_minor'] < 0)) {
            $invalidProperties[] = "invalid value for 'unit_amount_minor', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['flat_fee_minor']) && ($this->container['flat_fee_minor'] < 0)) {
            $invalidProperties[] = "invalid value for 'flat_fee_minor', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['package_size']) && ($this->container['package_size'] < 1)) {
            $invalidProperties[] = "invalid value for 'package_size', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['cost_per_unit_minor']) && ($this->container['cost_per_unit_minor'] < 0)) {
            $invalidProperties[] = "invalid value for 'cost_per_unit_minor', must be bigger than or equal to 0.";
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
     * Gets pricing_model
     *
     * @return string
     */
    public function getPricingModel()
    {
        return $this->container['pricing_model'];
    }

    /**
     * Sets pricing_model
     *
     * @param string $pricing_model Pricing model
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
        if ((mb_strlen($currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling CreateMeterPriceRequest., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling CreateMeterPriceRequest., must be bigger than or equal to 3.');
        }

        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets unit_amount_minor
     *
     * @return int|null
     */
    public function getUnitAmountMinor()
    {
        return $this->container['unit_amount_minor'];
    }

    /**
     * Sets unit_amount_minor
     *
     * @param int|null $unit_amount_minor Price per unit in minor units (for per_unit)
     *
     * @return self
     */
    public function setUnitAmountMinor($unit_amount_minor)
    {
        if (is_null($unit_amount_minor)) {
            throw new \InvalidArgumentException('non-nullable unit_amount_minor cannot be null');
        }

        if (($unit_amount_minor < 0)) {
            throw new \InvalidArgumentException('invalid value for $unit_amount_minor when calling CreateMeterPriceRequest., must be bigger than or equal to 0.');
        }

        $this->container['unit_amount_minor'] = $unit_amount_minor;

        return $this;
    }

    /**
     * Gets flat_fee_minor
     *
     * @return int|null
     */
    public function getFlatFeeMinor()
    {
        return $this->container['flat_fee_minor'];
    }

    /**
     * Sets flat_fee_minor
     *
     * @param int|null $flat_fee_minor Base charge per period in minor units
     *
     * @return self
     */
    public function setFlatFeeMinor($flat_fee_minor)
    {
        if (is_null($flat_fee_minor)) {
            throw new \InvalidArgumentException('non-nullable flat_fee_minor cannot be null');
        }

        if (($flat_fee_minor < 0)) {
            throw new \InvalidArgumentException('invalid value for $flat_fee_minor when calling CreateMeterPriceRequest., must be bigger than or equal to 0.');
        }

        $this->container['flat_fee_minor'] = $flat_fee_minor;

        return $this;
    }

    /**
     * Gets package_size
     *
     * @return int|null
     */
    public function getPackageSize()
    {
        return $this->container['package_size'];
    }

    /**
     * Sets package_size
     *
     * @param int|null $package_size Units per package (for package model)
     *
     * @return self
     */
    public function setPackageSize($package_size)
    {
        if (is_null($package_size)) {
            throw new \InvalidArgumentException('non-nullable package_size cannot be null');
        }

        if (($package_size < 1)) {
            throw new \InvalidArgumentException('invalid value for $package_size when calling CreateMeterPriceRequest., must be bigger than or equal to 1.');
        }

        $this->container['package_size'] = $package_size;

        return $this;
    }

    /**
     * Gets cost_per_unit_minor
     *
     * @return int|null
     */
    public function getCostPerUnitMinor()
    {
        return $this->container['cost_per_unit_minor'];
    }

    /**
     * Sets cost_per_unit_minor
     *
     * @param int|null $cost_per_unit_minor Merchant's cost per unit for margin intelligence
     *
     * @return self
     */
    public function setCostPerUnitMinor($cost_per_unit_minor)
    {
        if (is_null($cost_per_unit_minor)) {
            throw new \InvalidArgumentException('non-nullable cost_per_unit_minor cannot be null');
        }

        if (($cost_per_unit_minor < 0)) {
            throw new \InvalidArgumentException('invalid value for $cost_per_unit_minor when calling CreateMeterPriceRequest., must be bigger than or equal to 0.');
        }

        $this->container['cost_per_unit_minor'] = $cost_per_unit_minor;

        return $this;
    }

    /**
     * Gets tiers
     *
     * @return \RevKeen\Model\CreateMeterPriceRequestTiersInner[]|null
     */
    public function getTiers()
    {
        return $this->container['tiers'];
    }

    /**
     * Sets tiers
     *
     * @param \RevKeen\Model\CreateMeterPriceRequestTiersInner[]|null $tiers Tier configuration (for graduated and volume)
     *
     * @return self
     */
    public function setTiers($tiers)
    {
        if (is_null($tiers)) {
            throw new \InvalidArgumentException('non-nullable tiers cannot be null');
        }
        $this->container['tiers'] = $tiers;

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


