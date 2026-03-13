<?php

namespace RevKeen\PaymentLinks\Types;

enum ListPaymentLinksResponseDataItemTaxBehavior: string
{
    case Exclusive = "exclusive";
    case Inclusive = "inclusive";
    case Unspecified = "unspecified";
}
