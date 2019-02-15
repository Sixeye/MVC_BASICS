<?php
/**
 * Class Dbase
 * Databse connection
 */

    class Db
    {
        private $db;
        private $host   = "localhost";
        private $dbname = "test";
        private $user   = "root";
        private $pass   = "";

        /**
         * DB connexion with PDO
         */
        public function __construct()
        {
            try {
                $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->user, $this->pass);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $db;
            } catch (PDOException $e) {
                echo ('Une erreur est survenue ! ' . $e->getMessage());
            }
        }
    }
