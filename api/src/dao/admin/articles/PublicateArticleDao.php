<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class PublicateArticleDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }
    public function activeArticle()
    {
        $connection = Connection::getInstance()->getConnection();

        @session_start();
        if (empty($_SESSION['active']) || time() - $_SESSION['time'] > 100) {
            $stmt = $connection->prepare("UPDATE articles a
                                            JOIN publications p
                                            ON a.id_article = p.id_article
                                            SET a.active = 1 WHERE p.publication_date = CURRENT_DATE()");
            $stmt->execute();
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } else
            @session_start();
    }

    public function desactivateArticle()
    {
        $connection = Connection::getInstance()->getConnection();

        @session_start();
        if (empty($_SESSION['active']) || time() - $_SESSION['time'] > 100) {
            $stmt = $connection->prepare("UPDATE articles a
                                      JOIN publications p
                                      ON a.id_article = p.id_article
                                      SET a.active = 0 WHERE p.publication_date > CURRENT_DATE()");
            $stmt->execute();
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } else
            @session_start();
    }
}
