<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 16:37
 */

namespace App\Entities;


interface CurrencyEntity
{
    /**
     * @return float
     */
    public function getValue();
}