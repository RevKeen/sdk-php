<?php

namespace RevKeen\Finance\Types;

enum FinanceGetIncomeRequestGroupBy: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
}
