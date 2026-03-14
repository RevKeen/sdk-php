<?php

namespace RevKeen\Types;

enum SubscriptionListResponseDataItemDunningPhaseSeverity: string
{
    case Info = "info";
    case Warning = "warning";
    case Critical = "critical";
}
