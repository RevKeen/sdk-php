<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncLogsRequestLatestOnly: string
{
    case True = "true";
    case False = "false";
}
