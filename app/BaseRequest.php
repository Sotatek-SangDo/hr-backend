<?php

namespace App;

use GuzzleHttp\Client;
use App\Consts;

class BaseRequest
{
    private $client;
    public $response;
    public $content;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('AUTH0_DOMAIN'),
            'http_errors' => false
        ]);
    }

    public function request($endpoint, $method, $headers, $params = [])
    {
        $params = $this->parseParams($params, $headers);
        $this->response = $this->client->request($method, $endpoint, $params);
        $this->content = json_encode($this->response->getBody(), true);

        return json_decode($this->response->getBody(), true);
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

    private function addParams($config, $params)
    {
        if ( !isset($config[Consts::HEADERS][Consts::CONTENT_TYPE] )) return;
        $contentType = explode('/' , $config[Consts::HEADERS][Consts::CONTENT_TYPE]);
        $contentType[1] === Consts::JSON
            ? $config['json'] = $params
            : $config['form_params'] = $params;
        return $config;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getStatusCode()
    {
        if(!$this->response) return;
        return $this->response->getStatusCode();
    }
}
