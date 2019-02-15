<?php

    include_once 'app/models/Db.php';
    include_once 'app/models/Session.php';
    include_once 'app/models/Messages.php';

    $verify_session = Session::verify_session();
    $getAllMessages = Messages::getAllMessages();
    $deleteMessage  = Messages::deleteMessage();

    include_once 'app/views/admin_message_view.php';