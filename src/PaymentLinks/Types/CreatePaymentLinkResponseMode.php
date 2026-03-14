<?php

namespace RevKeen\PaymentLinks\Types;

enum CreatePaymentLinkResponseMode: string
{
    case Invoice = "invoice";
    case Subscription = "subscription";
    case Custom = "custom";
}
