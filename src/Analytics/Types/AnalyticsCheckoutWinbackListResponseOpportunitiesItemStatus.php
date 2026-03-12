<?php

namespace RevKeen\Analytics\Types;

enum AnalyticsCheckoutWinbackListResponseOpportunitiesItemStatus: string
{
    case Identified = "identified";
    case Contacted = "contacted";
    case Converted = "converted";
    case Declined = "declined";
    case Expired = "expired";
}
