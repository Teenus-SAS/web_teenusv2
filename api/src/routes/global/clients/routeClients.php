<?php

use tezlik_web\dao\ClientsDao;

$clientDao = new ClientsDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/clients', function (Request $request, Response $response, $args) use ($clientDao) {
    $contacts = $clientDao->findAllClients();
    $response->getBody()->write(json_encode($contacts, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});
