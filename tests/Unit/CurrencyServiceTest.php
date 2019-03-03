<?php

namespace Tests\Unit;

use App\Services\CurrencyService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CurrencyServiceTest extends TestCase
{

    public function testUSD()
    {
        /** @var CurrencyService $currencyService */
        $currencyService = $this->app->make(CurrencyService::class);
        $result = $currencyService->getAverage(new \DateTime('2019-01-02'),'USD');
        $this->assertTrue($result === 69.4706);
    }

    public function testEURO()
    {
        /** @var CurrencyService $currencyService */
        $currencyService = $this->app->make(CurrencyService::class);
        $result = $currencyService->getAverage(new \DateTime('2019-01-02'),'EUR');

        $this->assertTrue($result === 79.4605);
    }
}
