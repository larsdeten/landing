<?php

namespace App\Http\Controllers;

use App\Http\Libs\Api\Exchange;

class ApiController extends Controller

{

    protected $httpClient = null;

    public function get($params)
    {
        return (new Exchange)->getData($params);
    }

    public function set($params)
    {
        return (new Exchange)->setData($params);
    }

}
