<?php

    class Session{

    /**
     * Verification if a session is open and if it is conform in all pages but not in the gate.
     * @return datas from the DB and compares them
     */

        static function verify_session(){
        if (isset($_SESSION['id']) && isset($_SESSION['secret'])){

            $db = Database::getInstance();
            $conn = $db->getConnection();

            $id = $_SESSION['id'];
            $secret = $_SESSION['secret'];

            $reqAuthor = $conn->prepare('SELECT * FROM authors WHERE id = ? AND secret = ?');
            $reqAuthor->execute([$id, $secret]);
            while ($author = $reqAuthor->fetch()){
                if ($id = $author['id'] && $secret = $author['secret']) {

                } else {
            header('Location: admin_gate');
        }
      }
    } else {
            header('Location: admin_gate');
            }   
    }

    /**
     * Verification if a session is open and if it is conform, specific to the gate.
     * @return datas from the DB and compares them
     */

        static function verify_session_gate()
        {
            if (isset($_SESSION['id']) && isset($_SESSION['secret'])) {

                $db = Database::getInstance();
                $conn = $db->getConnection();

                $id = $_SESSION['id'];
                $secret = $_SESSION['secret'];

                $reqAuthor = $conn->prepare('SELECT * FROM authors WHERE id = ? AND secret = ?');
                $reqAuthor->execute([$id, $secret]);
                while ($author = $reqAuthor->fetch()) {
                    if ($id = $author['id'] && $secret = $author['secret']) {
                    header('Location: admin_posts');
                    } else {
                        echo ('');
                    }
                }
            } else {
                echo ('');
            }
        }

        static function logout()
        {
            session_destroy();
            session_commit();
            session_start();
            $_SESSION['id'] = null;
            $_SESSION['secret'] = null;
            $_SESSION = [];
            header('Location: admin_gate');
        }
        
}
