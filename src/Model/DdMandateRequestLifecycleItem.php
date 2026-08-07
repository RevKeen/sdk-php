<?php
/**
 * DdMandateRequestLifecycleItem
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `cart:read` | View cart session details (REV-3511) | |  | `cart:write` | Create and mutate cart sessions, line items, add-ons (REV-3511) | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `entitlements:read` | View customer entitlements / feature access | |  | `entitlements:write` | Grant and revoke customer entitlements | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Direct Debit** | `mandates:read` | View Direct Debit mandates and collection status | |  | `mandates:write` | Create, suspend, reinstate, and cancel Direct Debit mandates | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Staging** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
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
 * DdMandateRequestLifecycleItem Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DdMandateRequestLifecycleItem implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DdMandateRequestLifecycleItem';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'merchant_id' => 'string',
        'customer_id' => 'string',
        'invoice_id' => 'string',
        'subscription_id' => 'string',
        'mandate_id' => 'string',
        'token' => 'string',
        'signable_url' => 'string',
        'created_at' => 'string',
        'expires_at' => 'string',
        'consumed_at' => 'string',
        'cancelled_at' => 'string',
        'expired_at' => 'string',
        'status' => '\RevKeen\Model\DdMandateRequestLifecycleStatus',
        'notification_delivery_event_type' => 'string',
        'notification_delivery_status' => 'string',
        'notification_delivery_error' => 'string',
        'notification_delivery_updated_at' => 'string',
        'pdf_documents' => '\RevKeen\Model\DdMandatePdfReference[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'merchant_id' => null,
        'customer_id' => null,
        'invoice_id' => null,
        'subscription_id' => null,
        'mandate_id' => null,
        'token' => null,
        'signable_url' => null,
        'created_at' => null,
        'expires_at' => null,
        'consumed_at' => null,
        'cancelled_at' => null,
        'expired_at' => null,
        'status' => null,
        'notification_delivery_event_type' => null,
        'notification_delivery_status' => null,
        'notification_delivery_error' => null,
        'notification_delivery_updated_at' => null,
        'pdf_documents' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'merchant_id' => false,
        'customer_id' => false,
        'invoice_id' => true,
        'subscription_id' => true,
        'mandate_id' => true,
        'token' => false,
        'signable_url' => false,
        'created_at' => true,
        'expires_at' => true,
        'consumed_at' => true,
        'cancelled_at' => true,
        'expired_at' => true,
        'status' => false,
        'notification_delivery_event_type' => true,
        'notification_delivery_status' => true,
        'notification_delivery_error' => true,
        'notification_delivery_updated_at' => true,
        'pdf_documents' => false
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
        'customer_id' => 'customer_id',
        'invoice_id' => 'invoice_id',
        'subscription_id' => 'subscription_id',
        'mandate_id' => 'mandate_id',
        'token' => 'token',
        'signable_url' => 'signable_url',
        'created_at' => 'created_at',
        'expires_at' => 'expires_at',
        'consumed_at' => 'consumed_at',
        'cancelled_at' => 'cancelled_at',
        'expired_at' => 'expired_at',
        'status' => 'status',
        'notification_delivery_event_type' => 'notification_delivery_event_type',
        'notification_delivery_status' => 'notification_delivery_status',
        'notification_delivery_error' => 'notification_delivery_error',
        'notification_delivery_updated_at' => 'notification_delivery_updated_at',
        'pdf_documents' => 'pdf_documents'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'merchant_id' => 'setMerchantId',
        'customer_id' => 'setCustomerId',
        'invoice_id' => 'setInvoiceId',
        'subscription_id' => 'setSubscriptionId',
        'mandate_id' => 'setMandateId',
        'token' => 'setToken',
        'signable_url' => 'setSignableUrl',
        'created_at' => 'setCreatedAt',
        'expires_at' => 'setExpiresAt',
        'consumed_at' => 'setConsumedAt',
        'cancelled_at' => 'setCancelledAt',
        'expired_at' => 'setExpiredAt',
        'status' => 'setStatus',
        'notification_delivery_event_type' => 'setNotificationDeliveryEventType',
        'notification_delivery_status' => 'setNotificationDeliveryStatus',
        'notification_delivery_error' => 'setNotificationDeliveryError',
        'notification_delivery_updated_at' => 'setNotificationDeliveryUpdatedAt',
        'pdf_documents' => 'setPdfDocuments'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'merchant_id' => 'getMerchantId',
        'customer_id' => 'getCustomerId',
        'invoice_id' => 'getInvoiceId',
        'subscription_id' => 'getSubscriptionId',
        'mandate_id' => 'getMandateId',
        'token' => 'getToken',
        'signable_url' => 'getSignableUrl',
        'created_at' => 'getCreatedAt',
        'expires_at' => 'getExpiresAt',
        'consumed_at' => 'getConsumedAt',
        'cancelled_at' => 'getCancelledAt',
        'expired_at' => 'getExpiredAt',
        'status' => 'getStatus',
        'notification_delivery_event_type' => 'getNotificationDeliveryEventType',
        'notification_delivery_status' => 'getNotificationDeliveryStatus',
        'notification_delivery_error' => 'getNotificationDeliveryError',
        'notification_delivery_updated_at' => 'getNotificationDeliveryUpdatedAt',
        'pdf_documents' => 'getPdfDocuments'
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
        $this->setIfExists('merchant_id', $data ?? [], null);
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('invoice_id', $data ?? [], null);
        $this->setIfExists('subscription_id', $data ?? [], null);
        $this->setIfExists('mandate_id', $data ?? [], null);
        $this->setIfExists('token', $data ?? [], null);
        $this->setIfExists('signable_url', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('consumed_at', $data ?? [], null);
        $this->setIfExists('cancelled_at', $data ?? [], null);
        $this->setIfExists('expired_at', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('notification_delivery_event_type', $data ?? [], null);
        $this->setIfExists('notification_delivery_status', $data ?? [], null);
        $this->setIfExists('notification_delivery_error', $data ?? [], null);
        $this->setIfExists('notification_delivery_updated_at', $data ?? [], null);
        $this->setIfExists('pdf_documents', $data ?? [], null);
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
        if ($this->container['customer_id'] === null) {
            $invalidProperties[] = "'customer_id' can't be null";
        }
        if ($this->container['invoice_id'] === null && !$this->isNullableSetToNull('invoice_id')) {
            $invalidProperties[] = "'invoice_id' can't be null";
        }
        if ($this->container['subscription_id'] === null && !$this->isNullableSetToNull('subscription_id')) {
            $invalidProperties[] = "'subscription_id' can't be null";
        }
        if ($this->container['mandate_id'] === null && !$this->isNullableSetToNull('mandate_id')) {
            $invalidProperties[] = "'mandate_id' can't be null";
        }
        if ($this->container['token'] === null) {
            $invalidProperties[] = "'token' can't be null";
        }
        if ($this->container['signable_url'] === null) {
            $invalidProperties[] = "'signable_url' can't be null";
        }
        if ($this->container['created_at'] === null && !$this->isNullableSetToNull('created_at')) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['expires_at'] === null && !$this->isNullableSetToNull('expires_at')) {
            $invalidProperties[] = "'expires_at' can't be null";
        }
        if ($this->container['consumed_at'] === null && !$this->isNullableSetToNull('consumed_at')) {
            $invalidProperties[] = "'consumed_at' can't be null";
        }
        if ($this->container['cancelled_at'] === null && !$this->isNullableSetToNull('cancelled_at')) {
            $invalidProperties[] = "'cancelled_at' can't be null";
        }
        if ($this->container['expired_at'] === null && !$this->isNullableSetToNull('expired_at')) {
            $invalidProperties[] = "'expired_at' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['notification_delivery_event_type'] === null && !$this->isNullableSetToNull('notification_delivery_event_type')) {
            $invalidProperties[] = "'notification_delivery_event_type' can't be null";
        }
        if ($this->container['notification_delivery_status'] === null && !$this->isNullableSetToNull('notification_delivery_status')) {
            $invalidProperties[] = "'notification_delivery_status' can't be null";
        }
        if ($this->container['notification_delivery_error'] === null && !$this->isNullableSetToNull('notification_delivery_error')) {
            $invalidProperties[] = "'notification_delivery_error' can't be null";
        }
        if ($this->container['notification_delivery_updated_at'] === null && !$this->isNullableSetToNull('notification_delivery_updated_at')) {
            $invalidProperties[] = "'notification_delivery_updated_at' can't be null";
        }
        if ($this->container['pdf_documents'] === null) {
            $invalidProperties[] = "'pdf_documents' can't be null";
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
     * Gets customer_id
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->container['customer_id'];
    }

    /**
     * Sets customer_id
     *
     * @param string $customer_id customer_id
     *
     * @return self
     */
    public function setCustomerId($customer_id)
    {
        if (is_null($customer_id)) {
            throw new \InvalidArgumentException('non-nullable customer_id cannot be null');
        }
        $this->container['customer_id'] = $customer_id;

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
     * Gets mandate_id
     *
     * @return string|null
     */
    public function getMandateId()
    {
        return $this->container['mandate_id'];
    }

    /**
     * Sets mandate_id
     *
     * @param string|null $mandate_id mandate_id
     *
     * @return self
     */
    public function setMandateId($mandate_id)
    {
        if (is_null($mandate_id)) {
            array_push($this->openAPINullablesSetToNull, 'mandate_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('mandate_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['mandate_id'] = $mandate_id;

        return $this;
    }

    /**
     * Gets token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->container['token'];
    }

    /**
     * Sets token
     *
     * @param string $token Internal raw request token. Do not expose directly to customers.
     *
     * @return self
     */
    public function setToken($token)
    {
        if (is_null($token)) {
            throw new \InvalidArgumentException('non-nullable token cannot be null');
        }
        $this->container['token'] = $token;

        return $this;
    }

    /**
     * Gets signable_url
     *
     * @return string
     */
    public function getSignableUrl()
    {
        return $this->container['signable_url'];
    }

    /**
     * Sets signable_url
     *
     * @param string $signable_url Customer-facing tracked URL: pay.revkeen.com/dd_<token>
     *
     * @return self
     */
    public function setSignableUrl($signable_url)
    {
        if (is_null($signable_url)) {
            throw new \InvalidArgumentException('non-nullable signable_url cannot be null');
        }
        $this->container['signable_url'] = $signable_url;

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
     * Gets expires_at
     *
     * @return string|null
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param string|null $expires_at expires_at
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
     * Gets consumed_at
     *
     * @return string|null
     */
    public function getConsumedAt()
    {
        return $this->container['consumed_at'];
    }

    /**
     * Sets consumed_at
     *
     * @param string|null $consumed_at consumed_at
     *
     * @return self
     */
    public function setConsumedAt($consumed_at)
    {
        if (is_null($consumed_at)) {
            array_push($this->openAPINullablesSetToNull, 'consumed_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('consumed_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['consumed_at'] = $consumed_at;

        return $this;
    }

    /**
     * Gets cancelled_at
     *
     * @return string|null
     */
    public function getCancelledAt()
    {
        return $this->container['cancelled_at'];
    }

    /**
     * Sets cancelled_at
     *
     * @param string|null $cancelled_at cancelled_at
     *
     * @return self
     */
    public function setCancelledAt($cancelled_at)
    {
        if (is_null($cancelled_at)) {
            array_push($this->openAPINullablesSetToNull, 'cancelled_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cancelled_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['cancelled_at'] = $cancelled_at;

        return $this;
    }

    /**
     * Gets expired_at
     *
     * @return string|null
     */
    public function getExpiredAt()
    {
        return $this->container['expired_at'];
    }

    /**
     * Sets expired_at
     *
     * @param string|null $expired_at expired_at
     *
     * @return self
     */
    public function setExpiredAt($expired_at)
    {
        if (is_null($expired_at)) {
            array_push($this->openAPINullablesSetToNull, 'expired_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('expired_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['expired_at'] = $expired_at;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \RevKeen\Model\DdMandateRequestLifecycleStatus
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \RevKeen\Model\DdMandateRequestLifecycleStatus $status status
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
     * Gets notification_delivery_event_type
     *
     * @return string|null
     */
    public function getNotificationDeliveryEventType()
    {
        return $this->container['notification_delivery_event_type'];
    }

    /**
     * Sets notification_delivery_event_type
     *
     * @param string|null $notification_delivery_event_type notification_delivery_event_type
     *
     * @return self
     */
    public function setNotificationDeliveryEventType($notification_delivery_event_type)
    {
        if (is_null($notification_delivery_event_type)) {
            array_push($this->openAPINullablesSetToNull, 'notification_delivery_event_type');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('notification_delivery_event_type', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['notification_delivery_event_type'] = $notification_delivery_event_type;

        return $this;
    }

    /**
     * Gets notification_delivery_status
     *
     * @return string|null
     */
    public function getNotificationDeliveryStatus()
    {
        return $this->container['notification_delivery_status'];
    }

    /**
     * Sets notification_delivery_status
     *
     * @param string|null $notification_delivery_status notification_delivery_status
     *
     * @return self
     */
    public function setNotificationDeliveryStatus($notification_delivery_status)
    {
        if (is_null($notification_delivery_status)) {
            array_push($this->openAPINullablesSetToNull, 'notification_delivery_status');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('notification_delivery_status', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['notification_delivery_status'] = $notification_delivery_status;

        return $this;
    }

    /**
     * Gets notification_delivery_error
     *
     * @return string|null
     */
    public function getNotificationDeliveryError()
    {
        return $this->container['notification_delivery_error'];
    }

    /**
     * Sets notification_delivery_error
     *
     * @param string|null $notification_delivery_error notification_delivery_error
     *
     * @return self
     */
    public function setNotificationDeliveryError($notification_delivery_error)
    {
        if (is_null($notification_delivery_error)) {
            array_push($this->openAPINullablesSetToNull, 'notification_delivery_error');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('notification_delivery_error', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['notification_delivery_error'] = $notification_delivery_error;

        return $this;
    }

    /**
     * Gets notification_delivery_updated_at
     *
     * @return string|null
     */
    public function getNotificationDeliveryUpdatedAt()
    {
        return $this->container['notification_delivery_updated_at'];
    }

    /**
     * Sets notification_delivery_updated_at
     *
     * @param string|null $notification_delivery_updated_at notification_delivery_updated_at
     *
     * @return self
     */
    public function setNotificationDeliveryUpdatedAt($notification_delivery_updated_at)
    {
        if (is_null($notification_delivery_updated_at)) {
            array_push($this->openAPINullablesSetToNull, 'notification_delivery_updated_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('notification_delivery_updated_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['notification_delivery_updated_at'] = $notification_delivery_updated_at;

        return $this;
    }

    /**
     * Gets pdf_documents
     *
     * @return \RevKeen\Model\DdMandatePdfReference[]
     */
    public function getPdfDocuments()
    {
        return $this->container['pdf_documents'];
    }

    /**
     * Sets pdf_documents
     *
     * @param \RevKeen\Model\DdMandatePdfReference[] $pdf_documents pdf_documents
     *
     * @return self
     */
    public function setPdfDocuments($pdf_documents)
    {
        if (is_null($pdf_documents)) {
            throw new \InvalidArgumentException('non-nullable pdf_documents cannot be null');
        }
        $this->container['pdf_documents'] = $pdf_documents;

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


