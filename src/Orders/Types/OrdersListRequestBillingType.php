<?php

namespace RevKeen\Orders\Types;

enum OrdersListRequestBillingType: string
{
    case OneTime = "one_time";
    case Recurring = "recurring";
}
