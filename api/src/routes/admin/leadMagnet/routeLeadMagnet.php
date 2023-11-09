<?php

use tezlik_web\dao\ContactDao;
use tezlik_web\dao\LeadMagnetsDao;

$leadMagnetsDao = new LeadMagnetsDao();
$contactDao = new ContactDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/leadMagnet/{id_lead_magnet}', function (Request $request, Response $response, $args) use ($leadMagnetsDao) {
    $leadMagnet = $leadMagnetsDao->findLeadMagnet($args['id_lead_magnet']);
    $response->getBody()->write(json_encode($leadMagnet, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});
/* Cargar lead magnet 
$app->get('/navigationLeadMagnet/{id_LeadMagnet}/{op}', function (Request $request, Response $response, $args) use ($LeadMagnetsDao) {
    $LeadMagnet = $LeadMagnetsDao->findNextOrPrevLeadMagnet($args['id_LeadMagnet'], $args['op']);
    $response->getBody()->write(json_encode($LeadMagnet, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
}); */

/* Cargar lead magnets*/

$app->get('/leadMagnets', function (Request $request, Response $response, $args) use ($leadMagnetsDao) {
    $leadMagnets = $leadMagnetsDao->findAllLeadMagnets();
    $response->getBody()->write(json_encode($leadMagnets, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/addLeadMagnet', function (Request $request, Response $response, $args) use ($leadMagnetsDao) {
    $dataLeadMagnet = $request->getParsedBody();
    $leadMagnet = $leadMagnetsDao->insertLeadMagnet($dataLeadMagnet);
    // Obtener ultimo lead magnet ingresado
    $lastLeadMagnet = $leadMagnetsDao->findLastLeadMagnet();

    if (sizeof($_FILES) > 0)
        $leadMagnetsDao->imageLeadMagnet($lastLeadMagnet['id_lead_magnet']);

    if ($leadMagnet == null)
        $resp = array('success' => true, 'message' => 'Lead magnet creado correctamente');
    else if (isset($leadMagnet['info']))
        $resp = array('info' => true, 'message' => $leadMagnet['message']);
    else
        $resp = array('error' => true, 'message' => 'Ocurrio un error mientras ingresaba la información. Intente nuevamente');

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->post('/updateLeadMagnet', function (Request $request, Response $response, $args) use ($leadMagnetsDao) {
    $dataLeadMagnet = $request->getParsedBody();
    $leadMagnet = $leadMagnetsDao->updateLeadMagnet($dataLeadMagnet);

    if (isset($_FILES['img']))
        $leadMagnetsDao->imageLeadMagnet($dataLeadMagnet['idLeadMagnet']);
    if (isset($_FILES['file']))
        $leadMagnetsDao->fileLeadMagnet($dataLeadMagnet['idLeadMagnet']);

    if ($leadMagnet == null)
        $resp = array('success' => true, 'message' => 'Lead magnet modificado correctamente');
    else if (isset($leadMagnet['info']))
        $resp = array('info' => true, 'message' => $leadMagnet['message']);
    else
        $resp = array('error' => true, 'message' => 'Ocurrio un error mientras modificaba la información. Intente nuevamente');

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

// $app->get('/updateLeadMagnetView/{id_lead_magnet}', function (Request $request, Response $response, $args) use ($LeadMagnetsDao) {
//     $LeadMagnet = $LeadMagnetsDao->updateLeadMagnetView($args['id_LeadMagnet']);
//     $response->getBody()->write(json_encode($LeadMagnet));
//     return $response->withHeader('Content-Type', 'application/json');
// });

$app->post('/addContactLeadMagnet', function (Request $request, Response $response, $args) use ($contactDao) {
    $dataContact = $request->getParsedBody();

    $resp = $contactDao->insertContactLeadMagnet($dataContact);

    if ($resp == null)
        $resp = array('success' => true, 'message' => 'Gracias por contactarnos. En breve uno de nuestros colaboradores le estará contactado');
    else
        $resp = array('error' => true, 'message' => 'Ocurrio un error . Por favor intentelo nuevamente');

    $response->getBody()->write(json_encode($resp, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/deleteLeadMagnet/{id_lead_magnet}', function (Request $request, Response $response, $args) use ($leadMagnetsDao) {
    $leadMagnet = $leadMagnetsDao->deleteLeadMagnet($args['id_lead_magnet']);

    if ($leadMagnet == null)
        $resp = array('success' => true, 'message' => 'lead magnet eliminado correctamente');
    else if (isset($leadMagnet['info']))
        $resp = array('info' => true, 'message' => $leadMagnet['message']);
    else
        $resp = array('error' => true, 'message' => 'No se pudo eliminar el lead magnet. Existe información asociada a él');

    $response->getBody()->write(json_encode($resp));
    return $response->withHeader('Content-Type', 'application/json');
});
