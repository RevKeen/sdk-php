<?php

namespace RevKeen\Subscriptions\Types;

enum SubscriptionsChangeQuantityRequestProrationBehavior: string
{
    case InvoiceImmediately = "invoice_immediately";
    case NextInvoice = "next_invoice";
    case None = "none";
}
