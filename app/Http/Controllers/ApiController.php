<?php

namespace App\Http\Controllers;

use App\Http\Libs\Api\Exchange;

class ApiController extends Controller

{

    protected $httpClient = null;

    public function get($num)
    {
        $data['num'] = (int) $num;
        return (new Exchange)->getData($data);
    }

    public function set($path)
    {
        $data = [
            'url' => $path,
        ];
        return (new Exchange)->setData($data);
    }

}
