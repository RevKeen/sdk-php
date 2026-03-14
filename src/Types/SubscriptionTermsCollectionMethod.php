<?php

namespace RevKeen\Types;

enum SubscriptionTermsCollectionMethod: string
{
    case ChargeAutomatically = "charge_automatically";
    case SendInvoice = "send_invoice";
}
