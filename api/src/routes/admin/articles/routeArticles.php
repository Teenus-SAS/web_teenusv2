<?php

use tezlik_web\dao\ArticlesDao;
use tezlik_web\dao\PublicateArticleDao;
use tezlik_web\dao\PublicationsDao;

$articlesDao = new ArticlesDao();
$publicationsDao = new PublicationsDao();
$publicateArticleDao = new PublicateArticleDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/* Cargar articulo */

$app->get('/article/{id_article}', function (Request $request, Response $response, $args) use ($articlesDao) {
    $article = $articlesDao->findArticle($args['id_article']);
    $response->getBody()->write(json_encode($article, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/navigationArticle/{id_article}/{op}', function (Request $request, Response $response, $args) use ($articlesDao) {
    $article = $articlesDao->findNextOrPrevArticle($args['id_article'], $args['op']);
    $response->getBody()->write(json_encode($article, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

/* Cargar articulos*/
$app->get('/articles', function (Request $request, Response $response, $args) use ($articlesDao, $publicateArticleDao) {
    $publicateArticleDao->activeArticle();
    $publicateArticleDao->desactivateArticle();

    $allArticles = $articlesDao->findAllArticles();
    $recentArticles = $articlesDao->findRecentArticles();
    $popularArticles = $articlesDao->findPopularArticles();

    $articles['allArticles'] = $allArticles;
    $articles['recentArticles'] = $recentArticles;
    $articles['popularArticles'] = $popularArticles;

    $response->getBody()->write(json_encode($articles, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/addArticle', function (Request $request, Response $response, $args) use ($articlesDao, $publicationsDao) {
    $dataArticle = $request->getParsedBody();

    if (empty($dataArticle['title']) || empty($dataArticle['description']) || empty($dataArticle['author'])) {
        $resp = array('error' => true, 'message' => 'Ingrese todos los campos');
    } else {
        $articles = $articlesDao->insertArticle($dataArticle);
        // Obtener ultimo articulo ingresado
        $lastArticle = $articlesDao->findLastArticle();

        if (sizeof($_FILES) > 0)
            $articlesDao->imageArticle($lastArticle['id_article']);

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
    $dataArticle = $request->getParsedBody();

    if (empty($dataArticle['idArticle']) || empty($dataArticle['title']) || empty($dataArticle['description']) || empty($dataArticle['author'])) {
        $resp = array('error' => true, 'message' => 'No hubo cambio alguno');
    } else {
        $articles = $articlesDao->updateArticle($dataArticle);

        if (sizeof($_FILES) > 0)
            $articlesDao->imageArticle($dataArticle['idArticle']);

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
