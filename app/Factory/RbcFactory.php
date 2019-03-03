<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 16:26
 */

namespace App\Factory;


use App\Entities\RbcEntity;
use Psr\Http\Message\ResponseInterface;

class RbcFactory
{
    /**
     * @param ResponseInterface $response
     * @return RbcEntity
     */
    public function make(ResponseInterface $response): RbcEntity
    {
        $data = $response->getBody()->getContents();
        $data = json_decode($data,true);
        $rbcEntity = new RbcEntity();
        $rbcEntity->setDate($data['data']['date']);
        $rbcEntity->setSum($data['data']['sum_result']);

        return $rbcEntity;
    }
}