<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 15:57
 */

namespace App\Factory;


use App\Entities\CbrEntity;
use Psr\Http\Message\ResponseInterface;

class CbrFactory
{
    /**
     * @param ResponseInterface $response
     * @return array | CbrEntity[]
     */
    public function make(ResponseInterface $response): array
    {
        $data = [];
        $xml = simplexml_load_string($response->getBody()->getContents());
        foreach ($xml->Valute as $item) {
            $cbrEntity = new CbrEntity();
            $cbrEntity->setCharCode($item->CharCode);
            $cbrEntity->setName($item->Name);
            $cbrEntity->setNominal((int)$item->Nominal);
            $cbrEntity->setValue(str_replace(',','.',$item->Value));
            $data[] = $cbrEntity;
        }

        return $data;
    }
}