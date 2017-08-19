<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

$res = $client->request('GET', 'localhost:3000/nome/michael');

echo $res->getStatusCode(),"<br /><br />";

print_r($res->getHeader('content-type'));

$dados = json_decode($res->getBody(), true);

echo "<br /><br />";

print_r($dados['nome']);