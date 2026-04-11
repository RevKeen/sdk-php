<?php

namespace RevKeen\Types;

enum PriceType: string
{
    case OneTime = "one_time";
    case Recurring = "recurring";
}
