<?php

namespace RevKeen\Types;

enum SubscriptionResumeResponseDataDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
