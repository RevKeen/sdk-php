<?php

namespace RevKeen\Types;

enum EntitlementCheckAccessLevel: string
{
    case Full = "full";
    case Partial = "partial";
    case None = "none";
}
