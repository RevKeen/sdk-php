<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

final class Rfc3339DateTime
{
    public static function parse(string $value): \DateTimeImmutable
    {
        if (!preg_match(
            '/^(?<date>\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2})(?<fraction>\.\d{1,6})?(?<offset>Z|[+-]\d{2}:\d{2})$/D',
            $value,
            $parts
        )) {
            throw new \InvalidArgumentException('Timestamp must be RFC3339 with an explicit UTC offset.');
        }

        $has_fraction = isset($parts['fraction']) && $parts['fraction'] !== '';
        $normalized = $parts['date']
            . ($has_fraction ? str_pad($parts['fraction'], 7, '0') : '')
            . ($parts['offset'] === 'Z' ? '+00:00' : $parts['offset']);
        $format = $has_fraction ? '!Y-m-d\TH:i:s.uP' : '!Y-m-d\TH:i:sP';
        $parsed = \DateTimeImmutable::createFromFormat($format, $normalized);
        $errors = \DateTimeImmutable::getLastErrors();

        if (
            !$parsed instanceof \DateTimeImmutable
            || (is_array($errors) && ($errors['warning_count'] > 0 || $errors['error_count'] > 0))
            || $parsed->format(substr($format, 1)) !== $normalized
        ) {
            throw new \InvalidArgumentException('Timestamp is not a valid RFC3339 instant.');
        }

        return $parsed;
    }

    public static function format(\DateTimeInterface $value): string
    {
        $formatted = $value->format('Y-m-d\TH:i:s.uP');
        return preg_replace('/\.000000(?=[+-]\d{2}:\d{2}$)/D', '', $formatted) ?? $formatted;
    }
}
