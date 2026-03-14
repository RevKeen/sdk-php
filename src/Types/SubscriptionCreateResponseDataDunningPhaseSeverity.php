<?php

namespace RevKeen\Types;

enum SubscriptionCreateResponseDataDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
