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

    public function findAllArticles($id_company)
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT p.id_publication, a.id_article, a.title, a.desc_article, a.author, p.publication_date
                                      FROM articles a
                                      INNER JOIN publications p ON p.id_article = a.id_article
                                      WHERE a.id_company = :id_company ORDER BY `p`.`publication_date` DESC");
        $stmt->execute(['id_company' => $id_company]);
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $articles = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("Articulos Obtenidos", array('Articulos' => $articles));
        return $articles;
    }

    public function findLastArticle()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT MAX(id_article) AS id_article FROM articles");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $articles = $stmt->fetch($connection::FETCH_ASSOC);
        return $articles;
    }

    public function insertArticle($dataArticle, $id_company)
    {
        $connection = Connection::getInstance()->getConnection();

        try {
            $stmt = $connection->prepare("INSERT INTO articles (id_company, title, desc_article, author) 
                                          VALUES (:id_company, :title, :desc_article, :author)");
            $stmt->execute([
                'id_company' => $id_company,
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
