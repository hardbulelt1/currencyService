<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 16:25
 */

namespace App\Entities;


class RbcEntity implements CurrencyEntity
{
    private $date;
    private $sum;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @param float $sum
     */
    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->sum;
    }
}