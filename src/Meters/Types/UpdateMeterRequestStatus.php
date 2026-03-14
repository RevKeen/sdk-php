<?php

namespace RevKeen\Meters\Types;

enum UpdateMeterRequestStatus: string
{
    case Active = "active";
    case Archived = "archived";
    case Draft = "draft";
}
