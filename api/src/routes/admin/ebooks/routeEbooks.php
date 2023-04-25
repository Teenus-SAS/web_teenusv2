<?php

use tezlik_web\dao\EbooksDao;

$ebooksDao = new EbooksDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/ebooks', function (Request $request, Response $response, $args) use ($ebooksDao) {
    $allEbooks = $ebooksDao->findAllEbooks();
    $recentEbooks = $ebooksDao->findAllRecentEbooks();
    $popularEbooks = $ebooksDao->findAllPopularEbooks();

    $ebooks['allEbooks'] = $allEbooks;
    $ebooks['recentEbooks'] = $recentEbooks;
    $ebooks['popularEbooks'] = $popularEbooks;

    $response->getBody()->write(json_encode($ebooks, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});
