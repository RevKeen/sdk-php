<?php

namespace RevKeen\Types;

enum InvoiceSubscriptionTermsFirstPaymentBehavior: string
{
    case ChargeFirstCycleNow = "charge_first_cycle_now";
    case DeferFirstCycleToStartDate = "defer_first_cycle_to_start_date";
}
