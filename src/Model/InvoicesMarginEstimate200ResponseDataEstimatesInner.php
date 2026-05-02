<?php
/**
 * InvoicesMarginEstimate200ResponseDataEstimatesInner
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
 * InvoicesMarginEstimate200ResponseDataEstimatesInner Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class InvoicesMarginEstimate200ResponseDataEstimatesInner implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'invoices_margin_estimate_200_response_data_estimates_inner';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'rail' => 'string',
        'card_scheme' => 'string',
        'gross_minor' => 'int',
        'estimated_fee_minor' => 'int',
        'net_after_fees_minor' => 'int',
        'fee_breakdown' => '\RevKeen\Model\InvoicesMarginEstimate200ResponseDataEstimatesInnerFeeBreakdown',
        'pricing_source' => 'string',
        'matrix_version' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'rail' => null,
        'card_scheme' => null,
        'gross_minor' => null,
        'estimated_fee_minor' => null,
        'net_after_fees_minor' => null,
        'fee_breakdown' => null,
        'pricing_source' => null,
        'matrix_version' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'rail' => false,
        'card_scheme' => true,
        'gross_minor' => false,
        'estimated_fee_minor' => false,
        'net_after_fees_minor' => false,
        'fee_breakdown' => false,
        'pricing_source' => false,
        'matrix_version' => false
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
        'rail' => 'rail',
        'card_scheme' => 'card_scheme',
        'gross_minor' => 'gross_minor',
        'estimated_fee_minor' => 'estimated_fee_minor',
        'net_after_fees_minor' => 'net_after_fees_minor',
        'fee_breakdown' => 'fee_breakdown',
        'pricing_source' => 'pricing_source',
        'matrix_version' => 'matrix_version'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'rail' => 'setRail',
        'card_scheme' => 'setCardScheme',
        'gross_minor' => 'setGrossMinor',
        'estimated_fee_minor' => 'setEstimatedFeeMinor',
        'net_after_fees_minor' => 'setNetAfterFeesMinor',
        'fee_breakdown' => 'setFeeBreakdown',
        'pricing_source' => 'setPricingSource',
        'matrix_version' => 'setMatrixVersion'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'rail' => 'getRail',
        'card_scheme' => 'getCardScheme',
        'gross_minor' => 'getGrossMinor',
        'estimated_fee_minor' => 'getEstimatedFeeMinor',
        'net_after_fees_minor' => 'getNetAfterFeesMinor',
        'fee_breakdown' => 'getFeeBreakdown',
        'pricing_source' => 'getPricingSource',
        'matrix_version' => 'getMatrixVersion'
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

    public const RAIL_CARD = 'card';
    public const RAIL_DIRECT_DEBIT = 'direct_debit';
    public const RAIL_PAY_BY_BANK = 'pay_by_bank';
    public const RAIL_IN_STORE = 'in_store';
    public const PRICING_SOURCE_MATRIX = 'matrix';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRailAllowableValues()
    {
        return [
            self::RAIL_CARD,
            self::RAIL_DIRECT_DEBIT,
            self::RAIL_PAY_BY_BANK,
            self::RAIL_IN_STORE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPricingSourceAllowableValues()
    {
        return [
            self::PRICING_SOURCE_MATRIX,
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
        $this->setIfExists('rail', $data ?? [], null);
        $this->setIfExists('card_scheme', $data ?? [], null);
        $this->setIfExists('gross_minor', $data ?? [], null);
        $this->setIfExists('estimated_fee_minor', $data ?? [], null);
        $this->setIfExists('net_after_fees_minor', $data ?? [], null);
        $this->setIfExists('fee_breakdown', $data ?? [], null);
        $this->setIfExists('pricing_source', $data ?? [], null);
        $this->setIfExists('matrix_version', $data ?? [], null);
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

        if ($this->container['rail'] === null) {
            $invalidProperties[] = "'rail' can't be null";
        }
        $allowedValues = $this->getRailAllowableValues();
        if (!is_null($this->container['rail']) && !in_array($this->container['rail'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'rail', must be one of '%s'",
                $this->container['rail'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['card_scheme'] === null && !$this->isNullableSetToNull('card_scheme')) {
            $invalidProperties[] = "'card_scheme' can't be null";
        }
        if ($this->container['gross_minor'] === null) {
            $invalidProperties[] = "'gross_minor' can't be null";
        }
        if ($this->container['estimated_fee_minor'] === null) {
            $invalidProperties[] = "'estimated_fee_minor' can't be null";
        }
        if ($this->container['net_after_fees_minor'] === null) {
            $invalidProperties[] = "'net_after_fees_minor' can't be null";
        }
        if ($this->container['fee_breakdown'] === null) {
            $invalidProperties[] = "'fee_breakdown' can't be null";
        }
        if ($this->container['pricing_source'] === null) {
            $invalidProperties[] = "'pricing_source' can't be null";
        }
        $allowedValues = $this->getPricingSourceAllowableValues();
        if (!is_null($this->container['pricing_source']) && !in_array($this->container['pricing_source'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'pricing_source', must be one of '%s'",
                $this->container['pricing_source'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['matrix_version'] === null) {
            $invalidProperties[] = "'matrix_version' can't be null";
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
     * Gets rail
     *
     * @return string
     */
    public function getRail()
    {
        return $this->container['rail'];
    }

    /**
     * Sets rail
     *
     * @param string $rail rail
     *
     * @return self
     */
    public function setRail($rail)
    {
        if (is_null($rail)) {
            throw new \InvalidArgumentException('non-nullable rail cannot be null');
        }
        $allowedValues = $this->getRailAllowableValues();
        if (!in_array($rail, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'rail', must be one of '%s'",
                    $rail,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['rail'] = $rail;

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
     * @param string|null $card_scheme card_scheme
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
     * Gets gross_minor
     *
     * @return int
     */
    public function getGrossMinor()
    {
        return $this->container['gross_minor'];
    }

    /**
     * Sets gross_minor
     *
     * @param int $gross_minor gross_minor
     *
     * @return self
     */
    public function setGrossMinor($gross_minor)
    {
        if (is_null($gross_minor)) {
            throw new \InvalidArgumentException('non-nullable gross_minor cannot be null');
        }
        $this->container['gross_minor'] = $gross_minor;

        return $this;
    }

    /**
     * Gets estimated_fee_minor
     *
     * @return int
     */
    public function getEstimatedFeeMinor()
    {
        return $this->container['estimated_fee_minor'];
    }

    /**
     * Sets estimated_fee_minor
     *
     * @param int $estimated_fee_minor estimated_fee_minor
     *
     * @return self
     */
    public function setEstimatedFeeMinor($estimated_fee_minor)
    {
        if (is_null($estimated_fee_minor)) {
            throw new \InvalidArgumentException('non-nullable estimated_fee_minor cannot be null');
        }
        $this->container['estimated_fee_minor'] = $estimated_fee_minor;

        return $this;
    }

    /**
     * Gets net_after_fees_minor
     *
     * @return int
     */
    public function getNetAfterFeesMinor()
    {
        return $this->container['net_after_fees_minor'];
    }

    /**
     * Sets net_after_fees_minor
     *
     * @param int $net_after_fees_minor net_after_fees_minor
     *
     * @return self
     */
    public function setNetAfterFeesMinor($net_after_fees_minor)
    {
        if (is_null($net_after_fees_minor)) {
            throw new \InvalidArgumentException('non-nullable net_after_fees_minor cannot be null');
        }
        $this->container['net_after_fees_minor'] = $net_after_fees_minor;

        return $this;
    }

    /**
     * Gets fee_breakdown
     *
     * @return \RevKeen\Model\InvoicesMarginEstimate200ResponseDataEstimatesInnerFeeBreakdown
     */
    public function getFeeBreakdown()
    {
        return $this->container['fee_breakdown'];
    }

    /**
     * Sets fee_breakdown
     *
     * @param \RevKeen\Model\InvoicesMarginEstimate200ResponseDataEstimatesInnerFeeBreakdown $fee_breakdown fee_breakdown
     *
     * @return self
     */
    public function setFeeBreakdown($fee_breakdown)
    {
        if (is_null($fee_breakdown)) {
            throw new \InvalidArgumentException('non-nullable fee_breakdown cannot be null');
        }
        $this->container['fee_breakdown'] = $fee_breakdown;

        return $this;
    }

    /**
     * Gets pricing_source
     *
     * @return string
     */
    public function getPricingSource()
    {
        return $this->container['pricing_source'];
    }

    /**
     * Sets pricing_source
     *
     * @param string $pricing_source pricing_source
     *
     * @return self
     */
    public function setPricingSource($pricing_source)
    {
        if (is_null($pricing_source)) {
            throw new \InvalidArgumentException('non-nullable pricing_source cannot be null');
        }
        $allowedValues = $this->getPricingSourceAllowableValues();
        if (!in_array($pricing_source, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'pricing_source', must be one of '%s'",
                    $pricing_source,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['pricing_source'] = $pricing_source;

        return $this;
    }

    /**
     * Gets matrix_version
     *
     * @return string
     */
    public function getMatrixVersion()
    {
        return $this->container['matrix_version'];
    }

    /**
     * Sets matrix_version
     *
     * @param string $matrix_version matrix_version
     *
     * @return self
     */
    public function setMatrixVersion($matrix_version)
    {
        if (is_null($matrix_version)) {
            throw new \InvalidArgumentException('non-nullable matrix_version cannot be null');
        }
        $this->container['matrix_version'] = $matrix_version;

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


