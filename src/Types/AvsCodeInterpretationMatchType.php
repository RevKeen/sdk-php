<?php

namespace RevKeen\Types;

enum AvsCodeInterpretationMatchType: string
{
    case FullMatch = "full_match";
    case PartialMatch = "partial_match";
    case NoMatch = "no_match";
    case NotSupported = "not_supported";
    case NotAvailable = "not_available";
    case Error = "error";
}
