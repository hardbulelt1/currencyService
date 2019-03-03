<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CurrencyResponseTest extends TestCase
{

    public function testResponse()
    {
        $response = $this->call('GET', '/currency?date=2019-01-02');
        $data = json_decode($response->getContent(),true);
        $this->assertTrue($data['data']['attributes']['usd'] === 69.4706 && $data['data']['attributes']['euro'] === 79.4605);
    }
}
