<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncLogsRequestStatus: string
{
    case Pending = "pending";
    case Syncing = "syncing";
    case Success = "success";
    case Failed = "failed";
    case Skipped = "skipped";
}
