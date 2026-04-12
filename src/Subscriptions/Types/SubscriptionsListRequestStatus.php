<?php

namespace RevKeen\Subscriptions\Types;

enum SubscriptionsListRequestStatus: string
{
    case Active = "active";
    case Canceled = "canceled";
    case PastDue = "past_due";
    case Trialing = "trialing";
    case Paused = "paused";
    case Incomplete = "incomplete";
    case IncompleteExpired = "incomplete_expired";
}
