<?php

namespace RevKeen\SubscriptionSchedules\Types;

enum CreateSubscriptionScheduleRequestEndBehavior: string
{
    case Cancel = "cancel";
    case Release = "release";
}
