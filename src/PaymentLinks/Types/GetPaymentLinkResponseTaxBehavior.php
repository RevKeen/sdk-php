<?php

namespace RevKeen\PaymentLinks\Types;

enum GetPaymentLinkResponseTaxBehavior: string
{
    case Exclusive = "exclusive";
    case Inclusive = "inclusive";
    case Unspecified = "unspecified";
}
