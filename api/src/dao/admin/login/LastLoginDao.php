<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class LastLoginDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    public function findLastLogin()
    {
        $connection = Connection::getInstance()->getConnection();
        @session_start();
        $id_user = $_SESSION['idUser'];

        try {
            $stmt = $connection->prepare("UPDATE users SET last_login = now() WHERE id_user = :id_user");
            $stmt->execute(['id_user' => $id_user]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }

    public function findLastLoginUserEbook()
    {
        $connection = Connection::getInstance()->getConnection();
        $id_user = $_SESSION['idUserEbook'];

        try {
            $stmt = $connection->prepare("UPDATE users_ebooks SET last_login = now() WHERE id_user_ebook = :id_user_ebook");
            $stmt->execute(['id_user' => $id_user]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }
}
