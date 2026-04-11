<?php

namespace RevKeen\Types;

enum EntitlementAccessLevel: string
{
    case Full = "full";
    case Partial = "partial";
    case None = "none";
}
