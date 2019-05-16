<?php

namespace App;

use GuzzleHttp\Client;
use App\Consts;

class BaseRequest
{
    private $client;
    private $response;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('AUTH0_DOMAIN')
        ]);
    }

    public function request($endpoint, $method, $headers, $params = [])
    {
        $params = $this->parseParams($params, $headers);
        $response = $this->client->request($method, $endpoint, $params);
        $this->response = json_decode($response->getBody(), true);
    }

    public function parseParams($params, $headers = [])
    {
        $config = [];
        $config['headers'] = $headers;
        if ( count($headers) ) {
            $config = $this->addParams($config, $params);
        }
        return $config;
    }

    private function addParams($config, $addParams)
    {
        if ( !isset($config[Consts::HEADERS][Consts::CONTENT_TYPE] )) return;
        $contentType = explode('' , $config[Consts::HEADERS][Consts::CONTENT_TYPE]);
        $contentType[1] === Consts::JSON
            ? $config['json'] = $params
            : $config['form_params'] = $params;
        return $config;
    }

    public function getContent()
    {
        if(!$this->response) return;
        return $this->response;
    }

    public function getStatusCode()
    {
        if(!$this->response) return;
        return $this->response->getStatusCode();
    }
}
