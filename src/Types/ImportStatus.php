<?php

namespace RevKeen\Types;

enum ImportStatus: string
{
    case Pending = "pending";
    case Validating = "validating";
    case Processing = "processing";
    case Completed = "completed";
    case CompletedWithErrors = "completed_with_errors";
    case Failed = "failed";
}
