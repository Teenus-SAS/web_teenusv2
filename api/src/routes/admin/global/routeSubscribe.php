<?php

use tezlik_web\dao\SubscribeDao;

$subscribeDao = new SubscribeDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/allSubscribe', function (Request $request, Response $response, $args) use ($subscribeDao) {
    $contacts = $subscribeDao->findAllContacts();
    $response->getBody()->write(json_encode($contacts, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/addSubscribe', function (Request $request, Response $response, $args) use ($subscribeDao) {
    $dataContact = $request->getParsedBody();
    $contacts = $subscribeDao->insertContact($dataContact);
    $response->getBody()->write(json_encode($contacts, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});