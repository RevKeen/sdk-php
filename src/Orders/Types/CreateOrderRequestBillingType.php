<?php

namespace RevKeen\Orders\Types;

enum CreateOrderRequestBillingType: string
{
    case OneTime = "one_time";
    case Recurring = "recurring";
}
