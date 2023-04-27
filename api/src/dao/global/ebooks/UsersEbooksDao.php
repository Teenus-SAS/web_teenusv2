<?php

namespace tezlik_web\dao;

use tezlik_web\Constants\Constants;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class UsersEbooksDao
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . 'querys.log', 20, Logger::DEBUG));
    }

    public function findAllUsers()
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM users_ebooks");
        $stmt->execute();

        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $users = $stmt->fetchAll($connection::FETCH_ASSOC);
        $this->logger->notice("users", array('users' => $users));
        return $users;
    }

    public function findUser($email)
    {
        $connection = Connection::getInstance()->getConnection();

        $stmt = $connection->prepare("SELECT * FROM users_ebooks WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));

        $user = $stmt->fetch($connection::FETCH_ASSOC);
        $this->logger->notice("user", array('user' => $user));
        return $user;
    }

    public function addUser($dataUser, $pass)
    {
        $connection = Connection::getInstance()->getConnection();

        try {
            $stmt = $connection->prepare("INSERT INTO users_ebooks (user, email, password, sector, employees) 
                                          VALUES (:user, :email, :password, :sector, :employees)");
            $stmt->execute([
                'user' => $dataUser['nameUser'],
                'email' => $dataUser['email'],
                'password' => $pass,
                'sector' => $dataUser['sector'],
                'employees' => $dataUser['numEmployees']
            ]);

            $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = array('info' => true, 'message' => $message);
            return $error;
        }
    }
}
