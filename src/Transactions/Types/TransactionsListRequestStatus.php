<?php

namespace RevKeen\Transactions\Types;

enum TransactionsListRequestStatus: string
{
    case Pending = "pending";
    case Succeeded = "succeeded";
    case Failed = "failed";
    case Voided = "voided";
}
