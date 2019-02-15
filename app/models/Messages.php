<?php

    class Messages
    {

        /**
         * Creates a new message in the contact page.
         * @sends data to the DB
         */


        static function createMessages()
        {

            $db = Database::getInstance();
            $conn = $db->getConnection();

            if (isset($_POST['btnContact']))
            {

                $post_nom       = Utility::str_secur($_POST['nom']);
                $post_email     = Utility::str_secur($_POST['email']);
                $post_telephone = $_POST['phone'];
                $post_content   = Utility::str_secur($_POST['message']);
                $date           = (now);

                $reqMessages = $conn->prepare('INSERT INTO messages(nom, email, telephone, content, date) VALUES(?, ?, ?, ?, ?)');

                $reqMessages->bindParam('1', $post_nom);
                $reqMessages->bindParam('2', $post_email);
                $reqMessages->bindParam('3', $post_telephone);
                $reqMessages->bindParam('4', $post_content);
                $reqMessages->bindParam('5', (date('Y-m-d H:i:s')));

                $reqMessages->execute();
            }

            $conn = null;
        }

        /**
         * Creates a new message in the contact page and sends an email to the author.
         * @sends data to the DB
         */

        static function msg_to_user()
        {

            if (!empty($_POST) && isset($_POST['btnContact']))
            {
                if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
                    $nom     = Utility::str_secur($_POST['nom']);
                    $email   = Utility::str_secur($_POST['email']);
                    $phone   = Utility::str_secur($_POST['phone']);
                    $message = Utility::str_secur($_POST['message']);

                    $messagesent = '- message envoyé par: ' . $nom . ' dont le mail est ' . $email . ' et le téléphone est ' . $phone . ' ' . 'Voici son message: ' . $message;

            // send an e-mail
                    mail('veejayseye@gmail.com', 'Message reçu sur le blog de Jean Forteroche', $messagesent);

                    echo $nom . ', nous vous remercions pour votre message.';

                } else {
                    $error = "Veuillez remplir tous les champs.";
                }
            } else {
                $error = "Une erreur s'est produite. Réessayez.";
            }
        }

        /**
         * Sends all messages.
         * @return array
         */

        static function getAllMessages()
        {
            $db = Database::getInstance();
            $conn = $db->getConnection();

            $reqMessages = $conn->prepare('SELECT * FROM messages ORDER BY id DESC');
            $reqMessages->execute([]);
            return $reqMessages->fetchAll();

            $conn = null;
        }

        /**
         * Deletes a message in the admin message section.
         * @deletes data to the DB
         */

        static function deleteMessage()
        {
            $db = Database::getInstance();
            $conn = $db->getConnection();

            if (isset($_POST['messageDelete'])) {
                $id = ($_POST['delete']);
                $reqMessage = " DELETE FROM messages WHERE id = $id LIMIT 1";
                $conn->query($reqMessage);
                header("Location: admin_message");
            }

            $conn = null;
        }
    }