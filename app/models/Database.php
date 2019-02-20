<?php

    /**
    *Class DataBase
    *#Database connexion
    */
    class Database
    {
        private static $conn;

        /**
         * DB connexion with PDO
         */
         public static function getConnection()
         {
            $parameters = [
                'host'   => DATABASE_HOST,
                'dbname' => DATABASE_NAME,
                'user'   => DATABASE_USER,
                'pass'   => DATABASE_PASSWORD
            ];

            if(self::$conn === null)

            try {
                $conn = new PDO('mysql:host=' . $parameters['host'] . ';dbname=' . $parameters['dbname'] . ';charset=utf8', $parameters['user'], $parameters['pass']);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch (PDOException $e)
            {
                $error = $e->getMessage();
                echo ('Une erreur est survenue ! ' . $error);
            }
         }
    }