<?php

use tezlik_web\dao\EmailDao;
use tezlik_web\dao\LastLoginDao;
use tezlik_web\dao\AutenticationUserDao;
use tezlik_web\dao\PassUserDao;

$passUserDao = new PassUserDao();
$sendEmailDao = new EmailDao();
$autenticationUserDao = new AutenticationUserDao();
$lastLoginDao = new LastLoginDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/* Change Password */

$app->post('/changePassword', function (Request $request, Response $response, $args) use ($passUserDao) {
    session_start();
    $id = $_SESSION['idUser'];

    if ($id != null) {

        $parsedBody = $request->getParsedBody();
        $newpass = $parsedBody["inputNewPass"];
        $newpass1 = $parsedBody["inputNewPass1"];

        if ($newpass != $newpass1)
            $resp = array('error' => true, 'message' => 'Las contraseñas no coinciden, intente nuevamente');
        else {
            $usersChangePassword = $passUserDao->ChangePasswordUser($id, $newpass);

            if ($usersChangePassword == null)
                $resp = array('success' => true, 'message' => 'Cambio de Password correcto');
            else
                $resp = array('error' => true, 'message' => 'Hubo un problema, intente nuevamente');
        }
    } else
        $resp = array('error' => true, 'message' => 'Usuario no autorizado');

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

/* Forgot Password */

$app->post('/forgotPassword', function (Request $request, Response $response, $args) use ($passUserDao, $sendEmailDao, $autenticationUserDao, $lastLoginDao) {
    $parsedBody = $request->getParsedBody();
    $email = trim($parsedBody["data"]);

    $passwordTemp = $passUserDao->forgotPasswordUser($email);

    if ($passwordTemp == null)
        $resp = array('error' => true, 'message' => 'Correo electronico no se encuentra en registrado. Valide nuevamente');
    else {
        $user = $autenticationUserDao->findByEmail($email);

        /* Nueva session */
        session_start();
        $_SESSION['active'] = true;
        $_SESSION['idUser'] = $user['id_user'];
        $_SESSION['name'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['rol'] = $user["id_rols"];
        $_SESSION["time"] = time();

        /* Actualizar metodo ultimo logueo */
        $lastLoginDao->findLastLogin();

        /* Enviar email */
        // $sendEmailDao->SendEmailPassword($email, $passwordTemp);
        $resp = array('success' => true, 'message' => 'La contraseña fue enviada al email suministrado exitosamente');
    }

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});
