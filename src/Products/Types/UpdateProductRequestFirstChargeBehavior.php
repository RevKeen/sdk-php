<?php

namespace RevKeen\Products\Types;

enum UpdateProductRequestFirstChargeBehavior: string
{
    case Immediate = "immediate";
    case NextAnchor = "next_anchor";
    case Prorate = "prorate";
}
