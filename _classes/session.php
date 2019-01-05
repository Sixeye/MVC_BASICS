<?php
    class Session{

        static function verify_session(){
        if (isset($_SESSION['id']) && isset($_SESSION['secret'])){
            global $db;
            $id = $_SESSION['id'];
            $secret = $_SESSION['secret'];

            $reqAuthor = $db->prepare('SELECT * FROM authors WHERE id = ? AND secret = ?');
            $reqAuthor->execute([$id, $secret]);
            while ($author = $reqAuthor->fetch()){
                if ($id = $author['id'] && $secret = $author['secret']) {
                    echo ('Connecté');
                } else {
            header('Location: admin_gate');
        }
      }
    } else {
            header('Location: admin_gate');
            }   
    }

        static function verify_session_gate()
        {
            if (isset($_SESSION['id']) && isset($_SESSION['secret'])) {
                global $db;
                $id = $_SESSION['id'];
                $secret = $_SESSION['secret'];

                $reqAuthor = $db->prepare('SELECT * FROM authors WHERE id = ? AND secret = ?');
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
}
?>