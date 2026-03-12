<?php

namespace RevKeen\Types;

enum OrderBillingType: string
{
    case OneTime = "one_time";
    case Recurring = "recurring";
}
