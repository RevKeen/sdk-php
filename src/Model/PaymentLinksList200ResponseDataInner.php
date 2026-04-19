<?php
/**
 * PaymentLinksList200ResponseDataInner
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
 * PaymentLinksList200ResponseDataInner Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentLinksList200ResponseDataInner implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'payment_links_list_200_response_data_inner';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'merchant_id' => 'string',
        'public_id' => 'string',
        'name' => 'string',
        'slug' => 'string',
        'mode' => 'string',
        'status' => 'string',
        'amount_minor' => 'int',
        'currency' => 'string',
        'invoice_id' => 'string',
        'subscription_id' => 'string',
        'product_ids' => 'string[]',
        'line_items' => '\RevKeen\Model\PaymentLinksList200ResponseDataInnerLineItemsInner[]',
        'success_url' => 'string',
        'cancel_url' => 'string',
        'redirect_url' => 'string',
        'collect_shipping' => 'bool',
        'allow_promotion_codes' => 'bool',
        'tax_behavior' => 'string',
        'metadata' => 'array<string,mixed>',
        'expires_at' => '\DateTime',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime'
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
        'merchant_id' => 'uuid',
        'public_id' => null,
        'name' => null,
        'slug' => null,
        'mode' => null,
        'status' => null,
        'amount_minor' => null,
        'currency' => null,
        'invoice_id' => 'uuid',
        'subscription_id' => 'uuid',
        'product_ids' => 'uuid',
        'line_items' => null,
        'success_url' => 'uri',
        'cancel_url' => 'uri',
        'redirect_url' => 'uri',
        'collect_shipping' => null,
        'allow_promotion_codes' => null,
        'tax_behavior' => null,
        'metadata' => null,
        'expires_at' => 'date-time',
        'created_at' => 'date-time',
        'updated_at' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'merchant_id' => false,
        'public_id' => false,
        'name' => false,
        'slug' => true,
        'mode' => false,
        'status' => false,
        'amount_minor' => true,
        'currency' => false,
        'invoice_id' => true,
        'subscription_id' => true,
        'product_ids' => false,
        'line_items' => false,
        'success_url' => true,
        'cancel_url' => true,
        'redirect_url' => true,
        'collect_shipping' => false,
        'allow_promotion_codes' => false,
        'tax_behavior' => false,
        'metadata' => false,
        'expires_at' => true,
        'created_at' => false,
        'updated_at' => false
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
        'merchant_id' => 'merchant_id',
        'public_id' => 'public_id',
        'name' => 'name',
        'slug' => 'slug',
        'mode' => 'mode',
        'status' => 'status',
        'amount_minor' => 'amount_minor',
        'currency' => 'currency',
        'invoice_id' => 'invoice_id',
        'subscription_id' => 'subscription_id',
        'product_ids' => 'product_ids',
        'line_items' => 'line_items',
        'success_url' => 'success_url',
        'cancel_url' => 'cancel_url',
        'redirect_url' => 'redirect_url',
        'collect_shipping' => 'collect_shipping',
        'allow_promotion_codes' => 'allow_promotion_codes',
        'tax_behavior' => 'tax_behavior',
        'metadata' => 'metadata',
        'expires_at' => 'expires_at',
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
        'merchant_id' => 'setMerchantId',
        'public_id' => 'setPublicId',
        'name' => 'setName',
        'slug' => 'setSlug',
        'mode' => 'setMode',
        'status' => 'setStatus',
        'amount_minor' => 'setAmountMinor',
        'currency' => 'setCurrency',
        'invoice_id' => 'setInvoiceId',
        'subscription_id' => 'setSubscriptionId',
        'product_ids' => 'setProductIds',
        'line_items' => 'setLineItems',
        'success_url' => 'setSuccessUrl',
        'cancel_url' => 'setCancelUrl',
        'redirect_url' => 'setRedirectUrl',
        'collect_shipping' => 'setCollectShipping',
        'allow_promotion_codes' => 'setAllowPromotionCodes',
        'tax_behavior' => 'setTaxBehavior',
        'metadata' => 'setMetadata',
        'expires_at' => 'setExpiresAt',
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
        'merchant_id' => 'getMerchantId',
        'public_id' => 'getPublicId',
        'name' => 'getName',
        'slug' => 'getSlug',
        'mode' => 'getMode',
        'status' => 'getStatus',
        'amount_minor' => 'getAmountMinor',
        'currency' => 'getCurrency',
        'invoice_id' => 'getInvoiceId',
        'subscription_id' => 'getSubscriptionId',
        'product_ids' => 'getProductIds',
        'line_items' => 'getLineItems',
        'success_url' => 'getSuccessUrl',
        'cancel_url' => 'getCancelUrl',
        'redirect_url' => 'getRedirectUrl',
        'collect_shipping' => 'getCollectShipping',
        'allow_promotion_codes' => 'getAllowPromotionCodes',
        'tax_behavior' => 'getTaxBehavior',
        'metadata' => 'getMetadata',
        'expires_at' => 'getExpiresAt',
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

    public const MODE_INVOICE = 'invoice';
    public const MODE_SUBSCRIPTION = 'subscription';
    public const MODE_CUSTOM = 'custom';
    public const STATUS_DRAFT = 'draft';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_EXPIRED = 'expired';
    public const STATUS_COMPLETED = 'completed';
    public const TAX_BEHAVIOR_EXCLUSIVE = 'exclusive';
    public const TAX_BEHAVIOR_INCLUSIVE = 'inclusive';
    public const TAX_BEHAVIOR_UNSPECIFIED = 'unspecified';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getModeAllowableValues()
    {
        return [
            self::MODE_INVOICE,
            self::MODE_SUBSCRIPTION,
            self::MODE_CUSTOM,
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
            self::STATUS_ACTIVE,
            self::STATUS_EXPIRED,
            self::STATUS_COMPLETED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTaxBehaviorAllowableValues()
    {
        return [
            self::TAX_BEHAVIOR_EXCLUSIVE,
            self::TAX_BEHAVIOR_INCLUSIVE,
            self::TAX_BEHAVIOR_UNSPECIFIED,
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
        $this->setIfExists('merchant_id', $data ?? [], null);
        $this->setIfExists('public_id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('slug', $data ?? [], null);
        $this->setIfExists('mode', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('amount_minor', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], 'USD');
        $this->setIfExists('invoice_id', $data ?? [], null);
        $this->setIfExists('subscription_id', $data ?? [], null);
        $this->setIfExists('product_ids', $data ?? [], null);
        $this->setIfExists('line_items', $data ?? [], null);
        $this->setIfExists('success_url', $data ?? [], null);
        $this->setIfExists('cancel_url', $data ?? [], null);
        $this->setIfExists('redirect_url', $data ?? [], null);
        $this->setIfExists('collect_shipping', $data ?? [], false);
        $this->setIfExists('allow_promotion_codes', $data ?? [], true);
        $this->setIfExists('tax_behavior', $data ?? [], 'unspecified');
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
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
        if ($this->container['merchant_id'] === null) {
            $invalidProperties[] = "'merchant_id' can't be null";
        }
        if ($this->container['public_id'] === null) {
            $invalidProperties[] = "'public_id' can't be null";
        }
        if ($this->container['mode'] === null) {
            $invalidProperties[] = "'mode' can't be null";
        }
        $allowedValues = $this->getModeAllowableValues();
        if (!is_null($this->container['mode']) && !in_array($this->container['mode'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'mode', must be one of '%s'",
                $this->container['mode'],
                implode("', '", $allowedValues)
            );
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

        if (!is_null($this->container['currency']) && (mb_strlen($this->container['currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['currency']) && (mb_strlen($this->container['currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be bigger than or equal to 3.";
        }

        $allowedValues = $this->getTaxBehaviorAllowableValues();
        if (!is_null($this->container['tax_behavior']) && !in_array($this->container['tax_behavior'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'tax_behavior', must be one of '%s'",
                $this->container['tax_behavior'],
                implode("', '", $allowedValues)
            );
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
     * @param string $public_id public_id
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
        $this->container['name'] = $name;

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
     * @param string|null $slug slug
     *
     * @return self
     */
    public function setSlug($slug)
    {
        if (is_null($slug)) {
            array_push($this->openAPINullablesSetToNull, 'slug');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('slug', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['slug'] = $slug;

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
        $allowedValues = $this->getModeAllowableValues();
        if (!in_array($mode, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'mode', must be one of '%s'",
                    $mode,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['mode'] = $mode;

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
     * @param string $status status
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
     * Gets amount_minor
     *
     * @return int|null
     */
    public function getAmountMinor()
    {
        return $this->container['amount_minor'];
    }

    /**
     * Sets amount_minor
     *
     * @param int|null $amount_minor amount_minor
     *
     * @return self
     */
    public function setAmountMinor($amount_minor)
    {
        if (is_null($amount_minor)) {
            array_push($this->openAPINullablesSetToNull, 'amount_minor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('amount_minor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['amount_minor'] = $amount_minor;

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
     * @param string|null $currency currency
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        if ((mb_strlen($currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling PaymentLinksList200ResponseDataInner., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling PaymentLinksList200ResponseDataInner., must be bigger than or equal to 3.');
        }

        $this->container['currency'] = $currency;

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
     * @param string|null $invoice_id invoice_id
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
     * @param string|null $subscription_id subscription_id
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
            throw new \InvalidArgumentException('non-nullable product_ids cannot be null');
        }
        $this->container['product_ids'] = $product_ids;

        return $this;
    }

    /**
     * Gets line_items
     *
     * @return \RevKeen\Model\PaymentLinksList200ResponseDataInnerLineItemsInner[]|null
     */
    public function getLineItems()
    {
        return $this->container['line_items'];
    }

    /**
     * Sets line_items
     *
     * @param \RevKeen\Model\PaymentLinksList200ResponseDataInnerLineItemsInner[]|null $line_items line_items
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
     * Gets success_url
     *
     * @return string|null
     */
    public function getSuccessUrl()
    {
        return $this->container['success_url'];
    }

    /**
     * Sets success_url
     *
     * @param string|null $success_url Custom URL to redirect after successful payment. Supports placeholders: {CHECKOUT_ID}, {TRANSACTION_ID}, {PAYMENT_ID}, {CUSTOMER_ID}, {AMOUNT}, {CURRENCY}, {PORTAL_URL}. If not set, redirects to RevKeen's default success page.
     *
     * @return self
     */
    public function setSuccessUrl($success_url)
    {
        if (is_null($success_url)) {
            array_push($this->openAPINullablesSetToNull, 'success_url');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('success_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['success_url'] = $success_url;

        return $this;
    }

    /**
     * Gets cancel_url
     *
     * @return string|null
     */
    public function getCancelUrl()
    {
        return $this->container['cancel_url'];
    }

    /**
     * Sets cancel_url
     *
     * @param string|null $cancel_url Custom URL to redirect if customer cancels the checkout. If not set, no cancel redirect is configured.
     *
     * @return self
     */
    public function setCancelUrl($cancel_url)
    {
        if (is_null($cancel_url)) {
            array_push($this->openAPINullablesSetToNull, 'cancel_url');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cancel_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['cancel_url'] = $cancel_url;

        return $this;
    }

    /**
     * Gets redirect_url
     *
     * @return string|null
     */
    public function getRedirectUrl()
    {
        return $this->container['redirect_url'];
    }

    /**
     * Sets redirect_url
     *
     * @param string|null $redirect_url redirect_url
     *
     * @return self
     */
    public function setRedirectUrl($redirect_url)
    {
        if (is_null($redirect_url)) {
            array_push($this->openAPINullablesSetToNull, 'redirect_url');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('redirect_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['redirect_url'] = $redirect_url;

        return $this;
    }

    /**
     * Gets collect_shipping
     *
     * @return bool|null
     */
    public function getCollectShipping()
    {
        return $this->container['collect_shipping'];
    }

    /**
     * Sets collect_shipping
     *
     * @param bool|null $collect_shipping collect_shipping
     *
     * @return self
     */
    public function setCollectShipping($collect_shipping)
    {
        if (is_null($collect_shipping)) {
            throw new \InvalidArgumentException('non-nullable collect_shipping cannot be null');
        }
        $this->container['collect_shipping'] = $collect_shipping;

        return $this;
    }

    /**
     * Gets allow_promotion_codes
     *
     * @return bool|null
     */
    public function getAllowPromotionCodes()
    {
        return $this->container['allow_promotion_codes'];
    }

    /**
     * Sets allow_promotion_codes
     *
     * @param bool|null $allow_promotion_codes allow_promotion_codes
     *
     * @return self
     */
    public function setAllowPromotionCodes($allow_promotion_codes)
    {
        if (is_null($allow_promotion_codes)) {
            throw new \InvalidArgumentException('non-nullable allow_promotion_codes cannot be null');
        }
        $this->container['allow_promotion_codes'] = $allow_promotion_codes;

        return $this;
    }

    /**
     * Gets tax_behavior
     *
     * @return string|null
     */
    public function getTaxBehavior()
    {
        return $this->container['tax_behavior'];
    }

    /**
     * Sets tax_behavior
     *
     * @param string|null $tax_behavior tax_behavior
     *
     * @return self
     */
    public function setTaxBehavior($tax_behavior)
    {
        if (is_null($tax_behavior)) {
            throw new \InvalidArgumentException('non-nullable tax_behavior cannot be null');
        }
        $allowedValues = $this->getTaxBehaviorAllowableValues();
        if (!in_array($tax_behavior, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'tax_behavior', must be one of '%s'",
                    $tax_behavior,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['tax_behavior'] = $tax_behavior;

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
     * @param array<string,mixed>|null $metadata metadata
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


