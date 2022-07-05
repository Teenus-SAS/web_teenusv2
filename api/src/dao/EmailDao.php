<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class EmailDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    public function sendEmail($dataContact)
    {
        $names = $dataContact['name'];
        $email = $dataContact['email'];
        $phone = $dataContact['phone'];
        $company = $dataContact['company'];
        $subject = $dataContact['subject'];
        $message = $dataContact['message'];

        $msg = "Hola,<br><br>
                    Tienes un nuevo contacto con los siguientes datos:
                <ul>
                    <li>Nombre del contacto: $names</li>
                    <li>Email: $email</li>
                    <li>Teléfono: $phone</li>
                    <li>Empresa: $company</li>
                    <li>Asunto: $subject</li>
                    <li>Mensaje: $message</li>

                </ul>
                <br><br>
                    Por favor responder urgentemente y hacer seguimiento.<br><br>

                Saludos,<br><br>

                Equipo de Soporte Teenus";

        $msg = wordwrap($msg, 70);

        //headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: SitioWeb <info@teenus.com.co>' . "\r\n";

        // send email
        mail($email, "Nuevo Contacto Teenus", $msg, $headers);
    }
}
