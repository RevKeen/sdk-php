<?php

namespace RevKeen\Subscriptions\Types;

enum CancelSubscriptionInputMode: string
{
    case Immediately = "immediately";
    case PeriodEnd = "period_end";
}
