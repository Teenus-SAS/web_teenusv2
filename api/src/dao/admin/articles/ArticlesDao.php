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

        $stmt = $connection->prepare("SELECT p.id_publication, a.id_article, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
                                      FROM articles a
                                      INNER JOIN publications p ON p.id_article = a.id_article
                                      ORDER BY `p`.`publication_date` DESC;");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $articles = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("Articulos Obtenidos", array('Articulos' => $articles));
        return $articles;
    }

    public function findArticle($id_article)
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT p.id_publication, a.id_article, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
                                      FROM articles a
                                      INNER JOIN publications p ON p.id_article = a.id_article
                                      WHERE a.id_article = :id_article");
        $stmt->execute(['id_article' => $id_article]);
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $article = $stmt->fetch($connection::FETCH_ASSOC);
        return $article;
    }

    public function findNextOrPrevArticle($id_article, $op)
    {
        $connection = Connection::getInstance()->getConnection();

        if ($op == 'previous')
            $stmt = $connection->prepare("SELECT p.id_publication, a.id_article, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
                                      FROM articles a
                                      INNER JOIN publications p ON p.id_article = a.id_article
                                      WHERE a.id_article < :id_article");
        else
            $stmt = $connection->prepare("SELECT p.id_publication, a.id_article, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
                                      FROM articles a
                                      INNER JOIN publications p ON p.id_article = a.id_article
                                      WHERE a.id_article > :id_article");
        $stmt->execute(['id_article' => $id_article]);
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $article = $stmt->fetch($connection::FETCH_ASSOC);
        return $article;
    }

    public function findRecentArticles()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT p.id_publication, a.id_article, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
                                      FROM articles a
                                      INNER JOIN publications p ON p.id_article = a.id_article
                                      WHERE a.active = 1 ORDER BY `p`.`publication_date` DESC;");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $articles = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("Articulos Obtenidos", array('Articulos' => $articles));
        return $articles;
    }

    public function findPopularArticles()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT p.id_publication, a.id_article, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
                                      FROM articles a
                                      INNER JOIN publications p ON p.id_article = a.id_article
                                      WHERE a.active = 1 ORDER BY `a`.`views` DESC;");
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

            $stmt = $connection->prepare("INSERT INTO articles (title, content, author) 
                                          VALUES (:title, :content, :author)");
            $stmt->execute([
                'title' => strtoupper($dataArticle['title']),
                'content' => $dataArticle['description'],
                'author' => ucfirst($dataArticle['author'])
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

        $date = date('Y-m-d');

        try {
            $stmt = $connection->prepare("UPDATE articles SET title = :title, content = :content, modification_date = :modification_date, author = :author
                                          WHERE id_article = :id_article");
            $stmt->execute([
                'id_article' => $dataArticle['idArticle'],
                'title' => strtoupper($dataArticle['title']),
                'content' => $dataArticle['description'],
                'modification_date' => $date,
                'author' => ucwords($dataArticle['author'])
            ]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
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

    public function imageArticle($id_article)
    {
        $connection = Connection::getInstance()->getConnection();
        $targetDir = dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/assets/images/teenus/articles';
        $allowTypes = array('jpg', 'jpeg', 'png');

        $image_name = $_FILES['img']['name'];
        $tmp_name   = $_FILES['img']['tmp_name'];
        $size       = $_FILES['img']['size'];
        $type       = $_FILES['img']['type'];
        $error      = $_FILES['img']['error'];

        /* Verifica si directorio esta creado y lo crea */
        if (!is_dir($targetDir))
            mkdir($targetDir, 0777, true);

        $targetDir = '/assets/images/teenus/articles';
        $targetFilePath = $targetDir . '/' . $image_name;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array($fileType, $allowTypes)) {
            $sql = "UPDATE articles SET img = :img WHERE id_article = :id_article";
            $query = $connection->prepare($sql);
            $query->execute([
                'img' => $targetFilePath,
                'id_article' => $id_article
            ]);

            $targetDir = dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/assets/images/teenus/articles';
            $targetFilePath = $targetDir . '/' . $image_name;

            move_uploaded_file($tmp_name, $targetFilePath);
        }
    }

    /* Actualizar Visita de articulo */
    public function updateArticleView($id_article)
    {
        $connection = Connection::getInstance()->getconnection();

        try {
            $stmt = $connection->prepare("UPDATE articles SET views = views + 1 WHERE id_article = :id_article");
            $stmt->execute(['id_article' => $id_article]);
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
