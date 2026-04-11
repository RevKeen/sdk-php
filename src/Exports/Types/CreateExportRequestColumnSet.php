<?php

namespace RevKeen\Exports\Types;

enum CreateExportRequestColumnSet: string
{
    case Standard = "standard";
    case Full = "full";
    case Minimal = "minimal";
}
