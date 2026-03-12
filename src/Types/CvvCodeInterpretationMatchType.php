<?php

namespace RevKeen\Types;

enum CvvCodeInterpretationMatchType: string
{
    case Match_ = "match";
    case NoMatch = "no_match";
    case NotProcessed = "not_processed";
    case NotProvided = "not_provided";
    case IssuerNotCertified = "issuer_not_certified";
    case Error = "error";
}
