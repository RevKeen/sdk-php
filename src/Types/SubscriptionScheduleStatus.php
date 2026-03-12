<?php

namespace RevKeen\Types;

enum SubscriptionScheduleStatus: string
{
    case NotStarted = "not_started";
    case Active = "active";
    case Completed = "completed";
    case Canceled = "canceled";
    case Released = "released";
}
