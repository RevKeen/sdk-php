<?php

namespace RevKeen\Payouts\Types;

enum PayoutsListRequestStatus: string
{
    case Pending = "pending";
    case InTransit = "in_transit";
    case Paid = "paid";
    case Failed = "failed";
    case Canceled = "canceled";
}
