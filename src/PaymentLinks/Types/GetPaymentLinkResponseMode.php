<?php

namespace RevKeen\PaymentLinks\Types;

enum GetPaymentLinkResponseMode: string
{
    case Invoice = "invoice";
    case Subscription = "subscription";
    case Custom = "custom";
}
