<?php

namespace RevKeen\Types;

enum OrderFulfillmentStatus: string
{
    case Unfulfilled = "unfulfilled";
    case Partial = "partial";
    case Fulfilled = "fulfilled";
    case Returned = "returned";
}
