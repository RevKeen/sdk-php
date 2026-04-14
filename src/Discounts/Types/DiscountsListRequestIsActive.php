<?php

namespace RevKeen\Discounts\Types;

enum DiscountsListRequestIsActive: string
{
    case True = "true";
    case False = "false";
}
