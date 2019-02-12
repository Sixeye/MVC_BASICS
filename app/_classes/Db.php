<?php

$host   = DATABASE_HOST;
$dbname = DATABASE_NAME;
$user   = DATABASE_USER; 
$pass   = DATABASE_PASSWORD;

class Db
{
    /**
     * DB connexion with PDO
     */
    public static function connexion()
    {
        try {
            $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo ('Une erreur est survenue ! ' . $e->getMessage());
        }
    }
};

$db = Db::connexion();
echo ('here');
debug($db);

