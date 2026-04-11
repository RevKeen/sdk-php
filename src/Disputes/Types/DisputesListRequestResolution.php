<?php

namespace RevKeen\Disputes\Types;

enum DisputesListRequestResolution: string
{
    case Won = "won";
    case Lost = "lost";
    case Withdrawn = "withdrawn";
}
