<?php


namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class UserInactiveTimeDao
{
  private $logger;

  public function __construct()
  {
    $this->logger = new Logger(self::class);
    $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
  }

  public function findSession()
  {
    if (!isset($_SESSION['idUserEbook']))
      return 1;
    else {
      $id_user = $_SESSION['idUserEbook'];
      $connection = Connection::getInstance()->getConnection();

      $stmt = $connection->prepare("SELECT session_active FROM users_ebooks WHERE id_user_ebook = :id_user_ebook");
      $stmt->execute(['id_user_ebook' => $id_user]);
    }
    $session = $stmt->fetch($connection::FETCH_ASSOC);
    return $session;
  }
}
