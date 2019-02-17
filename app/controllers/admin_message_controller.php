<?php

    include_once 'app/models/Database.php';
    include_once 'app/models/Session.php';
    include_once 'app/models/Messages.php';

    $verify_session = Session::verify_session();
    $getAllMessages = Messages::getAllMessages();
    $deleteMessage  = Messages::deleteMessage();

    ob_start();
    include_once 'app/views/admin_message_view.php';
    ob_end_flush();