<?php

namespace RevKeen\Types;

enum OrderStatus: string
{
    case Draft = "draft";
    case Pending = "pending";
    case Paid = "paid";
    case PartiallyPaid = "partially_paid";
    case Refunded = "refunded";
    case Canceled = "canceled";
    case Fulfilled = "fulfilled";
}
