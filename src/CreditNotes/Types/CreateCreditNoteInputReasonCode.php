<?php

namespace RevKeen\CreditNotes\Types;

enum CreateCreditNoteInputReasonCode: string
{
    case CustomerRequest = "customer_request";
    case DuplicateCharge = "duplicate_charge";
    case ServiceIssue = "service_issue";
    case BillingError = "billing_error";
    case SubscriptionCancellation = "subscription_cancellation";
    case Proration = "proration";
    case Other = "other";
}
