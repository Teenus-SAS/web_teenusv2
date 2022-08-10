<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class UploadImageDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    public function upload()
    {
        $targetDir = dirname(dirname(dirname(__DIR__))) . '/assets/images/CKEditor/';
        $allowTypes = array('jpg', 'jpeg', 'png');

        $image_name = $_FILES['upload']['name'];
        $tmp_name   = $_FILES['upload']['tmp_name'];
        $size       = $_FILES['upload']['size'];
        $type       = $_FILES['upload']['type'];
        $error      = $_FILES['upload']['error'];

        /* Verifica si directorio esta creado y lo crea */
        if (!is_dir($targetDir))
            mkdir($targetDir, 0777, true);

        $targetDir = '/api/src/assets/images/CKEditor/';
        $targetFilePath = $targetDir . '/' . $image_name;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array($fileType, $allowTypes)) {
            $targetDir = dirname(dirname(dirname(__DIR__))) . '/assets/images/CKEditor/';
            $targetFilePath = $targetDir . '/' . $image_name;

            move_uploaded_file($tmp_name, $targetFilePath);

            return $targetFilePath;
        }
    }
}
