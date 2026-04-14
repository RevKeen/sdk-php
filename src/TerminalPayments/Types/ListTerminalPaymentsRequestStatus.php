<?php

namespace RevKeen\TerminalPayments\Types;

enum ListTerminalPaymentsRequestStatus: string
{
    case Requested = "requested";
    case InProgress = "in_progress";
    case Approved = "approved";
    case Declined = "declined";
    case Cancelled = "cancelled";
    case Error = "error";
    case TimedOut = "timed_out";
}
