<?php

namespace RevKeen\Disputes\Types;

enum DisputesListRequestStatus: string
{
    case NeedsResponse = "needs_response";
    case UnderReview = "under_review";
    case Won = "won";
    case Lost = "lost";
    case WarningClosed = "warning_closed";
    case WarningNeedsResponse = "warning_needs_response";
}
