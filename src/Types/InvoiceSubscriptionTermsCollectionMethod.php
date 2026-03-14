<?php

namespace RevKeen\Types;

enum InvoiceSubscriptionTermsCollectionMethod: string
{
    case ChargeAutomatically = "charge_automatically";
    case SendInvoice = "send_invoice";
}
