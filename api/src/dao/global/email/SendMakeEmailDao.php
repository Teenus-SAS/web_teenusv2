<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;


class SendMakeEmailDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }


    public function SendEmailCode($code, $user)
    {
        $name = $user['firstname'];

        $msg = "Hola $name\r\n
                Si estas tratando de iniciar sesion en Tezlik. \r\n
                Ingresa el siguiente código para completar el inicio de sesión:\r\n
                <h4>$code</h4>";

        $resp = array('to' => array($user['email']), 'subject' => 'Código De Verificación', 'body' => $msg, 'ccHeader' => null);

        return $resp;
    }

    public function SendEmailForgotPassword($email, $password)
    {
        // the message
        $msg = 'Hola,\n
        Recientemente solicitó recordar su contraseña por lo que para mayor seguridad creamos una nueva. Para ingresar a Teenus puede hacerlo con:\n
        · Nombre de usuario:' . $email . '\n
        · Contraseña:' . $password . '\n
        Las contraseñas generadas a través de nuestra plataforma son muy seguras solo se envían al correo electrónico del contacto de la cuenta.
        Si le preocupa la seguridad de la cuenta o sospecha que alguien está intentando obtener acceso no autorizado, puede estar 
        seguro que las contraseñas son generadas aleatoriamente, sin embargo, le recomendamos ingresar a la plataforma con la nueva clave y cambiarla por una nueva.
        Saludos,\n\n
        Equipo de Soporte Teenus';

        //$resp = array('to' => array($email), 'subject' => 'Nuevo Password', 'body' => $msg, 'ccHeader' => null);
        //return $resp;
        return $msg;
    }

    public function SendEmailPassword($email, $password)
    {
        // the message
        $msg = "Hola,\n
        Recientemente solicitó crear un nuevo usuario, por lo que para mayor seguridad creamos una contraseña. Para ingresar a Ebook puede hacerlo con:\n
        · Nombre de usuario: $email \n
        · Contraseña: $password \n
        Las contraseñas generadas a través de nuestra plataforma son muy seguras solo se envían al correo electrónico del contacto de la cuenta.
        Si le preocupa la seguridad de la cuenta o sospecha que alguien está intentando obtener acceso no autorizado, puede estar 
        seguro que las contraseñas son generadas aleatoriamente.
        Saludos,\n\n
        Equipo de Soporte Teenus";

        $resp = array('to' => array($email), 'subject' => 'Nuevo Password', 'body' => $msg, 'ccHeader' => null);
        return $resp;
    }
}
