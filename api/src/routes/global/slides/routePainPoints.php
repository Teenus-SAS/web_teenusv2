<?php

use tezlik_web\dao\PaintPointsDao;

$paintpointsDao = new PaintPointsDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/paint-points', function (Request $request, Response $response, $args) use ($paintpointsDao) {
    $contacts = $paintpointsDao->findAllPaintPoints();
    $response->getBody()->write(json_encode($contacts, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});
