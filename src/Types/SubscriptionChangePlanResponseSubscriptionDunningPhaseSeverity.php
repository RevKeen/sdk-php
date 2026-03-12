<?php

namespace RevKeen\Types;

enum SubscriptionChangePlanResponseSubscriptionDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
