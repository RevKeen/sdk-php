<?php

namespace RevKeen\Products\Types;

enum CreateProductRequestEndBehavior: string
{
    case UntilCanceled = "until_canceled";
    case FixedPayments = "fixed_payments";
}
