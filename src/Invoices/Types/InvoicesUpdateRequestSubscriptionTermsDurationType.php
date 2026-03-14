<?php

namespace RevKeen\Invoices\Types;

enum InvoicesUpdateRequestSubscriptionTermsDurationType: string
{
    case UntilCancelled = "until_cancelled";
    case FixedCycles = "fixed_cycles";
    case EndDate = "end_date";
}
