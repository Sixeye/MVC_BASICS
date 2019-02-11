<?php

include_once 'models/contact_model.php';

$msg_to_user    = Messages::msg_to_user();
$createMessages = Messages::createMessages();

include_once 'views/contact_view.php';
