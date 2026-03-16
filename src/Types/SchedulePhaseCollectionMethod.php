<?php

namespace RevKeen\Types;

enum SchedulePhaseCollectionMethod: string
{
    case ChargeAutomatically = "charge_automatically";
    case SendInvoice = "send_invoice";
}
