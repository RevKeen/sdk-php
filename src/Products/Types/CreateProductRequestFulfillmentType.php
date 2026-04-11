<?php

namespace RevKeen\Products\Types;

enum CreateProductRequestFulfillmentType: string
{
    case None = "none";
    case Digital = "digital";
    case Physical = "physical";
}
