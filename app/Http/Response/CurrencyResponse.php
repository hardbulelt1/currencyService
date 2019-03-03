<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 16:53
 */

namespace App\Http\Response;


class CurrencyResponse
{
    /**
     * @param float $usd
     * @param float $euro
     * @return array
     */
    public function getData(float $usd, float $euro): array
    {
        return [
            'data' => [
                'type' => 'currency',
                'attributes' => [
                    'usd' => $usd,
                    'euro' => $euro
                ]
            ]
        ];
    }
}