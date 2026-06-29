<?php
/**
 * WebhooksApiTest
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
 * Please update the test case below to test the endpoint.
 */

namespace RevKeen\Test\Api;

use \RevKeen\Configuration;
use \RevKeen\ApiException;
use \RevKeen\ObjectSerializer;
use PHPUnit\Framework\TestCase;

/**
 * WebhooksApiTest Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class WebhooksApiTest extends TestCase
{

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test case for webhooksCheckoutSessionCompleted
     *
     * Checkout session completed.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCheckoutSessionExpired
     *
     * Checkout session expired.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCollectionFailed
     *
     * Collection failed.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCollectionIndemnityClaimed
     *
     * Indemnity claimed.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCollectionNoticeSent
     *
     * Advance notice sent.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCollectionScheduled
     *
     * Collection scheduled.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCollectionSucceeded
     *
     * Collection succeeded.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCreditNoteCreated
     *
     * Credit note created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCreditNoteIssued
     *
     * Credit note issued.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCreditNoteVoided
     *
     * Credit note voided.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCustomerCreated
     *
     * Customer created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksCustomerUpdated
     *
     * Customer updated.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksInvoiceCreated
     *
     * Invoice created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksInvoiceOverdue
     *
     * Invoice overdue.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksInvoicePaid
     *
     * Invoice paid.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMandateActivated
     *
     * Mandate activated.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMandateAuddisRejected
     *
     * Mandate rejected (AUDDIS).
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMandateCancelled
     *
     * Mandate cancelled.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMandateCreated
     *
     * Mandate created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMandateSuspended
     *
     * Mandate suspended.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMeterArchived
     *
     * Meter archived.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMeterCreated
     *
     * Meter created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMeterPriceCreated
     *
     * Meter price created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMeterPriceDeactivated
     *
     * Meter price deactivated.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMeterPriceUpdated
     *
     * Meter price updated.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksMeterUpdated
     *
     * Meter updated.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksOrderCreated
     *
     * Order created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksOrderFulfilled
     *
     * Order fulfilled.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksOrderPaid
     *
     * Order paid.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksPaymentFailed
     *
     * Payment failed.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksPaymentSucceeded
     *
     * Payment succeeded.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksRefundCreated
     *
     * Refund created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksRefundSucceeded
     *
     * Refund succeeded.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksSettlementCreated
     *
     * Settlement created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksSubscriptionActivated
     *
     * Subscription activated.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksSubscriptionCanceled
     *
     * Subscription canceled.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksSubscriptionCreated
     *
     * Subscription created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksSubscriptionRenewed
     *
     * Subscription renewed.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksTerminalPaymentCancelled
     *
     * Terminal payment cancelled.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksTerminalPaymentDeclined
     *
     * Terminal payment declined.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksTerminalPaymentError
     *
     * Terminal payment error.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksTerminalPaymentRequested
     *
     * Terminal payment requested.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksTerminalPaymentSucceeded
     *
     * Terminal payment succeeded.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksTerminalRefundSucceeded
     *
     * Terminal refund succeeded.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksTerminalVoidSucceeded
     *
     * Terminal void succeeded.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksUsageEventIngested
     *
     * Usage event ingested.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksUsageEventRejected
     *
     * Usage event rejected.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksUsageInvoiceCreated
     *
     * Usage invoice created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksUsagePeriodFinalized
     *
     * Usage period finalized.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksUsageThresholdReached
     *
     * Usage threshold reached.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksVoidCreated
     *
     * Void created.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksVoidFailed
     *
     * Void failed.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }

    /**
     * Test case for webhooksVoidSucceeded
     *
     * Void succeeded.
     *
     */
    public function test()
    {
        // TODO: implement
        self::markTestIncomplete('Not implemented');
    }
}
