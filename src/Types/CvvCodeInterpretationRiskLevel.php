<?php

namespace RevKeen\Types;

enum CvvCodeInterpretationRiskLevel: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
    case Unknown = "unknown";
}
