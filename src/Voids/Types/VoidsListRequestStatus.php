<?php

namespace RevKeen\Voids\Types;

enum VoidsListRequestStatus: string
{
    case Pending = "pending";
    case Processing = "processing";
    case Succeeded = "succeeded";
    case Failed = "failed";
}
