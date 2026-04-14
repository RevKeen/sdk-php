<?php

namespace RevKeen\Types;

enum DisputeResolution: string
{
    case Won = "won";
    case Lost = "lost";
    case Withdrawn = "withdrawn";
}
