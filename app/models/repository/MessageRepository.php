<?php

    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-24
     * Time: 10:53
     */

    use entity\Message;

    require ('AbstractRepository.php');


    class MessageRepository extends AbstractRepository
    {
        public function createMessage(Message $messageCreated)
        {
            $reqMessage = $this->conn->prepare('INSERT INTO messages(nom, email, telephone, content, date) VALUES( :post_nom, :post_email, :post_telephone, :post_content, :post_date)');

            $reqMessage->bindParam(':post_nom', $messageCreated->getNom());
            $reqMessage->bindParam(':post_email', $messageCreated->getEmail());
            $reqMessage->bindParam(':post_telephone', $messageCreated->getPhone());
            $reqMessage->bindParam(':post_content', $messageCreated->getMessage());
            $reqMessage->bindParam(':post_date', $messageCreated->getDate());

            $reqMessage->execute();
        }

        /**
         * Shows messages in the admin message section.
         * retrieves data from the DB
         */
        public function getAllMessages()
        {
            $reqMessages = $this->conn->prepare('SELECT * FROM messages ORDER BY id DESC');
            $reqMessages->execute([]);
            return $reqMessages->fetchAll();
        }

        /**
         * Deletes a message in the admin message section.
         * deletes data from the DB
         */
        public function deleteMessage($post_id)
        {
            $reqMessage = $this->conn->prepare('DELETE FROM messages WHERE id = :post_id LIMIT 1');
            $reqMessage->bindValue(':post_id', $post_id, PDO::PARAM_INT);
            $reqMessage->execute();
            header("Location: admin_message");
        }
    }
