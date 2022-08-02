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

    public function SendEmailPassword($email, $password)
    {
        // the message
        $msg = "Hola,<br><br>
            Recientemente solicitó recordar su contraseña por lo que para mayor seguridad creamos una nueva. Para ingresar al CRM puede hacerlo con:
            <ul>
            <li>Nombre de usuario: $email</li>
            <li>Contraseña: $password</li>
            </ul>
             
            Las contraseñas generadas a través de nuestra plataforma son muy seguras solo se envían al correo electrónico del contacto de la cuenta.<br><br> 
            Si le preocupa la seguridad de la cuenta o sospecha que alguien está intentando obtener acceso no autorizado, puede estar 
            seguro que las contraseñas son generadas aleatoriamente, sin embargo, le recomendamos ingresar a la plataforma con la nueva clave y cambiarla por una nueva.<br><br>
        
            Saludos,<br><br>
        
            El Equipo de Soporte CRM";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        //headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: SoporteCRM <soporteCRM@proyecformas.com>' . "\r\n";
        // send email
        mail($email, "Nuevo password", $msg, $headers);
    }

    public function SendEmailSupport($dataSupport, $email)
    {
        $to = 'soporte@teenus.com.co';
        $ccHeader = $dataSupport['ccHeader'];
        // the message
        $msg = $dataSupport['message'];

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        //headers
        $headers = $dataSupport['subject'] . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: SoporteTeenus <$email>" . "\r\n";
        // send email
        mail($to, "Soporte", $msg, $headers, $ccHeader);
    }
}
