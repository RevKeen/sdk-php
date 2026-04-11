<?php

namespace RevKeen\Invoices\Types;

enum InvoicesUpdateRequestSubscriptionTermsCollectionMethod: string
{
    case ChargeAutomatically = "charge_automatically";
    case SendInvoice = "send_invoice";
}
