<?php

declare(strict_types=1);

namespace App\Factory\Entity;

use App\Client\ExchangeRate\Response\ConvertedCurrencyResponse;
use App\Entity\ConvertedCurrencyHistory;
use App\Request\ConvertCurrency\HistoryRequest;

class ConvertedCurrencyHistoryFactory
{
    public static function create(
        ConvertedCurrencyResponse $convertedCurrencyResponse,
        HistoryRequest $request
    ): ConvertedCurrencyHistory {
        $object = new ConvertedCurrencyHistory();
        $object
            ->setConvertedAmount((string)$convertedCurrencyResponse->getResult())
            ->setAmount($request->getAmount())
            ->setFrom($request->getFrom())
            ->setTo($request->getTo());

        return $object;
    }
}
