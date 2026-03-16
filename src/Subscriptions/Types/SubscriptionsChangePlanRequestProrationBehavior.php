<?php

namespace RevKeen\Subscriptions\Types;

enum SubscriptionsChangePlanRequestProrationBehavior: string
{
    case InvoiceImmediately = "invoice_immediately";
    case NextInvoice = "next_invoice";
    case None = "none";
}
