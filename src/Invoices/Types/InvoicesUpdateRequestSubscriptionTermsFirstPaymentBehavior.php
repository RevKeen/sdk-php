<?php

namespace RevKeen\Invoices\Types;

enum InvoicesUpdateRequestSubscriptionTermsFirstPaymentBehavior: string
{
    case ChargeFirstCycleNow = "charge_first_cycle_now";
    case DeferFirstCycleToStartDate = "defer_first_cycle_to_start_date";
}
