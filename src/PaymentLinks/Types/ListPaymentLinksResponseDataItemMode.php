<?php

namespace RevKeen\PaymentLinks\Types;

enum ListPaymentLinksResponseDataItemMode: string
{
    case Invoice = "invoice";
    case Subscription = "subscription";
    case Custom = "custom";
}
