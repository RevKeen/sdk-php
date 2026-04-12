<?php

namespace RevKeen\Exports\Types;

enum CreateExportRequestResourceType: string
{
    case Customers = "customers";
    case Invoices = "invoices";
    case Transactions = "transactions";
    case Subscriptions = "subscriptions";
    case Products = "products";
    case PaymentMethods = "payment_methods";
}
