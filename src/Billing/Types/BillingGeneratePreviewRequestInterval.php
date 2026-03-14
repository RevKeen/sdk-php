<?php

namespace RevKeen\Billing\Types;

enum BillingGeneratePreviewRequestInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Quarter = "quarter";
    case HalfYear = "half_year";
    case Year = "year";
}
