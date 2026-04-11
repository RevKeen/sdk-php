<?php

namespace RevKeen\Subscriptions\Types;

enum SubscriptionsCreateRequestProrationMode: string
{
    case Immediate = "immediate";
    case NextInvoice = "next_invoice";
    case None = "none";
}
