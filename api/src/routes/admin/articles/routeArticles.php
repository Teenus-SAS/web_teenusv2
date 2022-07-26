<?php

use tezlik_web\dao\ArticlesDao;
use tezlik_web\dao\PublicationsDao;

$articlesDao = new ArticlesDao();
$publicationsDao = new PublicationsDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/articles', function (Request $request, Response $response, $args) use ($articlesDao) {
    session_start();
    $id_company = $_SESSION['id_company'];
    $articles = $articlesDao->findAllArticles($id_company);
    $response->getBody()->write(json_encode($articles, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/addArticles', function (Request $request, Response $response, $args) use ($articlesDao, $publicationsDao) {
    session_start();
    $id_company = $_SESSION['id_company'];
    $dataArticles = $request->getParsedBody();

    if (empty($dataArticles['title']) || empty($dataArticles['description']) || empty($dataArticles['author'])) {
        $resp = array('error' => true, 'message' => 'Ingrese todos los campos');
    } else {
        $articles = $articlesDao->insertArticle($dataArticles, $id_company);

        // Obtener ultimo articulo ingresado
        $dataArticle = $articlesDao->findLastArticle();
        // Insertar publicación
        $publications = $publicationsDao->insertPublication($dataArticle);

        if ($articles == null && $publications == null)
            $resp = array('success' => true, 'message' => 'Articulo creado correctamente');
        else
            $resp = array('error' => true, 'message' => 'Ocurrio un error mientras ingresaba la información. Intente nuevamente');
    }
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->post('/updateArticles', function (Request $request, Response $response, $args) use ($articlesDao) {
    $dataArticle = $request->getParsedBody();

    if (empty($dataArticle['idArticle']) || empty($dataArticle['title']) || empty($dataArticle['description']) || empty($dataArticle['author'])) {
        $resp = array('error' => true, 'message' => 'No hubo cambio alguno');
    } else {
        $articles = $articlesDao->updateArticle($dataArticle);

        if ($articles == null)
            $resp = array('success' => true, 'message' => 'Articulo modificado correctamente');
        else
            $resp = array('error' => true, 'message' => 'Ocurrio un error mientras modificaba la información. Intente nuevamente');
    }
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->get('/deleteArticle/{id_article}', function (Request $request, Response $response, $args) use ($articlesDao, $publicationsDao) {
    $articles = $articlesDao->deleteArticle($args['id_article']);
    $publications = $publicationsDao->deletePublication($args['id_article']);

    if ($articles == null && $publications == null)
        $resp = array('success' => true, 'message' => 'Articulo eliminado correctamente');
    else
        $resp = array('error' => true, 'message' => 'No se pudo eliminar el articulo. Existe información asociada a él');

    $response->getBody()->write(json_encode($resp));
    return $response->withHeader('Content-Type', 'application/json');
});
