<?php

namespace RevKeen\Billing\Types;

enum BillingGeneratePreviewRequestEndBehavior: string
{
    case UntilCanceled = "until_canceled";
    case FixedPayments = "fixed_payments";
}
