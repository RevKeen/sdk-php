<?php

namespace RevKeen\Types;

enum PaymentAttemptAttemptStatus: string
{
    case Pending = "pending";
    case Succeeded = "succeeded";
    case Failed = "failed";
    case Canceled = "canceled";
}
