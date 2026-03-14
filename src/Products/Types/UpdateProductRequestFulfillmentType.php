<?php

namespace RevKeen\Products\Types;

enum UpdateProductRequestFulfillmentType: string
{
    case None = "none";
    case Digital = "digital";
    case Physical = "physical";
}
