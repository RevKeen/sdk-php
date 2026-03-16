<?php

namespace RevKeen\Types;

enum SchedulePhaseProrationBehavior: string
{
    case CreateProrations = "create_prorations";
    case None = "none";
    case AlwaysInvoice = "always_invoice";
}
