<?php

namespace RevKeen\Types;

enum SubscriptionChangeQuantityResponseSubscriptionStatus: string
{
    case Trialing = "trialing";
    case Active = "active";
    case PastDue = "past_due";
    case Paused = "paused";
    case Canceled = "canceled";
    case Expired = "expired";
}
