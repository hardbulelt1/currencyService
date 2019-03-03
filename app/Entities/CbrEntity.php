<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 15:41
 */

namespace App\Entities;


class CbrEntity implements CurrencyEntity
{
    private $numCode;
    private $charCode;
    private $nominal;
    private $name;
    private $value;

    /**
     * @return string
     */
    public function getNumCode(): string
    {
        return $this->numCode;
    }

    /**
     * @param mixed $numCode
     */
    public function setNumCode(string $numCode): void
    {
        $this->numCode = $numCode;
    }

    /**
     * @return string
     */
    public function getCharCode(): string
    {
        return $this->charCode;
    }

    /**
     * @param string $charCode
     */
    public function setCharCode(string $charCode): void
    {
        $this->charCode = $charCode;
    }

    /**
     * @return int
     */
    public function getNominal(): int
    {
        return $this->nominal;
    }

    /**
     * @param int $nominal
     */
    public function setNominal(int $nominal): void
    {
        $this->nominal = $nominal;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }

}