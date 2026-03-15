<?php

namespace RevKeen\Types;

enum CardDetailsFunding: string
{
    case Credit = "credit";
    case Debit = "debit";
    case Prepaid = "prepaid";
    case Unknown = "unknown";
}
