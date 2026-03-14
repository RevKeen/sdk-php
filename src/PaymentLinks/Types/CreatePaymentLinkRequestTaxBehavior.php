<?php

namespace RevKeen\PaymentLinks\Types;

enum CreatePaymentLinkRequestTaxBehavior: string
{
    case Exclusive = "exclusive";
    case Inclusive = "inclusive";
    case Unspecified = "unspecified";
}
