<?php

namespace RevKeen\Types;

enum BatchIngestResultDataItemStatus: string
{
    case Ingested = "ingested";
    case Duplicate = "duplicate";
    case Skipped = "skipped";
    case Failed = "failed";
}
