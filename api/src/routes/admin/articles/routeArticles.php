<?php

use tezlik_web\dao\ArticlesDao;
use tezlik_web\dao\PublicationsDao;

$articlesDao = new ArticlesDao();
$publicationsDao = new PublicationsDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/* Cargar articulo */

$app->get('/article/{id_article}', function (Request $request, Response $response, $args) use ($articlesDao) {
    $article = $articlesDao->findArticle($args['id_article']);
    $response->getBody()->write(json_encode($article, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

/* Cargar articulos por compañia */
$app->get('/articles', function (Request $request, Response $response, $args) use ($articlesDao) {
    session_start();
    $id_company = $_SESSION['id_company'];
    $allArticles = $articlesDao->findAllArticles($id_company);
    $recentArticles = $articlesDao->findRecentArticles($id_company);
    $popularArticles = $articlesDao->findPopularArticles($id_company);

    $articles['allArticles'] = $allArticles;
    $articles['recentArticles'] = $recentArticles;
    $articles['popularArticles'] = $popularArticles;

    $response->getBody()->write(json_encode($articles, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

/* Cargar articulos globales */
$app->get('/globalArticles', function (Request $request, Response $response, $args) use ($articlesDao) {
    $articles = $articlesDao->findAllActivesArticles();
    $response->getBody()->write(json_encode($articles, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/addArticle', function (Request $request, Response $response, $args) use ($articlesDao, $publicationsDao) {
    session_start();
    $id_company = $_SESSION['id_company'];
    $dataArticle = $request->getParsedBody();

    if (empty($dataArticle['title']) || empty($dataArticle['description']) || empty($dataArticle['author'])) {
        $resp = array('error' => true, 'message' => 'Ingrese todos los campos');
    } else {
        $articles = $articlesDao->insertArticle($dataArticle, $id_company);
        // Obtener ultimo articulo ingresado
        $lastArticle = $articlesDao->findLastArticle();

        if (sizeof($_FILES) > 0)
            $articlesDao->imageArticle($lastArticle['id_article'], $id_company);

        // Insertar publicación
        $publications = $publicationsDao->insertPublication($lastArticle, $dataArticle);

        if ($articles == null && $publications == null)
            $resp = array('success' => true, 'message' => 'Articulo creado correctamente');
        else
            $resp = array('error' => true, 'message' => 'Ocurrio un error mientras ingresaba la información. Intente nuevamente');
    }
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->post('/updateArticle', function (Request $request, Response $response, $args) use ($articlesDao) {
    session_start();
    $id_company = $_SESSION['id_company'];
    $dataArticle = $request->getParsedBody();

    if (empty($dataArticle['idArticle']) || empty($dataArticle['title']) || empty($dataArticle['description']) || empty($dataArticle['author'])) {
        $resp = array('error' => true, 'message' => 'No hubo cambio alguno');
    } else {
        $articles = $articlesDao->updateArticle($dataArticle);

        if (sizeof($_FILES) > 0)
            $articlesDao->imageArticle($dataArticle['idArticle'], $id_company);

        if ($articles == null)
            $resp = array('success' => true, 'message' => 'Articulo modificado correctamente');
        else
            $resp = array('error' => true, 'message' => 'Ocurrio un error mientras modificaba la información. Intente nuevamente');
    }
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->get('/updateArticleView/{id_article}', function (Request $request, Response $response, $args) use ($articlesDao) {
    $article = $articlesDao->updateArticleView($args['id_article']);
    $response->getBody()->write(json_encode($article));
    return $response->withHeader('Content-Type', 'application/json');
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
