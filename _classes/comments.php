<?php

class Comments
{

    public $content;
    public $date;
    public $nom;
    public $article_id;

    /**
     * Creates a new comment in the article page.
     * @return datas to the DB
     */


    public static function createComment()
    {
        global $db;

        if (isset($_POST['comment_post']) && !empty($_POST['comment_content']) && !empty($_POST['nom'])) {

            $post_content = str_secur($_POST['comment_content']);
            $post_nom = str_secur($_POST['nom']);
            $post_articleId = $_POST['comment_post'];            
            $date = (now);

            $reqComments = $db->prepare('INSERT INTO commentaires(content, nom, article_id, date) VALUES(?, ?, ?, ?)');

            $reqComments->bindParam('1', $post_content);
            $reqComments->bindParam('2', $post_nom);
            $reqComments->bindParam('3', $post_articleId);
            $reqComments->bindParam('4', (date('Y-m-d H:i:s')));

            $reqComments->execute();


        }

    }

    static function getComments($actual_id)
    {
        
        global $db;
        if (!empty($actual_id)){ 
        $reqComments = $db->prepare('SELECT * FROM commentaires WHERE article_id = :actual_id ORDER BY id DESC');
        $reqComments->execute([':actual_id' => $actual_id]);
        return $reqComments->fetchAll();
        
        }
        
    }




    /**
     * Sends all messages.
     * @return array
     */

    static function reportedComments()
    {

        global $db;

        $reqMessages = $db->prepare('SELECT * FROM messages ORDER BY id DESC');
        $reqMessages->execute([]);
        return $reqMessages->fetchAll();

    }

    /**
     * Deletes a message in the admin message section.
     * @return datas to the DB
     */

    static function deleteMessage()
    {
        global $db;
        if (isset($_POST['messageDelete'])) {
            $id = ($_POST['delete']);
            $reqMessage = " DELETE FROM messages WHERE id = $id LIMIT 1";
            $db->query($reqMessage);
            header("Location: admin_message");
        }
    }

}
?>
