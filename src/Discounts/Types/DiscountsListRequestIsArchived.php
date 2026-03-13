<?php

namespace RevKeen\Discounts\Types;

enum DiscountsListRequestIsArchived: string
{
    case True = "true";
    case False = "false";
}
