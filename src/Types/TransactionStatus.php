<?php

namespace RevKeen\Types;

enum TransactionStatus: string
{
    case Pending = "pending";
    case Succeeded = "succeeded";
    case Failed = "failed";
    case Voided = "voided";
}
