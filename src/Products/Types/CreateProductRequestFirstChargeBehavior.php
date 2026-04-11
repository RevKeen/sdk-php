<?php

namespace RevKeen\Products\Types;

enum CreateProductRequestFirstChargeBehavior: string
{
    case Immediate = "immediate";
    case NextAnchor = "next_anchor";
    case Prorate = "prorate";
}
