<?php

class Messages
{

    /**
     * Creates a new message in the contact page.
     * @sends data to the DB
     */


    static function createMessages(){

        global $db;

        if (isset($_POST['btnContact'])) {

            $post_nom = str_secur($_POST['nom']);
            $post_email = str_secur($_POST['email']);
            $post_telephone = $_POST['phone'];
            $post_content = str_secur($_POST['message']);
            $date = (now);

            $reqMessages = $db->prepare('INSERT INTO messages(nom, email, telephone, content, date) VALUES(?, ?, ?, ?, ?)');

            $reqMessages->bindParam('1', $post_nom);
            $reqMessages->bindParam('2', $post_email);
            $reqMessages->bindParam('3', $post_telephone);
            $reqMessages->bindParam('4', $post_content);
            $reqMessages->bindParam('5', (date('Y-m-d H:i:s')));

            $reqMessages->execute();
        }
    }

    /**
     * Creates a new message in the contact page and sends an email to the author. 
     * @sends data to the DB
     */

    static function msg_to_user(){

        if (!empty($_POST) && isset($_POST['btnContact'])) {
            if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
                $nom = str_secur($_POST['nom']);
                $email = str_secur($_POST['email']);
                $phone = str_secur($_POST['phone']);
                $message = str_secur($_POST['message']);

                $messagesent = '- message envoyé par: ' . $nom . ' dont le mail est ' . $email . ' et le téléphone est ' . $phone . '\n' . 'Voici son message: ' . $message; 
                
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

    static function getAllMessages(){

        global $db;

        $reqMessages = $db->prepare('SELECT * FROM messages ORDER BY id DESC');
        $reqMessages->execute([]);
        return $reqMessages->fetchAll();
    }

    /**
     * Deletes a message in the admin message section.
     * @deletes data to the DB
     */

    static function deleteMessage(){

        global $db;
        if (isset($_POST['messageDelete'])) {
            $id = ($_POST['delete']);
            $reqMessage = " DELETE FROM messages WHERE id = $id LIMIT 1";
            $db->query($reqMessage);
            header("Location: admin_message");
        }
    }
}

