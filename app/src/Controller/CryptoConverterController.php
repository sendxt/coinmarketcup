<?php

namespace App\Controller;

use App\Form\ConvertCurrency\HistoryType;
use App\Repository\ConvertCurrencyHistoryRepository;
use App\Request\ConvertCurrency\HistoryRequest;
use App\Service\CurrencyConverterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/crypto/converter")
 */
class CryptoConverterController extends AbstractController
{
    /**
     * @param ConvertCurrencyHistoryRepository $convertedHistoryRepository
     * @return Response
     * @Route("/", name="crypto_converter_index", methods={"GET"})
     */
    public function index(ConvertCurrencyHistoryRepository $convertedHistoryRepository): Response
    {
        return $this->render('crypto_converter/index.html.twig', [
            'convertedHistories' => $convertedHistoryRepository->findAll(), //TODO: optimize for paginated response
        ]);
    }

    /**
     * @param Request $request
     * @param CurrencyConverterService $service
     * @return Response
     * @Route("/new", name="crypto_converter_new", methods={"GET", "POST"})
     */
    public function store(Request $request, CurrencyConverterService $service): Response
    {
        $historyRequest = new HistoryRequest();
        $form = $this->createForm(HistoryType::class, $historyRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $service->convertAndSaveCurrency($historyRequest);

            return $this->redirectToRoute('crypto_converter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('crypto_converter/new.html.twig', [
            'convertedHistory' => $historyRequest,
            'form' => $form->createView(),
        ]);
    }
}
