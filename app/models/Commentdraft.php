<?php

//class Comments
{

    public $content;
    public $date;
    public $nom;
    public $article_id;

    /**
     * Creates a new comment in the article page.
     * @return datas to the DB
     */


    public static function createComment(){

        global $db;

        if (isset($_POST['comment_post']) && !empty($_POST['comment_content']) && !empty($_POST['nom'])) {

            $post_content = str_secur($_POST['comment_content']);
            $post_nom = str_secur($_POST['nom']);
            $post_articleId = $_POST['comment_post'];
            $date = (now);
            $approved = 1;

            $reqComments = $db->prepare('INSERT INTO commentaires(content, nom, article_id, date, approved) VALUES(?, ?, ?, ?, ?)');

            $reqComments->bindParam('1', $post_content);
            $reqComments->bindParam('2', $post_nom);
            $reqComments->bindParam('3', $post_articleId);
            $reqComments->bindParam('4', (date('Y-m-d H:i:s')));
            $reqComments->bindParam('5', $approved);

            $reqComments->execute();
            echo $post_nom . ', nous vous remercions pour votre commentaire.';
        }
    }

    /**
     * Shows  comments in the article page.
     * @return datas to the DB
     */

    static function getComments($actual_id){

        global $db;
        if (!empty($actual_id)){
            $reqComments = $db->prepare('SELECT * FROM commentaires WHERE article_id = :actual_id ORDER BY id DESC');
            $reqComments->execute([':actual_id' => $actual_id]);
            return $reqComments->fetchAll();
        }
    }

    /**
     * Sends all reported comments.
     * @return array
     */

    static function reportedComments(){

        global $db;
        if(isset($_POST['signaler'])){
            $signal = $_POST['signaler'];
            $reqComments = $db->prepare('UPDATE commentaires SET approved = 0 WHERE id = ?');
            $reqComments->bindParam('1', $signal);
            $reqComments->execute();
            echo 'Le commentaire a été signalé. Nous vous remercions.';
        }
    }

    /**
     * Shows all reported comments.
     * @return array
     */

    static function getReportedComments(){

        global $db;

        $reqComments = $db->prepare('SELECT * FROM commentaires WHERE approved = 0 ORDER BY id DESC');
        $reqComments->execute([]);
        return $reqComments->fetchAll();

    }


    /**
     * Deletes a reported comment in the admin section.
     * @return datas to the DB
     */

    static function deleteComment(){
        global $db;
        if (isset($_POST['commentDelete'])) {
            $id = ($_POST['commentDelete']);
            $reqComment = "
            DELETE FROM commentaires WHERE id= $id LIMIT 1
            ";
            $db->query($reqComment);
            header("Location: admin_comments");
            echo 'Le commentaire a été supprimé.';
        }
    }

    /**
     * Validate a reported comment, status from false to true (0 to 1).
     * @return array
     */

    static function validateComment(){
        global $db;
        if (isset($_POST['commentValidate'])) {
            $id = ($_POST['commentValidate']);
            $reqComment = "
            UPDATE commentaires SET approved = 1 WHERE id= $id LIMIT 1
            ";
            $db->query($reqComment);
            header("Location: admin_comments");
            echo 'Le commentaire a été validé.';
        }
    }
}

