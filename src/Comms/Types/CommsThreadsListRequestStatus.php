<?php

namespace RevKeen\Comms\Types;

enum CommsThreadsListRequestStatus: string
{
    case Open = "open";
    case Closed = "closed";
    case Pending = "pending";
}
