<?php

namespace RevKeen\Types;

enum SubscriptionCancelSubscriptionResponseDataStatus: string
{
    case Trialing = "trialing";
    case Active = "active";
    case PastDue = "past_due";
    case Paused = "paused";
    case Canceled = "canceled";
    case Expired = "expired";
}
