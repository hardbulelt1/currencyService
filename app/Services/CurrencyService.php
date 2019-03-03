<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 15:32
 */

namespace App\Services;


use App\Entities\CbrEntity;
use App\Entities\RbcEntity;
use App\Factory\CbrFactory;
use App\Factory\RbcFactory;
use App\Services\Http\HttpClient;

class CurrencyService
{
    private $httpClient;

    /**
     * CurrencyService constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param \DateTime $dateTime
     * @param string $code
     * @return float
     */
    public function getAverage(\DateTime $dateTime, string $code): float
    {
        $cbr = $this->getFromCBR($dateTime,$code);
        $rbc = $this->getFromRBC($dateTime,$code);

        return (($cbr->getValue() + $rbc->getValue()) / 2);
    }

    /**
     * @param \DateTime $dateTime
     * @param string $code
     * @return CbrEntity|null
     */
    protected function getFromCBR(\DateTime $dateTime, string $code): ?CbrEntity
    {
        $httpResponse = $this->httpClient->get('http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $dateTime->format('d/m/Y'));
        $cbrEntities = (new CbrFactory())->make($httpResponse);

        foreach ($cbrEntities as $entity) {
            if ($entity->getCharCode() === $code) {
                return $entity;
            }
        }
        return null;
    }

    /**
     * @param \DateTime $dateTime
     * @param string $code
     * @return RbcEntity|null
     */
    protected function getFromRBC(\DateTime $dateTime, string $code): ?RbcEntity
    {
        $httpResponse = $this->httpClient->get('https://cash.rbc.ru/cash/json/converter_currency_rate/?currency_from=' . $code . '&currency_to=RUR&source=cbrf&sum=1&date=' . $dateTime->format('Y-m-d'));
        $rbcEntity = (new RbcFactory())->make($httpResponse);

        return $rbcEntity;

    }
}