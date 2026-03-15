<?php

namespace RevKeen\Finance\Types;

enum GetFinanceIncomeRequestGroupBy: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
}
