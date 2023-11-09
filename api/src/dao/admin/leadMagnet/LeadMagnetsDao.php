<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class LeadMagnetsDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    public function findAllLeadMagnets()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM lead_magnets ORDER BY date_lead_magnet ASC");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $LeadMagnets = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("Lead Magnets Obtenidos", array('Lead Magnets' => $LeadMagnets));
        return $LeadMagnets;
    }

    public function findLeadMagnet($title)
    {
        $connection = Connection::getInstance()->getConnection();
        $title = strtoupper($title);

        $stmt = $connection->prepare("SELECT * FROM lead_magnets WHERE title LIKE '$title%'");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $leadMagnet = $stmt->fetch($connection::FETCH_ASSOC);
        return $leadMagnet;
    }

    // public function findNextOrPrevLeadMagnet($id_lead_magnet, $op)
    // {
    //     $connection = Connection::getInstance()->getConnection();

    //     if ($op == 'previous')
    //         $stmt = $connection->prepare("SELECT p.id_publication, a.id_lead_magnet, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
    //                                   FROM LeadMagnets a
    //                                   INNER JOIN publications p ON p.id_lead_magnet = a.id_lead_magnet
    //                                   WHERE a.id_lead_magnet < :id_lead_magnet");
    //     else
    //         $stmt = $connection->prepare("SELECT p.id_publication, a.id_lead_magnet, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
    //                                   FROM LeadMagnets a
    //                                   INNER JOIN publications p ON p.id_lead_magnet = a.id_lead_magnet
    //                                   WHERE a.id_lead_magnet > :id_lead_magnet");
    //     $stmt->execute(['id_lead_magnet' => $id_lead_magnet]);
    //     $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

    //     $LeadMagnet = $stmt->fetch($connection::FETCH_ASSOC);
    //     return $LeadMagnet;
    // }

    // public function findRecentLeadMagnets()
    // {
    //     $connection = Connection::getInstance()->getConnection();

    //     $stmt = $connection->prepare("SELECT p.id_publication, a.id_lead_magnet, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
    //                                   FROM LeadMagnets a
    //                                   INNER JOIN publications p ON p.id_lead_magnet = a.id_lead_magnet
    //                                   WHERE a.active = 1 ORDER BY `p`.`publication_date` DESC;");
    //     $stmt->execute();
    //     $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

    //     $LeadMagnets = $stmt->fetchAll($connection::FETCH_ASSOC);
    //     $this->logger->notice("Articulos Obtenidos", array('Articulos' => $LeadMagnets));
    //     return $LeadMagnets;
    // }

    // public function findPopularLeadMagnets()
    // {
    //     $connection = Connection::getInstance()->getConnection();

    //     $stmt = $connection->prepare("SELECT p.id_publication, a.id_lead_magnet, a.title, a.content, a.img, a.author, a.views, a.active, p.publication_date
    //                                   FROM LeadMagnets a
    //                                   INNER JOIN publications p ON p.id_lead_magnet = a.id_lead_magnet
    //                                   WHERE a.active = 1 ORDER BY `a`.`views` DESC;");
    //     $stmt->execute();
    //     $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

    //     $LeadMagnets = $stmt->fetchAll($connection::FETCH_ASSOC);
    //     $this->logger->notice("Articulos Obtenidos", array('Articulos' => $LeadMagnets));
    //     return $LeadMagnets;
    // }

    public function insertLeadMagnet($dataLeadMagnet)
    {
        $connection = Connection::getInstance()->getConnection();

        try {

            $stmt = $connection->prepare("INSERT INTO lead_magnets (title, description, date_lead_magnet) 
                                          VALUES (:title, :description, :date_lead_magnet)");
            $stmt->execute([
                'title' => strtoupper($dataLeadMagnet['titleLeadMagnets']),
                'description' => trim($dataLeadMagnet['descLeadMagnets']),
                'date_lead_magnet' => $dataLeadMagnet['dateLeadMagnets']
            ]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }

    public function updateLeadMagnet($dataLeadMagnet)
    {
        $connection = Connection::getInstance()->getConnection();

        try {
            $stmt = $connection->prepare("UPDATE lead_magnets SET title = :title, description = :description, date_lead_magnet = :date_lead_magnet
                                          WHERE id_lead_magnet = :id_lead_magnet");
            $stmt->execute([
                'id_lead_magnet' => $dataLeadMagnet['idLeadMagnet'],
                'title' => strtoupper($dataLeadMagnet['titleLeadMagnets']),
                'description' => trim($dataLeadMagnet['descLeadMagnets']),
                'date_lead_magnet' => $dataLeadMagnet['dateLeadMagnets']
            ]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }

    public function findLastLeadMagnet()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT MAX(id_lead_magnet) AS id_lead_magnet FROM lead_magnets");
        $stmt->execute();
        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $LeadMagnet = $stmt->fetch($connection::FETCH_ASSOC);
        return $LeadMagnet;
    }

    public function imageLeadMagnet($id_lead_magnet)
    {
        $connection = Connection::getInstance()->getConnection();
        $targetDir = dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/assets/images/leadMagnets';
        $allowTypes = array('jpg', 'jpeg', 'png');

        $file_name = $_FILES['img']['name'];
        $tmp_name   = $_FILES['img']['tmp_name'];
        $size       = $_FILES['img']['size'];
        $type       = $_FILES['img']['type'];
        $error      = $_FILES['img']['error'];

        /* Verifica si directorio esta creado y lo crea */
        if (!is_dir($targetDir))
            mkdir($targetDir, 0777, true);

        $targetDir = '/assets/images/leadMagnets';
        $targetFilePath = $targetDir . '/' . $file_name;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array($fileType, $allowTypes)) {
            $sql = "UPDATE lead_magnets SET img = :img WHERE id_lead_magnet = :id_lead_magnet";
            $query = $connection->prepare($sql);
            $query->execute([
                'img' => $targetFilePath,
                'id_lead_magnet' => $id_lead_magnet
            ]);

            $targetDir = dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/assets/images/leadMagnets';
            $targetFilePath = $targetDir . '/' . $file_name;

            move_uploaded_file($tmp_name, $targetFilePath);
        }
    }

    public function fileLeadMagnet($id_lead_magnet)
    {
        $connection = Connection::getInstance()->getConnection();
        $targetDir = dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/assets/files/leadMagnets';
        // $allowTypes = array('jpg', 'jpeg', 'png');

        $file_name = $_FILES['file']['name'];
        $tmp_name   = $_FILES['file']['tmp_name'];
        $size       = $_FILES['file']['size'];
        $type       = $_FILES['file']['type'];
        $error      = $_FILES['file']['error'];

        /* Verifica si directorio esta creado y lo crea */
        if (!is_dir($targetDir))
            mkdir($targetDir, 0777, true);

        $targetDir = '/assets/files/leadMagnets';
        $targetFilePath = $targetDir . '/' . $file_name;

        // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // if (in_array($fileType, $allowTypes)) {
        $sql = "UPDATE lead_magnets SET file = :file WHERE id_lead_magnet = :id_lead_magnet";
        $query = $connection->prepare($sql);
        $query->execute([
            'file' => $targetFilePath,
            'id_lead_magnet' => $id_lead_magnet
        ]);

        $targetDir = dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/assets/files/leadMagnets';
        $targetFilePath = $targetDir . '/' . $file_name;

        move_uploaded_file($tmp_name, $targetFilePath);
        // }
    }

    // /* Actualizar Visita de articulo */
    // public function updateLeadMagnetView($id_lead_magnet)
    // {
    //     $connection = Connection::getInstance()->getconnection();

    //     try {
    //         $stmt = $connection->prepare("UPDATE LeadMagnets SET views = views + 1 WHERE id_lead_magnet = :id_lead_magnet");
    //         $stmt->execute(['id_lead_magnet' => $id_lead_magnet]);
    //         $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
    //     } catch (\Exception $e) {
    //         $message = $e->getMessage();
    //         $error = array('info' => true, 'message' => $message);
    //         return $error;
    //     }
    // }

    public function deleteLeadMagnet($id_lead_magnet)
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM lead_magnets WHERE id_lead_magnet = :id_lead_magnet");
        $stmt->execute(['id_lead_magnet' => $id_lead_magnet]);
        $row = $stmt->rowCount();

        if ($row > 0) {
            $stmt = $connection->prepare("DELETE FROM lead_magnets WHERE id_lead_magnet = :id_lead_magnet");
            $stmt->execute(['id_lead_magnet' => $id_lead_magnet]);
            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        }
    }
}
