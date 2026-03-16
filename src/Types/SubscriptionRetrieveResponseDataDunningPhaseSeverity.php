<?php

namespace RevKeen\Types;

enum SubscriptionRetrieveResponseDataDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
