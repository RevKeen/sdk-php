<?php

namespace RevKeen\Analytics\Types;

enum AnalyticsCheckoutWinbackListRequestType: string
{
    case CancelledSubscription = "cancelled_subscription";
    case RepeatAbandoner = "repeat_abandoner";
    case LapsedCustomer = "lapsed_customer";
}
