<?php

include_once 'app/models/admin_message_model.php';

$verify_session = Session::verify_session();
$getAllMessages = Messages::getAllMessages();
$deleteMessage  = Messages::deleteMessage();

include_once 'app/views/admin_message_view.php';