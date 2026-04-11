<?php

namespace RevKeen\Exports\Types;

enum CreateExportRequestFormat: string
{
    case Csv = "csv";
    case Xlsx = "xlsx";
}
