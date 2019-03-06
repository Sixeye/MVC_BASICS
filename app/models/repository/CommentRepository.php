<?php

    use entity\Comment;

    require_once ('AbstractRepository.php');

    class CommentRepository extends AbstractRepository
    {
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
         * Shows a specific comment in the update page.
         * return datas from the DB
         */
        public function showComment($actual_id)
        {
            if (!empty($actual_id))
            {
            $reqComments = $this->conn->prepare('SELECT * FROM commentaires WHERE article_id = :actual_id ORDER BY id DESC');
            $reqComments->execute([':actual_id' => $actual_id]);
            return $reqComments->fetchAll();
            }
        }

        /**
         * Sends a reported comment based.
         * changes a boolean value in the DB
         */
        public function reportedComments($signal)
        {
            $reqComments = $this->conn->prepare('UPDATE commentaires SET approved = 0 WHERE id = ?');
            $reqComments->bindParam('1', $signal);
            $reqComments->execute();
            echo 'Le commentaire a été signalé. Nous vous remercions.';
        }


        /**
         * Shows all reported comments, boolean value 0 or null.
         * returns an array
         */
        public function getReportedComment()
        {
            $reqComment = $this->conn->prepare('SELECT * FROM commentaires WHERE approved = 0 ORDER BY id DESC');
            $reqComment->execute([]);
            return $reqComment->fetchAll();
        }


        /**
         * Deletes a reported comment in the admin section.
         * erases datas from the DB
         */
        public function deleteComment($id)
        {
            $reqComment = $this->conn->prepare('DELETE FROM commentaires WHERE id= :id LIMIT 1');
            $reqComment->bindValue(':id', $id, PDO::PARAM_INT);
            $reqComment->execute();
            header("Location: admin_comments");
        }

        /**
         * Validates a reported comment, status from false to true (0 to 1).
         * changes a boolean value in the DB
         */
        public function validateComment($id)
        {
            $reqComment = $this->conn->prepare('UPDATE commentaires SET approved = 1 WHERE id= :id LIMIT 1');
            $reqComment->bindValue(':id', $id, PDO::PARAM_INT);
            $reqComment->execute();

            header("Location: admin_comments");
        }
    }

