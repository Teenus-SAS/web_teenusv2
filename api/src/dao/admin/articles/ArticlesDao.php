<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class ArticlesDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    public function findAllArticles()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $articles = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("Articulos Obtenidos", array('Articulos' => $articles));
        return $articles;
    }

    public function insertArticle($dataArticle)
    {
        $connection = Connection::getInstance()->getConnection();

        try {
            $stmt = $connection->prepare("INSERT INTO articles (title, desc_article, author) 
                                          VALUES (:title, :desc_article, :author)");
            $stmt->execute([
                'title' => $dataArticle['title'],
                'desc_article' => $dataArticle['description'],
                'author' => $dataArticle['author']
            ]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }

    public function updateArticle($dataArticle)
    {
        $connection = Connection::getInstance()->getConnection();

        try {
            $stmt = $connection->prepare("UPDATE articles SET title = :title, desc_article = :desc_article, author = :author
                                          WHERE id_article = :id_article");
            $stmt->execute([
                'id_article' => $dataArticle['idArticle'],
                'title' => $dataArticle['title'],
                'desc_article' => $dataArticle['description'],
                'author' => $dataArticle['author']
            ]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }

    public function deleteArticle($id_article)
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM articles WHERE id_article = :id_article");
        $stmt->execute(['id_article' => $id_article]);
        $row = $stmt->rowCount();

        if ($row > 0) {
            $stmt = $connection->prepare("DELETE FROM articles WHERE id_article = :id_article");
            $stmt->execute(['id_article' => $id_article]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        }
    }
}
