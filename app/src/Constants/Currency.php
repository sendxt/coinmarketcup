<?php

declare(strict_types=1);

namespace App\Constants;

class Currency
{
    public const EUR = 'EUR';
    public const USD = 'USD';
    public const PLN = 'PLN';

    public const ALL_CHOICES = [
        self::EUR => self::EUR,
        self::USD => self::USD,
        self::PLN => self::PLN,
    ];
}