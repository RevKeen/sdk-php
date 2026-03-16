<?php

namespace RevKeen\Types;

enum SubscriptionChangeQuantityResponseSubscriptionDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
