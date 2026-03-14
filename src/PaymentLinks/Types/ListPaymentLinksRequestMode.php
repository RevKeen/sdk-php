<?php

namespace RevKeen\PaymentLinks\Types;

enum ListPaymentLinksRequestMode: string
{
    case Invoice = "invoice";
    case Subscription = "subscription";
    case Custom = "custom";
}
