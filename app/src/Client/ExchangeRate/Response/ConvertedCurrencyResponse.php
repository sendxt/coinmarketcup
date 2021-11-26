<?php

declare(strict_types=1);

namespace App\Client\ExchangeRate\Response;

use JMS\Serializer\Annotation as JMS;

class ConvertedCurrencyResponse
{
    /**
     * @var float
     * @JMS\Type("float")
     */
    private $result;

    /**
     * @return float
     */
    public function getResult(): float
    {
        return $this->result;
    }

    /**
     * @param float $result
     * @return ConvertedCurrencyResponse
     */
    public function setResult(float $result): ConvertedCurrencyResponse
    {
        $this->result = $result;

        return $this;
    }
}