<?php

namespace RevKeen\Products\Types;

enum UpdateProductRequestEndBehavior: string
{
    case UntilCanceled = "until_canceled";
    case FixedPayments = "fixed_payments";
}
