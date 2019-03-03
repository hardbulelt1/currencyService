<?php

namespace Tests\Unit;

use App\Services\Http\HttpClient;
use GuzzleHttp\Exception\ConnectException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpClientTest extends TestCase
{

    public function testCode200()
    {
        /** @var HttpClient $httpClient */
        $httpClient = $this->app->make(HttpClient::class);
        $response = $httpClient->get('http://www.cbr.ru/scripts/XML_daily.asp?date_req=02/03/2019');
        $this->assertTrue($response->getStatusCode() === 200);
    }


    public function testNotConnection()
    {
        /** @var HttpClient $httpClient */
        $httpClient = $this->app->make(HttpClient::class);
        try {
            $response = $httpClient->get('http://nolink');
            $this->assertTrue(false);
        } catch (ConnectException $connectException) {
            $this->assertTrue(true);
        }
    }
}
