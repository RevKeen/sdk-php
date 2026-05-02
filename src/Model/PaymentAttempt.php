<?php
/**
 * PaymentAttempt
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
 * PaymentAttempt Class Doc Comment
 *
 * @category Class
 * @description A record of an individual payment processing attempt, including gateway response codes, AVS/CVV results, and retry metadata.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentAttempt implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentAttempt';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'public_id' => 'string',
        'gateway_order_id' => 'string',
        'gateway_transaction_id' => 'string',
        'payment_id' => 'string',
        'invoice_id' => 'string',
        'subscription_id' => 'string',
        'checkout_session_id' => 'string',
        'billing_run_id' => 'string',
        'gateway' => 'string',
        'gateway_code' => 'string',
        'gateway_message' => 'string',
        'category' => 'string',
        'severity' => 'string',
        'retryability' => 'string',
        'customer_action' => 'string',
        'merchant_action' => 'string',
        'subscription_directive' => 'string',
        'safe_customer_message_key' => 'string',
        'decline_type' => 'string',
        'attempt_status' => 'string',
        'amount_cents' => 'int',
        'currency' => 'string',
        'payment_method_last4' => 'string',
        'payment_method_brand' => 'string',
        'attempt_number' => 'int',
        'retry_attempt_number' => 'int',
        'max_retry_attempts' => 'int',
        'next_retry_at' => '\DateTime',
        'is_scheduled_retry' => 'bool',
        'is_manual_retry' => 'bool',
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
        'public_id' => null,
        'gateway_order_id' => null,
        'gateway_transaction_id' => null,
        'payment_id' => 'uuid',
        'invoice_id' => 'uuid',
        'subscription_id' => 'uuid',
        'checkout_session_id' => 'uuid',
        'billing_run_id' => 'uuid',
        'gateway' => null,
        'gateway_code' => null,
        'gateway_message' => null,
        'category' => null,
        'severity' => null,
        'retryability' => null,
        'customer_action' => null,
        'merchant_action' => null,
        'subscription_directive' => null,
        'safe_customer_message_key' => null,
        'decline_type' => null,
        'attempt_status' => null,
        'amount_cents' => null,
        'currency' => null,
        'payment_method_last4' => null,
        'payment_method_brand' => null,
        'attempt_number' => null,
        'retry_attempt_number' => null,
        'max_retry_attempts' => null,
        'next_retry_at' => 'date-time',
        'is_scheduled_retry' => null,
        'is_manual_retry' => null,
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
        'public_id' => true,
        'gateway_order_id' => true,
        'gateway_transaction_id' => true,
        'payment_id' => true,
        'invoice_id' => true,
        'subscription_id' => true,
        'checkout_session_id' => true,
        'billing_run_id' => true,
        'gateway' => false,
        'gateway_code' => false,
        'gateway_message' => false,
        'category' => false,
        'severity' => false,
        'retryability' => false,
        'customer_action' => false,
        'merchant_action' => false,
        'subscription_directive' => false,
        'safe_customer_message_key' => false,
        'decline_type' => true,
        'attempt_status' => false,
        'amount_cents' => true,
        'currency' => true,
        'payment_method_last4' => true,
        'payment_method_brand' => true,
        'attempt_number' => false,
        'retry_attempt_number' => false,
        'max_retry_attempts' => true,
        'next_retry_at' => true,
        'is_scheduled_retry' => false,
        'is_manual_retry' => false,
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
        'public_id' => 'public_id',
        'gateway_order_id' => 'gateway_order_id',
        'gateway_transaction_id' => 'gateway_transaction_id',
        'payment_id' => 'payment_id',
        'invoice_id' => 'invoice_id',
        'subscription_id' => 'subscription_id',
        'checkout_session_id' => 'checkout_session_id',
        'billing_run_id' => 'billing_run_id',
        'gateway' => 'gateway',
        'gateway_code' => 'gateway_code',
        'gateway_message' => 'gateway_message',
        'category' => 'category',
        'severity' => 'severity',
        'retryability' => 'retryability',
        'customer_action' => 'customer_action',
        'merchant_action' => 'merchant_action',
        'subscription_directive' => 'subscription_directive',
        'safe_customer_message_key' => 'safe_customer_message_key',
        'decline_type' => 'decline_type',
        'attempt_status' => 'attempt_status',
        'amount_cents' => 'amount_cents',
        'currency' => 'currency',
        'payment_method_last4' => 'payment_method_last4',
        'payment_method_brand' => 'payment_method_brand',
        'attempt_number' => 'attempt_number',
        'retry_attempt_number' => 'retry_attempt_number',
        'max_retry_attempts' => 'max_retry_attempts',
        'next_retry_at' => 'next_retry_at',
        'is_scheduled_retry' => 'is_scheduled_retry',
        'is_manual_retry' => 'is_manual_retry',
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
        'public_id' => 'setPublicId',
        'gateway_order_id' => 'setGatewayOrderId',
        'gateway_transaction_id' => 'setGatewayTransactionId',
        'payment_id' => 'setPaymentId',
        'invoice_id' => 'setInvoiceId',
        'subscription_id' => 'setSubscriptionId',
        'checkout_session_id' => 'setCheckoutSessionId',
        'billing_run_id' => 'setBillingRunId',
        'gateway' => 'setGateway',
        'gateway_code' => 'setGatewayCode',
        'gateway_message' => 'setGatewayMessage',
        'category' => 'setCategory',
        'severity' => 'setSeverity',
        'retryability' => 'setRetryability',
        'customer_action' => 'setCustomerAction',
        'merchant_action' => 'setMerchantAction',
        'subscription_directive' => 'setSubscriptionDirective',
        'safe_customer_message_key' => 'setSafeCustomerMessageKey',
        'decline_type' => 'setDeclineType',
        'attempt_status' => 'setAttemptStatus',
        'amount_cents' => 'setAmountCents',
        'currency' => 'setCurrency',
        'payment_method_last4' => 'setPaymentMethodLast4',
        'payment_method_brand' => 'setPaymentMethodBrand',
        'attempt_number' => 'setAttemptNumber',
        'retry_attempt_number' => 'setRetryAttemptNumber',
        'max_retry_attempts' => 'setMaxRetryAttempts',
        'next_retry_at' => 'setNextRetryAt',
        'is_scheduled_retry' => 'setIsScheduledRetry',
        'is_manual_retry' => 'setIsManualRetry',
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
        'public_id' => 'getPublicId',
        'gateway_order_id' => 'getGatewayOrderId',
        'gateway_transaction_id' => 'getGatewayTransactionId',
        'payment_id' => 'getPaymentId',
        'invoice_id' => 'getInvoiceId',
        'subscription_id' => 'getSubscriptionId',
        'checkout_session_id' => 'getCheckoutSessionId',
        'billing_run_id' => 'getBillingRunId',
        'gateway' => 'getGateway',
        'gateway_code' => 'getGatewayCode',
        'gateway_message' => 'getGatewayMessage',
        'category' => 'getCategory',
        'severity' => 'getSeverity',
        'retryability' => 'getRetryability',
        'customer_action' => 'getCustomerAction',
        'merchant_action' => 'getMerchantAction',
        'subscription_directive' => 'getSubscriptionDirective',
        'safe_customer_message_key' => 'getSafeCustomerMessageKey',
        'decline_type' => 'getDeclineType',
        'attempt_status' => 'getAttemptStatus',
        'amount_cents' => 'getAmountCents',
        'currency' => 'getCurrency',
        'payment_method_last4' => 'getPaymentMethodLast4',
        'payment_method_brand' => 'getPaymentMethodBrand',
        'attempt_number' => 'getAttemptNumber',
        'retry_attempt_number' => 'getRetryAttemptNumber',
        'max_retry_attempts' => 'getMaxRetryAttempts',
        'next_retry_at' => 'getNextRetryAt',
        'is_scheduled_retry' => 'getIsScheduledRetry',
        'is_manual_retry' => 'getIsManualRetry',
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

    public const CATEGORY_APPROVED = 'approved';
    public const CATEGORY_GENERIC_DECLINE = 'generic_decline';
    public const CATEGORY_INSUFFICIENT_FUNDS = 'insufficient_funds';
    public const CATEGORY_OVER_LIMIT = 'over_limit';
    public const CATEGORY_EXPIRED_CARD = 'expired_card';
    public const CATEGORY_INVALID_CARD_NUMBER = 'invalid_card_number';
    public const CATEGORY_INVALID_CVV = 'invalid_cvv';
    public const CATEGORY_INVALID_EXPIRY = 'invalid_expiry';
    public const CATEGORY_INVALID_PIN = 'invalid_pin';
    public const CATEGORY_TRANSACTION_NOT_ALLOWED = 'transaction_not_allowed';
    public const CATEGORY_CALL_ISSUER = 'call_issuer';
    public const CATEGORY_INCORRECT_PAYMENT_INFO = 'incorrect_payment_info';
    public const CATEGORY_LOST_OR_STOLEN = 'lost_or_stolen';
    public const CATEGORY_PICKUP_CARD = 'pickup_card';
    public const CATEGORY_SUSPECTED_FRAUD = 'suspected_fraud';
    public const CATEGORY_RESTRICTED_CARD = 'restricted_card';
    public const CATEGORY_STOP_ALL_RECURRING = 'stop_all_recurring';
    public const CATEGORY_STOP_THIS_PROGRAM = 'stop_this_program';
    public const CATEGORY_UPDATE_CARDHOLDER_DATA = 'update_cardholder_data';
    public const CATEGORY_PROCESSOR_ERROR = 'processor_error';
    public const CATEGORY_GATEWAY_ERROR = 'gateway_error';
    public const CATEGORY_COMMUNICATION_ERROR = 'communication_error';
    public const CATEGORY_MERCHANT_CONFIG_ERROR = 'merchant_config_error';
    public const CATEGORY_MERCHANT_INACTIVE = 'merchant_inactive';
    public const CATEGORY_ISSUER_UNAVAILABLE = 'issuer_unavailable';
    public const CATEGORY_DUPLICATE_TRANSACTION = 'duplicate_transaction';
    public const CATEGORY_INVALID_TRANSACTION = 'invalid_transaction';
    public const CATEGORY_UNSUPPORTED_CARD = 'unsupported_card';
    public const CATEGORY_FEATURE_NOT_AVAILABLE = 'feature_not_available';
    public const CATEGORY_AUTHENTICATION_REQUIRED = 'authentication_required';
    public const SEVERITY_INFO = 'info';
    public const SEVERITY_WARN = 'warn';
    public const SEVERITY_ERROR = 'error';
    public const RETRYABILITY_RETRY_NOW = 'retry_now';
    public const RETRYABILITY_RETRY_LATER = 'retry_later';
    public const RETRYABILITY_DO_NOT_RETRY = 'do_not_retry';
    public const CUSTOMER_ACTION_TRY_AGAIN = 'try_again';
    public const CUSTOMER_ACTION_USE_OTHER_METHOD = 'use_other_method';
    public const CUSTOMER_ACTION_UPDATE_CARD = 'update_card';
    public const CUSTOMER_ACTION_CONTACT_BANK = 'contact_bank';
    public const CUSTOMER_ACTION_CONTACT_MERCHANT = 'contact_merchant';
    public const CUSTOMER_ACTION_NONE = 'none';
    public const MERCHANT_ACTION_NONE = 'none';
    public const MERCHANT_ACTION_COLLECT_NEW_PM = 'collect_new_pm';
    public const MERCHANT_ACTION_FIX_CONFIG = 'fix_config';
    public const MERCHANT_ACTION_CONTACT_SUPPORT = 'contact_support';
    public const MERCHANT_ACTION_FRAUD_REVIEW = 'fraud_review';
    public const MERCHANT_ACTION_SCHEDULE_RETRY = 'schedule_retry';
    public const MERCHANT_ACTION_CONTACT_BANK = 'contact_bank';
    public const MERCHANT_ACTION_STOP_RECURRING = 'stop_recurring';
    public const SUBSCRIPTION_DIRECTIVE_NONE = 'none';
    public const SUBSCRIPTION_DIRECTIVE_STOP_ALL = 'stop_all';
    public const SUBSCRIPTION_DIRECTIVE_STOP_PROGRAM = 'stop_program';
    public const SUBSCRIPTION_DIRECTIVE_UPDATE_CARDHOLDER_DATA = 'update_cardholder_data';
    public const DECLINE_TYPE_SOFT = 'soft';
    public const DECLINE_TYPE_HARD = 'hard';
    public const ATTEMPT_STATUS_PENDING = 'pending';
    public const ATTEMPT_STATUS_SUCCEEDED = 'succeeded';
    public const ATTEMPT_STATUS_FAILED = 'failed';
    public const ATTEMPT_STATUS_CANCELED = 'canceled';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCategoryAllowableValues()
    {
        return [
            self::CATEGORY_APPROVED,
            self::CATEGORY_GENERIC_DECLINE,
            self::CATEGORY_INSUFFICIENT_FUNDS,
            self::CATEGORY_OVER_LIMIT,
            self::CATEGORY_EXPIRED_CARD,
            self::CATEGORY_INVALID_CARD_NUMBER,
            self::CATEGORY_INVALID_CVV,
            self::CATEGORY_INVALID_EXPIRY,
            self::CATEGORY_INVALID_PIN,
            self::CATEGORY_TRANSACTION_NOT_ALLOWED,
            self::CATEGORY_CALL_ISSUER,
            self::CATEGORY_INCORRECT_PAYMENT_INFO,
            self::CATEGORY_LOST_OR_STOLEN,
            self::CATEGORY_PICKUP_CARD,
            self::CATEGORY_SUSPECTED_FRAUD,
            self::CATEGORY_RESTRICTED_CARD,
            self::CATEGORY_STOP_ALL_RECURRING,
            self::CATEGORY_STOP_THIS_PROGRAM,
            self::CATEGORY_UPDATE_CARDHOLDER_DATA,
            self::CATEGORY_PROCESSOR_ERROR,
            self::CATEGORY_GATEWAY_ERROR,
            self::CATEGORY_COMMUNICATION_ERROR,
            self::CATEGORY_MERCHANT_CONFIG_ERROR,
            self::CATEGORY_MERCHANT_INACTIVE,
            self::CATEGORY_ISSUER_UNAVAILABLE,
            self::CATEGORY_DUPLICATE_TRANSACTION,
            self::CATEGORY_INVALID_TRANSACTION,
            self::CATEGORY_UNSUPPORTED_CARD,
            self::CATEGORY_FEATURE_NOT_AVAILABLE,
            self::CATEGORY_AUTHENTICATION_REQUIRED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSeverityAllowableValues()
    {
        return [
            self::SEVERITY_INFO,
            self::SEVERITY_WARN,
            self::SEVERITY_ERROR,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRetryabilityAllowableValues()
    {
        return [
            self::RETRYABILITY_RETRY_NOW,
            self::RETRYABILITY_RETRY_LATER,
            self::RETRYABILITY_DO_NOT_RETRY,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCustomerActionAllowableValues()
    {
        return [
            self::CUSTOMER_ACTION_TRY_AGAIN,
            self::CUSTOMER_ACTION_USE_OTHER_METHOD,
            self::CUSTOMER_ACTION_UPDATE_CARD,
            self::CUSTOMER_ACTION_CONTACT_BANK,
            self::CUSTOMER_ACTION_CONTACT_MERCHANT,
            self::CUSTOMER_ACTION_NONE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMerchantActionAllowableValues()
    {
        return [
            self::MERCHANT_ACTION_NONE,
            self::MERCHANT_ACTION_COLLECT_NEW_PM,
            self::MERCHANT_ACTION_FIX_CONFIG,
            self::MERCHANT_ACTION_CONTACT_SUPPORT,
            self::MERCHANT_ACTION_FRAUD_REVIEW,
            self::MERCHANT_ACTION_SCHEDULE_RETRY,
            self::MERCHANT_ACTION_CONTACT_BANK,
            self::MERCHANT_ACTION_STOP_RECURRING,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSubscriptionDirectiveAllowableValues()
    {
        return [
            self::SUBSCRIPTION_DIRECTIVE_NONE,
            self::SUBSCRIPTION_DIRECTIVE_STOP_ALL,
            self::SUBSCRIPTION_DIRECTIVE_STOP_PROGRAM,
            self::SUBSCRIPTION_DIRECTIVE_UPDATE_CARDHOLDER_DATA,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeclineTypeAllowableValues()
    {
        return [
            self::DECLINE_TYPE_SOFT,
            self::DECLINE_TYPE_HARD,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAttemptStatusAllowableValues()
    {
        return [
            self::ATTEMPT_STATUS_PENDING,
            self::ATTEMPT_STATUS_SUCCEEDED,
            self::ATTEMPT_STATUS_FAILED,
            self::ATTEMPT_STATUS_CANCELED,
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
        $this->setIfExists('public_id', $data ?? [], null);
        $this->setIfExists('gateway_order_id', $data ?? [], null);
        $this->setIfExists('gateway_transaction_id', $data ?? [], null);
        $this->setIfExists('payment_id', $data ?? [], null);
        $this->setIfExists('invoice_id', $data ?? [], null);
        $this->setIfExists('subscription_id', $data ?? [], null);
        $this->setIfExists('checkout_session_id', $data ?? [], null);
        $this->setIfExists('billing_run_id', $data ?? [], null);
        $this->setIfExists('gateway', $data ?? [], null);
        $this->setIfExists('gateway_code', $data ?? [], null);
        $this->setIfExists('gateway_message', $data ?? [], null);
        $this->setIfExists('category', $data ?? [], null);
        $this->setIfExists('severity', $data ?? [], null);
        $this->setIfExists('retryability', $data ?? [], null);
        $this->setIfExists('customer_action', $data ?? [], null);
        $this->setIfExists('merchant_action', $data ?? [], null);
        $this->setIfExists('subscription_directive', $data ?? [], null);
        $this->setIfExists('safe_customer_message_key', $data ?? [], null);
        $this->setIfExists('decline_type', $data ?? [], null);
        $this->setIfExists('attempt_status', $data ?? [], null);
        $this->setIfExists('amount_cents', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('payment_method_last4', $data ?? [], null);
        $this->setIfExists('payment_method_brand', $data ?? [], null);
        $this->setIfExists('attempt_number', $data ?? [], null);
        $this->setIfExists('retry_attempt_number', $data ?? [], null);
        $this->setIfExists('max_retry_attempts', $data ?? [], null);
        $this->setIfExists('next_retry_at', $data ?? [], null);
        $this->setIfExists('is_scheduled_retry', $data ?? [], null);
        $this->setIfExists('is_manual_retry', $data ?? [], null);
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
        if ($this->container['public_id'] === null && !$this->isNullableSetToNull('public_id')) {
            $invalidProperties[] = "'public_id' can't be null";
        }
        if ($this->container['gateway_order_id'] === null && !$this->isNullableSetToNull('gateway_order_id')) {
            $invalidProperties[] = "'gateway_order_id' can't be null";
        }
        if ($this->container['gateway_transaction_id'] === null && !$this->isNullableSetToNull('gateway_transaction_id')) {
            $invalidProperties[] = "'gateway_transaction_id' can't be null";
        }
        if ($this->container['payment_id'] === null && !$this->isNullableSetToNull('payment_id')) {
            $invalidProperties[] = "'payment_id' can't be null";
        }
        if ($this->container['invoice_id'] === null && !$this->isNullableSetToNull('invoice_id')) {
            $invalidProperties[] = "'invoice_id' can't be null";
        }
        if ($this->container['subscription_id'] === null && !$this->isNullableSetToNull('subscription_id')) {
            $invalidProperties[] = "'subscription_id' can't be null";
        }
        if ($this->container['checkout_session_id'] === null && !$this->isNullableSetToNull('checkout_session_id')) {
            $invalidProperties[] = "'checkout_session_id' can't be null";
        }
        if ($this->container['billing_run_id'] === null && !$this->isNullableSetToNull('billing_run_id')) {
            $invalidProperties[] = "'billing_run_id' can't be null";
        }
        if ($this->container['gateway'] === null) {
            $invalidProperties[] = "'gateway' can't be null";
        }
        if ($this->container['gateway_code'] === null) {
            $invalidProperties[] = "'gateway_code' can't be null";
        }
        if ($this->container['gateway_message'] === null) {
            $invalidProperties[] = "'gateway_message' can't be null";
        }
        if ($this->container['category'] === null) {
            $invalidProperties[] = "'category' can't be null";
        }
        $allowedValues = $this->getCategoryAllowableValues();
        if (!is_null($this->container['category']) && !in_array($this->container['category'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'category', must be one of '%s'",
                $this->container['category'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['severity'] === null) {
            $invalidProperties[] = "'severity' can't be null";
        }
        $allowedValues = $this->getSeverityAllowableValues();
        if (!is_null($this->container['severity']) && !in_array($this->container['severity'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'severity', must be one of '%s'",
                $this->container['severity'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['retryability'] === null) {
            $invalidProperties[] = "'retryability' can't be null";
        }
        $allowedValues = $this->getRetryabilityAllowableValues();
        if (!is_null($this->container['retryability']) && !in_array($this->container['retryability'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'retryability', must be one of '%s'",
                $this->container['retryability'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['customer_action'] === null) {
            $invalidProperties[] = "'customer_action' can't be null";
        }
        $allowedValues = $this->getCustomerActionAllowableValues();
        if (!is_null($this->container['customer_action']) && !in_array($this->container['customer_action'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'customer_action', must be one of '%s'",
                $this->container['customer_action'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['merchant_action'] === null) {
            $invalidProperties[] = "'merchant_action' can't be null";
        }
        $allowedValues = $this->getMerchantActionAllowableValues();
        if (!is_null($this->container['merchant_action']) && !in_array($this->container['merchant_action'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'merchant_action', must be one of '%s'",
                $this->container['merchant_action'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['subscription_directive'] === null) {
            $invalidProperties[] = "'subscription_directive' can't be null";
        }
        $allowedValues = $this->getSubscriptionDirectiveAllowableValues();
        if (!is_null($this->container['subscription_directive']) && !in_array($this->container['subscription_directive'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'subscription_directive', must be one of '%s'",
                $this->container['subscription_directive'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['safe_customer_message_key'] === null) {
            $invalidProperties[] = "'safe_customer_message_key' can't be null";
        }
        if ($this->container['decline_type'] === null && !$this->isNullableSetToNull('decline_type')) {
            $invalidProperties[] = "'decline_type' can't be null";
        }
        $allowedValues = $this->getDeclineTypeAllowableValues();
        if (!is_null($this->container['decline_type']) && !in_array($this->container['decline_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'decline_type', must be one of '%s'",
                $this->container['decline_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['attempt_status'] === null) {
            $invalidProperties[] = "'attempt_status' can't be null";
        }
        $allowedValues = $this->getAttemptStatusAllowableValues();
        if (!is_null($this->container['attempt_status']) && !in_array($this->container['attempt_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'attempt_status', must be one of '%s'",
                $this->container['attempt_status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['amount_cents'] === null && !$this->isNullableSetToNull('amount_cents')) {
            $invalidProperties[] = "'amount_cents' can't be null";
        }
        if ($this->container['currency'] === null && !$this->isNullableSetToNull('currency')) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['payment_method_last4'] === null && !$this->isNullableSetToNull('payment_method_last4')) {
            $invalidProperties[] = "'payment_method_last4' can't be null";
        }
        if ($this->container['payment_method_brand'] === null && !$this->isNullableSetToNull('payment_method_brand')) {
            $invalidProperties[] = "'payment_method_brand' can't be null";
        }
        if ($this->container['attempt_number'] === null) {
            $invalidProperties[] = "'attempt_number' can't be null";
        }
        if ($this->container['retry_attempt_number'] === null) {
            $invalidProperties[] = "'retry_attempt_number' can't be null";
        }
        if ($this->container['max_retry_attempts'] === null && !$this->isNullableSetToNull('max_retry_attempts')) {
            $invalidProperties[] = "'max_retry_attempts' can't be null";
        }
        if ($this->container['next_retry_at'] === null && !$this->isNullableSetToNull('next_retry_at')) {
            $invalidProperties[] = "'next_retry_at' can't be null";
        }
        if ($this->container['is_scheduled_retry'] === null) {
            $invalidProperties[] = "'is_scheduled_retry' can't be null";
        }
        if ($this->container['is_manual_retry'] === null) {
            $invalidProperties[] = "'is_manual_retry' can't be null";
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
     * @param string $id Unique identifier for the payment attempt
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
     * @return string|null
     */
    public function getPublicId()
    {
        return $this->container['public_id'];
    }

    /**
     * Sets public_id
     *
     * @param string|null $public_id External reference ID (payatt_xxx format). Used as order_id in gateway requests.
     *
     * @return self
     */
    public function setPublicId($public_id)
    {
        if (is_null($public_id)) {
            array_push($this->openAPINullablesSetToNull, 'public_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('public_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['public_id'] = $public_id;

        return $this;
    }

    /**
     * Gets gateway_order_id
     *
     * @return string|null
     */
    public function getGatewayOrderId()
    {
        return $this->container['gateway_order_id'];
    }

    /**
     * Sets gateway_order_id
     *
     * @param string|null $gateway_order_id Order ID sent to the processor. Format: payatt_<public_id>. Primary correlation key for webhook mapping.
     *
     * @return self
     */
    public function setGatewayOrderId($gateway_order_id)
    {
        if (is_null($gateway_order_id)) {
            array_push($this->openAPINullablesSetToNull, 'gateway_order_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gateway_order_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gateway_order_id'] = $gateway_order_id;

        return $this;
    }

    /**
     * Gets gateway_transaction_id
     *
     * @return string|null
     */
    public function getGatewayTransactionId()
    {
        return $this->container['gateway_transaction_id'];
    }

    /**
     * Sets gateway_transaction_id
     *
     * @param string|null $gateway_transaction_id Processor-assigned transaction reference.
     *
     * @return self
     */
    public function setGatewayTransactionId($gateway_transaction_id)
    {
        if (is_null($gateway_transaction_id)) {
            array_push($this->openAPINullablesSetToNull, 'gateway_transaction_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gateway_transaction_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gateway_transaction_id'] = $gateway_transaction_id;

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
     * @param string|null $payment_id Logical payment (PaymentIntent) this attempt belongs to
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
     * @param string|null $invoice_id Associated invoice ID
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
     * @param string|null $subscription_id Associated subscription ID
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
     * @param string|null $checkout_session_id Associated checkout session ID
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
     * Gets billing_run_id
     *
     * @return string|null
     */
    public function getBillingRunId()
    {
        return $this->container['billing_run_id'];
    }

    /**
     * Sets billing_run_id
     *
     * @param string|null $billing_run_id Billing run ID for batch reconciliation
     *
     * @return self
     */
    public function setBillingRunId($billing_run_id)
    {
        if (is_null($billing_run_id)) {
            array_push($this->openAPINullablesSetToNull, 'billing_run_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('billing_run_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['billing_run_id'] = $billing_run_id;

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
     * @param string $gateway Name of the payment processor that handled this attempt
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
     * Gets gateway_code
     *
     * @return string
     */
    public function getGatewayCode()
    {
        return $this->container['gateway_code'];
    }

    /**
     * Sets gateway_code
     *
     * @param string $gateway_code Processor-returned response code
     *
     * @return self
     */
    public function setGatewayCode($gateway_code)
    {
        if (is_null($gateway_code)) {
            throw new \InvalidArgumentException('non-nullable gateway_code cannot be null');
        }
        $this->container['gateway_code'] = $gateway_code;

        return $this;
    }

    /**
     * Gets gateway_message
     *
     * @return string
     */
    public function getGatewayMessage()
    {
        return $this->container['gateway_message'];
    }

    /**
     * Sets gateway_message
     *
     * @param string $gateway_message Processor-returned response message
     *
     * @return self
     */
    public function setGatewayMessage($gateway_message)
    {
        if (is_null($gateway_message)) {
            throw new \InvalidArgumentException('non-nullable gateway_message cannot be null');
        }
        $this->container['gateway_message'] = $gateway_message;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string $category Normalized error category for the payment attempt
     *
     * @return self
     */
    public function setCategory($category)
    {
        if (is_null($category)) {
            throw new \InvalidArgumentException('non-nullable category cannot be null');
        }
        $allowedValues = $this->getCategoryAllowableValues();
        if (!in_array($category, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'category', must be one of '%s'",
                    $category,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets severity
     *
     * @return string
     */
    public function getSeverity()
    {
        return $this->container['severity'];
    }

    /**
     * Sets severity
     *
     * @param string $severity Severity level for logging/monitoring
     *
     * @return self
     */
    public function setSeverity($severity)
    {
        if (is_null($severity)) {
            throw new \InvalidArgumentException('non-nullable severity cannot be null');
        }
        $allowedValues = $this->getSeverityAllowableValues();
        if (!in_array($severity, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'severity', must be one of '%s'",
                    $severity,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['severity'] = $severity;

        return $this;
    }

    /**
     * Gets retryability
     *
     * @return string
     */
    public function getRetryability()
    {
        return $this->container['retryability'];
    }

    /**
     * Sets retryability
     *
     * @param string $retryability Retry behavior recommendation. retry_now: Safe to retry immediately. retry_later: Retry after delay. do_not_retry: Hard decline, don't retry.
     *
     * @return self
     */
    public function setRetryability($retryability)
    {
        if (is_null($retryability)) {
            throw new \InvalidArgumentException('non-nullable retryability cannot be null');
        }
        $allowedValues = $this->getRetryabilityAllowableValues();
        if (!in_array($retryability, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'retryability', must be one of '%s'",
                    $retryability,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['retryability'] = $retryability;

        return $this;
    }

    /**
     * Gets customer_action
     *
     * @return string
     */
    public function getCustomerAction()
    {
        return $this->container['customer_action'];
    }

    /**
     * Sets customer_action
     *
     * @param string $customer_action Recommended action for the customer
     *
     * @return self
     */
    public function setCustomerAction($customer_action)
    {
        if (is_null($customer_action)) {
            throw new \InvalidArgumentException('non-nullable customer_action cannot be null');
        }
        $allowedValues = $this->getCustomerActionAllowableValues();
        if (!in_array($customer_action, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'customer_action', must be one of '%s'",
                    $customer_action,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['customer_action'] = $customer_action;

        return $this;
    }

    /**
     * Gets merchant_action
     *
     * @return string
     */
    public function getMerchantAction()
    {
        return $this->container['merchant_action'];
    }

    /**
     * Sets merchant_action
     *
     * @param string $merchant_action Recommended action for the merchant
     *
     * @return self
     */
    public function setMerchantAction($merchant_action)
    {
        if (is_null($merchant_action)) {
            throw new \InvalidArgumentException('non-nullable merchant_action cannot be null');
        }
        $allowedValues = $this->getMerchantActionAllowableValues();
        if (!in_array($merchant_action, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'merchant_action', must be one of '%s'",
                    $merchant_action,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['merchant_action'] = $merchant_action;

        return $this;
    }

    /**
     * Gets subscription_directive
     *
     * @return string
     */
    public function getSubscriptionDirective()
    {
        return $this->container['subscription_directive'];
    }

    /**
     * Sets subscription_directive
     *
     * @param string $subscription_directive Directive for subscription handling after decline
     *
     * @return self
     */
    public function setSubscriptionDirective($subscription_directive)
    {
        if (is_null($subscription_directive)) {
            throw new \InvalidArgumentException('non-nullable subscription_directive cannot be null');
        }
        $allowedValues = $this->getSubscriptionDirectiveAllowableValues();
        if (!in_array($subscription_directive, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'subscription_directive', must be one of '%s'",
                    $subscription_directive,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['subscription_directive'] = $subscription_directive;

        return $this;
    }

    /**
     * Gets safe_customer_message_key
     *
     * @return string
     */
    public function getSafeCustomerMessageKey()
    {
        return $this->container['safe_customer_message_key'];
    }

    /**
     * Sets safe_customer_message_key
     *
     * @param string $safe_customer_message_key Template key for customer-facing message
     *
     * @return self
     */
    public function setSafeCustomerMessageKey($safe_customer_message_key)
    {
        if (is_null($safe_customer_message_key)) {
            throw new \InvalidArgumentException('non-nullable safe_customer_message_key cannot be null');
        }
        $this->container['safe_customer_message_key'] = $safe_customer_message_key;

        return $this;
    }

    /**
     * Gets decline_type
     *
     * @return string|null
     */
    public function getDeclineType()
    {
        return $this->container['decline_type'];
    }

    /**
     * Sets decline_type
     *
     * @param string|null $decline_type Decline classification. soft: May succeed on retry. hard: Will not succeed on retry.
     *
     * @return self
     */
    public function setDeclineType($decline_type)
    {
        if (is_null($decline_type)) {
            array_push($this->openAPINullablesSetToNull, 'decline_type');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('decline_type', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getDeclineTypeAllowableValues();
        if (!is_null($decline_type) && !in_array($decline_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'decline_type', must be one of '%s'",
                    $decline_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['decline_type'] = $decline_type;

        return $this;
    }

    /**
     * Gets attempt_status
     *
     * @return string
     */
    public function getAttemptStatus()
    {
        return $this->container['attempt_status'];
    }

    /**
     * Sets attempt_status
     *
     * @param string $attempt_status Final outcome status of the attempt
     *
     * @return self
     */
    public function setAttemptStatus($attempt_status)
    {
        if (is_null($attempt_status)) {
            throw new \InvalidArgumentException('non-nullable attempt_status cannot be null');
        }
        $allowedValues = $this->getAttemptStatusAllowableValues();
        if (!in_array($attempt_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'attempt_status', must be one of '%s'",
                    $attempt_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['attempt_status'] = $attempt_status;

        return $this;
    }

    /**
     * Gets amount_cents
     *
     * @return int|null
     */
    public function getAmountCents()
    {
        return $this->container['amount_cents'];
    }

    /**
     * Sets amount_cents
     *
     * @param int|null $amount_cents Payment amount in cents
     *
     * @return self
     */
    public function setAmountCents($amount_cents)
    {
        if (is_null($amount_cents)) {
            array_push($this->openAPINullablesSetToNull, 'amount_cents');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('amount_cents', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['amount_cents'] = $amount_cents;

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
            array_push($this->openAPINullablesSetToNull, 'currency');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('currency', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets payment_method_last4
     *
     * @return string|null
     */
    public function getPaymentMethodLast4()
    {
        return $this->container['payment_method_last4'];
    }

    /**
     * Sets payment_method_last4
     *
     * @param string|null $payment_method_last4 Last 4 digits of card
     *
     * @return self
     */
    public function setPaymentMethodLast4($payment_method_last4)
    {
        if (is_null($payment_method_last4)) {
            array_push($this->openAPINullablesSetToNull, 'payment_method_last4');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('payment_method_last4', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['payment_method_last4'] = $payment_method_last4;

        return $this;
    }

    /**
     * Gets payment_method_brand
     *
     * @return string|null
     */
    public function getPaymentMethodBrand()
    {
        return $this->container['payment_method_brand'];
    }

    /**
     * Sets payment_method_brand
     *
     * @param string|null $payment_method_brand Card brand (visa, mastercard, etc.)
     *
     * @return self
     */
    public function setPaymentMethodBrand($payment_method_brand)
    {
        if (is_null($payment_method_brand)) {
            array_push($this->openAPINullablesSetToNull, 'payment_method_brand');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('payment_method_brand', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['payment_method_brand'] = $payment_method_brand;

        return $this;
    }

    /**
     * Gets attempt_number
     *
     * @return int
     */
    public function getAttemptNumber()
    {
        return $this->container['attempt_number'];
    }

    /**
     * Sets attempt_number
     *
     * @param int $attempt_number Attempt sequence number (1 = first attempt)
     *
     * @return self
     */
    public function setAttemptNumber($attempt_number)
    {
        if (is_null($attempt_number)) {
            throw new \InvalidArgumentException('non-nullable attempt_number cannot be null');
        }
        $this->container['attempt_number'] = $attempt_number;

        return $this;
    }

    /**
     * Gets retry_attempt_number
     *
     * @return int
     */
    public function getRetryAttemptNumber()
    {
        return $this->container['retry_attempt_number'];
    }

    /**
     * Sets retry_attempt_number
     *
     * @param int $retry_attempt_number Legacy retry attempt number
     *
     * @return self
     */
    public function setRetryAttemptNumber($retry_attempt_number)
    {
        if (is_null($retry_attempt_number)) {
            throw new \InvalidArgumentException('non-nullable retry_attempt_number cannot be null');
        }
        $this->container['retry_attempt_number'] = $retry_attempt_number;

        return $this;
    }

    /**
     * Gets max_retry_attempts
     *
     * @return int|null
     */
    public function getMaxRetryAttempts()
    {
        return $this->container['max_retry_attempts'];
    }

    /**
     * Sets max_retry_attempts
     *
     * @param int|null $max_retry_attempts Maximum retry attempts allowed
     *
     * @return self
     */
    public function setMaxRetryAttempts($max_retry_attempts)
    {
        if (is_null($max_retry_attempts)) {
            array_push($this->openAPINullablesSetToNull, 'max_retry_attempts');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('max_retry_attempts', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['max_retry_attempts'] = $max_retry_attempts;

        return $this;
    }

    /**
     * Gets next_retry_at
     *
     * @return \DateTime|null
     */
    public function getNextRetryAt()
    {
        return $this->container['next_retry_at'];
    }

    /**
     * Sets next_retry_at
     *
     * @param \DateTime|null $next_retry_at Next scheduled retry timestamp
     *
     * @return self
     */
    public function setNextRetryAt($next_retry_at)
    {
        if (is_null($next_retry_at)) {
            array_push($this->openAPINullablesSetToNull, 'next_retry_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('next_retry_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['next_retry_at'] = $next_retry_at;

        return $this;
    }

    /**
     * Gets is_scheduled_retry
     *
     * @return bool
     */
    public function getIsScheduledRetry()
    {
        return $this->container['is_scheduled_retry'];
    }

    /**
     * Sets is_scheduled_retry
     *
     * @param bool $is_scheduled_retry Whether this was a scheduled retry
     *
     * @return self
     */
    public function setIsScheduledRetry($is_scheduled_retry)
    {
        if (is_null($is_scheduled_retry)) {
            throw new \InvalidArgumentException('non-nullable is_scheduled_retry cannot be null');
        }
        $this->container['is_scheduled_retry'] = $is_scheduled_retry;

        return $this;
    }

    /**
     * Gets is_manual_retry
     *
     * @return bool
     */
    public function getIsManualRetry()
    {
        return $this->container['is_manual_retry'];
    }

    /**
     * Sets is_manual_retry
     *
     * @param bool $is_manual_retry Whether this was a manual retry
     *
     * @return self
     */
    public function setIsManualRetry($is_manual_retry)
    {
        if (is_null($is_manual_retry)) {
            throw new \InvalidArgumentException('non-nullable is_manual_retry cannot be null');
        }
        $this->container['is_manual_retry'] = $is_manual_retry;

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
     * @param \DateTime $created_at When the attempt was created
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
     * @param \DateTime $updated_at When the attempt was last updated
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


