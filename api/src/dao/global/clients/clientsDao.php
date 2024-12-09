<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class clientsDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    public function findAllClients()
    {
        $connection = Connection::getInstance()->getConnection();
        $sql = "SELECT * FROM clients;";
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $clients = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("clients", array('clients' => $clients));
        return $clients;
    }
}
