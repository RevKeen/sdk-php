<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSuggestMappingsRequestExternalItemsItemSource: string
{
    case Package = "package";
    case Invoice = "invoice";
    case Unmapped = "unmapped";
}
