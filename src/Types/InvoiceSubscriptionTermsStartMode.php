<?php

namespace RevKeen\Types;

enum InvoiceSubscriptionTermsStartMode: string
{
    case WhenPaid = "when_paid";
    case OnInvoiceDate = "on_invoice_date";
    case FirstOfNextMonth = "first_of_next_month";
    case SpecificDate = "specific_date";
}
