<?php

namespace RevKeen\PaymentLinks\Types;

enum CreatePaymentLinkRequestMode: string
{
    case Invoice = "invoice";
    case Subscription = "subscription";
    case Custom = "custom";
}
