<?php

namespace RevKeen\Analytics\Types;

enum AnalyticsCheckoutWinbackListResponseOpportunitiesItemOpportunityType: string
{
    case CancelledSubscription = "cancelled_subscription";
    case RepeatAbandoner = "repeat_abandoner";
    case LapsedCustomer = "lapsed_customer";
}
