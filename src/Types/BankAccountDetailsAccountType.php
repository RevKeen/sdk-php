<?php

namespace RevKeen\Types;

enum BankAccountDetailsAccountType: string
{
    case Checking = "checking";
    case Savings = "savings";
}
