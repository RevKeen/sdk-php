<?php

namespace RevKeen\SyncState\Types;

enum SyncStateListResponseDataItemLastSyncStatus: string
{
    case Idle = "idle";
    case Syncing = "syncing";
    case Success = "success";
    case Error = "error";
}
