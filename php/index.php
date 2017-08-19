<?php

namespace Facebook;

require 'vendor/autoload.php';

use GuzzleHttp\Client;

class Requests
{
    private   $typeOfRequest;
    private   $uri;
    public    $response;
    protected $client;

    public function __construct(string $typeParam)
    {
        $this->typeOfRequest = $typeParam;
        $this->client = new Client();
    }

    public function setURI($uri)
    {
        $this->uri = $uri;
        // Produção, Teste, Homologação
        return $this;
    }

    public function requests()
    {
        $this->response = $this->client->request($this->typeOfRequest, $this->uri);
        return $this;
    }

    public function getResponse(string $type)
    {
        $response = [
            'bodyCode' => [
                'statusCode' => $this->response->getStatusCode(),
                'body' => json_decode($this->response->getBody(), true)
            ],
            'body' => [
                'body' => json_decode($this->response->getBody(), true)
            ]
        ];

        return $response[$type];
    }
}

use Facebook\Requests;

$objectRequest = new Requests('GET');

$request = $objectRequest
    ->setURI('localhost:3000/nome/michael')// Curso 500
    ->requests();

echo "<pre>";
print_r($request->getResponse('body'));