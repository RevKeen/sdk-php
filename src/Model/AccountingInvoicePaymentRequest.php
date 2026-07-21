<?php
/**
 * AccountingInvoicePaymentRequest
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
 * AccountingInvoicePaymentRequest Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AccountingInvoicePaymentRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AccountingInvoicePaymentRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'object' => 'string',
        'merchant_id' => 'string',
        'provider' => 'string',
        'connection_id' => 'string',
        'provider_account_id' => 'string',
        'external_invoice_id' => 'string',
        'external_invoice_number' => 'string',
        'external_invoice_status' => 'string',
        'external_invoice_url' => 'string',
        'external_invoice_issued_at' => 'string',
        'external_invoice_due_at' => 'string',
        'external_invoice_updated_at' => 'string',
        'external_customer_id' => 'string',
        'external_customer_reference' => 'string',
        'external_customer_name' => 'string',
        'external_customer_email' => 'string',
        'amount_due_minor' => 'int',
        'total_amount_minor' => 'int',
        'amount_paid_minor' => 'int',
        'currency' => 'string',
        'checkout_session_id' => 'string',
        'checkout_url' => 'string',
        'checkout_expires_at' => 'string',
        'checkout_success_url' => 'string',
        'checkout_cancel_url' => 'string',
        'checkout_allowed_methods' => 'string[]',
        'status' => 'string',
        'sync_status' => 'string',
        'idempotency_key' => 'string',
        'payload_fingerprint' => 'string',
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
        'object' => null,
        'merchant_id' => 'uuid',
        'provider' => null,
        'connection_id' => 'uuid',
        'provider_account_id' => null,
        'external_invoice_id' => null,
        'external_invoice_number' => null,
        'external_invoice_status' => null,
        'external_invoice_url' => null,
        'external_invoice_issued_at' => null,
        'external_invoice_due_at' => null,
        'external_invoice_updated_at' => null,
        'external_customer_id' => null,
        'external_customer_reference' => null,
        'external_customer_name' => null,
        'external_customer_email' => null,
        'amount_due_minor' => null,
        'total_amount_minor' => null,
        'amount_paid_minor' => null,
        'currency' => null,
        'checkout_session_id' => 'uuid',
        'checkout_url' => null,
        'checkout_expires_at' => null,
        'checkout_success_url' => null,
        'checkout_cancel_url' => null,
        'checkout_allowed_methods' => null,
        'status' => null,
        'sync_status' => null,
        'idempotency_key' => null,
        'payload_fingerprint' => null,
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
        'object' => false,
        'merchant_id' => false,
        'provider' => false,
        'connection_id' => false,
        'provider_account_id' => false,
        'external_invoice_id' => false,
        'external_invoice_number' => true,
        'external_invoice_status' => true,
        'external_invoice_url' => true,
        'external_invoice_issued_at' => true,
        'external_invoice_due_at' => true,
        'external_invoice_updated_at' => true,
        'external_customer_id' => true,
        'external_customer_reference' => true,
        'external_customer_name' => true,
        'external_customer_email' => true,
        'amount_due_minor' => false,
        'total_amount_minor' => true,
        'amount_paid_minor' => true,
        'currency' => false,
        'checkout_session_id' => true,
        'checkout_url' => true,
        'checkout_expires_at' => true,
        'checkout_success_url' => true,
        'checkout_cancel_url' => true,
        'checkout_allowed_methods' => true,
        'status' => false,
        'sync_status' => false,
        'idempotency_key' => false,
        'payload_fingerprint' => false,
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
        'object' => 'object',
        'merchant_id' => 'merchant_id',
        'provider' => 'provider',
        'connection_id' => 'connection_id',
        'provider_account_id' => 'provider_account_id',
        'external_invoice_id' => 'external_invoice_id',
        'external_invoice_number' => 'external_invoice_number',
        'external_invoice_status' => 'external_invoice_status',
        'external_invoice_url' => 'external_invoice_url',
        'external_invoice_issued_at' => 'external_invoice_issued_at',
        'external_invoice_due_at' => 'external_invoice_due_at',
        'external_invoice_updated_at' => 'external_invoice_updated_at',
        'external_customer_id' => 'external_customer_id',
        'external_customer_reference' => 'external_customer_reference',
        'external_customer_name' => 'external_customer_name',
        'external_customer_email' => 'external_customer_email',
        'amount_due_minor' => 'amount_due_minor',
        'total_amount_minor' => 'total_amount_minor',
        'amount_paid_minor' => 'amount_paid_minor',
        'currency' => 'currency',
        'checkout_session_id' => 'checkout_session_id',
        'checkout_url' => 'checkout_url',
        'checkout_expires_at' => 'checkout_expires_at',
        'checkout_success_url' => 'checkout_success_url',
        'checkout_cancel_url' => 'checkout_cancel_url',
        'checkout_allowed_methods' => 'checkout_allowed_methods',
        'status' => 'status',
        'sync_status' => 'sync_status',
        'idempotency_key' => 'idempotency_key',
        'payload_fingerprint' => 'payload_fingerprint',
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
        'object' => 'setObject',
        'merchant_id' => 'setMerchantId',
        'provider' => 'setProvider',
        'connection_id' => 'setConnectionId',
        'provider_account_id' => 'setProviderAccountId',
        'external_invoice_id' => 'setExternalInvoiceId',
        'external_invoice_number' => 'setExternalInvoiceNumber',
        'external_invoice_status' => 'setExternalInvoiceStatus',
        'external_invoice_url' => 'setExternalInvoiceUrl',
        'external_invoice_issued_at' => 'setExternalInvoiceIssuedAt',
        'external_invoice_due_at' => 'setExternalInvoiceDueAt',
        'external_invoice_updated_at' => 'setExternalInvoiceUpdatedAt',
        'external_customer_id' => 'setExternalCustomerId',
        'external_customer_reference' => 'setExternalCustomerReference',
        'external_customer_name' => 'setExternalCustomerName',
        'external_customer_email' => 'setExternalCustomerEmail',
        'amount_due_minor' => 'setAmountDueMinor',
        'total_amount_minor' => 'setTotalAmountMinor',
        'amount_paid_minor' => 'setAmountPaidMinor',
        'currency' => 'setCurrency',
        'checkout_session_id' => 'setCheckoutSessionId',
        'checkout_url' => 'setCheckoutUrl',
        'checkout_expires_at' => 'setCheckoutExpiresAt',
        'checkout_success_url' => 'setCheckoutSuccessUrl',
        'checkout_cancel_url' => 'setCheckoutCancelUrl',
        'checkout_allowed_methods' => 'setCheckoutAllowedMethods',
        'status' => 'setStatus',
        'sync_status' => 'setSyncStatus',
        'idempotency_key' => 'setIdempotencyKey',
        'payload_fingerprint' => 'setPayloadFingerprint',
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
        'object' => 'getObject',
        'merchant_id' => 'getMerchantId',
        'provider' => 'getProvider',
        'connection_id' => 'getConnectionId',
        'provider_account_id' => 'getProviderAccountId',
        'external_invoice_id' => 'getExternalInvoiceId',
        'external_invoice_number' => 'getExternalInvoiceNumber',
        'external_invoice_status' => 'getExternalInvoiceStatus',
        'external_invoice_url' => 'getExternalInvoiceUrl',
        'external_invoice_issued_at' => 'getExternalInvoiceIssuedAt',
        'external_invoice_due_at' => 'getExternalInvoiceDueAt',
        'external_invoice_updated_at' => 'getExternalInvoiceUpdatedAt',
        'external_customer_id' => 'getExternalCustomerId',
        'external_customer_reference' => 'getExternalCustomerReference',
        'external_customer_name' => 'getExternalCustomerName',
        'external_customer_email' => 'getExternalCustomerEmail',
        'amount_due_minor' => 'getAmountDueMinor',
        'total_amount_minor' => 'getTotalAmountMinor',
        'amount_paid_minor' => 'getAmountPaidMinor',
        'currency' => 'getCurrency',
        'checkout_session_id' => 'getCheckoutSessionId',
        'checkout_url' => 'getCheckoutUrl',
        'checkout_expires_at' => 'getCheckoutExpiresAt',
        'checkout_success_url' => 'getCheckoutSuccessUrl',
        'checkout_cancel_url' => 'getCheckoutCancelUrl',
        'checkout_allowed_methods' => 'getCheckoutAllowedMethods',
        'status' => 'getStatus',
        'sync_status' => 'getSyncStatus',
        'idempotency_key' => 'getIdempotencyKey',
        'payload_fingerprint' => 'getPayloadFingerprint',
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

    public const OBJECT_ACCOUNTING_INVOICE_PAYMENT_REQUEST = 'accounting_invoice_payment_request';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getObjectAllowableValues()
    {
        return [
            self::OBJECT_ACCOUNTING_INVOICE_PAYMENT_REQUEST,
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
        $this->setIfExists('object', $data ?? [], null);
        $this->setIfExists('merchant_id', $data ?? [], null);
        $this->setIfExists('provider', $data ?? [], null);
        $this->setIfExists('connection_id', $data ?? [], null);
        $this->setIfExists('provider_account_id', $data ?? [], null);
        $this->setIfExists('external_invoice_id', $data ?? [], null);
        $this->setIfExists('external_invoice_number', $data ?? [], null);
        $this->setIfExists('external_invoice_status', $data ?? [], null);
        $this->setIfExists('external_invoice_url', $data ?? [], null);
        $this->setIfExists('external_invoice_issued_at', $data ?? [], null);
        $this->setIfExists('external_invoice_due_at', $data ?? [], null);
        $this->setIfExists('external_invoice_updated_at', $data ?? [], null);
        $this->setIfExists('external_customer_id', $data ?? [], null);
        $this->setIfExists('external_customer_reference', $data ?? [], null);
        $this->setIfExists('external_customer_name', $data ?? [], null);
        $this->setIfExists('external_customer_email', $data ?? [], null);
        $this->setIfExists('amount_due_minor', $data ?? [], null);
        $this->setIfExists('total_amount_minor', $data ?? [], null);
        $this->setIfExists('amount_paid_minor', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('checkout_session_id', $data ?? [], null);
        $this->setIfExists('checkout_url', $data ?? [], null);
        $this->setIfExists('checkout_expires_at', $data ?? [], null);
        $this->setIfExists('checkout_success_url', $data ?? [], null);
        $this->setIfExists('checkout_cancel_url', $data ?? [], null);
        $this->setIfExists('checkout_allowed_methods', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('sync_status', $data ?? [], null);
        $this->setIfExists('idempotency_key', $data ?? [], null);
        $this->setIfExists('payload_fingerprint', $data ?? [], null);
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
        if ($this->container['object'] === null) {
            $invalidProperties[] = "'object' can't be null";
        }
        $allowedValues = $this->getObjectAllowableValues();
        if (!is_null($this->container['object']) && !in_array($this->container['object'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'object', must be one of '%s'",
                $this->container['object'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['merchant_id'] === null) {
            $invalidProperties[] = "'merchant_id' can't be null";
        }
        if ($this->container['provider'] === null) {
            $invalidProperties[] = "'provider' can't be null";
        }
        if ($this->container['connection_id'] === null) {
            $invalidProperties[] = "'connection_id' can't be null";
        }
        if ($this->container['provider_account_id'] === null) {
            $invalidProperties[] = "'provider_account_id' can't be null";
        }
        if ($this->container['external_invoice_id'] === null) {
            $invalidProperties[] = "'external_invoice_id' can't be null";
        }
        if ($this->container['amount_due_minor'] === null) {
            $invalidProperties[] = "'amount_due_minor' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['sync_status'] === null) {
            $invalidProperties[] = "'sync_status' can't be null";
        }
        if ($this->container['idempotency_key'] === null) {
            $invalidProperties[] = "'idempotency_key' can't be null";
        }
        if ($this->container['payload_fingerprint'] === null) {
            $invalidProperties[] = "'payload_fingerprint' can't be null";
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
     * Gets object
     *
     * @return string
     */
    public function getObject()
    {
        return $this->container['object'];
    }

    /**
     * Sets object
     *
     * @param string $object object
     *
     * @return self
     */
    public function setObject($object)
    {
        if (is_null($object)) {
            throw new \InvalidArgumentException('non-nullable object cannot be null');
        }
        $allowedValues = $this->getObjectAllowableValues();
        if (!in_array($object, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'object', must be one of '%s'",
                    $object,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['object'] = $object;

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
     * Gets provider
     *
     * @return string
     */
    public function getProvider()
    {
        return $this->container['provider'];
    }

    /**
     * Sets provider
     *
     * @param string $provider provider
     *
     * @return self
     */
    public function setProvider($provider)
    {
        if (is_null($provider)) {
            throw new \InvalidArgumentException('non-nullable provider cannot be null');
        }
        $this->container['provider'] = $provider;

        return $this;
    }

    /**
     * Gets connection_id
     *
     * @return string
     */
    public function getConnectionId()
    {
        return $this->container['connection_id'];
    }

    /**
     * Sets connection_id
     *
     * @param string $connection_id connection_id
     *
     * @return self
     */
    public function setConnectionId($connection_id)
    {
        if (is_null($connection_id)) {
            throw new \InvalidArgumentException('non-nullable connection_id cannot be null');
        }
        $this->container['connection_id'] = $connection_id;

        return $this;
    }

    /**
     * Gets provider_account_id
     *
     * @return string
     */
    public function getProviderAccountId()
    {
        return $this->container['provider_account_id'];
    }

    /**
     * Sets provider_account_id
     *
     * @param string $provider_account_id provider_account_id
     *
     * @return self
     */
    public function setProviderAccountId($provider_account_id)
    {
        if (is_null($provider_account_id)) {
            throw new \InvalidArgumentException('non-nullable provider_account_id cannot be null');
        }
        $this->container['provider_account_id'] = $provider_account_id;

        return $this;
    }

    /**
     * Gets external_invoice_id
     *
     * @return string
     */
    public function getExternalInvoiceId()
    {
        return $this->container['external_invoice_id'];
    }

    /**
     * Sets external_invoice_id
     *
     * @param string $external_invoice_id external_invoice_id
     *
     * @return self
     */
    public function setExternalInvoiceId($external_invoice_id)
    {
        if (is_null($external_invoice_id)) {
            throw new \InvalidArgumentException('non-nullable external_invoice_id cannot be null');
        }
        $this->container['external_invoice_id'] = $external_invoice_id;

        return $this;
    }

    /**
     * Gets external_invoice_number
     *
     * @return string|null
     */
    public function getExternalInvoiceNumber()
    {
        return $this->container['external_invoice_number'];
    }

    /**
     * Sets external_invoice_number
     *
     * @param string|null $external_invoice_number external_invoice_number
     *
     * @return self
     */
    public function setExternalInvoiceNumber($external_invoice_number)
    {
        if (is_null($external_invoice_number)) {
            array_push($this->openAPINullablesSetToNull, 'external_invoice_number');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_invoice_number', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_invoice_number'] = $external_invoice_number;

        return $this;
    }

    /**
     * Gets external_invoice_status
     *
     * @return string|null
     */
    public function getExternalInvoiceStatus()
    {
        return $this->container['external_invoice_status'];
    }

    /**
     * Sets external_invoice_status
     *
     * @param string|null $external_invoice_status external_invoice_status
     *
     * @return self
     */
    public function setExternalInvoiceStatus($external_invoice_status)
    {
        if (is_null($external_invoice_status)) {
            array_push($this->openAPINullablesSetToNull, 'external_invoice_status');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_invoice_status', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_invoice_status'] = $external_invoice_status;

        return $this;
    }

    /**
     * Gets external_invoice_url
     *
     * @return string|null
     */
    public function getExternalInvoiceUrl()
    {
        return $this->container['external_invoice_url'];
    }

    /**
     * Sets external_invoice_url
     *
     * @param string|null $external_invoice_url external_invoice_url
     *
     * @return self
     */
    public function setExternalInvoiceUrl($external_invoice_url)
    {
        if (is_null($external_invoice_url)) {
            array_push($this->openAPINullablesSetToNull, 'external_invoice_url');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_invoice_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_invoice_url'] = $external_invoice_url;

        return $this;
    }

    /**
     * Gets external_invoice_issued_at
     *
     * @return string|null
     */
    public function getExternalInvoiceIssuedAt()
    {
        return $this->container['external_invoice_issued_at'];
    }

    /**
     * Sets external_invoice_issued_at
     *
     * @param string|null $external_invoice_issued_at external_invoice_issued_at
     *
     * @return self
     */
    public function setExternalInvoiceIssuedAt($external_invoice_issued_at)
    {
        if (is_null($external_invoice_issued_at)) {
            array_push($this->openAPINullablesSetToNull, 'external_invoice_issued_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_invoice_issued_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_invoice_issued_at'] = $external_invoice_issued_at;

        return $this;
    }

    /**
     * Gets external_invoice_due_at
     *
     * @return string|null
     */
    public function getExternalInvoiceDueAt()
    {
        return $this->container['external_invoice_due_at'];
    }

    /**
     * Sets external_invoice_due_at
     *
     * @param string|null $external_invoice_due_at external_invoice_due_at
     *
     * @return self
     */
    public function setExternalInvoiceDueAt($external_invoice_due_at)
    {
        if (is_null($external_invoice_due_at)) {
            array_push($this->openAPINullablesSetToNull, 'external_invoice_due_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_invoice_due_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_invoice_due_at'] = $external_invoice_due_at;

        return $this;
    }

    /**
     * Gets external_invoice_updated_at
     *
     * @return string|null
     */
    public function getExternalInvoiceUpdatedAt()
    {
        return $this->container['external_invoice_updated_at'];
    }

    /**
     * Sets external_invoice_updated_at
     *
     * @param string|null $external_invoice_updated_at external_invoice_updated_at
     *
     * @return self
     */
    public function setExternalInvoiceUpdatedAt($external_invoice_updated_at)
    {
        if (is_null($external_invoice_updated_at)) {
            array_push($this->openAPINullablesSetToNull, 'external_invoice_updated_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_invoice_updated_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_invoice_updated_at'] = $external_invoice_updated_at;

        return $this;
    }

    /**
     * Gets external_customer_id
     *
     * @return string|null
     */
    public function getExternalCustomerId()
    {
        return $this->container['external_customer_id'];
    }

    /**
     * Sets external_customer_id
     *
     * @param string|null $external_customer_id external_customer_id
     *
     * @return self
     */
    public function setExternalCustomerId($external_customer_id)
    {
        if (is_null($external_customer_id)) {
            array_push($this->openAPINullablesSetToNull, 'external_customer_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_customer_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_customer_id'] = $external_customer_id;

        return $this;
    }

    /**
     * Gets external_customer_reference
     *
     * @return string|null
     */
    public function getExternalCustomerReference()
    {
        return $this->container['external_customer_reference'];
    }

    /**
     * Sets external_customer_reference
     *
     * @param string|null $external_customer_reference external_customer_reference
     *
     * @return self
     */
    public function setExternalCustomerReference($external_customer_reference)
    {
        if (is_null($external_customer_reference)) {
            array_push($this->openAPINullablesSetToNull, 'external_customer_reference');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_customer_reference', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_customer_reference'] = $external_customer_reference;

        return $this;
    }

    /**
     * Gets external_customer_name
     *
     * @return string|null
     */
    public function getExternalCustomerName()
    {
        return $this->container['external_customer_name'];
    }

    /**
     * Sets external_customer_name
     *
     * @param string|null $external_customer_name external_customer_name
     *
     * @return self
     */
    public function setExternalCustomerName($external_customer_name)
    {
        if (is_null($external_customer_name)) {
            array_push($this->openAPINullablesSetToNull, 'external_customer_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_customer_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_customer_name'] = $external_customer_name;

        return $this;
    }

    /**
     * Gets external_customer_email
     *
     * @return string|null
     */
    public function getExternalCustomerEmail()
    {
        return $this->container['external_customer_email'];
    }

    /**
     * Sets external_customer_email
     *
     * @param string|null $external_customer_email external_customer_email
     *
     * @return self
     */
    public function setExternalCustomerEmail($external_customer_email)
    {
        if (is_null($external_customer_email)) {
            array_push($this->openAPINullablesSetToNull, 'external_customer_email');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('external_customer_email', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['external_customer_email'] = $external_customer_email;

        return $this;
    }

    /**
     * Gets amount_due_minor
     *
     * @return int
     */
    public function getAmountDueMinor()
    {
        return $this->container['amount_due_minor'];
    }

    /**
     * Sets amount_due_minor
     *
     * @param int $amount_due_minor amount_due_minor
     *
     * @return self
     */
    public function setAmountDueMinor($amount_due_minor)
    {
        if (is_null($amount_due_minor)) {
            throw new \InvalidArgumentException('non-nullable amount_due_minor cannot be null');
        }
        $this->container['amount_due_minor'] = $amount_due_minor;

        return $this;
    }

    /**
     * Gets total_amount_minor
     *
     * @return int|null
     */
    public function getTotalAmountMinor()
    {
        return $this->container['total_amount_minor'];
    }

    /**
     * Sets total_amount_minor
     *
     * @param int|null $total_amount_minor total_amount_minor
     *
     * @return self
     */
    public function setTotalAmountMinor($total_amount_minor)
    {
        if (is_null($total_amount_minor)) {
            array_push($this->openAPINullablesSetToNull, 'total_amount_minor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('total_amount_minor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['total_amount_minor'] = $total_amount_minor;

        return $this;
    }

    /**
     * Gets amount_paid_minor
     *
     * @return int|null
     */
    public function getAmountPaidMinor()
    {
        return $this->container['amount_paid_minor'];
    }

    /**
     * Sets amount_paid_minor
     *
     * @param int|null $amount_paid_minor amount_paid_minor
     *
     * @return self
     */
    public function setAmountPaidMinor($amount_paid_minor)
    {
        if (is_null($amount_paid_minor)) {
            array_push($this->openAPINullablesSetToNull, 'amount_paid_minor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('amount_paid_minor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['amount_paid_minor'] = $amount_paid_minor;

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
     * @param string $currency currency
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
     * Gets checkout_session_id
     *
     * @return string|null
     */
    public function getCheckoutSessionId()
    {
        return $this->container['checkout_session_id'];
    }

    /**
     * Sets checkout_session_id
     *
     * @param string|null $checkout_session_id checkout_session_id
     *
     * @return self
     */
    public function setCheckoutSessionId($checkout_session_id)
    {
        if (is_null($checkout_session_id)) {
            array_push($this->openAPINullablesSetToNull, 'checkout_session_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('checkout_session_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['checkout_session_id'] = $checkout_session_id;

        return $this;
    }

    /**
     * Gets checkout_url
     *
     * @return string|null
     */
    public function getCheckoutUrl()
    {
        return $this->container['checkout_url'];
    }

    /**
     * Sets checkout_url
     *
     * @param string|null $checkout_url checkout_url
     *
     * @return self
     */
    public function setCheckoutUrl($checkout_url)
    {
        if (is_null($checkout_url)) {
            array_push($this->openAPINullablesSetToNull, 'checkout_url');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('checkout_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['checkout_url'] = $checkout_url;

        return $this;
    }

    /**
     * Gets checkout_expires_at
     *
     * @return string|null
     */
    public function getCheckoutExpiresAt()
    {
        return $this->container['checkout_expires_at'];
    }

    /**
     * Sets checkout_expires_at
     *
     * @param string|null $checkout_expires_at checkout_expires_at
     *
     * @return self
     */
    public function setCheckoutExpiresAt($checkout_expires_at)
    {
        if (is_null($checkout_expires_at)) {
            array_push($this->openAPINullablesSetToNull, 'checkout_expires_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('checkout_expires_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['checkout_expires_at'] = $checkout_expires_at;

        return $this;
    }

    /**
     * Gets checkout_success_url
     *
     * @return string|null
     */
    public function getCheckoutSuccessUrl()
    {
        return $this->container['checkout_success_url'];
    }

    /**
     * Sets checkout_success_url
     *
     * @param string|null $checkout_success_url checkout_success_url
     *
     * @return self
     */
    public function setCheckoutSuccessUrl($checkout_success_url)
    {
        if (is_null($checkout_success_url)) {
            array_push($this->openAPINullablesSetToNull, 'checkout_success_url');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('checkout_success_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['checkout_success_url'] = $checkout_success_url;

        return $this;
    }

    /**
     * Gets checkout_cancel_url
     *
     * @return string|null
     */
    public function getCheckoutCancelUrl()
    {
        return $this->container['checkout_cancel_url'];
    }

    /**
     * Sets checkout_cancel_url
     *
     * @param string|null $checkout_cancel_url checkout_cancel_url
     *
     * @return self
     */
    public function setCheckoutCancelUrl($checkout_cancel_url)
    {
        if (is_null($checkout_cancel_url)) {
            array_push($this->openAPINullablesSetToNull, 'checkout_cancel_url');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('checkout_cancel_url', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['checkout_cancel_url'] = $checkout_cancel_url;

        return $this;
    }

    /**
     * Gets checkout_allowed_methods
     *
     * @return string[]|null
     */
    public function getCheckoutAllowedMethods()
    {
        return $this->container['checkout_allowed_methods'];
    }

    /**
     * Sets checkout_allowed_methods
     *
     * @param string[]|null $checkout_allowed_methods checkout_allowed_methods
     *
     * @return self
     */
    public function setCheckoutAllowedMethods($checkout_allowed_methods)
    {
        if (is_null($checkout_allowed_methods)) {
            array_push($this->openAPINullablesSetToNull, 'checkout_allowed_methods');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('checkout_allowed_methods', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['checkout_allowed_methods'] = $checkout_allowed_methods;

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
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets sync_status
     *
     * @return string
     */
    public function getSyncStatus()
    {
        return $this->container['sync_status'];
    }

    /**
     * Sets sync_status
     *
     * @param string $sync_status sync_status
     *
     * @return self
     */
    public function setSyncStatus($sync_status)
    {
        if (is_null($sync_status)) {
            throw new \InvalidArgumentException('non-nullable sync_status cannot be null');
        }
        $this->container['sync_status'] = $sync_status;

        return $this;
    }

    /**
     * Gets idempotency_key
     *
     * @return string
     */
    public function getIdempotencyKey()
    {
        return $this->container['idempotency_key'];
    }

    /**
     * Sets idempotency_key
     *
     * @param string $idempotency_key idempotency_key
     *
     * @return self
     */
    public function setIdempotencyKey($idempotency_key)
    {
        if (is_null($idempotency_key)) {
            throw new \InvalidArgumentException('non-nullable idempotency_key cannot be null');
        }
        $this->container['idempotency_key'] = $idempotency_key;

        return $this;
    }

    /**
     * Gets payload_fingerprint
     *
     * @return string
     */
    public function getPayloadFingerprint()
    {
        return $this->container['payload_fingerprint'];
    }

    /**
     * Sets payload_fingerprint
     *
     * @param string $payload_fingerprint payload_fingerprint
     *
     * @return self
     */
    public function setPayloadFingerprint($payload_fingerprint)
    {
        if (is_null($payload_fingerprint)) {
            throw new \InvalidArgumentException('non-nullable payload_fingerprint cannot be null');
        }
        $this->container['payload_fingerprint'] = $payload_fingerprint;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at created_at
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
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string $updated_at updated_at
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


