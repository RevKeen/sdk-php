<?php

namespace RevKeen\Analytics\Types;

enum AnalyticsRevenueGetTimeSeriesRequestGranularity: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Quarter = "quarter";
    case Year = "year";
}
