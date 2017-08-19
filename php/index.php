<?php

namespace Facebook;

require 'vendor/autoload.php';

use GuzzleHttp\Client;

class Requests
{
    private   $typeOfRequest;
    private   $uri;
    protected $client;

    public function __construct(string $typeParam)
    {
        $this->typeOfRequest = $typeParam;
        $this->client = new Client();
    }

    public function setURI($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    public function requests()
    {
        $this->client->request($this->typeOfRequest, $this->uri);
    }
}

use Facebook\Requests;

(new Requests('GET'))
    ->setURI('localhost:3000/nome/michael')
    ->requests();

//$client = new GuzzleHttp\Client();
//
//$res = $client->request('GET', 'localhost:3000/nome/michael');
//
//echo $res->getStatusCode(),"<br /><br />";
//
//print_r($res->getHeader('content-type'));
//
//$dados = json_decode($res->getBody(), true);
//
//echo "<br /><br />";
//
//print_r($dados['nome']);