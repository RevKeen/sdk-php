<?php

namespace RevKeen\Subscriptions\Types;

enum PauseSubscriptionInputBehavior: string
{
    case KeepAsDraft = "keep_as_draft";
    case MarkUncollectible = "mark_uncollectible";
    case Void = "void";
}
