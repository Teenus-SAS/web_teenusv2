<?php

use tezlik_web\dao\LastLoginDao;
use tezlik_web\dao\AutenticationUserDao;
use tezlik_web\dao\PassUserDao;
//use tezlik_web\dao\SendEmailDao;
use tezlik_web\dao\SendMakeEmailDao;

$passUserDao = new PassUserDao();
$autenticationUserDao = new AutenticationUserDao();
$lastLoginDao = new LastLoginDao();
$sendMakeEmailDao = new SendMakeEmailDao();
//$sendEmailDao = new SendEmailDao();

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

/* $app->post('/forgotPassword', function (Request $request, Response $response, $args) use (
    $passUserDao,
    $sendEmailDao,
    $sendMakeEmailDao
) {
    $parsedBody = $request->getParsedBody();
    $email = trim($parsedBody["data"]);

    $passwordTemp = $passUserDao->forgotPasswordUser($email);

    if ($passwordTemp == null)
        $resp = array('error' => true, 'message' => 'Correo electronico no se encuentra en registrado. Valide nuevamente');
    else {
        $dataEmail = $sendMakeEmailDao->SendEmailForgotPassword($email, $passwordTemp);
        $email =  $sendEmailDao->SendEmail($dataEmail, 'soporteTezlik@tezliksoftware.com.co', 'SoporteTennus');

        if ($email == null)
            $resp = array('success' => true, 'message' => "La contraseña fue enviada al email suministrado exitosamente.");
        else if (isset($email['info']))
            $resp = array('info' => true, 'message' => $email['message']);
        else
            $resp = array('error' => true, 'message' => 'Ocurrio un error mientras enviaba la información. Intente nuevamente');
    }

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
}); */
