<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class PainPointsDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    public function findAllPainPoints()
    {
        $connection = Connection::getInstance()->getConnection();
        $sql = "SELECT * FROM paint_points";
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $paint_points = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("paint_points", array('paint_points' => $paint_points));
        return $paint_points;
    }
}
