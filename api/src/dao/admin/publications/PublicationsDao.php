<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class PublicationsDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    // public function findAllPublications() {}

    public function insertPublication($dataArticle)
    {
        $connection = Connection::getInstance()->getConnection();

        try {
            $stmt = $connection->prepare("INSERT INTO publications(id_article, publication_date) 
                                          VALUES (:id_article, :publication_date)");
            $stmt->execute([
                'id_article' => $dataArticle['id_article'],
                'publication_date' => $dataArticle['publicationDate']
            ]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }

    // public function updateArticle($dataArticle)
    // {
    //     $connection = Connection::getInstance()->getConnection();

    //     try {
    //         $stmt = $connection->prepare("UPDATE publications SET id_article = :id_article, publication_date = :publication_date
    //                                       WHERE id_publication = :id_publication");
    //         $stmt->execute([
    //             'id_publication' => $dataArticle['idPublication'],
    //             'id_article' => $dataArticle['idArticle'],
    //             'publication_date' => $dataArticle['publicationDate']
    //         ]);
    //         $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
    //     } catch (\Exception $e) {
    //         $message = $e->getMessage();
    //         $error = array('info' => true, 'message' => $message);
    //         return $error;
    //     }
    // }

    public function deletePublication($id_article)
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM publications WHERE id_article = :id_article");
        $stmt->execute(['id_article' => $id_article]);
        $row = $stmt->rowCount();

        if ($row > 0) {
            $stmt = $connection->prepare("DELETE FROM publications WHERE id_article = :id_article");
            $stmt->execute(['id_article' => $id_article]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        }
    }
}
