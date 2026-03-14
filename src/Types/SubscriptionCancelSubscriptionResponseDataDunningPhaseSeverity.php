<?php

namespace RevKeen\Types;

enum SubscriptionCancelSubscriptionResponseDataDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
