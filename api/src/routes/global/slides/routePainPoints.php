<?php

use tezlik_web\dao\PainPointsDao;

$paintpointsDao = new PainPointsDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/pain-points', function (Request $request, Response $response, $args) use ($paintpointsDao) {
    $contacts = $paintpointsDao->findAllPainPoints();
    $response->getBody()->write(json_encode($contacts, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});
