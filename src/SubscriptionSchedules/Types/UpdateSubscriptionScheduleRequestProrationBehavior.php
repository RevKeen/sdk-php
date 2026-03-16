<?php

namespace RevKeen\SubscriptionSchedules\Types;

enum UpdateSubscriptionScheduleRequestProrationBehavior: string
{
    case CreateProrations = "create_prorations";
    case None = "none";
    case AlwaysInvoice = "always_invoice";
}
