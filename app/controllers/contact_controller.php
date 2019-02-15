<?php

    include_once  'app/models/Db.php';
    include_once 'app/models/Messages.php';

    $msg_to_user    = Messages::msg_to_user();
    $createMessages = Messages::createMessages();

    include_once 'app/views/contact_view.phtml';
