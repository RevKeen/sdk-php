<?php

namespace RevKeen\Entitlements\Types;

enum CustomersEntitlementsCheckResponseDataStatus: string
{
    case Active = "active";
    case Trialing = "trialing";
    case Grace = "grace";
    case PastDue = "past_due";
    case Restricted = "restricted";
    case Suspended = "suspended";
    case Canceled = "canceled";
}
