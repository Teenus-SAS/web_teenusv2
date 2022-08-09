<?php

use tezlik_web\dao\PublicationsDao;

$publicationsDao = new PublicationsDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/updatePublication', function (Request $request, Response $response, $args) use ($publicationsDao) {
    $dataArticle = $request->getParsedBody();

    if (empty($dataArticle['idArticle']) && empty($dataArticle['publicationDate']))
        $resp = array('error' => true, 'message' => 'Ingrese todos los campos');
    else {
        $publications = $publicationsDao->updatePublicationDate($dataArticle);

        if ($publications == null)
            $resp = array('success' => true, 'message' => 'Fecha de publicación modificada correctamente');
        else
            $resp = array('error' => true, 'message' => 'Ocurrio un error mientras modificaba la información. Intente nuevamente');
    }
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});
