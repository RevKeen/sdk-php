<?php

namespace RevKeen\SubscriptionSchedules\Types;

enum SubscriptionSchedulesListRequestStatus: string
{
    case NotStarted = "not_started";
    case Active = "active";
    case Completed = "completed";
    case Canceled = "canceled";
    case Released = "released";
}
