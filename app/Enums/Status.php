<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Status extends Enum
{
    const Draft = 'Draft';
    const Submit = 'Submit';
    const Accept = 'Accept';
    const Reject = 'Reject';

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::Draft:
                return 'Draft';
            case self::Submit:
                return 'Submit';
            case self::Accept:
                return 'Accept';
            case self::Reject:
                return 'Reject';
            default:
                return 'Unknown Status';
        }
    }
}