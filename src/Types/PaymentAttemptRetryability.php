<?php

namespace RevKeen\Types;

enum PaymentAttemptRetryability: string
{
    case RetryNow = "retry_now";
    case RetryLater = "retry_later";
    case DoNotRetry = "do_not_retry";
}
