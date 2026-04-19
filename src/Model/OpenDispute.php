<?php
/**
 * OpenDispute
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
 * OpenDispute Class Doc Comment
 *
 * @category Class
 * @description An open dispute requiring action, with urgency indicators for evidence submission deadlines.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class OpenDispute implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'OpenDispute';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'public_id' => 'string',
        'payment_id' => 'string',
        'parent_transaction_id' => 'string',
        'gateway' => 'string',
        'amount_minor' => 'float',
        'currency' => 'string',
        'reason' => 'string',
        'customer_name' => 'string',
        'card_brand' => 'string',
        'card_last4' => 'string',
        'evidence_due_by' => 'string',
        'days_until_due' => 'float',
        'is_overdue' => 'bool',
        'disputed_at' => 'string'
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
        'public_id' => null,
        'payment_id' => 'uuid',
        'parent_transaction_id' => 'uuid',
        'gateway' => null,
        'amount_minor' => null,
        'currency' => null,
        'reason' => null,
        'customer_name' => null,
        'card_brand' => null,
        'card_last4' => null,
        'evidence_due_by' => null,
        'days_until_due' => null,
        'is_overdue' => null,
        'disputed_at' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'public_id' => false,
        'payment_id' => true,
        'parent_transaction_id' => true,
        'gateway' => false,
        'amount_minor' => false,
        'currency' => false,
        'reason' => true,
        'customer_name' => true,
        'card_brand' => true,
        'card_last4' => true,
        'evidence_due_by' => true,
        'days_until_due' => true,
        'is_overdue' => false,
        'disputed_at' => false
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
        'public_id' => 'public_id',
        'payment_id' => 'payment_id',
        'parent_transaction_id' => 'parent_transaction_id',
        'gateway' => 'gateway',
        'amount_minor' => 'amount_minor',
        'currency' => 'currency',
        'reason' => 'reason',
        'customer_name' => 'customer_name',
        'card_brand' => 'card_brand',
        'card_last4' => 'card_last4',
        'evidence_due_by' => 'evidence_due_by',
        'days_until_due' => 'days_until_due',
        'is_overdue' => 'is_overdue',
        'disputed_at' => 'disputed_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'public_id' => 'setPublicId',
        'payment_id' => 'setPaymentId',
        'parent_transaction_id' => 'setParentTransactionId',
        'gateway' => 'setGateway',
        'amount_minor' => 'setAmountMinor',
        'currency' => 'setCurrency',
        'reason' => 'setReason',
        'customer_name' => 'setCustomerName',
        'card_brand' => 'setCardBrand',
        'card_last4' => 'setCardLast4',
        'evidence_due_by' => 'setEvidenceDueBy',
        'days_until_due' => 'setDaysUntilDue',
        'is_overdue' => 'setIsOverdue',
        'disputed_at' => 'setDisputedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'public_id' => 'getPublicId',
        'payment_id' => 'getPaymentId',
        'parent_transaction_id' => 'getParentTransactionId',
        'gateway' => 'getGateway',
        'amount_minor' => 'getAmountMinor',
        'currency' => 'getCurrency',
        'reason' => 'getReason',
        'customer_name' => 'getCustomerName',
        'card_brand' => 'getCardBrand',
        'card_last4' => 'getCardLast4',
        'evidence_due_by' => 'getEvidenceDueBy',
        'days_until_due' => 'getDaysUntilDue',
        'is_overdue' => 'getIsOverdue',
        'disputed_at' => 'getDisputedAt'
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
        $this->setIfExists('public_id', $data ?? [], null);
        $this->setIfExists('payment_id', $data ?? [], null);
        $this->setIfExists('parent_transaction_id', $data ?? [], null);
        $this->setIfExists('gateway', $data ?? [], null);
        $this->setIfExists('amount_minor', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('reason', $data ?? [], null);
        $this->setIfExists('customer_name', $data ?? [], null);
        $this->setIfExists('card_brand', $data ?? [], null);
        $this->setIfExists('card_last4', $data ?? [], null);
        $this->setIfExists('evidence_due_by', $data ?? [], null);
        $this->setIfExists('days_until_due', $data ?? [], null);
        $this->setIfExists('is_overdue', $data ?? [], null);
        $this->setIfExists('disputed_at', $data ?? [], null);
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
        if ($this->container['public_id'] === null) {
            $invalidProperties[] = "'public_id' can't be null";
        }
        if ($this->container['payment_id'] === null && !$this->isNullableSetToNull('payment_id')) {
            $invalidProperties[] = "'payment_id' can't be null";
        }
        if ($this->container['parent_transaction_id'] === null && !$this->isNullableSetToNull('parent_transaction_id')) {
            $invalidProperties[] = "'parent_transaction_id' can't be null";
        }
        if ($this->container['gateway'] === null) {
            $invalidProperties[] = "'gateway' can't be null";
        }
        if ($this->container['amount_minor'] === null) {
            $invalidProperties[] = "'amount_minor' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['reason'] === null && !$this->isNullableSetToNull('reason')) {
            $invalidProperties[] = "'reason' can't be null";
        }
        if ($this->container['customer_name'] === null && !$this->isNullableSetToNull('customer_name')) {
            $invalidProperties[] = "'customer_name' can't be null";
        }
        if ($this->container['card_brand'] === null && !$this->isNullableSetToNull('card_brand')) {
            $invalidProperties[] = "'card_brand' can't be null";
        }
        if ($this->container['card_last4'] === null && !$this->isNullableSetToNull('card_last4')) {
            $invalidProperties[] = "'card_last4' can't be null";
        }
        if ($this->container['evidence_due_by'] === null && !$this->isNullableSetToNull('evidence_due_by')) {
            $invalidProperties[] = "'evidence_due_by' can't be null";
        }
        if ($this->container['days_until_due'] === null && !$this->isNullableSetToNull('days_until_due')) {
            $invalidProperties[] = "'days_until_due' can't be null";
        }
        if ($this->container['is_overdue'] === null) {
            $invalidProperties[] = "'is_overdue' can't be null";
        }
        if ($this->container['disputed_at'] === null) {
            $invalidProperties[] = "'disputed_at' can't be null";
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
     * @param string $id Unique identifier for the dispute
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
     * @param string $public_id Public-facing dispute identifier
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
     * Gets payment_id
     *
     * @return string|null
     */
    public function getPaymentId()
    {
        return $this->container['payment_id'];
    }

    /**
     * Sets payment_id
     *
     * @param string|null $payment_id The original payment ID this dispute is for
     *
     * @return self
     */
    public function setPaymentId($payment_id)
    {
        if (is_null($payment_id)) {
            array_push($this->openAPINullablesSetToNull, 'payment_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('payment_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['payment_id'] = $payment_id;

        return $this;
    }

    /**
     * Gets parent_transaction_id
     *
     * @return string|null
     */
    public function getParentTransactionId()
    {
        return $this->container['parent_transaction_id'];
    }

    /**
     * Sets parent_transaction_id
     *
     * @param string|null $parent_transaction_id Parent transaction ID in unified transaction model
     *
     * @return self
     */
    public function setParentTransactionId($parent_transaction_id)
    {
        if (is_null($parent_transaction_id)) {
            array_push($this->openAPINullablesSetToNull, 'parent_transaction_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('parent_transaction_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['parent_transaction_id'] = $parent_transaction_id;

        return $this;
    }

    /**
     * Gets gateway
     *
     * @return string
     */
    public function getGateway()
    {
        return $this->container['gateway'];
    }

    /**
     * Sets gateway
     *
     * @param string $gateway Payment gateway that processed the original transaction
     *
     * @return self
     */
    public function setGateway($gateway)
    {
        if (is_null($gateway)) {
            throw new \InvalidArgumentException('non-nullable gateway cannot be null');
        }
        $this->container['gateway'] = $gateway;

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
     * @param float $amount_minor Disputed amount in cents
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
     * @param string $currency Three-letter ISO 4217 currency code
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
     * Gets reason
     *
     * @return string|null
     */
    public function getReason()
    {
        return $this->container['reason'];
    }

    /**
     * Sets reason
     *
     * @param string|null $reason Human-readable reason for the dispute
     *
     * @return self
     */
    public function setReason($reason)
    {
        if (is_null($reason)) {
            array_push($this->openAPINullablesSetToNull, 'reason');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('reason', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['reason'] = $reason;

        return $this;
    }

    /**
     * Gets customer_name
     *
     * @return string|null
     */
    public function getCustomerName()
    {
        return $this->container['customer_name'];
    }

    /**
     * Sets customer_name
     *
     * @param string|null $customer_name Name of the customer who filed the dispute
     *
     * @return self
     */
    public function setCustomerName($customer_name)
    {
        if (is_null($customer_name)) {
            array_push($this->openAPINullablesSetToNull, 'customer_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('customer_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['customer_name'] = $customer_name;

        return $this;
    }

    /**
     * Gets card_brand
     *
     * @return string|null
     */
    public function getCardBrand()
    {
        return $this->container['card_brand'];
    }

    /**
     * Sets card_brand
     *
     * @param string|null $card_brand Card brand used for the original payment
     *
     * @return self
     */
    public function setCardBrand($card_brand)
    {
        if (is_null($card_brand)) {
            array_push($this->openAPINullablesSetToNull, 'card_brand');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('card_brand', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['card_brand'] = $card_brand;

        return $this;
    }

    /**
     * Gets card_last4
     *
     * @return string|null
     */
    public function getCardLast4()
    {
        return $this->container['card_last4'];
    }

    /**
     * Sets card_last4
     *
     * @param string|null $card_last4 Last four digits of the card used for the original payment
     *
     * @return self
     */
    public function setCardLast4($card_last4)
    {
        if (is_null($card_last4)) {
            array_push($this->openAPINullablesSetToNull, 'card_last4');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('card_last4', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['card_last4'] = $card_last4;

        return $this;
    }

    /**
     * Gets evidence_due_by
     *
     * @return string|null
     */
    public function getEvidenceDueBy()
    {
        return $this->container['evidence_due_by'];
    }

    /**
     * Sets evidence_due_by
     *
     * @param string|null $evidence_due_by Deadline for submitting evidence to contest the dispute
     *
     * @return self
     */
    public function setEvidenceDueBy($evidence_due_by)
    {
        if (is_null($evidence_due_by)) {
            array_push($this->openAPINullablesSetToNull, 'evidence_due_by');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('evidence_due_by', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['evidence_due_by'] = $evidence_due_by;

        return $this;
    }

    /**
     * Gets days_until_due
     *
     * @return float|null
     */
    public function getDaysUntilDue()
    {
        return $this->container['days_until_due'];
    }

    /**
     * Sets days_until_due
     *
     * @param float|null $days_until_due Number of days remaining until the evidence deadline
     *
     * @return self
     */
    public function setDaysUntilDue($days_until_due)
    {
        if (is_null($days_until_due)) {
            array_push($this->openAPINullablesSetToNull, 'days_until_due');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('days_until_due', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['days_until_due'] = $days_until_due;

        return $this;
    }

    /**
     * Gets is_overdue
     *
     * @return bool
     */
    public function getIsOverdue()
    {
        return $this->container['is_overdue'];
    }

    /**
     * Sets is_overdue
     *
     * @param bool $is_overdue Whether the evidence submission deadline has passed
     *
     * @return self
     */
    public function setIsOverdue($is_overdue)
    {
        if (is_null($is_overdue)) {
            throw new \InvalidArgumentException('non-nullable is_overdue cannot be null');
        }
        $this->container['is_overdue'] = $is_overdue;

        return $this;
    }

    /**
     * Gets disputed_at
     *
     * @return string
     */
    public function getDisputedAt()
    {
        return $this->container['disputed_at'];
    }

    /**
     * Sets disputed_at
     *
     * @param string $disputed_at Timestamp when the dispute was filed
     *
     * @return self
     */
    public function setDisputedAt($disputed_at)
    {
        if (is_null($disputed_at)) {
            throw new \InvalidArgumentException('non-nullable disputed_at cannot be null');
        }
        $this->container['disputed_at'] = $disputed_at;

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


