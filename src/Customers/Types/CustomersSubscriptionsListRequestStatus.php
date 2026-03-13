<?php

namespace RevKeen\Customers\Types;

enum CustomersSubscriptionsListRequestStatus: string
{
    case Active = "active";
    case Canceled = "canceled";
    case PastDue = "past_due";
    case Trialing = "trialing";
    case Paused = "paused";
}
