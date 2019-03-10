<?php

    use entity\Message;

    require_once ('app/models/entity/Message.php');
    require_once ('app/models/repository/MessageRepository.php');

    if (isset($_POST['btnContact']) && ($_POST['nom']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message']))
    {
        $post_nom       = SecurityService::str_secur($_POST['nom']);
        $post_email     = SecurityService::str_secur($_POST['email']);
        $post_telephone = SecurityService::str_secur($_POST['phone']);
        $post_content   = SecurityService::str_secur($_POST['message']);
        $date           = new \DateTime();
        $date           = $date->format('Y-m-d H:i:s');

        $messageCreated = new Message();
        $messageCreated->setNom($post_nom);
        $messageCreated->setEmail($post_email);
        $messageCreated->setPhone($post_telephone);
        $messageCreated->setMessage($post_content);
        $messageCreated->setDate($date);

        $createMessage = new MessageRepository();
        $messageCreate = $createMessage->createMessage($messageCreated);

        $messagesent = '- message envoyé par: ' . $post_nom . ' dont le mail est ' . $post_email . ' et le téléphone est ' . $post_telephone . ' ' . 'Voici son message: ' . $post_content;

            // send an e-mail
                    mail('veejayseye@gmail.com', 'Message reçu sur le blog de Jean Forteroche', $messagesent);

                    echo $post_nom . ', nous vous remercions pour votre message.';

    } else {
        $error = "Veuillez remplir tous les champs.";
    }

    ob_start();
    include_once 'app/views/contact_view.php';
    ob_end_flush();