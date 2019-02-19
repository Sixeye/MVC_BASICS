<?php
    use entity\Author;
    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/entity/Author.php');
//    include_once 'app/models/Messages.php';

//    $verify_session = Session::verify_session();
//    $getAllMessages = Messages::getAllMessages();
//    $deleteMessage  = Messages::deleteMessage();

    AuthorRepository::login();

    ob_start();
    include_once 'app/views/admin_message_view.php';
    ob_end_flush();