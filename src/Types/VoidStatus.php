<?php

namespace RevKeen\Types;

enum VoidStatus: string
{
    case Pending = "pending";
    case Processing = "processing";
    case Succeeded = "succeeded";
    case Failed = "failed";
}
