<?php

namespace RevKeen\Invoices\Types;

enum InvoicesCreditNoteIssueRequestCreditMethod: string
{
    case RefundToPaymentMethod = "refund_to_payment_method";
    case CustomerBalance = "customer_balance";
    case External = "external";
}
