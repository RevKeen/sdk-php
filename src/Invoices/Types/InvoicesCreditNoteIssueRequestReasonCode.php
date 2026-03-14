<?php

namespace RevKeen\Invoices\Types;

enum InvoicesCreditNoteIssueRequestReasonCode: string
{
    case CustomerRequest = "customer_request";
    case DuplicateCharge = "duplicate_charge";
    case ServiceIssue = "service_issue";
    case BillingError = "billing_error";
    case PartialRefund = "partial_refund";
    case Goodwill = "goodwill";
    case SubscriptionCancellation = "subscription_cancellation";
    case Proration = "proration";
    case Other = "other";
}
