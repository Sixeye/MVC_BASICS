<?php

include_once 'models/admin_message_model.php';

$verify_session = Session::verify_session();
$getAllMessages = Messages::getAllMessages();
$deleteMessage  = Messages::deleteMessage();

include_once 'views/admin_message_view.php';