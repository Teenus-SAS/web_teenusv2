<?php

use tezlik_web\dao\AutenticationUserDao;
use tezlik_web\dao\EmailDao;
use tezlik_web\dao\GenerateCodeDao;
use tezlik_web\dao\LastLoginDao;
use tezlik_web\Dao\LicenseCompanyDao;
use tezlik_web\dao\StatusActiveUserDao;

$licenseDao = new LicenseCompanyDao();
$autenticationDao = new AutenticationUserDao();
$statusActiveUserDao = new StatusActiveUserDao();
$generateCodeDao = new GenerateCodeDao();
$sendEmailDao = new EmailDao();
$lastLoginDao = new LastLoginDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/* Autenticación */

$app->post('/userAutentication', function (Request $request, Response $response, $args) use ($autenticationDao, $licenseDao, $statusActiveUserDao, $generateCodeDao, $sendEmailDao, $lastLoginDao) {
    $parsedBody = $request->getParsedBody();

    $user = $parsedBody["validation-email"];
    $password = $parsedBody["validation-password"];
    $user = $autenticationDao->findByEmail($user);

    $resp = array();

    /* Usuario sn datos */
    if ($user == null) {
        $resp = array('error' => true, 'message' => 'Usuario y/o password incorrectos, valide nuevamente');
        $response->getBody()->write(json_encode($resp));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    /* Valida el password del usuario */

    if ($user['password'] != hash("sha256", $password)) {

        $resp = array('error' => true, 'message' => 'Usuario y/o password incorrectos, valide nuevamente');
        $response->getBody()->write(json_encode($resp));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

  
    /* Validar que el usuario es activo */

    if ($user['active'] != 1) {
        $resp = array('error' => true, 'message' => 'Usuario Inactivo, valide con el administrador');
        $response->getBody()->write(json_encode($resp));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }


    /* Valida la session del usuario */

    if ($user['session_active'] != 0) {
        $resp = array('error' => true, 'message' => 'Usuario logeado, cierre la sesión para abrir una nueva');
        $response->getBody()->write(json_encode($resp));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    /* Nueva session */
    session_start();
    $_SESSION['active'] = true;
    $_SESSION['idUser'] = $user['id_user'];
    $_SESSION['name'] = $user['firstname'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['rol'] = $user["id_rols"];
    $_SESSION['id_company'] = $user['id_company'];
    $_SESSION["time"] = time();

    /* Actualizar metodo ultimo logueo */
    $lastLoginDao->findLastLogin();

    /* Genera codigo */
    //$code = $generateCodeDao->GenerateCode();
    //$_SESSION["code"] = $code;

    /* Envio el codigo por email */
    //$sendEmailDao->SendEmailCode($code, $user);

    /* Modificar el estado de la sesion del usuario en BD */
    //$statusActiveUserDao->changeStatusUserLogin();

    $user["id_rols"] == 2 ? $location = 'app/' : $location = '../';

    $resp = array('success' => true, 'message' => 'Ingresar código', 'location' => $location);
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

/* Logout */

$app->get('/logout', function (Request $request, Response $response, $args) use ($statusActiveUserDao) {
    session_start();
    //$statusActiveUserDao->changeStatusUserLogin();
    session_destroy();
    $response->getBody()->write(json_encode("1", JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});
