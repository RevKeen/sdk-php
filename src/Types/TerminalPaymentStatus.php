<?php

namespace RevKeen\Types;

enum TerminalPaymentStatus: string
{
    case Requested = "requested";
    case InProgress = "in_progress";
    case Approved = "approved";
    case Declined = "declined";
    case Cancelled = "cancelled";
    case Error = "error";
    case TimedOut = "timed_out";
    case StandaloneApproved = "standalone_approved";
    case StandaloneDeclined = "standalone_declined";
}
