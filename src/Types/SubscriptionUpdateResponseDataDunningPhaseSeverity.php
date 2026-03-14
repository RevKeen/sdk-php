<?php

namespace RevKeen\Types;

enum SubscriptionUpdateResponseDataDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
