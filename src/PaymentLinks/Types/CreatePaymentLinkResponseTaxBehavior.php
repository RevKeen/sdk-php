<?php

namespace RevKeen\PaymentLinks\Types;

enum CreatePaymentLinkResponseTaxBehavior: string
{
    case Exclusive = "exclusive";
    case Inclusive = "inclusive";
    case Unspecified = "unspecified";
}
