# Reference
## Invoices
<details><summary><code>$client-&gt;invoices-&gt;externalbatch($request) -> InvoicesExternalBatchResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update multiple invoices by external system ID. Supports up to 100 invoices per request with stale update protection and immutable field guardrails.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->externalbatch(
    new InvoicesExternalBatchRequest([
        'source' => 'practicehub',
        'invoices' => [
            new InvoicesExternalBatchRequestInvoicesItem([
                'externalId' => 'INV-12345',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$source:** `string` — Integration source (e.g., practicehub, wodify)
    
</dd>
</dl>

<dl>
<dd>

**$invoices:** `array` — Array of invoices to upsert (max 100)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;list($request) -> InvoiceListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List invoices with pagination and filtering.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->list(
    new InvoicesListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by invoice status
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;create($request) -> InvoiceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new invoice.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->create(
    new InvoicesCreateRequest([
        'customerUuid' => 'customer_uuid',
        'totalMinor' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerUuid:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$invoiceNumber:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$totalMinor:** `int` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$dueDate:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$customFields:** `?array` — Key-value pairs for custom fields
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionTerms:** `?SubscriptionTerms` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;retrieve($id) -> InvoiceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a single invoice by ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;delete($id) -> SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete an invoice.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;update($id, $request) -> InvoiceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing invoice.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->update(
    'id',
    new InvoicesUpdateRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$totalMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$dueDate:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionTerms:** `?InvoicesUpdateRequestSubscriptionTerms` — Subscription billing terms — set to null to remove
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;refund($id, $request) -> InvoiceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Issue a full or partial refund for a paid invoice. Emits invoice.refunded notification to customer.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->refund(
    'id',
    new InvoicesRefundRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` — Amount to refund in minor units (cents). If not provided, full refund is issued.
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Reason for the refund
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;reject($id, $request) -> InvoiceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Reject an invoice during approval workflow. Returns invoice to draft status with rejection details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->reject(
    'id',
    new InvoicesRejectRequest([
        'reason' => 'Invoice totals do not match purchase order',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `string` — Reason for rejecting the invoice (required)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;commentsList($id, $request) -> InvoiceCommentListDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List comments for an invoice. Use includeInternal=true to include internal comments (merchant only).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->commentsList(
    'id',
    new InvoicesCommentsListRequest([
        'includeInternal' => 'false',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$includeInternal:** `?string` — Set to 'true' to include internal comments (merchant-only)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;commentsAdd($id, $request) -> InvoiceCommentDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a comment to an invoice. Set isInternal to true for merchant-only comments.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->commentsAdd(
    'id',
    new InvoicesCommentsAddRequest([
        'content' => 'Payment reminder sent to customer',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$content:** `string` — The comment content
    
</dd>
</dl>

<dl>
<dd>

**$isInternal:** `?bool` — If true, comment is only visible to merchant. If false, visible to customer.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;externalUpsertbyexternalid($source, $externalId, $request) -> ExternalUpsertResponse|StaleUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update an invoice identified by external source and ID. Used by integrations (PracticeHub, Wodify) to sync invoices.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->externalUpsertbyexternalid(
    'practicehub',
    'INV-12345',
    new InvoicesExternalUpsertByExternalIdRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$source:** `string` — External source identifier (e.g., practicehub, wodify)
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` — External ID from the source system
    
</dd>
</dl>

<dl>
<dd>

**$customerExternalRef:** `?InvoicesExternalUpsertByExternalIdRequestCustomerExternalRef` 
    
</dd>
</dl>

<dl>
<dd>

**$customerUuid:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$invoiceNumber:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$totalMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$subtotalMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$taxMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$discountMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$invoiceDate:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$dueDate:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lineItems:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$notes:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>

<dl>
<dd>

**$customFields:** `?array` — Key-value pairs for custom fields
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionTerms:** `?SubscriptionTerms` 
    
</dd>
</dl>

<dl>
<dd>

**$externalUpdatedAt:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$externalType:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;finalize($id, $request) -> InvoiceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Finalizes a draft invoice, locking it for payment. Assigns invoice number and generates public token. After finalization, financial fields become immutable.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->finalize(
    'id',
    new InvoicesFinalizeRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$autoAdvance:** `?bool` — If true, automatically transitions to 'approved' status after finalization.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;void($id, $request) -> InvoiceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Voids an invoice. Only invoices without recorded payments can be voided. Use refund instead for paid invoices.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->void(
    'id',
    new InvoicesVoidRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Reason for voiding the invoice
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;send($id, $request) -> InvoiceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sends an invoice to the customer via the specified channel (email, SMS, or WhatsApp). Invoice must be approved first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->send(
    'id',
    new InvoicesSendRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$channel:** `?string` — Communication channel to send the invoice through
    
</dd>
</dl>

<dl>
<dd>

**$templateId:** `?string` — Optional custom template ID to use for the notification
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;pay($id, $request) -> InvoiceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Records a manual payment against an invoice. Use this for cash, check, bank transfer, or other offline payments.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->pay(
    'id',
    new InvoicesPayRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` — Payment amount in minor units (cents). If not provided, pays the full amount due.
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethod:** `?string` — The payment method used
    
</dd>
</dl>

<dl>
<dd>

**$reference:** `?string` — External reference (check number, transfer ID, etc.)
    
</dd>
</dl>

<dl>
<dd>

**$notes:** `?string` — Additional notes about the payment
    
</dd>
</dl>

<dl>
<dd>

**$paidAt:** `?DateTime` — When the payment was received (defaults to now)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;creditEligibility($id) -> CreditEligibilityResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Check if an invoice is eligible for credit notes and get the maximum creditable amount.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->creditEligibility(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;creditNotesList($id) -> CreditNoteListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all credit notes issued for an invoice.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->creditNotesList(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;invoices-&gt;creditNoteIssue($id, $request) -> CreditNoteResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Issue a credit note for a paid or partially paid invoice. Use this instead of void for invoices that have received payment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->invoices->creditNoteIssue(
    'id',
    new InvoicesCreditNoteIssueRequest([
        'amountMinor' => 5000,
        'reason' => 'Service issue - partial refund for outage',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `int` — Credit amount in minor units (cents)
    
</dd>
</dl>

<dl>
<dd>

**$taxAmountMinor:** `?int` — Tax portion of the credit in minor units
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `string` — Reason for issuing the credit note
    
</dd>
</dl>

<dl>
<dd>

**$reasonCode:** `?string` — Categorized reason code for the credit note
    
</dd>
</dl>

<dl>
<dd>

**$creditMethod:** `?string` — How to apply the credit: refund to original payment method, add to customer balance, or mark as external
    
</dd>
</dl>

<dl>
<dd>

**$cancelSubscription:** `?bool` — If true, cancels the associated subscription (if any)
    
</dd>
</dl>

<dl>
<dd>

**$isProrated:** `?bool` — Whether this is a prorated credit for unused service time
    
</dd>
</dl>

<dl>
<dd>

**$prorationDaysTotal:** `?int` — Total days in billing period (for prorated credits)
    
</dd>
</dl>

<dl>
<dd>

**$prorationDaysUnused:** `?int` — Unused days being credited (for prorated credits)
    
</dd>
</dl>

<dl>
<dd>

**$idempotencyKey:** `?string` — Unique key to prevent duplicate credit notes
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## UserInvitations
<details><summary><code>$client-&gt;userInvitations-&gt;listInvitations() -> GetUserInvitationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List pending invitations for the client. Requires admin role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->userInvitations->listInvitations();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;userInvitations-&gt;inviteUser($request) -> PostUserInvitationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Invite a new user to join the client. Requires admin role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->userInvitations->inviteUser(
    new PostUserInvitationsRequest([
        'email' => 'email',
        'role' => PostUserInvitationsRequestRole::Admin->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$role:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$merchantId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;userInvitations-&gt;resendInvitation($id) -> PostUserInvitationsIdResendResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Resend invitation email. Requires admin role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->userInvitations->resendInvitation(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;userInvitations-&gt;cancelInvitation($id) -> DeleteUserInvitationsIdResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancel/revoke invitation. Requires admin role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->userInvitations->cancelInvitation(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;userInvitations-&gt;acceptInvitation($request) -> PostUserInvitationsAcceptResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Accept invitation and complete signup. No auth required (uses invitation token).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->userInvitations->acceptInvitation(
    new PostUserInvitationsAcceptRequest([
        'invitationToken' => 'invitationToken',
        'password' => 'password',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$invitationToken:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$password:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Products
<details><summary><code>$client-&gt;products-&gt;list($request) -> ProductListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List products with pagination and optional search.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->list(
    new ProductsListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search term to filter products
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;create($request) -> ProductCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new product. Requires 'products:write' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->create(
    new CreateProductRequest([
        'productId' => 'product_id',
        'name' => 'name',
        'kind' => CreateProductRequestKind::Subscription->value,
        'pricingModel' => CreateProductRequestPricingModel::OneTime->value,
        'amountMinor' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$productId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$kind:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$pricingModel:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `int` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$interval:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$intervalCount:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$trialDays:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$usageMeterId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$slug:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$fulfillmentType:** `?string` — Fulfillment type for the product. Defaults to 'none' (service).
    
</dd>
</dl>

<dl>
<dd>

**$billingAnchorRule:** `?string` — How billing dates are calculated. same_day: Bill on same day as start. day_of_month: Bill on specific day (1-31). last_day: Bill on last day of month.
    
</dd>
</dl>

<dl>
<dd>

**$billingAnchorDay:** `?int` — Day of month (1-31) when billing_anchor_rule is 'day_of_month'
    
</dd>
</dl>

<dl>
<dd>

**$firstChargeBehavior:** `?string` — When first payment is collected. immediate: Charge on start. next_anchor: Charge on first scheduled date. prorate: Prorate until first date.
    
</dd>
</dl>

<dl>
<dd>

**$endBehavior:** `?string` — How subscription ends. until_canceled: Runs forever. fixed_payments: Ends after N billing cycles.
    
</dd>
</dl>

<dl>
<dd>

**$maxPayments:** `?int` — Max billing cycles when end_behavior is 'fixed_payments'
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;retrieve($id) -> ProductRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a product by its ID. Requires 'products:read' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->retrieve(
    'prod_123',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;update($id, $request) -> ProductUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing product. Requires 'products:write' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->update(
    'prod_123',
    new UpdateProductRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$interval:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$intervalCount:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$trialDays:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$isActive:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$isArchived:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$fulfillmentType:** `?string` — Fulfillment type for the product.
    
</dd>
</dl>

<dl>
<dd>

**$billingAnchorRule:** `?string` — How billing dates are calculated. same_day: Bill on same day as start. day_of_month: Bill on specific day (1-31). last_day: Bill on last day of month.
    
</dd>
</dl>

<dl>
<dd>

**$billingAnchorDay:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$firstChargeBehavior:** `?string` — When first payment is collected. immediate: Charge on start. next_anchor: Charge on first scheduled date. prorate: Prorate until first date.
    
</dd>
</dl>

<dl>
<dd>

**$endBehavior:** `?string` — How subscription ends. until_canceled: Runs forever. fixed_payments: Ends after N billing cycles.
    
</dd>
</dl>

<dl>
<dd>

**$maxPayments:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;externalupsert($source, $externalId, $request) -> ProductsExternalUpsertResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update a product by external system ID. Uses stale update protection.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->externalupsert(
    'practicehub',
    'prod_12345',
    new ProductsExternalUpsertRequest([
        'name' => 'Monthly Membership',
        'amountCents' => 9900,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$source:** `string` — Integration source (e.g., practicehub, wodify)
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` — External system's product ID
    
</dd>
</dl>

<dl>
<dd>

**$merchantId:** `?string` — Deprecated: merchantId is derived from API key authentication. This field is ignored.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Product name
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Product description
    
</dd>
</dl>

<dl>
<dd>

**$kind:** `?string` — Product kind - subscription or one-time
    
</dd>
</dl>

<dl>
<dd>

**$amountCents:** `int` — Price in minor units (cents)
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` — ISO 4217 currency code
    
</dd>
</dl>

<dl>
<dd>

**$isActive:** `?bool` — Whether the product is active
    
</dd>
</dl>

<dl>
<dd>

**$interval:** `?string` — Billing interval for subscriptions
    
</dd>
</dl>

<dl>
<dd>

**$intervalCount:** `?int` — Number of intervals between billings
    
</dd>
</dl>

<dl>
<dd>

**$externalUpdatedAt:** `?DateTime` — External system's last update timestamp for stale update protection
    
</dd>
</dl>

<dl>
<dd>

**$externalRef:** `?string` — Additional external reference (e.g., membership ID)
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Additional metadata from external system
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;externalbatch($request) -> ProductsExternalBatchResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update multiple products by external system ID. Supports up to 100 products per request with stale update protection.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->externalbatch(
    new ProductsExternalBatchRequest([
        'source' => 'practicehub',
        'products' => [
            new ProductsExternalBatchRequestProductsItem([
                'externalId' => 'prod_12345',
                'name' => 'Monthly Membership',
                'amountCents' => 9900,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$source:** `string` — Integration source (e.g., practicehub, wodify)
    
</dd>
</dl>

<dl>
<dd>

**$products:** `array` — Array of products to upsert (max 100)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Apps
<details><summary><code>$client-&gt;apps-&gt;installAnApp($appKey) -> PostAppsAppKeyInstallResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Install an app for the authenticated tenant. Requires 'apps:write' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->apps->installAnApp(
    'quaderno',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$appKey:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;apps-&gt;uninstallAnApp($appKey) -> DeleteAppsAppKeyInstallResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Uninstall an app for the authenticated tenant. Requires 'apps:write' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->apps->uninstallAnApp(
    'quaderno',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$appKey:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;apps-&gt;getEntitlements() -> GetAppsEntitlementsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get entitlements for the authenticated tenant. Requires 'apps:read' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->apps->getEntitlements();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Checkout Sessions
<details><summary><code>$client-&gt;checkoutSessions-&gt;checkoutSessionsCreate($request) -> CheckoutSessionCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a checkout session for an invoice or product.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->checkoutSessions->checkoutSessionsCreate(
    new CreateCheckoutSessionInput([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$invoiceId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$successUrl:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$cancelUrl:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Businesses
<details><summary><code>$client-&gt;businesses-&gt;listBusinesses($request) -> GetBusinessesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List businesses, optionally filtered by customer_id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->businesses->listBusinesses(
    new GetBusinessesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;businesses-&gt;createABusiness($request) -> PostBusinessesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new business. Requires 'businesses:write' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->businesses->createABusiness(
    new PostBusinessesRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$companyNumber:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$taxIdentifier:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingEmail:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingPhone:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingAddressLine1:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingAddressLine2:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingCity:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingPostcode:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingCountry:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;businesses-&gt;getBusinessById($id) -> GetBusinessesIdResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a business by its ID. Requires 'businesses:read' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->businesses->getBusinessById(
    'bus_123',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Clients
<details><summary><code>$client-&gt;clients-&gt;getConfiguredCurrencies($id) -> GetClientsIdConfiguredCurrenciesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get supported currencies for a client based on client_nmi_processors configuration. Requires 'clients:read' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->clients->getConfiguredCurrencies(
    'cli_123',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Entitlements
<details><summary><code>$client-&gt;entitlements-&gt;customersEntitlementsList($customerId, $request) -> CustomersEntitlementsListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all entitlements (benefits/features) for a specific customer. Includes computed access status based on subscription state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->entitlements->customersEntitlementsList(
    'customerId',
    new CustomersEntitlementsListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$includeExpired:** `?bool` — Include expired entitlements
    
</dd>
</dl>

<dl>
<dd>

**$benefitType:** `?string` — Filter by benefit type
    
</dd>
</dl>

<dl>
<dd>

**$category:** `?string` — Filter by category
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;entitlements-&gt;customersEntitlementsGrant($customerId, $request) -> CustomersEntitlementsGrantResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Grant a benefit/entitlement to a customer. Provide either benefitId or benefitKey to identify the benefit. Emits an entitlement.granted webhook event.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->entitlements->customersEntitlementsGrant(
    'customerId',
    new CustomersEntitlementsGrantRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$benefitId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$benefitKey:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$expiresAt:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;entitlements-&gt;customersEntitlementsRevokeByKey($customerId, $request) -> CustomersEntitlementsRevokeByKeyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Revoke an entitlement from a customer by benefit key. Provide benefitKey as a query parameter. Emits an entitlement.revoked webhook event.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->entitlements->customersEntitlementsRevokeByKey(
    'customerId',
    new CustomersEntitlementsRevokeByKeyRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$benefitKey:** `?string` — Revoke by benefit key instead of entitlement ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;entitlements-&gt;customersEntitlementsCheck($customerId, $request) -> CustomersEntitlementsCheckResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Check if a customer has access to a specific benefit by key. This is the primary endpoint for feature gating and licensing checks.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->entitlements->customersEntitlementsCheck(
    'customerId',
    new CustomersEntitlementsCheckRequest([
        'benefitKey' => 'benefitKey',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$benefitKey:** `string` — Benefit key to check
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;entitlements-&gt;customersEntitlementsRevokeById($customerId, $entitlementId) -> CustomersEntitlementsRevokeByIdResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Revoke a specific entitlement from a customer by entitlement ID. Emits an entitlement.revoked webhook event.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->entitlements->customersEntitlementsRevokeById(
    'customerId',
    'entitlementId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$entitlementId:** `string` — Entitlement UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Customers
<details><summary><code>$client-&gt;customers-&gt;invoicesList($customerId, $request) -> CustomersInvoicesListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all invoices for a specific customer
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->invoicesList(
    'cus_abc123',
    new CustomersInvoicesListRequest([
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of records to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination - return records after this ID
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination - return records before this ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;subscriptionsList($customerId, $request) -> CustomersSubscriptionsListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all subscriptions for a specific customer
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->subscriptionsList(
    'cus_abc123',
    new CustomersSubscriptionsListRequest([
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of records to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination - return records after this ID
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination - return records before this ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by subscription status
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;ordersList($customerId, $request) -> CustomersOrdersListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all orders for a specific customer
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->ordersList(
    'cus_abc123',
    new CustomersOrdersListRequest([
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of records to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination - return records after this ID
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination - return records before this ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by order status
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;paymentsList($customerId, $request) -> CustomersPaymentsListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all payments for a specific customer
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->paymentsList(
    'cus_abc123',
    new CustomersPaymentsListRequest([
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of records to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination - return records after this ID
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination - return records before this ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by payment status
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;externalbatch($request) -> CustomersExternalBatchResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update multiple customers by external system ID. Supports up to 100 customers per request with stale update protection.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->externalbatch(
    new CustomersExternalBatchRequest([
        'source' => 'practicehub',
        'customers' => [
            new CustomersExternalBatchRequestCustomersItem([
                'externalId' => 'PAT-12345',
                'email' => 'john@example.com',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$source:** `string` — Integration source (e.g., practicehub, wodify)
    
</dd>
</dl>

<dl>
<dd>

**$customers:** `array` — Array of customers to upsert (max 100)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;list($request) -> CustomerListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of customers for the merchant
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->list(
    new CustomersListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of results to skip
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search term to filter customers
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;create($request) -> CustomerCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new customer record in the merchant's account
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->create(
    new CustomersCreateRequest([
        'email' => 'email',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$customFields:** `?array` — Custom fields
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;retrieve($id) -> CustomerRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve detailed information about a specific customer
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Customer UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;update($id, $request) -> CustomerUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing customer's information
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->update(
    'id',
    new CustomersUpdateRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$customFields:** `?array` — Custom fields
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;paymentmethodsList($id) -> CustomerPaymentMethodsListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all payment methods for a customer
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->paymentmethodsList(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Customer UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;portalsessionsCreate($id, $request) -> CustomerPortalSessionCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a temporary portal session URL for a customer. The customer can use this URL to access their portal without requiring them to sign in with a magic link.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->portalsessionsCreate(
    'id',
    new CustomersPortalSessionsCreateRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$returnUrl:** `?string` — URL to redirect after portal session ends
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;customers-&gt;externalUpsertbyexternalid($source, $externalId, $request) -> CustomersExternalUpsertByExternalIdResponseCreated|CustomersExternalUpsertByExternalIdResponseIgnored</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update a customer identified by external source and ID. Used by integrations (PracticeHub, Wodify) to sync customers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customers->externalUpsertbyexternalid(
    'practicehub',
    'PAT-12345',
    new CustomersExternalUpsertByExternalIdRequest([
        'email' => 'email',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$source:** `string` — External source identifier (e.g., practicehub, wodify)
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` — External ID from the source system
    
</dd>
</dl>

<dl>
<dd>

**$email:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$addressLine1:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$addressLine2:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$city:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$state:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$postalCode:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$country:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$taxId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$taxIdCountry:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$notes:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$customFields:** `?array` — Custom fields
    
</dd>
</dl>

<dl>
<dd>

**$externalUpdatedAt:** `?DateTime` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Subscriptions
<details><summary><code>$client-&gt;subscriptions-&gt;list($request) -> SubscriptionListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of subscriptions with optional filters
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->list(
    new SubscriptionsListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by subscription status
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;create($request) -> SubscriptionCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new subscription for a customer
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->create(
    new SubscriptionsCreateRequest([
        'customerId' => 'customerId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$businessId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$planId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$priceId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethodId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$startDate:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$trialEnd:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$billingAnchorDay:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pauseAtPeriodEnd:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$cancelAtPeriodEnd:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$billingStartsOn:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$billingEndStrategy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingEndsOn:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$billingMaxCycles:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$prorationMode:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;retrieve($id) -> SubscriptionRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve detailed information about a specific subscription
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;cancel($id) -> SubscriptionCancelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancel an active subscription immediately or at period end
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->cancel(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;update($id, $request) -> SubscriptionUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing subscription's properties
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->update(
    'id',
    new SubscriptionsUpdateRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$nextBillingDate:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingAnchorDay:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$pauseAtPeriodEnd:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$cancelAtPeriodEnd:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;changeplan($id, $request) -> SubscriptionChangePlanResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Change the plan for an existing subscription with optional proration
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->changeplan(
    'id',
    new SubscriptionsChangePlanRequest([
        'newPlanId' => 'newPlanId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$newPlanId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$prorationBehavior:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$effectiveDate:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;changequantity($id, $request) -> SubscriptionChangeQuantityResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update the quantity for a subscription with optional proration
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->changequantity(
    'id',
    new SubscriptionsChangeQuantityRequest([
        'newQuantity' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$newQuantity:** `int` 
    
</dd>
</dl>

<dl>
<dd>

**$prorationBehavior:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$effectiveDate:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;previewrenewal($id, $request) -> SubscriptionPreviewRenewalResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Preview the upcoming renewal dates and amounts for an existing subscription.

This uses the same billing calculation logic as the actual scheduler to show exactly when
and how much the subscription will be billed (Key Invariant #4: Preview === Scheduler).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->previewrenewal(
    'id',
    new SubscriptionsPreviewRenewalRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$previewCount:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;pause($id, $request) -> SubscriptionPauseResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pause an active subscription. While paused:
- No new invoices are generated
- The subscription status changes to "paused"
- The customer retains access until the current period ends (depending on your business logic)

**Behavior Options:**
- `keep_as_draft`: Invoices are created as drafts (default)
- `mark_uncollectible`: Invoices are marked uncollectible
- `void`: Invoices are voided

Optionally set `resumes_at` to automatically resume at a future date.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->pause(
    'id',
    new PauseSubscriptionInput([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$behavior:** `?string` — How to handle invoices during the pause period
    
</dd>
</dl>

<dl>
<dd>

**$resumesAt:** `?DateTime` — ISO 8601 date when the subscription should automatically resume. If not provided, subscription stays paused until manually resumed.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;resume($id) -> SubscriptionResumeResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Resume a paused subscription. The subscription status changes back to "active" and normal billing resumes.

If the subscription was paused with draft invoices, you may need to manually finalize and send them.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->resume(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;cancelsubscription($id, $request) -> SubscriptionCancelSubscriptionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancel a subscription either immediately or at the end of the current billing period.

**Modes:**
- `immediately`: Status set to "canceled", access revoked now
- `period_end`: cancelAtPeriodEnd flag set, access continues until period end
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->cancelsubscription(
    'id',
    new CancelSubscriptionInput([
        'mode' => CancelSubscriptionInputMode::Immediately->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$mode:** `string` — Cancel mode: "immediately" revokes access now, "period_end" schedules cancellation at billing period end
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Optional reason for cancellation
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;reactivate($id) -> SubscriptionReactivateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Reverse a scheduled cancellation. The subscription must be active with cancelAtPeriodEnd=true.
Clears the cancellation flag and the subscription continues as normal.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->reactivate(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Subscription UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;subscriptionItemsList($subscriptionId, $request) -> SubscriptionItemListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all line items for a specific subscription. Items represent individual products/prices within a multi-product subscription.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->subscriptionItemsList(
    'subscriptionId',
    new SubscriptionItemsListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subscriptionId:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;subscriptionItemsCreate($subscriptionId, $request) -> SubscriptionItemCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a new line item to an existing subscription. This is used for multi-product subscriptions where items share the same billing interval.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->subscriptionItemsCreate(
    'subscriptionId',
    new CreateSubscriptionItemInput([
        'currency' => 'USD',
        'unitAmountMinor' => 2999,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subscriptionId:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `?string` — Product UUID to link to this item
    
</dd>
</dl>

<dl>
<dd>

**$priceId:** `?string` — Price UUID to link to this item
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Item description
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `?int` — Item quantity
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `string` — ISO 4217 currency code
    
</dd>
</dl>

<dl>
<dd>

**$unitAmountMinor:** `int` — Unit price in cents
    
</dd>
</dl>

<dl>
<dd>

**$fulfillmentType:** `?string` — Determines if orders are created on renewal
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;subscriptionItemsDelete($subscriptionId, $itemId) -> SubscriptionItemDeleteResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a line item from a subscription. Cannot remove the last item - cancel the subscription instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->subscriptionItemsDelete(
    'subscriptionId',
    'itemId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subscriptionId:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$itemId:** `string` — Item UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptions-&gt;subscriptionItemsUpdate($subscriptionId, $itemId, $request) -> SubscriptionItemUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a subscription item's quantity, description, price, or fulfillment type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptions->subscriptionItemsUpdate(
    'subscriptionId',
    'itemId',
    new UpdateSubscriptionItemInput([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subscriptionId:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$itemId:** `string` — Item UUID
    
</dd>
</dl>

<dl>
<dd>

**$quantity:** `?int` — Item quantity
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Item description
    
</dd>
</dl>

<dl>
<dd>

**$unitAmountMinor:** `?int` — Unit price in cents
    
</dd>
</dl>

<dl>
<dd>

**$fulfillmentType:** `?string` — Determines if orders are created on renewal
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Comms
<details><summary><code>$client-&gt;comms-&gt;messagesSend($request) -> CommsMessagesSendResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Send a direct message to a customer via email, SMS, or WhatsApp
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->comms->messagesSend(
    new CommsMessagesSendRequest([
        'channel' => CommsMessagesSendRequestChannel::Email->value,
        'body' => 'body',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$customerEmail:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$threadId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$channel:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$body:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$bodyHtml:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$entityType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$entityId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$entityUrl:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$source:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;comms-&gt;threadsList($request) -> CommsThreadsListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List conversation threads for the authenticated merchant
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->comms->threadsList(
    new CommsThreadsListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by thread status
    
</dd>
</dl>

<dl>
<dd>

**$channel:** `?string` — Filter by channel
    
</dd>
</dl>

<dl>
<dd>

**$invoiceId:** `?string` — Filter by related invoice UUID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;comms-&gt;messagesList($threadId, $request) -> CommsMessagesListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all messages in a conversation thread
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->comms->messagesList(
    'threadId',
    new CommsMessagesListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$threadId:** `string` — Thread UUID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Analytics
<details><summary><code>$client-&gt;analytics-&gt;revenueGetmrrsummary($request) -> AnalyticsRevenueGetMrrSummaryResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get Monthly Recurring Revenue metrics and growth
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->revenueGetmrrsummary(
    new AnalyticsRevenueGetMrrSummaryRequest([
        'asOfDate' => new DateTime('2024-01-31T23:59:59Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$asOfDate:** `?DateTime` — Calculate MRR as of this date (ISO 8601)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;revenueGettimeseries($request) -> AnalyticsRevenueGetTimeSeriesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get revenue data over time with configurable granularity
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->revenueGettimeseries(
    new AnalyticsRevenueGetTimeSeriesRequest([
        'startDate' => new DateTime('2024-01-01T00:00:00Z'),
        'endDate' => new DateTime('2024-12-31T23:59:59Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$startDate:** `DateTime` — Start date (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `DateTime` — End date (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$granularity:** `?string` — Time granularity for data points
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;invoicesGetaraging($request) -> AnalyticsInvoicesGetArAgingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns Accounts Receivable aging buckets with invoice counts and amounts
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->invoicesGetaraging(
    new AnalyticsInvoicesGetArAgingRequest([
        'asOfDate' => new DateTime('2024-01-31T23:59:59Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$asOfDate:** `?DateTime` — Calculate aging as of this date (ISO 8601)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;collectionsGetdso($request) -> AnalyticsCollectionsGetDsoResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Calculate DSO and collection health metrics
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->collectionsGetdso(
    new AnalyticsCollectionsGetDsoRequest([
        'startDate' => new DateTime('2024-01-01T00:00:00Z'),
        'endDate' => new DateTime('2024-12-31T23:59:59Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$startDate:** `?DateTime` — Start date (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — End date (ISO 8601)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;customersGetltv($request) -> AnalyticsCustomersGetLtvResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Calculate customer lifetime value metrics
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->customersGetltv(
    new AnalyticsCustomersGetLtvRequest([
        'topN' => 10,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$topN:** `?float` — Number of top customers to return (1-100)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;customersRetrieve($customerId) -> AnalyticsCustomersRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get analytics for a specific customer
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->customersRetrieve(
    'customerId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` — Customer UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;paymentlinksGetconversion($request) -> AnalyticsPaymentLinksGetConversionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get payment link performance metrics
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->paymentlinksGetconversion(
    new AnalyticsPaymentLinksGetConversionRequest([
        'startDate' => new DateTime('2024-01-01T00:00:00Z'),
        'endDate' => new DateTime('2024-12-31T23:59:59Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$startDate:** `?DateTime` — Start date (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — End date (ISO 8601)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;checkoutGetfunnel($request) -> AnalyticsCheckoutGetFunnelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get stage-by-stage checkout conversion funnel metrics. Shows sessions, drop-offs, and conversion rates at each step.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->checkoutGetfunnel(
    new AnalyticsCheckoutGetFunnelRequest([
        'startDate' => new DateTime('2024-01-01T00:00:00Z'),
        'endDate' => new DateTime('2024-01-31T23:59:59Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$startDate:** `?DateTime` — Start date for analytics period (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — End date for analytics period (ISO 8601)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;checkoutAbandonmentGetsummary($request) -> AnalyticsCheckoutAbandonmentGetSummaryResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get aggregated abandonment alert metrics by status and severity
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->checkoutAbandonmentGetsummary(
    new AnalyticsCheckoutAbandonmentGetSummaryRequest([
        'startDate' => new DateTime('2024-01-01T00:00:00Z'),
        'endDate' => new DateTime('2024-12-31T23:59:59Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$startDate:** `?DateTime` — Start date (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — End date (ISO 8601)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;checkoutAbandonmentList($request) -> AnalyticsCheckoutAbandonmentListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get paginated list of abandonment alerts with filtering
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->checkoutAbandonmentList(
    new AnalyticsCheckoutAbandonmentListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by alert status
    
</dd>
</dl>

<dl>
<dd>

**$severity:** `?string` — Filter by severity level
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` — Results per page (1-100)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;checkoutWinbackGetsummary() -> AnalyticsCheckoutWinbackGetSummaryResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get aggregated winback opportunity metrics by type and status
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->checkoutWinbackGetsummary();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;checkoutWinbackList($request) -> AnalyticsCheckoutWinbackListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get paginated list of winback opportunities with filtering
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->checkoutWinbackList(
    new AnalyticsCheckoutWinbackListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$type:** `?string` — Filter by opportunity type
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by status
    
</dd>
</dl>

<dl>
<dd>

**$minValueCents:** `?int` — Minimum potential value in cents
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>

<dl>
<dd>

**$pageSize:** `?int` — Results per page (1-100)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Finance
<details><summary><code>$client-&gt;finance-&gt;getIncomeReport($request) -> GetFinanceIncomeResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get income report for the authenticated merchant. Requires 'finance:read' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->finance->getIncomeReport(
    new GetFinanceIncomeRequest([
        'startDate' => '2024-01-01',
        'endDate' => '2024-12-31',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$startDate:** `string` — Start date
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `string` — End date
    
</dd>
</dl>

<dl>
<dd>

**$groupBy:** `?string` — Group results by time period
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionId:** `?string` — Filter by subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by status
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;finance-&gt;getFinanceSummary() -> GetFinanceSummaryResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get finance summary for the authenticated merchant. Requires 'finance:read' scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->finance->getFinanceSummary();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Payouts
<details><summary><code>$client-&gt;payouts-&gt;list($request) -> PayoutsListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of payouts/settlements with optional filters. Results are ordered by creation date (newest first).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->payouts->list(
    new PayoutsListRequest([
        'createdAfter' => '2024-01-01T00:00:00Z',
        'createdBefore' => '2024-12-31T23:59:59Z',
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by payout status
    
</dd>
</dl>

<dl>
<dd>

**$gateway:** `?string` — Filter by payment gateway (nmi, stripe, etc.)
    
</dd>
</dl>

<dl>
<dd>

**$createdAfter:** `?string` — ISO 8601 date - only payouts created after this date
    
</dd>
</dl>

<dl>
<dd>

**$createdBefore:** `?string` — ISO 8601 date - only payouts created before this date
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Number of results to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;payouts-&gt;retrieve($id) -> PayoutsRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a single payout by its public ID (pyt_xxx) or internal UUID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->payouts->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payout public ID (pyt_xxx) or UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;payouts-&gt;paymentsList($id, $request) -> PayoutsPaymentsListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all payments that were included in a specific payout batch.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->payouts->paymentsList(
    'id',
    new PayoutsPaymentsListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payout public ID (pyt_xxx) or UUID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Refunds
<details><summary><code>$client-&gt;refunds-&gt;list($request) -> RefundListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of refunds with optional filters. Results are ordered by creation date (newest first).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->refunds->list(
    new RefundsListRequest([
        'createdAfter' => '2024-01-01T00:00:00Z',
        'createdBefore' => '2024-12-31T23:59:59Z',
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by refund status
    
</dd>
</dl>

<dl>
<dd>

**$paymentId:** `?string` — Filter by original payment ID
    
</dd>
</dl>

<dl>
<dd>

**$gateway:** `?string` — Filter by payment gateway (nmi, stripe, etc.)
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Filter by refund reason
    
</dd>
</dl>

<dl>
<dd>

**$createdAfter:** `?string` — ISO 8601 date - only refunds created after this date
    
</dd>
</dl>

<dl>
<dd>

**$createdBefore:** `?string` — ISO 8601 date - only refunds created before this date
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Number of results to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;refunds-&gt;create($request) -> RefundCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Initiate a refund for a payment. The refund will be processed through the original payment gateway.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->refunds->create(
    new CreateRefundInput([
        'paymentId' => '660e8400-e29b-41d4-a716-446655440000',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$paymentId:** `string` — The ID of the payment to refund
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?float` — Amount to refund in cents. If not provided, refunds the full remaining amount.
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Reason for the refund
    
</dd>
</dl>

<dl>
<dd>

**$reasonDetails:** `?string` — Additional details about the refund reason
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;refunds-&gt;retrieve($id) -> RefundRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a single refund by its public ID (ref_xxx) or internal UUID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->refunds->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Refund public ID (ref_xxx) or UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Voids
<details><summary><code>$client-&gt;voids-&gt;list($request) -> VoidListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of voids with optional filters. Results are ordered by creation date (newest first). Voids are full-amount cancellations of unsettled transactions.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->voids->list(
    new VoidsListRequest([
        'createdAfter' => '2024-01-01T00:00:00Z',
        'createdBefore' => '2024-12-31T23:59:59Z',
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by void status
    
</dd>
</dl>

<dl>
<dd>

**$paymentId:** `?string` — Filter by original payment ID
    
</dd>
</dl>

<dl>
<dd>

**$gateway:** `?string` — Filter by payment gateway (nmi, stripe, etc.)
    
</dd>
</dl>

<dl>
<dd>

**$createdAfter:** `?string` — ISO 8601 date - only voids created after this date
    
</dd>
</dl>

<dl>
<dd>

**$createdBefore:** `?string` — ISO 8601 date - only voids created before this date
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Number of results to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;voids-&gt;create($request) -> VoidCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Void a payment that has not yet settled. Voids are always for the full amount. If the payment has already settled, use a refund instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->voids->create(
    new CreateVoidInput([
        'paymentId' => '660e8400-e29b-41d4-a716-446655440000',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$paymentId:** `string` — The ID of the payment to void. Must be unsettled.
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Reason for the void
    
</dd>
</dl>

<dl>
<dd>

**$reasonCode:** `?string` — Standardized reason code for the void
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;voids-&gt;retrieve($id) -> VoidRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a single void by its public ID (void_xxx) or internal UUID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->voids->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Void public ID (void_xxx) or UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Credit Notes
<details><summary><code>$client-&gt;creditNotes-&gt;list($request) -> CreditNoteListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of credit notes with optional filters. Results are ordered by creation date (newest first).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->creditNotes->list(
    new CreditNotesListRequest([
        'createdAfter' => '2024-01-01T00:00:00Z',
        'createdBefore' => '2024-12-31T23:59:59Z',
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by credit note status
    
</dd>
</dl>

<dl>
<dd>

**$invoiceId:** `?string` — Filter by invoice ID
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer ID
    
</dd>
</dl>

<dl>
<dd>

**$creditMethod:** `?string` — Filter by credit method
    
</dd>
</dl>

<dl>
<dd>

**$createdAfter:** `?string` — ISO 8601 date - only credit notes created after this date
    
</dd>
</dl>

<dl>
<dd>

**$createdBefore:** `?string` — ISO 8601 date - only credit notes created before this date
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Number of results to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;creditNotes-&gt;create($request) -> CreditNoteCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Issue a credit note for a paid or partially paid invoice. The credit can be applied via refund to payment method, customer balance, or marked as external.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->creditNotes->create(
    new CreateCreditNoteInput([
        'invoiceId' => '660e8400-e29b-41d4-a716-446655440000',
        'amountMinor' => 5000,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$invoiceId:** `string` — The ID of the invoice to issue a credit note for
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `float` — Amount to credit in cents
    
</dd>
</dl>

<dl>
<dd>

**$taxAmountMinor:** `?float` — Tax portion of the credit in cents (for UK/EU VAT compliance)
    
</dd>
</dl>

<dl>
<dd>

**$creditMethod:** `?string` — How the credit should be applied
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Reason for the credit note
    
</dd>
</dl>

<dl>
<dd>

**$reasonCode:** `?string` — Standardized reason code
    
</dd>
</dl>

<dl>
<dd>

**$cancelSubscription:** `?bool` — Whether to cancel the associated subscription after issuing
    
</dd>
</dl>

<dl>
<dd>

**$isProrated:** `?bool` — Whether this credit note represents a prorated amount
    
</dd>
</dl>

<dl>
<dd>

**$prorationDaysTotal:** `?float` — Total days in the billing period (for prorated credits)
    
</dd>
</dl>

<dl>
<dd>

**$prorationDaysUnused:** `?float` — Unused days in the billing period (for prorated credits)
    
</dd>
</dl>

<dl>
<dd>

**$idempotencyKey:** `?string` — Idempotency key to prevent duplicate credit notes
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Arbitrary key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;creditNotes-&gt;retrieve($id) -> CreditNoteRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a single credit note by its UUID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->creditNotes->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Credit note UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;creditNotes-&gt;void($id) -> CreditNoteVoidResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Void a credit note that has been issued but not yet fully applied. This is an accounting void — it reverses the credit without creating a new financial transaction.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->creditNotes->void(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Credit note UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Disputes
<details><summary><code>$client-&gt;disputes-&gt;list($request) -> DisputesListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of disputes/chargebacks with optional filters. Results are ordered by disputed date (newest first).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->disputes->list(
    new DisputesListRequest([
        'disputedAfter' => '2024-01-01T00:00:00Z',
        'disputedBefore' => '2024-12-31T23:59:59Z',
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by dispute status
    
</dd>
</dl>

<dl>
<dd>

**$resolution:** `?string` — Filter by resolution outcome
    
</dd>
</dl>

<dl>
<dd>

**$paymentId:** `?string` — Filter by original payment ID
    
</dd>
</dl>

<dl>
<dd>

**$gateway:** `?string` — Filter by payment gateway (nmi, stripe, etc.)
    
</dd>
</dl>

<dl>
<dd>

**$disputedAfter:** `?string` — ISO 8601 date - only disputes after this date
    
</dd>
</dl>

<dl>
<dd>

**$disputedBefore:** `?string` — ISO 8601 date - only disputes before this date
    
</dd>
</dl>

<dl>
<dd>

**$needsEvidence:** `?string` — Only show disputes that need evidence submission
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Number of results to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;disputes-&gt;getopen($request) -> DisputesGetOpenResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve disputes that need evidence submission, ordered by due date (most urgent first). Use this to prioritize dispute responses.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->disputes->getopen(
    new DisputesGetOpenRequest([
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?float` — Number of results to return
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;disputes-&gt;retrieve($id) -> DisputesRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a single dispute by its public ID (dsp_xxx) or internal UUID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->disputes->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Dispute public ID (dsp_xxx) or UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Discounts
<details><summary><code>$client-&gt;discounts-&gt;list($request) -> DiscountListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of discounts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->discounts->list(
    new DiscountsListRequest([
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$isActive:** `?string` — Filter by active status
    
</dd>
</dl>

<dl>
<dd>

**$isArchived:** `?string` — Filter by archived status
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Number of results to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;discounts-&gt;create($request) -> DiscountCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new discount code.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->discounts->create(
    new CreateDiscountInput([
        'code' => 'SUMMER20',
        'name' => 'Summer Sale 20% Off',
        'discountType' => CreateDiscountInputDiscountType::Percentage->value,
        'discountValue' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$code:** `string` — Unique discount code (will be uppercased)
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Human-readable name
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Optional description
    
</dd>
</dl>

<dl>
<dd>

**$discountType:** `string` — Type of discount
    
</dd>
</dl>

<dl>
<dd>

**$discountValue:** `float` — Discount value - percentage (1-100) or amount in cents
    
</dd>
</dl>

<dl>
<dd>

**$appliesTo:** `?string` — Which products the discount applies to
    
</dd>
</dl>

<dl>
<dd>

**$scope:** `?string` — Scope of where discount can be applied
    
</dd>
</dl>

<dl>
<dd>

**$productIds:** `?array` — Product IDs if applies_to is 'specific_products'
    
</dd>
</dl>

<dl>
<dd>

**$maxRedemptions:** `?int` — Maximum total redemptions allowed
    
</dd>
</dl>

<dl>
<dd>

**$maxRedemptionsPerUser:** `?int` — Maximum redemptions per customer (0 = unlimited)
    
</dd>
</dl>

<dl>
<dd>

**$validFrom:** `?string` — Start date (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$validUntil:** `?string` — End date (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$recurringType:** `?string` — How the discount applies to recurring payments
    
</dd>
</dl>

<dl>
<dd>

**$recurringCycles:** `?int` — Number of billing cycles (only if recurring_type is 'repeating')
    
</dd>
</dl>

<dl>
<dd>

**$firstTimeCustomer:** `?bool` — Only available to first-time customers
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;discounts-&gt;retrieve($id) -> DiscountRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a single discount by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->discounts->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Discount ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;discounts-&gt;delete($id) -> DiscountDeleteResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Archive a discount (soft delete). The discount code can no longer be used.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->discounts->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Discount ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;discounts-&gt;update($id, $request) -> DiscountUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing discount. Note: discount code and type cannot be changed.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->discounts->update(
    'id',
    new UpdateDiscountInput([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Discount ID
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$discountValue:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$appliesTo:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$scope:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$productIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$maxRedemptions:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$maxRedemptionsPerUser:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$validFrom:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$validUntil:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$isActive:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$isArchived:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$recurringType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$recurringCycles:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$firstTimeCustomer:** `?bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Payment Links
<details><summary><code>$client-&gt;paymentLinks-&gt;listPaymentLinks($request) -> ListPaymentLinksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List payment links for the authenticated merchant with pagination and filters
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentLinks->listPaymentLinks(
    new ListPaymentLinksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$mode:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentLinks-&gt;createPaymentLink($request) -> CreatePaymentLinkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new payment link for invoices, subscriptions, or custom amounts
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentLinks->createPaymentLink(
    new CreatePaymentLinkRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$productIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$lineItems:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$slug:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$mode:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$invoiceId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$successUrl:** `?string` — Custom URL to redirect after successful payment. Supports placeholders: {CHECKOUT_ID}, {TRANSACTION_ID}, {PAYMENT_ID}, {CUSTOMER_ID}, {AMOUNT}, {CURRENCY}, {PORTAL_URL}. If not set, redirects to RevKeen's default success page.
    
</dd>
</dl>

<dl>
<dd>

**$cancelUrl:** `?string` — Custom URL to redirect if customer cancels the checkout. If not set, no cancel redirect is configured.
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$collectShipping:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$allowPromotionCodes:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$taxBehavior:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$expiresAt:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$idempotencyKey:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentLinks-&gt;getPaymentLink($id) -> GetPaymentLinkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a payment link by its UUID or public_id
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentLinks->getPaymentLink(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment link UUID or public_id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentLinks-&gt;expirePaymentLink($id, $request) -> ExpirePaymentLinkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Mark a payment link as expired, preventing further use
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentLinks->expirePaymentLink(
    'id',
    new ExpirePaymentLinkRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment link UUID or public_id
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentLinks-&gt;updatePaymentLinkStatus($id, $request) -> UpdatePaymentLinkStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Change the status of a payment link. Active links accept payments, inactive links are temporarily disabled, and archived links are permanently disabled and cannot be reactivated.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentLinks->updatePaymentLinkStatus(
    'id',
    new UpdatePaymentLinkStatusRequest([
        'status' => UpdatePaymentLinkStatusRequestStatus::Active->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment link UUID or public_id
    
</dd>
</dl>

<dl>
<dd>

**$status:** `string` — New status for the payment link
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentLinks-&gt;deactivatePaymentLink($id) -> DeactivatePaymentLinkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Temporarily disable a payment link. It can be reactivated later.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentLinks->deactivatePaymentLink(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment link UUID or public_id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentLinks-&gt;activatePaymentLink($id) -> ActivatePaymentLinkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Enable a payment link to accept payments. Cannot be used on archived links.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentLinks->activatePaymentLink(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment link UUID or public_id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentLinks-&gt;archivePaymentLink($id) -> ArchivePaymentLinkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently disable a payment link. This action cannot be undone.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentLinks->archivePaymentLink(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment link UUID or public_id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Payment Attempts
<details><summary><code>$client-&gt;paymentAttempts-&gt;list($request) -> PaymentAttemptListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get merchant's payment attempt timeline with optional filters. Returns normalized outcomes across all gateways.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->list(
    new ListPaymentAttemptsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?float` — Maximum number of results to return
    
</dd>
</dl>

<dl>
<dd>

**$gateway:** `?string` — Filter by gateway (e.g., 'nmi')
    
</dd>
</dl>

<dl>
<dd>

**$category:** `?string` — Filter by error category
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionId:** `?string` — Filter by subscription ID
    
</dd>
</dl>

<dl>
<dd>

**$startDate:** `?DateTime` — Filter by created_at >= (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — Filter by created_at <= (ISO 8601)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentAttempts-&gt;getByGatewayOrderId($orderId) -> PaymentAttemptSingleResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Look up a payment attempt by the gateway order ID (payatt_xxx format). Used for webhook debugging and support lookup.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->getByGatewayOrderId(
    'payatt_abc123xyz789',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$orderId:** `string` — Gateway order ID (payatt_xxx format)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentAttempts-&gt;get($id) -> PaymentAttemptSingleResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a specific payment attempt by its UUID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment attempt UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentAttempts-&gt;listByTransaction($transactionId) -> PaymentAttemptListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get payment attempt history for a legacy transaction ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->listByTransaction(
    'transactionId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$transactionId:** `string` — Legacy transaction ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentAttempts-&gt;listBySubscription($subscriptionId, $request) -> PaymentAttemptListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get payment attempt history for a subscription.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->listBySubscription(
    'subscriptionId',
    new ListBySubscriptionPaymentAttemptsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subscriptionId:** `string` — Subscription UUID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Maximum number of results (1-100)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentAttempts-&gt;listByInvoice($invoiceId, $request) -> PaymentAttemptListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get payment attempt history for an invoice.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->listByInvoice(
    'invoiceId',
    new ListByInvoicePaymentAttemptsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$invoiceId:** `string` — Invoice UUID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Maximum number of results (1-100)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentAttempts-&gt;checkRetryEligibility($subscriptionId) -> RetryEligibilityResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Check if a subscription is eligible for payment retry based on decline history and retry policies.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->checkRetryEligibility(
    'subscriptionId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subscriptionId:** `string` — Subscription UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentAttempts-&gt;listRetryReady() -> PaymentAttemptListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all payment attempts that are ready for retry (for dunning workflows).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->listRetryReady();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentAttempts-&gt;getSecurityResult($id) -> PaymentSecurityResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get interpreted AVS/CVV security verification results for a payment attempt. Returns human-readable descriptions and risk assessments.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->getSecurityResult(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment attempt UUID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentAttempts-&gt;listSecurityCodes() -> ListSecurityCodesPaymentAttemptsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a reference list of all supported AVS and CVV response codes with their interpretations. Useful for building payment fraud rules.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->listSecurityCodes();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Charges
<details><summary><code>$client-&gt;charges-&gt;list($request) -> ChargeListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of charges with optional filtering by customer, status, or date range.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->charges->list(
    new ChargesListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer UUID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by charge status
    
</dd>
</dl>

<dl>
<dd>

**$createdGte:** `?DateTime` — Filter charges created on or after this date
    
</dd>
</dl>

<dl>
<dd>

**$createdLte:** `?DateTime` — Filter charges created on or before this date
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;charges-&gt;create($request) -> ChargeCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a one-time charge for an existing customer. This is for ad-hoc charges 
like setup fees, overages, or one-time services. For recurring billing, use subscriptions instead.

The charge will be processed immediately using the customer's default payment method,
unless a specific payment method ID is provided.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->charges->create(
    new ChargesCreateRequest([
        'customerId' => 'customerId',
        'amountMinor' => 1,
        'description' => 'description',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `int` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethodId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$capture:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$statementDescriptor:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$sendReceipt:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$idempotencyKey:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;charges-&gt;retrieve($id) -> ChargeRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve details of a specific charge.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->charges->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;charges-&gt;capture($id, $request) -> ChargeCaptureResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Capture a charge that was created with `capture: false`.
You can capture the full amount or a partial amount.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->charges->capture(
    'id',
    new ChargesCaptureRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;charges-&gt;refund($id, $request) -> ChargeRefundResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Refund a charge. You can refund the full amount or specify a partial refund amount.
Multiple partial refunds can be issued until the full amount is refunded.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->charges->refund(
    'id',
    new ChargesRefundRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$notes:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Billing
<details><summary><code>$client-&gt;billing-&gt;generatepreview($request) -> BillingPreviewResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Generate a preview of upcoming billing dates and amounts based on the provided schedule configuration.

This endpoint uses the same billing calculation logic as the actual scheduler, ensuring that
the preview matches what will actually be billed (Key Invariant #4: Preview === Scheduler).

Use this to show customers their expected billing schedule before they subscribe, or to
preview changes to an existing subscription's billing configuration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->billing->generatepreview(
    new BillingGeneratePreviewRequest([
        'interval' => BillingGeneratePreviewRequestInterval::Day->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$interval:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$intervalCount:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$billingAnchorRule:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$billingAnchorDay:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$startsAt:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$firstChargeBehavior:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$trialDays:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$endBehavior:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxPayments:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$previewCount:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$timezone:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;billing-&gt;getintervals() -> BillingIntervalsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the list of supported billing intervals and their display labels.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->billing->getintervals();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;billing-&gt;getanchorrules() -> BillingAnchorRulesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the list of supported billing anchor rules with explanations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->billing->getanchorrules();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Prices
<details><summary><code>$client-&gt;prices-&gt;list($request) -> PriceListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all prices for the authenticated merchant. Supports filtering and cursor-based pagination.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->prices->list(
    new PricesListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$productId:** `?string` — Filter by product ID
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Filter by price type
    
</dd>
</dl>

<dl>
<dd>

**$pricingModel:** `?string` — Filter by pricing model
    
</dd>
</dl>

<dl>
<dd>

**$active:** `?string` — Filter by active status
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` — Filter by currency
    
</dd>
</dl>

<dl>
<dd>

**$lookupKey:** `?string` — Filter by lookup key
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination (ID to start after)
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination (ID to end before)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;prices-&gt;create($request) -> Price</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new price for a product. Supports fixed, pay-what-you-want, and free pricing models.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->prices->create(
    new CreatePriceRequest([
        'productId' => 'product_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$productId:** `string` — ID of the product this price belongs to
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` — Three-letter ISO currency code
    
</dd>
</dl>

<dl>
<dd>

**$unitAmount:** `?int` — Price in minor units (cents). Required for fixed pricing.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Price type
    
</dd>
</dl>

<dl>
<dd>

**$pricingModel:** `?string` — Pricing model
    
</dd>
</dl>

<dl>
<dd>

**$interval:** `?string` — Billing interval (required for recurring)
    
</dd>
</dl>

<dl>
<dd>

**$intervalCount:** `?int` — Number of intervals between billings (1-12)
    
</dd>
</dl>

<dl>
<dd>

**$trialPeriodDays:** `?int` — Trial period in days (0-730)
    
</dd>
</dl>

<dl>
<dd>

**$minimumAmount:** `?int` — PWYW: minimum amount in cents
    
</dd>
</dl>

<dl>
<dd>

**$maximumAmount:** `?int` — PWYW: maximum amount in cents
    
</dd>
</dl>

<dl>
<dd>

**$suggestedAmount:** `?int` — PWYW: suggested amount in cents
    
</dd>
</dl>

<dl>
<dd>

**$presetAmounts:** `?array` — PWYW: quick-select amounts (max 10)
    
</dd>
</dl>

<dl>
<dd>

**$nickname:** `?string` — Display name (e.g., 'Monthly', 'Annual')
    
</dd>
</dl>

<dl>
<dd>

**$lookupKey:** `?string` — Stable key for API lookups
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;prices-&gt;retrieve($id) -> Price</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a price by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->prices->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Price ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;prices-&gt;archive($id) -> Price</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Archives a price by setting active to false. The price remains in the system but cannot be used for new purchases.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->prices->archive(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Price ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;prices-&gt;update($id, $request) -> Price</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a price. Only certain fields can be updated (active, nickname, lookup_key, metadata). Core pricing fields are immutable.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->prices->update(
    'id',
    new UpdatePriceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Price ID
    
</dd>
</dl>

<dl>
<dd>

**$active:** `?bool` — Whether the price is active
    
</dd>
</dl>

<dl>
<dd>

**$nickname:** `?string` — Display name
    
</dd>
</dl>

<dl>
<dd>

**$lookupKey:** `?string` — Stable key for API lookups
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## TaxRates
<details><summary><code>$client-&gt;taxRates-&gt;listTaxRates($request) -> TaxRateListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all tax rates for the authenticated merchant. Supports filtering and cursor-based pagination.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->taxRates->listTaxRates(
    new GetTaxRatesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$active:** `?string` — Filter by active status
    
</dd>
</dl>

<dl>
<dd>

**$taxType:** `?string` — Filter by tax type
    
</dd>
</dl>

<dl>
<dd>

**$country:** `?string` — Filter by country code
    
</dd>
</dl>

<dl>
<dd>

**$state:** `?string` — Filter by state/province code
    
</dd>
</dl>

<dl>
<dd>

**$inclusive:** `?string` — Filter by inclusive status
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination (ID to start after)
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination (ID to end before)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;taxRates-&gt;createATaxRate($request) -> TaxRate</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new tax rate. Tax rates are optional overrides - Quaderno remains the primary tax calculator.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->taxRates->createATaxRate(
    new CreateTaxRateRequest([
        'displayName' => 'display_name',
        'percentage' => 1.1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$displayName:** `string` — Display name for the tax rate
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Description of the tax rate
    
</dd>
</dl>

<dl>
<dd>

**$jurisdiction:** `?string` — Tax jurisdiction (e.g., 'US-CA', 'DE', 'GB')
    
</dd>
</dl>

<dl>
<dd>

**$percentage:** `float` — Tax percentage (e.g., 8.25 for 8.25%)
    
</dd>
</dl>

<dl>
<dd>

**$inclusive:** `?bool` — Whether tax is included in displayed price
    
</dd>
</dl>

<dl>
<dd>

**$taxType:** `?string` — Type of tax
    
</dd>
</dl>

<dl>
<dd>

**$country:** `?string` — ISO 2-letter country code
    
</dd>
</dl>

<dl>
<dd>

**$state:** `?string` — State/province code
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;taxRates-&gt;retrieveATaxRate($id) -> TaxRate</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a tax rate by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->taxRates->retrieveATaxRate(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Tax Rate ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;taxRates-&gt;archiveATaxRate($id) -> TaxRate</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Archives a tax rate by setting active to false. The tax rate remains in the system but cannot be used for new transactions.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->taxRates->archiveATaxRate(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Tax Rate ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;taxRates-&gt;updateATaxRate($id, $request) -> TaxRate</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a tax rate. Note: percentage, inclusive, and tax_type cannot be changed after creation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->taxRates->updateATaxRate(
    'id',
    new UpdateTaxRateRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Tax Rate ID
    
</dd>
</dl>

<dl>
<dd>

**$displayName:** `?string` — Display name for the tax rate
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Description of the tax rate
    
</dd>
</dl>

<dl>
<dd>

**$jurisdiction:** `?string` — Tax jurisdiction
    
</dd>
</dl>

<dl>
<dd>

**$country:** `?string` — ISO 2-letter country code
    
</dd>
</dl>

<dl>
<dd>

**$state:** `?string` — State/province code
    
</dd>
</dl>

<dl>
<dd>

**$active:** `?bool` — Whether the tax rate is active
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Orders
<details><summary><code>$client-&gt;orders-&gt;list($request) -> OrderListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all orders for the authenticated merchant. Supports filtering and cursor-based pagination.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->orders->list(
    new OrdersListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by status
    
</dd>
</dl>

<dl>
<dd>

**$billingType:** `?string` — Filter by billing type
    
</dd>
</dl>

<dl>
<dd>

**$createdGte:** `?float` — Filter by created_at >= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$createdLte:** `?float` — Filter by created_at <= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination - return results after this ID
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination - return results before this ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;orders-&gt;create($request) -> Order</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new order with line items. Orders start in draft status.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->orders->create(
    new CreateOrderRequest([
        'lineItems' => [
            new CreateOrderRequestLineItemsItem([
                'description' => 'description',
                'unitPrice' => 1,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` — Customer ID (optional for guest orders)
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` — Three-letter ISO currency code
    
</dd>
</dl>

<dl>
<dd>

**$billingType:** `?string` — Billing type. one_time: Single purchase. recurring: Subscription-based.
    
</dd>
</dl>

<dl>
<dd>

**$lineItems:** `array` — Order line items (at least one required)
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>

<dl>
<dd>

**$notes:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$expiresAt:** `?DateTime` — Expiration timestamp for the order
    
</dd>
</dl>

<dl>
<dd>

**$invoiceId:** `?string` — ID of the linked invoice (Commercial Truth)
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionId:** `?string` — ID of the linked subscription (for recurring fulfillment)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;orders-&gt;retrieve($id) -> Order</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves an order by its ID, including line items.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->orders->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Order ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;orders-&gt;pay($id, $request) -> Order</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Process payment for an order. Creates an invoice and charges the customer's payment method.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->orders->pay(
    'id',
    new PayOrderRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Order ID
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethodId:** `?string` — Saved payment method ID
    
</dd>
</dl>

<dl>
<dd>

**$paymentToken:** `?string` — One-time payment token
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `?int` — Partial payment amount in cents (defaults to full amount_due)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;orders-&gt;cancel($id, $request) -> Order</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels an order. Only orders that haven't been paid or fulfilled can be canceled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->orders->cancel(
    'id',
    new CancelOrderRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Order ID
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Reason for cancellation
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;orders-&gt;fulfill($id, $request) -> Order</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Mark an order as fulfilled. Optionally include shipping tracking information.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->orders->fulfill(
    'id',
    new FulfillOrderRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Order ID
    
</dd>
</dl>

<dl>
<dd>

**$trackingNumber:** `?string` — Shipping tracking number
    
</dd>
</dl>

<dl>
<dd>

**$carrier:** `?string` — Shipping carrier (e.g., 'ups', 'fedex', 'usps')
    
</dd>
</dl>

<dl>
<dd>

**$lineItemIds:** `?array` — Specific line items to fulfill (defaults to all)
    
</dd>
</dl>

<dl>
<dd>

**$notifyCustomer:** `?bool` — Send fulfillment notification to customer
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Payments
<details><summary><code>$client-&gt;payments-&gt;list($request) -> PaymentListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all payments for the authenticated merchant. Supports filtering and cursor-based pagination.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->payments->list(
    new PaymentsListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer ID
    
</dd>
</dl>

<dl>
<dd>

**$invoiceId:** `?string` — Filter by invoice ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by status
    
</dd>
</dl>

<dl>
<dd>

**$paymentChannel:** `?string` — Filter by payment channel. Use card_present for terminal payments, card_not_present for online payments.
    
</dd>
</dl>

<dl>
<dd>

**$createdGte:** `?float` — Filter by created_at >= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$createdLte:** `?float` — Filter by created_at <= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination - return results after this ID
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination - return results before this ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;payments-&gt;retrieve($id) -> Payment</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a payment by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->payments->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;payments-&gt;captureAPayment($id, $request) -> Payment</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Capture an authorized payment. For auth-then-capture payment flows. Optionally capture a partial amount.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->payments->captureAPayment(
    'id',
    new CapturePaymentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment ID
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `?int` — Amount to capture in cents. Defaults to full authorized amount. Must be <= authorized amount.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;payments-&gt;cancelAPayment($id, $request) -> Payment</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancel (void) an authorized payment before capture. Cannot cancel payments that have already been captured.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->payments->cancelAPayment(
    'id',
    new CancelPaymentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment ID
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Reason for cancellation/void
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Integrations
<details><summary><code>$client-&gt;integrations-&gt;activate($provider, $request) -> IntegrationsActivateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Activate an external integration for the merchant. Validates credentials and schedules sync.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->activate(
    IntegrationsActivateRequestProvider::Practicehub->value,
    new IntegrationsActivateRequest([
        'credentials' => new IntegrationsActivateRequestCredentials([
            'apiKey' => 'apiKey',
            'baseUrl' => 'baseUrl',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$credentials:** `IntegrationsActivateRequestCredentials` 
    
</dd>
</dl>

<dl>
<dd>

**$syncIntervalMinutes:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;deactivate($provider, $request) -> IntegrationsDeactivateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deactivate an external integration. Stops sync jobs and revokes API keys.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->deactivate(
    IntegrationsDeactivateRequestProvider::Practicehub->value,
    new IntegrationsDeactivateRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$deleteCredentials:** `?bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;getstatus($provider) -> IntegrationsGetStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the current status of an integration including sync schedule.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->getstatus(
    IntegrationsGetStatusRequestProvider::Practicehub->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;test($provider, $request) -> IntegrationsTestResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Validate credentials against the provider without activating the integration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->test(
    IntegrationsTestRequestProvider::Practicehub->value,
    new IntegrationsTestRequest([
        'credentials' => new IntegrationsTestRequestCredentials([
            'apiKey' => 'apiKey',
            'baseUrl' => 'baseUrl',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$credentials:** `IntegrationsTestRequestCredentials` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;triggersync($provider, $request) -> IntegrationsTriggerSyncResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Trigger an immediate sync job for an active integration. Pass fullResync=true to ignore the incremental cursor and re-process all records.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->triggersync(
    IntegrationsTriggerSyncRequestProvider::Practicehub->value,
    new IntegrationsTriggerSyncRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$fullResync:** `?bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;list() -> IntegrationsListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all integrations for the authenticated merchant.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;updatestatus($provider, $request) -> IntegrationsUpdateStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update integration status and last sync timestamp. Used by sync worker.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->updatestatus(
    IntegrationsUpdateStatusRequestProvider::Practicehub->value,
    new IntegrationsUpdateStatusRequest([
        'status' => IntegrationsUpdateStatusRequestStatus::Connected->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastSyncError:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;synctoggle($provider, $request) -> IntegrationsSyncToggleResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Enable or disable sync for an integration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->synctoggle(
    IntegrationsSyncToggleRequestProvider::Practicehub->value,
    new IntegrationsSyncToggleRequest([
        'enabled' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;syncinterval($provider, $request) -> IntegrationsSyncIntervalResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update the sync interval (in minutes) for an integration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->syncinterval(
    IntegrationsSyncIntervalRequestProvider::Practicehub->value,
    new IntegrationsSyncIntervalRequest([
        'syncIntervalMinutes' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$syncIntervalMinutes:** `int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;invoicelookback($provider, $request) -> IntegrationsInvoiceLookbackResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update how far back (in days) to fetch invoices on initial sync.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->invoicelookback(
    IntegrationsInvoiceLookbackRequestProvider::Practicehub->value,
    new IntegrationsInvoiceLookbackRequest([
        'invoiceLookbackDays' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$invoiceLookbackDays:** `int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;paymentmappings($provider, $request) -> IntegrationsPaymentMappingsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update payment method mappings between RevKeen and the external provider.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->paymentmappings(
    IntegrationsPaymentMappingsRequestProvider::Practicehub->value,
    new IntegrationsPaymentMappingsRequest([
        'mappings' => [
            new IntegrationsPaymentMappingsRequestMappingsItem([
                'id' => 'id',
                'revkeenMethod' => 'revkeenMethod',
                'practiceHubMethodId' => 'practiceHubMethodId',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$mappings:** `array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;getpaymentmethods($provider) -> IntegrationsGetPaymentMethodsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetch payment methods from the external provider using stored credentials.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->getpaymentmethods(
    IntegrationsGetPaymentMethodsRequestProvider::Practicehub->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;postpaymentmethods($provider, $request) -> IntegrationsPostPaymentMethodsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetch payment methods from the external provider using temporary credentials, typically during integration setup wizard.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->postpaymentmethods(
    IntegrationsPostPaymentMethodsRequestProvider::Practicehub->value,
    new IntegrationsPostPaymentMethodsRequest([
        'baseUrl' => 'baseUrl',
        'apiKey' => 'apiKey',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$baseUrl:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$apiKey:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$contactEmail:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tenantId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;syncstates($provider) -> IntegrationsSyncStatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get per-resource sync state for an integration (patients, invoices, products, etc.).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->syncstates(
    IntegrationsSyncStatesRequestProvider::Practicehub->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;synclogs($provider, $request) -> IntegrationsSyncLogsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List sync logs with filtering for the Sync History dashboard.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->synclogs(
    IntegrationsSyncLogsRequestProvider::Practicehub->value,
    new IntegrationsSyncLogsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$integrationId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$resourceType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$jobType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$createdAfter:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$createdBefore:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$latestOnly:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;synclogbyid($provider, $logId) -> IntegrationsSyncLogByIdResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a single sync log entry by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->synclogbyid(
    IntegrationsSyncLogByIdRequestProvider::Practicehub->value,
    'logId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$logId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;syncstats($provider, $integrationId) -> IntegrationsSyncStatsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get aggregate sync statistics for an integration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->syncstats(
    IntegrationsSyncStatsRequestProvider::Practicehub->value,
    'integrationId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$integrationId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;syncstatsbytype($provider, $integrationId) -> IntegrationsSyncStatsByTypeResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get sync statistics grouped by resource type for an integration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->syncstatsbytype(
    IntegrationsSyncStatsByTypeRequestProvider::Practicehub->value,
    'integrationId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$integrationId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;retrylog($provider, $logId) -> IntegrationsRetryLogResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Request retry for a failed sync log item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->retrylog(
    IntegrationsRetryLogRequestProvider::Practicehub->value,
    'logId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$logId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;batchretry($provider, $request) -> IntegrationsBatchRetryResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Request batch retry for failed sync log items of an integration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->batchretry(
    IntegrationsBatchRetryRequestProvider::Practicehub->value,
    new IntegrationsBatchRetryRequest([
        'integrationId' => 'integrationId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$integrationId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$resourceType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;getpackages($provider) -> IntegrationsGetPackagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetch packages from the external provider using stored credentials.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->getpackages(
    IntegrationsGetPackagesRequestProvider::Practicehub->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;getproductmappings($provider) -> IntegrationsGetProductMappingsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List product mappings between external packages and RevKeen products.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->getproductmappings(
    IntegrationsGetProductMappingsRequestProvider::Practicehub->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;putproductmappings($provider, $request) -> IntegrationsPutProductMappingsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Save product mappings between external packages and RevKeen products. Replaces all existing mappings in a single transaction.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->putproductmappings(
    IntegrationsPutProductMappingsRequestProvider::Practicehub->value,
    new IntegrationsPutProductMappingsRequest([
        'mappings' => [
            new IntegrationsPutProductMappingsRequestMappingsItem([
                'externalId' => 'externalId',
                'internalId' => 'internalId',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$mappings:** `array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;deleteproductmapping($provider, $externalId) -> IntegrationsDeleteProductMappingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a single product mapping by external ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->deleteproductmapping(
    IntegrationsDeleteProductMappingRequestProvider::Practicehub->value,
    'externalId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Sync State
<details><summary><code>$client-&gt;syncState-&gt;syncStateList($source, $merchantId) -> SyncStateListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get all sync states for a specific integration (by provider and merchant).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->syncState->syncStateList(
    'practicehub',
    'merchantId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$source:** `string` — Integration source (e.g., practicehub, wodify)
    
</dd>
</dl>

<dl>
<dd>

**$merchantId:** `string` — Merchant ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;syncState-&gt;syncStateUpdate($source, $merchantId, $resourceType, $request) -> SyncStateUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update or create sync state for a specific resource type. Used by worker after sync jobs.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->syncState->syncStateUpdate(
    'practicehub',
    'merchantId',
    'members',
    new SyncStateUpdateRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$source:** `string` — Integration source (e.g., practicehub, wodify)
    
</dd>
</dl>

<dl>
<dd>

**$merchantId:** `string` — Merchant ID
    
</dd>
</dl>

<dl>
<dd>

**$resourceType:** `string` — Resource type (e.g., members, products, payments)
    
</dd>
</dl>

<dl>
<dd>

**$lastSyncAt:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$lastSyncStatus:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastSyncError:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$cursor:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$itemsSynced:** `?float` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Webhook Endpoints
<details><summary><code>$client-&gt;webhookEndpoints-&gt;webhookEndpointsList($request) -> WebhookEndpointListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a list of all configured webhook endpoints for your account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhookEndpoints->webhookEndpointsList(
    new WebhookEndpointsListRequest([
        'limit' => 20,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by status
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Number of results to return (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?float` — Number of results to skip
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhookEndpoints-&gt;webhookEndpointsCreate($request) -> WebhookEndpointCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new webhook endpoint to receive event notifications.

A signing secret is automatically generated and returned **only in this response**.
Store it securely - you'll need it to verify webhook signatures.

## Event Patterns

Subscribe to specific events using dot notation or wildcards:
- `payment.succeeded` - Specific event
- `invoice.*` - All invoice events
- `*` - All events

## Signature Verification

All webhooks include an `X-Revkeen-Signature` header for verification.
See the [Webhooks documentation](https://docs.revkeen.com/webhooks) for verification examples.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhookEndpoints->webhookEndpointsCreate(
    new CreateWebhookEndpointInput([
        'url' => 'https://api.example.com/webhooks/revkeen',
        'enabledEvents' => [
            'payment.succeeded',
            'invoice.paid',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$url:** `string` — The URL that will receive webhook events
    
</dd>
</dl>

<dl>
<dd>

**$enabledEvents:** `array` — Events to subscribe to. Use wildcards like `invoice.*` or `*` for all events.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Optional description for this endpoint
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhookEndpoints-&gt;webhookEndpointsRetrieve($id) -> WebhookEndpointRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve details of a specific webhook endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhookEndpoints->webhookEndpointsRetrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Webhook endpoint ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhookEndpoints-&gt;webhookEndpointsDelete($id) -> WebhookEndpointDeleteResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a webhook endpoint. All pending deliveries for this endpoint will be cancelled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhookEndpoints->webhookEndpointsDelete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Webhook endpoint ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhookEndpoints-&gt;webhookEndpointsUpdate($id, $request) -> WebhookEndpointUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing webhook endpoint. You can change the URL, subscribed events, or enable/disable the endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhookEndpoints->webhookEndpointsUpdate(
    'id',
    new UpdateWebhookEndpointInput([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Webhook endpoint ID
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — Update the webhook URL
    
</dd>
</dl>

<dl>
<dd>

**$enabledEvents:** `?array` — Update the subscribed events
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Update the description
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Enable or disable the endpoint
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhookEndpoints-&gt;webhookEndpointsRotateSecret($id) -> WebhookEndpointRotateSecretResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Generate a new signing secret for this webhook endpoint.

The new secret is returned **only in this response** - store it securely.
The old secret will be invalidated immediately.

**Note:** Update your webhook handler to use the new secret before making this call,
or webhooks may fail verification until you update your code.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhookEndpoints->webhookEndpointsRotateSecret(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Webhook endpoint ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Payment Intents
<details><summary><code>$client-&gt;paymentIntents-&gt;list($request) -> PaymentIntentListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of payment intents with optional filtering.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentIntents->list(
    new PaymentIntentsListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customer:** `?string` — Filter by customer ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by status
    
</dd>
</dl>

<dl>
<dd>

**$createdGte:** `?float` — Filter by created_at >= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$createdLte:** `?float` — Filter by created_at <= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination - return results after this ID (pi_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination - return results before this ID (pi_xxx)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentIntents-&gt;create($request) -> PaymentIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a payment intent to orchestrate payment collection with support for 3DS/SCA authentication.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentIntents->create(
    new CreatePaymentIntentRequest([
        'amount' => 5000,
        'customer' => 'customer',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$amount:** `int` — Amount in cents. Must be greater than 0.
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` — Three-letter ISO currency code. Defaults to USD.
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `string` — Customer ID to charge
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethod:** `?string` — Payment method ID. If not provided, status will be requires_payment_method.
    
</dd>
</dl>

<dl>
<dd>

**$captureMethod:** `?string` — Capture method. Defaults to automatic.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Description for merchant reference
    
</dd>
</dl>

<dl>
<dd>

**$statementDescriptor:** `?string` — Statement descriptor shown on customer's statement
    
</dd>
</dl>

<dl>
<dd>

**$statementDescriptorSuffix:** `?string` — Statement descriptor suffix
    
</dd>
</dl>

<dl>
<dd>

**$receiptEmail:** `?string` — Email to send receipt to
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>

<dl>
<dd>

**$gatewayMerchantId:** `?string` — Specific gateway merchant ID for multi-MID setups (NMI)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentIntents-&gt;retrieve($id) -> PaymentIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a payment intent by its ID (pi_xxx).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentIntents->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment intent ID (pi_xxx)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentIntents-&gt;update($id, $request) -> PaymentIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a payment intent. Only certain fields can be updated based on the intent's status.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentIntents->update(
    'id',
    new UpdatePaymentIntentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment intent ID (pi_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$amount:** `?int` — Amount in cents
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` — Three-letter ISO currency code
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethod:** `?string` — Payment method ID
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Description for merchant reference
    
</dd>
</dl>

<dl>
<dd>

**$statementDescriptor:** `?string` — Statement descriptor
    
</dd>
</dl>

<dl>
<dd>

**$statementDescriptorSuffix:** `?string` — Statement descriptor suffix
    
</dd>
</dl>

<dl>
<dd>

**$receiptEmail:** `?string` — Email to send receipt to
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom key-value metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentIntents-&gt;confirm($id, $request) -> PaymentIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Confirms the payment intent. May return requires_action if 3DS authentication is needed.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentIntents->confirm(
    'id',
    new ConfirmPaymentIntentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment intent ID (pi_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethod:** `?string` — Payment method ID. Required if not already set on the intent.
    
</dd>
</dl>

<dl>
<dd>

**$returnUrl:** `?string` — URL to redirect to after 3DS authentication
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentIntents-&gt;capture($id, $request) -> PaymentIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Captures a payment intent that was created with capture_method=manual.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentIntents->capture(
    'id',
    new CapturePaymentIntentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment intent ID (pi_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$amountToCapture:** `?int` — Amount to capture in cents. Defaults to full authorized amount.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentIntents-&gt;cancel($id, $request) -> PaymentIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels a payment intent. Cannot cancel if already succeeded or canceled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentIntents->cancel(
    'id',
    new CancelPaymentIntentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment intent ID (pi_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$cancellationReason:** `?string` — Reason for cancellation
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Setup Intents
<details><summary><code>$client-&gt;setupIntents-&gt;list($request) -> SetupIntentList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of setup intents. The setup intents are returned sorted by creation date, with the most recent first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->setupIntents->list(
    new ListSetupIntentsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by status
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results to return
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination (setup intent ID)
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination (setup intent ID)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;setupIntents-&gt;create($request) -> SetupIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new setup intent for saving a payment method without charging.

**Use Cases:**
- Save a card for future subscription payments
- Pre-authorize a payment method with 3DS/SCA verification
- Collect payment details for later use (off-session payments)

The setup intent is created in `requires_payment_method` status. Use the `client_secret` to complete the setup flow on the client side.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->setupIntents->create(
    new CreateSetupIntentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` — ID of the customer to attach the payment method to
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethodTypes:** `?array` — Allowed payment method types
    
</dd>
</dl>

<dl>
<dd>

**$usage:** `?string` — How the payment method will be used
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Merchant description for reference
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom metadata to attach
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;setupIntents-&gt;retrieve($id) -> SetupIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a setup intent by ID. You can use either the internal UUID or the public ID (seti_xxx format).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->setupIntents->retrieve(
    'seti_1a2b3c4d5e6f',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Setup Intent ID (UUID or public ID seti_xxx)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;setupIntents-&gt;update($id, $request) -> SetupIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a setup intent that has not yet been confirmed or canceled.

You can update:
- `customer_id` - The customer to attach the payment method to
- `payment_method_types` - Allowed payment method types
- `description` - Merchant description
- `metadata` - Custom metadata
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->setupIntents->update(
    'seti_1a2b3c4d5e6f',
    new UpdateSetupIntentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Setup Intent ID (UUID or public ID seti_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` — ID of the customer to attach the payment method to
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethodTypes:** `?array` — Allowed payment method types
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Merchant description for reference
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom metadata to attach
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;setupIntents-&gt;confirm($id, $request) -> SetupIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Confirms a setup intent and saves the payment method.

**3DS/SCA Flow:**
If the payment method requires authentication, the setup intent will transition to `requires_action` status with a `next_action` containing the redirect URL. After the customer completes authentication, the setup intent will automatically transition to `succeeded`.

**Direct Confirmation:**
If no authentication is required, the setup intent will immediately transition to `succeeded` and the payment method will be saved to the customer.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->setupIntents->confirm(
    'seti_1a2b3c4d5e6f',
    new ConfirmSetupIntentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Setup Intent ID (UUID or public ID seti_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$paymentMethodId:** `?string` — ID of the payment method to confirm with
    
</dd>
</dl>

<dl>
<dd>

**$returnUrl:** `?string` — URL to redirect to after 3DS authentication
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;setupIntents-&gt;cancel($id, $request) -> SetupIntent</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels a setup intent that has not yet succeeded.

Once canceled, the setup intent cannot be confirmed. A new setup intent must be created to save a payment method.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->setupIntents->cancel(
    'seti_1a2b3c4d5e6f',
    new CancelSetupIntentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Setup Intent ID (UUID or public ID seti_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$cancellationReason:** `?string` — Reason for cancellation
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Payment Methods
<details><summary><code>$client-&gt;paymentMethods-&gt;list($request) -> PaymentMethodList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of payment methods for the merchant. You can filter by customer to see only their payment methods.

By default, this returns payment methods sorted by creation date, with the most recent first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentMethods->list(
    new ListPaymentMethodsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer ID
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Filter by payment method type
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results to return
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination (payment method ID)
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination (payment method ID)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentMethods-&gt;retrieve($id) -> PaymentMethod</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a payment method by ID. You can use either the internal UUID or the public ID (pm_xxx format).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentMethods->retrieve(
    'pm_1a2b3c4d5e6f',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment Method ID (UUID or public ID pm_xxx)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentMethods-&gt;update($id, $request) -> PaymentMethod</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a payment method's billing details or metadata.

**Note:** You cannot update the card number, expiration date, or other sensitive card details. To update those, create a new payment method.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentMethods->update(
    'pm_1a2b3c4d5e6f',
    new UpdatePaymentMethodRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment Method ID (UUID or public ID pm_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$billingDetails:** `?BillingDetails` 
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom metadata to attach
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentMethods-&gt;attach($id, $request) -> PaymentMethod</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attaches a payment method to a customer. This is typically used after creating a payment method via a Setup Intent.

If the payment method is already attached to a different customer, this will detach it first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentMethods->attach(
    'pm_1a2b3c4d5e6f',
    new AttachPaymentMethodRequest([
        'customerId' => '550e8400-e29b-41d4-a716-446655440000',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment Method ID (UUID or public ID pm_xxx)
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `string` — ID of the customer to attach the payment method to
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;paymentMethods-&gt;detach($id) -> PaymentMethod</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detaches a payment method from its customer. After detaching, the payment method can no longer be used for payments.

This operation soft-deletes the payment method by setting its status to 'inactive'.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentMethods->detach(
    'pm_1a2b3c4d5e6f',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Payment Method ID (UUID or public ID pm_xxx)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Events
<details><summary><code>$client-&gt;events-&gt;list($request) -> EventListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of events with optional filters. Events are returned in reverse chronological order.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->list(
    new EventsListRequest([
        'type' => 'invoice.paid',
        'types' => 'invoice.paid,payment.succeeded',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$type:** `?string` — Filter by event type (e.g., invoice.paid)
    
</dd>
</dl>

<dl>
<dd>

**$types:** `?string` — Filter by multiple event types (comma-separated)
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` — Filter by customer ID
    
</dd>
</dl>

<dl>
<dd>

**$invoiceId:** `?string` — Filter by invoice ID
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionId:** `?string` — Filter by subscription ID
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `?string` — Filter by order ID
    
</dd>
</dl>

<dl>
<dd>

**$createdGte:** `?float` — Filter by created_at >= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$createdLte:** `?float` — Filter by created_at <= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination - return results after this event ID
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor for pagination - return results before this event ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;events-&gt;retrieve($id) -> Event</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves the details of an event by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Event ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;events-&gt;resend($id) -> ResendWebhookResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues the event to be resent to all configured webhook endpoints.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->resend(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Event ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;events-&gt;createTest($request) -> TestEventResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a simulated test event that triggers webhook delivery to configured endpoints. Useful for testing webhook integrations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->createTest(
    new CreateTestEventRequest([
        'type' => CreateTestEventRequestType::CheckoutSessionCompleted->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$type:** `string` — The type of test event to create
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Subscription Schedules
<details><summary><code>$client-&gt;subscriptionSchedules-&gt;list($request) -> SubscriptionScheduleListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of subscription schedules with optional filters.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptionSchedules->list(
    new SubscriptionSchedulesListRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customer:** `?string` — Filter by customer ID
    
</dd>
</dl>

<dl>
<dd>

**$subscription:** `?string` — Filter by subscription ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by status
    
</dd>
</dl>

<dl>
<dd>

**$scheduledGte:** `?float` — Start date >= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$scheduledLte:** `?float` — Start date <= (Unix timestamp)
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Max results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor - return results after this ID
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Cursor - return results before this ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptionSchedules-&gt;create($request) -> SubscriptionSchedule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a subscription schedule to manage future subscription changes. Schedules define phases with different pricing/plans that transition automatically.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptionSchedules->create(
    new CreateSubscriptionScheduleRequest([
        'phases' => [
            new SchedulePhase([
                'items' => [
                    new PhaseItem([
                        'priceId' => 'price_id',
                    ]),
                ],
                'startDate' => '2026-03-01T00:00:00Z',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customer:** `?string` — Customer ID (required if no subscription)
    
</dd>
</dl>

<dl>
<dd>

**$subscription:** `?string` — Existing subscription to attach schedule to
    
</dd>
</dl>

<dl>
<dd>

**$startDate:** `string|DateTime|int|null` — When schedule starts. 'now', ISO date, or Unix timestamp. Defaults to now.
    
</dd>
</dl>

<dl>
<dd>

**$phases:** `array` — Phases defining the schedule (at least one required)
    
</dd>
</dl>

<dl>
<dd>

**$endBehavior:** `?string` — What happens when all phases complete
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptionSchedules-&gt;retrieve($id) -> SubscriptionSchedule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a subscription schedule by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptionSchedules->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Schedule ID (sub_sched_xxx or UUID)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptionSchedules-&gt;update($id, $request) -> SubscriptionSchedule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a subscription schedule. Only schedules in 'not_started' or 'active' status can be updated.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptionSchedules->update(
    'id',
    new UpdateSubscriptionScheduleRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Schedule ID (sub_sched_xxx or UUID)
    
</dd>
</dl>

<dl>
<dd>

**$phases:** `?array` — Replace all phases
    
</dd>
</dl>

<dl>
<dd>

**$endBehavior:** `?string` — What happens when all phases complete
    
</dd>
</dl>

<dl>
<dd>

**$prorationBehavior:** `?string` — Proration behavior when updating phases
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — Custom metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptionSchedules-&gt;cancel($id, $request) -> SubscriptionSchedule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels a subscription schedule. Only schedules in 'not_started' or 'active' status can be canceled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptionSchedules->cancel(
    'id',
    new CancelSubscriptionScheduleRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Schedule ID (sub_sched_xxx or UUID)
    
</dd>
</dl>

<dl>
<dd>

**$invoiceNow:** `?bool` — Generate a final invoice immediately
    
</dd>
</dl>

<dl>
<dd>

**$prorate:** `?bool` — Prorate final invoice
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscriptionSchedules-&gt;release($id, $request) -> SubscriptionSchedule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Releases a subscription schedule, detaching it from the subscription. The subscription becomes standalone and continues normally.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptionSchedules->release(
    'id',
    new ReleaseSubscriptionScheduleRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Schedule ID (sub_sched_xxx or UUID)
    
</dd>
</dl>

<dl>
<dd>

**$preserveCancelDate:** `?bool` — Keep the subscription's cancel_at date if set
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Terminal Payments
<details><summary><code>$client-&gt;terminalPayments-&gt;list($request) -> TerminalPaymentListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List terminal payment attempts for the authenticated merchant. Supports filtering by invoice, status, type, and device. Uses cursor-based pagination.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->terminalPayments->list(
    new ListTerminalPaymentsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$invoiceId:** `?string` — Filter by invoice ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by payment status
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Filter by payment type
    
</dd>
</dl>

<dl>
<dd>

**$deviceId:** `?string` — Filter by device ID
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of results (1-100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination — return results after this terminal payment ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;terminalPayments-&gt;create($request) -> TerminalPaymentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Send a card-present payment request to a specific terminal device. The payment is dispatched to the merchant's POS connector which forwards it to the PAX terminal.

**Device Selection:** You must provide a `device_id`. Use [List Terminal Devices](#tag/Terminal-Devices/operation/terminal_devices_list) to discover available devices and their IDs. Even merchants with a single terminal must pass the `device_id` explicitly — there is no auto-routing fallback.

**Invoice Association:** `invoice_id` is optional. Omit it for walk-in or ad-hoc payments where no pre-existing invoice exists.

The response returns immediately with status `requested`. Subscribe to terminal webhooks (`billing.terminal_payment.succeeded`, `billing.terminal_payment.declined`, etc.) to receive the outcome asynchronously.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->terminalPayments->create(
    new CreateTerminalPaymentRequest([
        'deviceId' => 'd1e2f3a4-b5c6-7890-abcd-ef1234567890',
        'amountMinor' => 5000,
        'currency' => 'GBP',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$deviceId:** `string` — The ID of the terminal device to send the payment to. Use List Devices to discover available device IDs. Even merchants with a single terminal must pass the device_id explicitly — there is no auto-routing fallback.
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `int` — Amount in minor units (e.g., pence for GBP, cents for USD)
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `string` — ISO 4217 currency code
    
</dd>
</dl>

<dl>
<dd>

**$invoiceId:** `?string` — The invoice to charge. Omit for walk-in or ad-hoc payments where no invoice exists. When omitted, the terminal payment is recorded without an invoice association.
    
</dd>
</dl>

<dl>
<dd>

**$reference:** `?string` — Custom reference for the payment. Auto-generated if not provided.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;terminalPayments-&gt;retrieve($id) -> TerminalPaymentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a terminal payment attempt by ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->terminalPayments->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Terminal payment attempt ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;terminalPayments-&gt;cancel($id) -> TerminalPaymentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancel an in-progress terminal payment. Only payments with status `requested` or `in_progress` can be cancelled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->terminalPayments->cancel(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Terminal payment attempt ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;terminalPayments-&gt;refund($id, $request) -> TerminalPaymentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Initiate a refund for a completed terminal payment. The refund is sent to the same terminal that processed the original sale.

`amount_minor` is optional — omit for a full refund. For partial refunds, specify the amount in minor units.

The refund command is dispatched asynchronously. Subscribe to `billing.terminal_refund.succeeded` webhooks for the outcome.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->terminalPayments->refund(
    'id',
    new RefundTerminalPaymentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Terminal payment attempt ID of the original sale
    
</dd>
</dl>

<dl>
<dd>

**$amountMinor:** `?int` — Amount to refund in minor units. Omit for a full refund.
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Reason for the refund
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;terminalPayments-&gt;void($id, $request) -> TerminalPaymentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Void a completed terminal payment. Voids are always for the full amount — partial voids are not supported. The void is sent to the same terminal that processed the original sale.

Voids are only possible for unsettled transactions. If the transaction has already settled, use a refund instead.

The void command is dispatched asynchronously. Subscribe to `billing.terminal_void.succeeded` webhooks for the outcome.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->terminalPayments->void(
    'id',
    new VoidTerminalPaymentRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Terminal payment attempt ID of the original sale
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Reason for the void
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Terminal Devices
<details><summary><code>$client-&gt;terminalDevices-&gt;list($request) -> TerminalDeviceListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all terminal devices registered for the authenticated merchant. Use this endpoint to discover device IDs before initiating a terminal payment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->terminalDevices->list(
    new ListTerminalDevicesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by device status
    
</dd>
</dl>

<dl>
<dd>

**$terminalPaired:** `?bool` — Filter by terminal pairing status
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;terminalDevices-&gt;retrieve($id) -> TerminalDeviceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a terminal device by ID, including its current status and heartbeat information.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->terminalDevices->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Terminal device ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## PaymentAttempts Analytics
<details><summary><code>$client-&gt;paymentAttempts-&gt;analytics-&gt;getDeclines($request) -> DeclineAnalyticsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get decline analytics for the merchant including approval rates, decline categories, and per-gateway breakdown.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->paymentAttempts->analytics->getDeclines(
    new GetDeclinesAnalyticsRequest([
        'startDate' => new DateTime('2024-01-01T00:00:00Z'),
        'endDate' => new DateTime('2024-12-31T23:59:59Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$startDate:** `?DateTime` — Start date (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$endDate:** `?DateTime` — End date (ISO 8601)
    
</dd>
</dl>

<dl>
<dd>

**$gateway:** `?string` — Filter by gateway (e.g., 'nmi', 'stripe')
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>
