<?php

namespace RevKeen\Types;

enum SubscriptionReactivateResponseDataDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
