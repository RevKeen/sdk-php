<?php

namespace RevKeen\Subscriptions\Types;

enum SubscriptionsCreateRequestBillingEndStrategy: string
{
    case Indefinite = "indefinite";
    case OnDate = "on_date";
    case AfterCycles = "after_cycles";
}
