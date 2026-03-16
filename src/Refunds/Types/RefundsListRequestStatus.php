<?php

namespace RevKeen\Refunds\Types;

enum RefundsListRequestStatus: string
{
    case Pending = "pending";
    case Processing = "processing";
    case Succeeded = "succeeded";
    case Failed = "failed";
    case Canceled = "canceled";
}
