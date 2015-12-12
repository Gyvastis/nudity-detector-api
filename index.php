<?php

require 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = new Slim\App();

$app->post('/check', function(ServerRequestInterface $request, ResponseInterface $response, $args){
    if($request->getContentType() == 'application/json') {
        $response->write(json_encode([
            'success' => true
        ]));
        return $response->withHeader(
            'Content-Type',
            'application/json'
        );
    }
});

$app->run();