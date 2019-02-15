<?php
/**
 * Class Db
 * Database connexion
 */

    class Database
    {
        private $host   = DATABASE_HOST;
        private $dbname = DATABASE_NAME;
        private $user   = DATABASE_USER;
        private $pass   = DATABASE_PASSWORD;

        private $conn;
        private $error;
        private static $_instance;

        /**
        *Get an instance of the Database
        *@return Instance
        */
        public static function getInstance()
        {
            if(!self::$_instance)
            {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * DB connexion with PDO
         */
        private function __construct()
        {
            $options = [PDO::ATTR_ERRMODE => true,
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->user, $this->pass, $options);
                return $this->conn;
            } catch (PDOException $e)
            {
                $this->error = $e->getMessage();
                echo ('Une erreur est survenue ! ' . $this->error);
            }
        }

        // Magic method clone is empty to prevent duplication of connection
        private function __clone()
        {

        }

        // Get the connection
        public function getConnection()
        {
            return $this->conn;
        }
    }

