<?php

    use entity\Message;

    require ('app/models/entity/Message.php');
    require ('app/models/entity/Author.php');
    require ('app/models/repository/MessageRepository.php');
    require ('app/models/repository/AuthorRepository.php');

    AuthorRepository::login();

    $showMessages = new MessageRepository();
    $allMessages  = $showMessages->getAllMessages();

    if (isset($_POST['messageDelete']))
    {
        $post_id = ($_POST['delete']);

        $deleteMessage = new MessageRepository();
        $mesageDelete = $deleteMessage->deleteMessage($post_id);
    }

    ob_start();
    include_once 'app/views/admin_message_view.php';
    ob_end_flush();