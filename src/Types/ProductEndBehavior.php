<?php

namespace RevKeen\Types;

enum ProductEndBehavior: string
{
    case UntilCanceled = "until_canceled";
    case FixedPayments = "fixed_payments";
}
