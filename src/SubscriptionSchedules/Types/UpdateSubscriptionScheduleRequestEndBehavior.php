<?php

namespace RevKeen\SubscriptionSchedules\Types;

enum UpdateSubscriptionScheduleRequestEndBehavior: string
{
    case Cancel = "cancel";
    case Release = "release";
}
