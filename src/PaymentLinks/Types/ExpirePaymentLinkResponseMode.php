<?php

namespace RevKeen\PaymentLinks\Types;

enum ExpirePaymentLinkResponseMode: string
{
    case Invoice = "invoice";
    case Subscription = "subscription";
    case Custom = "custom";
}
