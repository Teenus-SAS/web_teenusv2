<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class ebooksDao
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

        $stmt = $connection->prepare("SELECT id_ebook, id_category, img, title, content, url, downloads, 
                                             reading_time, DATE(creation_date) AS creation_date, author
                                      FROM ebooks");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $ebooks = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("ebooks Obtenidos", array('ebooks' => $ebooks));
        return $ebooks;
    }

    public function findEbook($id_ebook)
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT id_ebook, id_category, img, title, content, url, downloads, 
                                             reading_time, DATE(creation_date) AS creation_date, author 
                                      FROM ebooks WHERE id_ebook = :id_ebook");
        $stmt->execute(['id_ebook' => $id_ebook]);
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $ebook = $stmt->fetch($connection::FETCH_ASSOC);
        $this->logger->notice("Ebook Obtenido", array('Ebook' => $ebook));
        return $ebook;
    }

    public function findAllPopularEbooks()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT id_ebook, id_category, img, title, content, url, downloads, 
                                             reading_time, DATE(creation_date) AS creation_date, author
                                      FROM ebooks ORDER BY downloads DESC");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $ebooks = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("ebooks Obtenidos", array('ebooks' => $ebooks));
        return $ebooks;
    }

    public function findAllRecentEbooks()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT id_ebook, id_category, img, title, content, url, downloads, 
                                             reading_time, DATE(creation_date) AS creation_date, author
                                      FROM ebooks ORDER BY creation_date DESC");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $ebooks = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("ebooks Obtenidos", array('ebooks' => $ebooks));
        return $ebooks;
    }

    public function findLastEbook()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT MAX(id_ebook) AS id_ebook FROM ebooks");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $ebooks = $stmt->fetch($connection::FETCH_ASSOC);
        return $ebooks;
    }

    public function insertEbook($dataEbook)
    {
        $connection = Connection::getInstance()->getConnection();

        try {

            $stmt = $connection->prepare("INSERT INTO ebooks (title, content, author) 
                                          VALUES (:title, :content, :author)");
            $stmt->execute([
                'title' => strtoupper($dataEbook['title']),
                'content' => $dataEbook['description'],
                'author' => ucfirst($dataEbook['author'])
            ]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }

    public function updateEbook($dataEbook)
    {
        $connection = Connection::getInstance()->getConnection();

        try {
            $stmt = $connection->prepare("UPDATE ebooks SET title = :title, content = :content, author = :author
                                          WHERE id_ebook = :id_ebook");
            $stmt->execute([
                'id_ebook' => $dataEbook['idEbook'],
                'title' => strtoupper($dataEbook['title']),
                'content' => $dataEbook['description'],
                'author' => ucwords($dataEbook['author'])
            ]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }

    public function updateContDownloads($id_ebook)
    {
        $connection = Connection::getInstance()->getConnection();

        try {
            $stmt = $connection->prepare("UPDATE ebooks SET downloads = downloads + 1 WHERE id_ebook = :id_ebook");
            $stmt->execute([
                'id_ebook' => $id_ebook
            ]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }

    public function imageEbook($id_ebook)
    {
        $connection = Connection::getInstance()->getConnection();
        $targetDir = dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/assets/images/teenus/ebooks';
        $allowTypes = array('jpg', 'jpeg', 'png');

        $image_name = $_FILES['img']['name'];
        $tmp_name   = $_FILES['img']['tmp_name'];
        $size       = $_FILES['img']['size'];
        $type       = $_FILES['img']['type'];
        $error      = $_FILES['img']['error'];

        /* Verifica si directorio esta creado y lo crea */
        if (!is_dir($targetDir))
            mkdir($targetDir, 0777, true);

        $targetDir = '/assets/images/teenus/ebooks';
        $targetFilePath = $targetDir . '/' . $image_name;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array($fileType, $allowTypes)) {
            $sql = "UPDATE ebooks SET img = :img WHERE id_ebook = :id_ebook";
            $query = $connection->prepare($sql);
            $query->execute([
                'img' => $targetFilePath,
                'id_ebook' => $id_ebook
            ]);

            $targetDir = dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/assets/images/teenus/ebooks';
            $targetFilePath = $targetDir . '/' . $image_name;

            move_uploaded_file($tmp_name, $targetFilePath);
        }
    }

    public function deleteEbook($id_ebook)
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM ebooks WHERE id_ebook = :id_ebook");
        $stmt->execute(['id_ebook' => $id_ebook]);
        $row = $stmt->rowCount();

        if ($row > 0) {
            $stmt = $connection->prepare("DELETE FROM ebooks WHERE id_ebook = :id_ebook");
            $stmt->execute(['id_ebook' => $id_ebook]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        }
    }
}
