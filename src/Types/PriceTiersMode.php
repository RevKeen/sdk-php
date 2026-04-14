<?php

namespace RevKeen\Types;

enum PriceTiersMode: string
{
    case Graduated = "graduated";
    case Volume = "volume";
}
