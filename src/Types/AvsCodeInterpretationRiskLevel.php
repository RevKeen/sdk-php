<?php

namespace RevKeen\Types;

enum AvsCodeInterpretationRiskLevel: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
    case Unknown = "unknown";
}
