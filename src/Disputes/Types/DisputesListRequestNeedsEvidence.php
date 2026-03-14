<?php

namespace RevKeen\Disputes\Types;

enum DisputesListRequestNeedsEvidence: string
{
    case True = "true";
    case False = "false";
}
