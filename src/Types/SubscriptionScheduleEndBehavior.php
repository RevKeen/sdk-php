<?php

namespace RevKeen\Types;

enum SubscriptionScheduleEndBehavior: string
{
    case Cancel = "cancel";
    case Release = "release";
}
