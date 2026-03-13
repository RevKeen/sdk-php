<?php

namespace RevKeen\Analytics\Types;

enum AnalyticsCheckoutAbandonmentListRequestSeverity: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
    case Critical = "critical";
}
