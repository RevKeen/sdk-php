<?php

namespace RevKeen\Types;

enum SubscriptionTermsDurationType: string
{
    case UntilCancelled = "until_cancelled";
    case FixedCycles = "fixed_cycles";
    case EndDate = "end_date";
}
