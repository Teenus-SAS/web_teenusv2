<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class EbooksDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    public function findAllEbooks()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM ebooks");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $ebooks = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("Ebooks Obtenidos", array('Ebooks' => $ebooks));
        return $ebooks;
    }

    public function findEbook($id_ebook)
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM ebooks WHERE id_ebook = :id_ebook");
        $stmt->execute(['id_ebook' => $id_ebook]);
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $ebook = $stmt->fetch($connection::FETCH_ASSOC);
        $this->logger->notice("Ebook Obtenido", array('Ebook' => $ebook));
        return $ebook;
    }

    public function findAllPopularEbooks()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM ebooks ORDER BY downloads DESC");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $ebooks = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("Ebooks Obtenidos", array('Ebooks' => $ebooks));
        return $ebooks;
    }

    public function findAllRecentEbooks()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM ebooks ORDER BY creation_date DESC");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $ebooks = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("Ebooks Obtenidos", array('Ebooks' => $ebooks));
        return $ebooks;
    }
}
