<?php

namespace RevKeen\Imports\Types;

enum CreateImportRequestOnDuplicate: string
{
    case Skip = "skip";
    case Update = "update";
    case Error = "error";
}
