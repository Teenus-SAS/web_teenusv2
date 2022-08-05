<?php

use tezlik_web\dao\QuantityUsersDao;
use tezlik_web\dao\UsersDao;

$userDao = new UsersDao();
$quantityUsersDao = new QuantityUsersDao();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/* Consulta todos */

$app->get('/users', function (Request $request, Response $response, $args) use ($userDao) {
    $users = $userDao->findAllusers();
    $response->getBody()->write(json_encode($users, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/user', function (Request $request, Response $response, $args) use ($userDao) {
    $users = $userDao->findUser();
    $response->getBody()->write(json_encode($users, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
});

/* Insertar usuario */

$app->post('/addUser', function (Request $request, Response $response, $args) use ($userDao, $quantityUsersDao) {
    $dataUser = $request->getParsedBody();

    // selecciona quantity_user de companies_licenses
    // $quantityAllowsUsers = $quantityUsersDao->quantityUsersAllows();

    //obtener cantidad de usuarios creados
    // $quantityCreatedUsers = $quantityUsersDao->quantityUsersCreated();

    // if ($quantityAllowsUsers >= $quantityCreatedUsers)
    //     $resp = array('error' => true, 'message' => 'Cantidad de usuarios maxima alcanzada');
    // else {
    if (empty($dataUser['nameUser']) && empty($dataUser['lastnameUser']) && empty($dataUser['emailUser'])) {
        $resp = array('error' => true, 'message' => 'Complete todos los datos');
        exit();
    }

    /* Almacena el usuario */
    $users = $userDao->saveUser($dataUser);

    if ($users == 1) {
        $resp = array('error' => true, 'message' => 'El email ya se encuentra registrado. Intente con uno nuevo');
    } elseif ($users == null) {
        $resp = array('success' => true, 'message' => 'Usuario creado correctamente');
    } else {
        $resp = array('error' => true, 'message' => 'Ocurrio un error mientras almacenaba la información. Intente nuevamente');
    }
    // }
    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->post('/updateUser', function (Request $request, Response $response, $args) use ($userDao) {
    $dataUser = $request->getParsedBody();
    $files = $request->getUploadedFiles();

    if (empty($dataUser['nameUser']) && empty($dataUser['lastnameUser'])) {
        $resp = array('error' => true, 'message' => 'Ingrese sus Nombres y Apellidos completos');
    } else {
        if (empty($dataUser['avatar'])) {
            $users = $userDao->updateUser($dataUser, null);
        } else {
            foreach ($files as $file) {
                $name = $file->getClientFilename();
                $name = explode(".", $name);
                $ext = array_pop($name);
                $ext = strtolower($ext);
                if (empty($ext)) {
                    $path = null;
                } else {
                    if (!in_array($ext, ["jpeg", "jpg", "png"])) {
                        $resp = array('error' => true, 'message' => 'La imagen cargada no es valida');
                        $response->getBody()->write(json_encode($resp));
                        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
                    } else {
                        $file->moveTo("../app/assets/images/avatars/" . $name[0] . '.' . $ext);
                        $path = "../../../app/assets/images/avatars/" . $name[0] . '.' . $ext;
                        $users = $userDao->updateUser($dataUser, $path);
                        // Creacion carpeta de la img
                        $path = "../../../app/assets/images/avatars/44";
                        if (!file_exists($path)) {
                            mkdir($path, 0777, true);
                        }
                    }
                }
            }
        }
    }
    if ($users == null)
        $resp = array('success' => true, 'message' => 'Usuario actualizado correctamente');
    else
        $resp = array('error' => true, 'message' => 'Ocurrio un error, Intente nuevamente');

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});

$app->post('/deleteUser', function (Request $request, Response $response, $args) use ($userDao) {
    $dataUser = $request->getParsedBody();
    session_start();
    $idUser = $_SESSION['idUser'];

    if ($dataUser['idUser'] != $idUser) {

        $users = $userDao->deleteUser($dataUser);

        if ($users == null)
            $resp = array('success' => true, 'message' => 'Usuario eliminado correctamente');
        else
            $resp = array('error' => true, 'message' => 'No fue posible eliminar el usuario, Intente nuevamente');
    } else {
        $resp = array('error' => true, 'message' => 'No es posible eliminar este usuario');
    }

    $response->getBody()->write(json_encode($resp));
    return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
});
