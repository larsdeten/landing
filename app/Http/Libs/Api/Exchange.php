<?php
namespace App\Http\Libs\Api;

use Illuminate\Support\Facades\Storage;

class Exchange extends Base
{

    public function __construct($token = null)
    {
        if (is_null($token))
            $token = config('app.host_token');
        parent::__construct($token);
    }

    public function getData($params)
    {

        $token = env('API_HOST_TOKEN');
        $response = $this->httpClient->withToken($token)->post(
            env('API_HOST') . '/api/v1',
            $this->prepare_params('ApiProcedure@getData', $params)
        );
        if ($response->ok()) {
            $result = $response->json();
            if (!empty($result['result']['success']) && ($result['result']['success'] == true)) {
                return $result['result']['data'];
            }
        } else {
            return ['success' => false];
        }
        return ['success' => false];
    }
    public function setData($params)
    {
        $response = $this->httpClient->withToken(env('API_HOST_TOKEN'))->post(
            env('API_HOST') . '/api/v1',
            $this->prepare_params('ApiProcedure@setData', $params)
        );
        if ($response->ok()) {
            $result = $response->json();
            if (!empty($result['success']) && ($result['success'] == true)) {
                return true;
            }
        } else {
            return ['success' => false];
        }
        return ['success' => false];
    }


}
