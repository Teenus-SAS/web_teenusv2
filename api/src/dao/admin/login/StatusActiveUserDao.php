<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class StatusActiveUserDao
{
  private $logger;

  public function __construct()
  {
    $this->logger = new Logger(self::class);
    $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
  }

  /* Actualizar estado de sesion de Usuario */

  public function changeStatusUserLogin()
  {
    @session_start();
    $id_user = $_SESSION['idUser'];

    $connection = Connection::getInstance()->getConnection();
    $stmt = $connection->prepare("SELECT session_active FROM users WHERE id_user = :id_user");
    $stmt->execute(['id_user' => $id_user]);
    $session = $stmt->fetch($connection::FETCH_ASSOC);
    $session = $session['session_active'];

    ($session == 1 ? $session = 0 : $session == 0) ? $session = 1 : $session;

    $stmt = $connection->prepare("UPDATE users SET session_active = :session_active WHERE id_user = :id_user");
    $stmt->execute(['session_active' => $session, 'id_user' => $id_user]);
  }

  public function changeStatusUserEbookLogin()
  {
    $id_user = $_SESSION['idUserEbook'];

    $connection = Connection::getInstance()->getConnection();
    $stmt = $connection->prepare("SELECT session_active FROM users_ebooks WHERE id_user_ebook = :id_user_ebook");
    $stmt->execute(['id_user_ebook' => $id_user]);
    $session = $stmt->fetch($connection::FETCH_ASSOC);
    $session = $session['session_active'];

    ($session == 1 ? $session = 0 : $session == 0) ? $session = 1 : $session;

    $stmt = $connection->prepare("UPDATE users_ebooks SET session_active = :session_active WHERE id_user_ebook = :id_user_ebook");
    $stmt->execute(['session_active' => $session, 'id_user_ebook' => $id_user]);
  }
}
