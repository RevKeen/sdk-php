<?php

namespace RevKeen\Customers\Types;

enum CustomersOrdersListRequestStatus: string
{
    case Pending = "pending";
    case Paid = "paid";
    case Fulfilled = "fulfilled";
    case Canceled = "canceled";
}
