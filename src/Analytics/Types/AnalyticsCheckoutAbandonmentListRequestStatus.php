<?php

namespace RevKeen\Analytics\Types;

enum AnalyticsCheckoutAbandonmentListRequestStatus: string
{
    case Open = "open";
    case Recovered = "recovered";
    case Expired = "expired";
    case Dismissed = "dismissed";
}
