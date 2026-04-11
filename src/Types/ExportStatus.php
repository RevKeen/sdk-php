<?php

namespace RevKeen\Types;

enum ExportStatus: string
{
    case Pending = "pending";
    case Processing = "processing";
    case Completed = "completed";
    case Failed = "failed";
}
