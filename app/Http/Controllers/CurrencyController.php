<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 15:09
 */

namespace App\Http\Controllers;


use App\Http\Response\CurrencyResponse;
use App\Http\Response\ErrorResponse;
use App\Services\CurrencyService;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    private $currencyService;

    /**
     * CurrencyController constructor.
     * @param CurrencyService $currencyService
     */
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function currency(Request $request)
    {
        try {
            $usd = $this->currencyService->getAverage(new \DateTime($request->get('date')), 'USD');
            $euro = $this->currencyService->getAverage(new \DateTime($request->get('date')), 'EUR');
            $response = (new CurrencyResponse())->getData($usd, $euro);
        } catch (ConnectException $connectException) {
            $response = (new ErrorResponse())->getData('Сервис не доступен');
        }

        return response()->json($response);
    }
}