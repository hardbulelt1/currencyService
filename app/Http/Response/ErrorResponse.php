<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03.03.19
 * Time: 18:41
 */

namespace App\Http\Response;


class ErrorResponse
{
    /**
     * @param string $message
     * @return array
     */
    public function getData(string $message): array
    {
        return [
            'data' => [
                'type' => 'Error',
                'attributes' => [
                    'message' => $message
                ]
            ]
        ];
    }
}