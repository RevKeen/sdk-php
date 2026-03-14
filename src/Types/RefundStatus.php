<?php

namespace RevKeen\Types;

enum RefundStatus: string
{
    case Pending = "pending";
    case Processing = "processing";
    case Succeeded = "succeeded";
    case Failed = "failed";
    case Canceled = "canceled";
}
