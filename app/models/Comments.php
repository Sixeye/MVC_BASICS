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
            $db = Database::getInstance();
            $conn = $db->getConnection();

            if (isset($_POST['comment_post']) && !empty($_POST['comment_content']) && !empty($_POST['nom'])) {

                $post_content   = Utility::str_secur($_POST['comment_content']);
                $post_nom       = Utility::str_secur($_POST['nom']);
                $post_articleId = $_POST['comment_post'];
                $date           = (now);
                $approved       = 1;

                $reqComments = $conn->prepare('INSERT INTO commentaires(content, nom, article_id, date, approved) VALUES(?, ?, ?, ?, ?)');

                $reqComments->bindParam('1', $post_content);
                $reqComments->bindParam('2', $post_nom);
                $reqComments->bindParam('3', $post_articleId);
                $reqComments->bindParam('4', (date('Y-m-d H:i:s')));
                $reqComments->bindParam('5', $approved);

                $reqComments->execute();
                echo $post_nom . ', nous vous remercions pour votre commentaire.';

                $conn = null;
            }
        }

        /**
         * Shows  comments in the article page.
         * @return datas to the DB
         */

        static function getComments($actual_id)
        {

            $db = Database::getInstance();
            $conn = $db->getConnection();

            if (!empty($actual_id)){
            $reqComments = $conn->prepare('SELECT * FROM commentaires WHERE article_id = :actual_id ORDER BY id DESC');
            $reqComments->execute([':actual_id' => $actual_id]);
            return $reqComments->fetchAll();

            $conn = null;
            }
        }

        /**
         * Sends all reported comments.
         * @return array
         */

        static function reportedComments()
        {

            $db = Database::getInstance();
            $conn = $db->getConnection();
            if(isset($_POST['signaler'])){
            $signal = $_POST['signaler'];
            $reqComments = $conn->prepare('UPDATE commentaires SET approved = 0 WHERE id = ?');
            $reqComments->bindParam('1', $signal);
            $reqComments->execute();
            echo 'Le commentaire a été signalé. Nous vous remercions.';
            }
        }

        /**
         * Shows all reported comments.
         * @return array
         */

        static function getReportedComments()
        {
            $db = Database::getInstance();
            $conn = $db->getConnection();

            $reqComments = $conn->prepare('SELECT * FROM commentaires WHERE approved = 0 ORDER BY id DESC');
            $reqComments->execute([]);
            return $reqComments->fetchAll();

            $conn = null;
        }


        /**
         * Deletes a reported comment in the admin section.
         * @return datas to the DB
         */

        static function deleteComment()
        {
            $db = Database::getInstance();
            $conn = $db->getConnection();

            if (isset($_POST['commentDelete'])) {
                $id = ($_POST['commentDelete']);
                $reqComment = "
                DELETE FROM commentaires WHERE id= $id LIMIT 1
                ";
                $conn->query($reqComment);
                header("Location: admin_comments");
                echo 'Le commentaire a été supprimé.';

                $conn = null;
            }
        }

        /**
         * Validate a reported comment, status from false to true (0 to 1).
         * @return array
         */

        static function validateComment()
        {
            $db = Database::getInstance();
            $conn = $db->getConnection();

            if (isset($_POST['commentValidate'])) {
                $id = ($_POST['commentValidate']);
                $reqComment = "
                UPDATE commentaires SET approved = 1 WHERE id= $id LIMIT 1
                ";
                $conn->query($reqComment);
                header("Location: admin_comments");
                echo 'Le commentaire a été validé.';

                $conn = null;
            }
        }
    }

