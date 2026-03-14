<?php

namespace RevKeen\Types;

enum SubscriptionPauseResponseDataDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
