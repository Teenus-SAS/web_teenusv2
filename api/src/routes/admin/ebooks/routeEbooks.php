<?php

use tezlik_web\dao\ebooksDao;

$ebooksDao = new ebooksDao();

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


$app->post('/addEbook', function (Request $request, Response $response, $args) use ($ebooksDao) {
    $dataEbook = $request->getParsedBody();

    if (empty($dataEbook['title']) || empty($dataEbook['description']) || empty($dataEbook['author'])) {
        $resp = array('error' => true, 'message' => 'Ingrese todos los campos');
    } else {
        $ebooks = $ebooksDao->insertEbook($dataEbook);
        // Obtener ultimo Ebook ingresado
        $lastEbook = $ebooksDao->findLastEbook();

        if (sizeof($_FILES) > 0)
            $ebooksDao->imageEbook($lastEbook['id_ebook']);

        if ($ebooks == null)
            $resp = array('success' => true, 'message' => 'Ebook creado correctamente');
        else
            $resp = array('error' => true, 'message' => 'Ocurrio un error mientras ingresaba la información. Intente nuevamente');
    }
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->post('/updateEbook', function (Request $request, Response $response, $args) use ($ebooksDao) {
    $dataEbook = $request->getParsedBody();

    if (empty($dataEbook['idEbook']) || empty($dataEbook['title']) || empty($dataEbook['description']) || empty($dataEbook['author'])) {
        $resp = array('error' => true, 'message' => 'No hubo cambio alguno');
    } else {
        $ebooks = $ebooksDao->updateEbook($dataEbook);

        if (sizeof($_FILES) > 0)
            $ebooksDao->imageEbook($dataEbook['idEbook']);

        if ($ebooks == null)
            $resp = array('success' => true, 'message' => 'Ebook modificado correctamente');
        else
            $resp = array('error' => true, 'message' => 'Ocurrio un error mientras modificaba la información. Intente nuevamente');
    }
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->get('/updateDownloads/{id_ebook}', function (Request $request, Response $response, $args) use ($ebooksDao) {
    $ebooks = $ebooksDao->updateContDownloads($args['id_ebook']);

    if ($ebooks == null)
        $resp = array('error' => true, 'message' => 'Descargas modificada correctamente');
    else if (isset($ebooks['info']))
        $resp = array('info' => true, 'message' => $ebooks['message']);
    else
        $resp = array('error' => true, 'message' => 'Ocurrio un error mientras modificaba la información');

    $response->getBody()->write(json_encode($resp, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/deleteEbook/{id_ebook}', function (Request $request, Response $response, $args) use ($ebooksDao, $publicationsDao) {
    $ebooks = $ebooksDao->deleteEbook($args['id_ebook']);
    $publications = $publicationsDao->deletePublication($args['id_ebook']);

    if ($ebooks == null && $publications == null)
        $resp = array('success' => true, 'message' => 'Ebook eliminado correctamente');
    else
        $resp = array('error' => true, 'message' => 'No se pudo eliminar el Ebook. Existe información asociada a él');

    $response->getBody()->write(json_encode($resp));
    return $response->withHeader('Content-Type', 'application/json');
});
