<?php

namespace RevKeen\Types;

enum ProductFirstChargeBehavior: string
{
    case Immediate = "immediate";
    case NextAnchor = "next_anchor";
    case Prorate = "prorate";
}
