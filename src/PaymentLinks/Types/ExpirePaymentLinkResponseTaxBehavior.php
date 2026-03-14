<?php

namespace RevKeen\PaymentLinks\Types;

enum ExpirePaymentLinkResponseTaxBehavior: string
{
    case Exclusive = "exclusive";
    case Inclusive = "inclusive";
    case Unspecified = "unspecified";
}
