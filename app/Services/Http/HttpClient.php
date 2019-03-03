<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 15:25
 */

namespace App\Services\Http;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpClient
 * @package App\Services\Http
 */
class HttpClient
{
    /**
     * @param string $url
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(string $url): ResponseInterface
    {
        $client = new Client();
        $data = $client->get($url);
        return $data;
    }
}