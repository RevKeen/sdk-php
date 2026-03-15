<?php

namespace RevKeen\Analytics\Types;

enum AnalyticsCollectionsGetDsoResponseTrend: string
{
    case Improving = "improving";
    case Stable = "stable";
    case Declining = "declining";
}
