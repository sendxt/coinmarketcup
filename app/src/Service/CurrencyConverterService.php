<?php

declare(strict_types=1);

namespace App\Service;

use App\Client\ExchangeRate\ExchangeRateClientInterface;
use App\Entity\ConvertedCurrencyHistory;
use App\Factory\Entity\ConvertedCurrencyHistoryFactory;
use App\Request\ConvertCurrency\HistoryRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CurrencyConverterService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ExchangeRateClientInterface
     */
    private $client;

    /**
     * @param EntityManagerInterface $em
     * @param ExchangeRateClientInterface $client
     */
    public function __construct(EntityManagerInterface $em, ExchangeRateClientInterface $client)
    {
        $this->em = $em;
        $this->client = $client;
    }

    public function convertAndSaveCurrency(HistoryRequest $request): ConvertedCurrencyHistory
    {
        try {
            $response = $this->client->convertCurrency(
                $request->getFrom(),
                $request->getTo(),
                $request->getAmount()
            );

            $convertedCurrencyHistory = ConvertedCurrencyHistoryFactory::create($response, $request);

            $this->em->persist($convertedCurrencyHistory);
            $this->em->flush();

            return $convertedCurrencyHistory;
        } catch(\Throwable $e) {
            //TODO: log errors/handle exceptions

            throw new BadRequestHttpException('something was wrong...');
        }
    }
}