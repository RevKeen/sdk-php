<?php

namespace RevKeen\CreditNotes\Types;

enum CreditNotesListRequestStatus: string
{
    case Draft = "draft";
    case Pending = "pending";
    case Issued = "issued";
    case Applied = "applied";
    case Voided = "voided";
}
