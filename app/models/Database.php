<?php

    /**
    *Class DataBase
    *#Database connexion
    */
    class Database
    {
        private static $db;

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

            if(self::$db === null)

            try {
                $db = new PDO('mysql:host=' . $parameters['host'] . ';dbname=' . $parameters['dbname'] . ';charset=utf8', $parameters['user'], $parameters['pass']);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
            } catch (PDOException $e)
            {
                $error = $e->getMessage();
                echo ('Une erreur est survenue ! ' . $error);
            }
         }
    }
