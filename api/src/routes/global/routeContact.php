<?php

use tezlik_web\dao\ContactDao;

$contactDao = new ContactDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/allContacts', function (Request $request, Response $response, $args) use ($contactDao) {
    $contacts = $contactDao->findAllContacts();
    $response->getBody()->write(json_encode($contacts, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/addContact', function (Request $request, Response $response, $args) use ($contactDao) {
    $dataContact = $request->getParsedBody();

    if (empty($dataContact['name']))
        exit;

    $resp = $contactDao->insertContact($dataContact);

    if ($resp == null)
        $resp = array('success' => true, 'message' => 'Gracias por contactarnos. En breve uno de nuestros colaboradores le estará contactado');
    else
        $resp = array('error' => true, 'message' => 'Ocurrio un error . Por favor intentelo nuevamente');

    $response->getBody()->write(json_encode($resp, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});
