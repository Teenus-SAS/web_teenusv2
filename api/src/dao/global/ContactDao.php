<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class ContactDao
{
  private $logger;

  public function __construct()
  {
    $this->logger = new Logger(self::class);
    $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
  }

  public function findAllContacts()
  {
    $connection = Connection::getInstance()->getConnection();
    $stmt = $connection->prepare();
    $stmt->execute();

    $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

    $machines = $stmt->fetchAll($connection::FETCH_ASSOC);
    $this->logger->notice("machines", array('machines' => $machines));
    return $machines;
  }

  public function insertContact($dataContact)
  {
    $connection = Connection::getInstance()->getConnection();

    try {
      $stmt = $connection->prepare("INSERT INTO contacts (names, email, phone, company, subject, message) 
                                    VALUE(:names, :email, :phone, :company, :subject, :message)");
      $stmt->execute([
        'names' => $dataContact['name'],
        'email' => $dataContact['email'],
        'phone' => $dataContact['phone'],
        'company' => $dataContact['company'],
        'subject' => $dataContact['subject'],
        'message' => $dataContact['message'],
      ]);

      $nameUser = $dataContact['name'];
      $email = $dataContact['email'];
      $phone = $dataContact['phone'];
      $company = $dataContact['company'];
      $subject = $dataContact['subject'];
      $message = $dataContact['message'];

      //$emailDao = new EmailDao;
      //$emailDao->sendEmail($dataContact);
      
      $msg = "Hola, Martha Lucia\r\n
              Tienes un nuevo prospecto que acaba de enviarte un mensaje por la pagina web. con la sigueinte información: \r\n
                Nombres: $nameUser\r\n
                Email: $email\r\n
                Telefono: $phone\r\n
                Company: $company\r\n
                Mensaje: $message\r\n";
                
      // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
      $mensaje = wordwrap($msg, 70, "\r\n");

      // Enviarlo
      mail('martha.olmos@teenus.com.co', '!Tienes un nuevo prospecto!', $mensaje);


      $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
    } catch (\Exception $e) {

      $message = $e->getMessage();
      $error = array('info' => true, 'message' => $message);
      return $error;
    }
  }


  public function updateContact($dataContact)
  {
    $connection = Connection::getInstance()->getConnection();

    try {
      $stmt = $connection->prepare("");
      $stmt->execute();
      $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
    } catch (\Exception $e) {
      $message = $e->getMessage();
      $error = array('info' => true, 'message' => $message);
      return $error;
    }
  }

  public function deleteContact($id_contact)
  {
    $connection = Connection::getInstance()->getConnection();

    $stmt = $connection->prepare("");
    $stmt->execute();
    $rows = $stmt->rowCount();

    if ($rows > 0) {
      $stmt = $connection->prepare("");
      $stmt->execute();
      $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
    }
  }
}
