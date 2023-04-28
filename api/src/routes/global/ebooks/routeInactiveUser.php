<?php

use tezlik_web\dao\UserInactiveTimeDao;
use tezlik_web\dao\LastLoginDao;
use tezlik_web\dao\StatusActiveUserDao;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$userInactiveTimeDao = new UserInactiveTimeDao();
$statusActiveUserDao = new StatusActiveUserDao();
$lastLoginDao = new LastLoginDao();

/* Validar session activa */

$app->get('/checkSessionUser', function (Request $request, Response $response, $args) use ($userInactiveTimeDao, $statusActiveUserDao) {
    session_start();
    $userInactiveTime = $userInactiveTimeDao->findSession();

    $userInactiveTime == 1 ? $userInactiveTime = 0 : $userInactiveTime = $userInactiveTime['session_active'];

    $response->getBody()->write(json_encode($userInactiveTime));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->get('/checkLastLoginUsers', function (Request $request, Response $response, $args) use ($lastLoginDao) {
    $users = $lastLoginDao->FindTimeActiveUsers();

    if ($users == null)
        $resp = array('success' => true, 'message' => 'Se verificaron los usuarios correctamente');

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->get('/logoutInactiveUser', function (Request $request, Response $response, $args) use ($statusActiveUserDao) {
    session_start();
    $statusActiveUserDao->changeStatusUserLogin();
    $resp = array('inactive' => true, 'message' => 'Tiempo de inactividad cumplido');
    session_destroy();

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});
