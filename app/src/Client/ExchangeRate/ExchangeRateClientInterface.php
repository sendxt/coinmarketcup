<?php

declare(strict_types=1);

namespace App\Client\ExchangeRate;

use App\Client\ExchangeRate\Response\ConvertedCurrencyResponse;

interface ExchangeRateClientInterface
{
    /**
     * @param string $fromCurrency
     * @param string $toCurrency
     * @param $amount
     * @param string $source
     * @return ConvertedCurrencyResponse
     */
    public function convertCurrency(
        string $fromCurrency,
        string $toCurrency,
        $amount,
        string $source = 'crypto'
    ): ConvertedCurrencyResponse;
}