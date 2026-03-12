<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncLogsRequestJobType: string
{
    case Scheduled = "scheduled";
    case Manual = "manual";
    case SingleRetry = "single_retry";
    case BatchRetry = "batch_retry";
}
