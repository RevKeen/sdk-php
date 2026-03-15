<?php

namespace RevKeen\Types;

enum DryRunResultDataItemStatus: string
{
    case WouldIngest = "would_ingest";
    case WouldSkip = "would_skip";
    case WouldFail = "would_fail";
}
