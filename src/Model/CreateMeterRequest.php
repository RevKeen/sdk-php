<?php
/**
 * CreateMeterRequest
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
 * CreateMeterRequest Class Doc Comment
 *
 * @category Class
 * @description Parameters for creating a new usage meter with aggregation rules and event matching.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateMeterRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateMeterRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'event_name' => 'string',
        'aggregation' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'value_key' => 'string',
        'filter_conditions' => 'array<string,mixed>[]',
        'unique_count_key' => 'string',
        'unit_name' => 'string',
        'carry_forward' => 'bool',
        'metadata' => 'array<string,mixed>',
        'alert_thresholds' => 'float[]'
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
        'event_name' => null,
        'aggregation' => null,
        'slug' => null,
        'description' => null,
        'value_key' => null,
        'filter_conditions' => null,
        'unique_count_key' => null,
        'unit_name' => null,
        'carry_forward' => null,
        'metadata' => null,
        'alert_thresholds' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'name' => false,
        'event_name' => false,
        'aggregation' => false,
        'slug' => false,
        'description' => false,
        'value_key' => false,
        'filter_conditions' => false,
        'unique_count_key' => false,
        'unit_name' => false,
        'carry_forward' => false,
        'metadata' => false,
        'alert_thresholds' => false
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
        'event_name' => 'event_name',
        'aggregation' => 'aggregation',
        'slug' => 'slug',
        'description' => 'description',
        'value_key' => 'value_key',
        'filter_conditions' => 'filter_conditions',
        'unique_count_key' => 'unique_count_key',
        'unit_name' => 'unit_name',
        'carry_forward' => 'carry_forward',
        'metadata' => 'metadata',
        'alert_thresholds' => 'alert_thresholds'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'event_name' => 'setEventName',
        'aggregation' => 'setAggregation',
        'slug' => 'setSlug',
        'description' => 'setDescription',
        'value_key' => 'setValueKey',
        'filter_conditions' => 'setFilterConditions',
        'unique_count_key' => 'setUniqueCountKey',
        'unit_name' => 'setUnitName',
        'carry_forward' => 'setCarryForward',
        'metadata' => 'setMetadata',
        'alert_thresholds' => 'setAlertThresholds'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'event_name' => 'getEventName',
        'aggregation' => 'getAggregation',
        'slug' => 'getSlug',
        'description' => 'getDescription',
        'value_key' => 'getValueKey',
        'filter_conditions' => 'getFilterConditions',
        'unique_count_key' => 'getUniqueCountKey',
        'unit_name' => 'getUnitName',
        'carry_forward' => 'getCarryForward',
        'metadata' => 'getMetadata',
        'alert_thresholds' => 'getAlertThresholds'
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

    public const AGGREGATION_SUM = 'sum';
    public const AGGREGATION_COUNT = 'count';
    public const AGGREGATION_COUNT_UNIQUE = 'count_unique';
    public const AGGREGATION_MAX = 'max';
    public const AGGREGATION_LAST = 'last';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAggregationAllowableValues()
    {
        return [
            self::AGGREGATION_SUM,
            self::AGGREGATION_COUNT,
            self::AGGREGATION_COUNT_UNIQUE,
            self::AGGREGATION_MAX,
            self::AGGREGATION_LAST,
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
        $this->setIfExists('event_name', $data ?? [], null);
        $this->setIfExists('aggregation', $data ?? [], 'count');
        $this->setIfExists('slug', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('value_key', $data ?? [], null);
        $this->setIfExists('filter_conditions', $data ?? [], null);
        $this->setIfExists('unique_count_key', $data ?? [], null);
        $this->setIfExists('unit_name', $data ?? [], null);
        $this->setIfExists('carry_forward', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('alert_thresholds', $data ?? [], null);
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

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['event_name'] === null) {
            $invalidProperties[] = "'event_name' can't be null";
        }
        $allowedValues = $this->getAggregationAllowableValues();
        if (!is_null($this->container['aggregation']) && !in_array($this->container['aggregation'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'aggregation', must be one of '%s'",
                $this->container['aggregation'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['alert_thresholds']) && (count($this->container['alert_thresholds']) > 5)) {
            $invalidProperties[] = "invalid value for 'alert_thresholds', number of items must be less than or equal to 5.";
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
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Human-readable meter name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets event_name
     *
     * @return string
     */
    public function getEventName()
    {
        return $this->container['event_name'];
    }

    /**
     * Sets event_name
     *
     * @param string $event_name Event name to match against
     *
     * @return self
     */
    public function setEventName($event_name)
    {
        if (is_null($event_name)) {
            throw new \InvalidArgumentException('non-nullable event_name cannot be null');
        }
        $this->container['event_name'] = $event_name;

        return $this;
    }

    /**
     * Gets aggregation
     *
     * @return string|null
     */
    public function getAggregation()
    {
        return $this->container['aggregation'];
    }

    /**
     * Sets aggregation
     *
     * @param string|null $aggregation Aggregation method
     *
     * @return self
     */
    public function setAggregation($aggregation)
    {
        if (is_null($aggregation)) {
            throw new \InvalidArgumentException('non-nullable aggregation cannot be null');
        }
        $allowedValues = $this->getAggregationAllowableValues();
        if (!in_array($aggregation, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'aggregation', must be one of '%s'",
                    $aggregation,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['aggregation'] = $aggregation;

        return $this;
    }

    /**
     * Gets slug
     *
     * @return string|null
     */
    public function getSlug()
    {
        return $this->container['slug'];
    }

    /**
     * Sets slug
     *
     * @param string|null $slug URL-safe identifier
     *
     * @return self
     */
    public function setSlug($slug)
    {
        if (is_null($slug)) {
            throw new \InvalidArgumentException('non-nullable slug cannot be null');
        }
        $this->container['slug'] = $slug;

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
     * @param string|null $description Meter description
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets value_key
     *
     * @return string|null
     */
    public function getValueKey()
    {
        return $this->container['value_key'];
    }

    /**
     * Sets value_key
     *
     * @param string|null $value_key Property key for sum/max/last aggregations
     *
     * @return self
     */
    public function setValueKey($value_key)
    {
        if (is_null($value_key)) {
            throw new \InvalidArgumentException('non-nullable value_key cannot be null');
        }
        $this->container['value_key'] = $value_key;

        return $this;
    }

    /**
     * Gets filter_conditions
     *
     * @return array<string,mixed>[]|null
     */
    public function getFilterConditions()
    {
        return $this->container['filter_conditions'];
    }

    /**
     * Sets filter_conditions
     *
     * @param array<string,mixed>[]|null $filter_conditions Filter conditions for matching events
     *
     * @return self
     */
    public function setFilterConditions($filter_conditions)
    {
        if (is_null($filter_conditions)) {
            throw new \InvalidArgumentException('non-nullable filter_conditions cannot be null');
        }
        $this->container['filter_conditions'] = $filter_conditions;

        return $this;
    }

    /**
     * Gets unique_count_key
     *
     * @return string|null
     */
    public function getUniqueCountKey()
    {
        return $this->container['unique_count_key'];
    }

    /**
     * Sets unique_count_key
     *
     * @param string|null $unique_count_key Property key for count_unique aggregation
     *
     * @return self
     */
    public function setUniqueCountKey($unique_count_key)
    {
        if (is_null($unique_count_key)) {
            throw new \InvalidArgumentException('non-nullable unique_count_key cannot be null');
        }
        $this->container['unique_count_key'] = $unique_count_key;

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
     * @param string|null $unit_name Display unit name
     *
     * @return self
     */
    public function setUnitName($unit_name)
    {
        if (is_null($unit_name)) {
            throw new \InvalidArgumentException('non-nullable unit_name cannot be null');
        }
        $this->container['unit_name'] = $unit_name;

        return $this;
    }

    /**
     * Gets carry_forward
     *
     * @return bool|null
     */
    public function getCarryForward()
    {
        return $this->container['carry_forward'];
    }

    /**
     * Sets carry_forward
     *
     * @param bool|null $carry_forward Carry forward last value across periods
     *
     * @return self
     */
    public function setCarryForward($carry_forward)
    {
        if (is_null($carry_forward)) {
            throw new \InvalidArgumentException('non-nullable carry_forward cannot be null');
        }
        $this->container['carry_forward'] = $carry_forward;

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
     * @param array<string,mixed>|null $metadata Arbitrary key-value metadata
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
     * Gets alert_thresholds
     *
     * @return float[]|null
     */
    public function getAlertThresholds()
    {
        return $this->container['alert_thresholds'];
    }

    /**
     * Sets alert_thresholds
     *
     * @param float[]|null $alert_thresholds Threshold percentages that trigger usage.threshold.reached webhooks.
     *
     * @return self
     */
    public function setAlertThresholds($alert_thresholds)
    {
        if (is_null($alert_thresholds)) {
            throw new \InvalidArgumentException('non-nullable alert_thresholds cannot be null');
        }

        if ((count($alert_thresholds) > 5)) {
            throw new \InvalidArgumentException('invalid value for $alert_thresholds when calling CreateMeterRequest., number of items must be less than or equal to 5.');
        }
        $this->container['alert_thresholds'] = $alert_thresholds;

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


