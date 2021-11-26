<?php

declare(strict_types=1);

namespace App\Client\ExchangeRate;

use App\Client\ExchangeRate\Constants\Endpoints;
use App\Client\ExchangeRate\Response\ConvertedCurrencyResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient implements ExchangeRateClientInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param HttpClientInterface $exchangeApi
     * @param SerializerInterface $serializer
     */
    public function __construct(HttpClientInterface $exchangeApi, SerializerInterface $serializer)
    {
        $this->client = $exchangeApi;
        $this->serializer = $serializer;
    }

    public function convertCurrency(
        string $fromCurrency,
        string $toCurrency,
        $amount,
        string $source = 'crypto'
    ): ConvertedCurrencyResponse {
        $httpResponse = $this->client->request(
            'GET',
            Endpoints::CONVERT_CURRENCIES,
            [
                'query' => [
                    'from' => $fromCurrency,
                    'to' => $toCurrency,
                    'amount' => $amount,
                    'source' => $source,
                ],
            ]
        );

        return $this->serializer->deserialize(
            $httpResponse->getContent(),
            ConvertedCurrencyResponse::class,
            'json'
        );
    }
}