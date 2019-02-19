<?php

    use entity\Comment;

    class CommentRepository
    {
        private $conn;

        /**
         * Db connection
         */
        public function __construct()
        {
            $this->conn = Database::getConnection();
        }


        public function createComment(Comment $Comment)
        {
                $reqComments = $this->conn->prepare('INSERT INTO commentaires(content, nom, article_id, date, approved) VALUES(:post_content, :post_nom, :post_articleId, :date, :approved)');

                $reqComments->bindValue(':post_content', $Comment->getContent(), PDO::PARAM_STR);
                $reqComments->bindValue(':post_nom', $Comment->getNom(), PDO::PARAM_STR);
                $reqComments->bindValue(':post_articleId', $Comment->getArticleId(), PDO::PARAM_INT);
                $reqComments->bindValue(':date', $Comment->getDate());
                $reqComments->bindValue(':approved', $Comment->getApproved(), PDO::PARAM_INT);
                $reqComments->execute();
        }

        /**
         * Shows  comments in the article page.
         * @return datas from the DB
         */
        public function showComments($actual_id)
        {
            if (!empty($actual_id))
            {
            $reqComments = $this->conn->prepare('SELECT * FROM commentaires WHERE article_id = :actual_id ORDER BY id DESC');
            $reqComments->execute([':actual_id' => $actual_id]);
            return $reqComments->fetchAll();
            }
        }

        /**
         * Sends all reported comments.
         * @return array
         */
        public function reportedComments($signal)
        {
            $reqComments = $this->conn->prepare('UPDATE commentaires SET approved = 0 WHERE id = ?');
            $reqComments->bindParam('1', $signal);
            $reqComments->execute();
            echo 'Le commentaire a été signalé. Nous vous remercions.';
        }


        /**
         * Shows all reported comments.
         * @return array
         */
        public function getReportedComments()
        {
            $reqComments = $this->conn->prepare('SELECT * FROM commentaires WHERE approved = 0 ORDER BY id DESC');
            $reqComments->execute([]);
            return $reqComments->fetchAll();
        }


        /**
         * Deletes a reported comment in the admin section.
         * @return datas to the DB
         */
        public function deleteComment()
        {
            if (isset($_POST['commentDelete'])) {
                $id = ($_POST['commentDelete']);
                $reqComment = "
                DELETE FROM commentaires WHERE id= $id LIMIT 1
                ";
                $this->conn->query($reqComment);
                header("Location: admin_comments");
                echo 'Le commentaire a été supprimé.';
            }
        }

        /**
         * Validate a reported comment, status from false to true (0 to 1).
         * @return array
         */
        public function validateComment()
        {
            if (isset($_POST['commentValidate'])) {
                $id = ($_POST['commentValidate']);
                $reqComment = "
                UPDATE commentaires SET approved = 1 WHERE id= $id LIMIT 1
                ";
                $this->conn->query($reqComment);
                header("Location: admin_comments");
                echo 'Le commentaire a été validé.';
            }
        }
    }
