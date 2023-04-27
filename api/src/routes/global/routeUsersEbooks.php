<?php

use tezlik_web\dao\GenerateCodeDao;
use tezlik_web\dao\LastLoginDao;
use tezlik_web\dao\SendEmailDao;
use tezlik_web\dao\UsersEbooksDao;
use tezlik_web\dao\SendMakeEmailDao;
use tezlik_web\dao\StatusActiveUserDao;

$usersDao = new UsersEbooksDao();
$codeDao = new GenerateCodeDao();
$makeEmailDao = new SendMakeEmailDao();
$sendEmailDao = new SendEmailDao();
$statusActiveUserDao = new StatusActiveUserDao();
$lastLoginDao = new LastLoginDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/* Consulta todos */

$app->get('/usersEbooks', function (Request $request, Response $response, $args) use ($usersDao) {
    $users = $usersDao->findAllUsers();
    $response->getBody()->write(json_encode($users, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/addUserEbook', function (Request $request, Response $response, $args) use (
    $usersDao,
    $codeDao,
    $makeEmailDao,
    $sendEmailDao
) {
    $dataUser = $request->getParsedBody();

    if (
        empty($dataUser['nameUser']) && empty($dataUser['email'])
        && empty($dataUser['sector']) && empty($dataUser['numEmployees'])
    ) {
        $resp = array('error' => true, 'message' => 'Complete todos los datos');
    } else {
        $user = $usersDao->findUser($dataUser['email']);

        if (is_array($user)) {
            $resp = array('error' => true, 'message' => 'El email ya se encuentra registrado. Intente con uno nuevo');
        } else {
            $pass = $codeDao->GenerateCode();

            $dataEmail = $makeEmailDao->SendEmailPassword($dataUser['email'], $pass);

            $email = $sendEmailDao->sendEmail($dataEmail, 'soporteTezlik@tezliksoftware.com.co', 'SoporteTezlik');

            // if ($email == null)
            /* Almacena el usuario */
            $user = $usersDao->addUser($dataUser, $pass);

            if ($user == null)
                $resp = array('success' => true, 'message' => 'Usuario creado correctamente');
            else
                $resp = array('error' => true, 'message' => 'Ocurrio un error mientras almacenaba la información. Intente nuevamente');
        }
    }

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->post('/userEbooksAutentication', function (Request $request, Response $response, $args) use (
    $usersDao,
    $statusActiveUserDao,
    $lastLoginDao
) {
    $parsedBody = $request->getParsedBody();

    $user = $parsedBody["email"];
    $password = $parsedBody["password"];
    $user = $usersDao->findUser($user);

    $resp = array();

    /* Usuario sn datos */
    if ($user == null) {
        $resp = array('error' => true, 'message' => 'Usuario y/o password incorrectos, valide nuevamente');
        $response->getBody()->write(json_encode($resp));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    /* Valida el password del usuario */
    if (!password_verify($password, $user['password'])) {
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

    /* Nueva session user */
    session_start();
    $_SESSION['active'] = true;
    $_SESSION['idUser'] = $user['id_user_ebook'];
    $_SESSION['case'] = 1;
    $_SESSION['email'] = $user['email'];

    /* Actualizar metodo ultimo logueo */
    $lastLoginDao->findLastLoginUserEbook();

    /* Modificar el estado de la sesion del usuario en BD */
    $statusActiveUserDao->changeStatusUserEbookLogin();

    $resp = array('success' => true, 'message' => 'Inicio de sesión exitoso');
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});
