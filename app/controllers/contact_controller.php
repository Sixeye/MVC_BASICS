<?php

include_once 'app/models/contact_model.php';

$msg_to_user    = Messages::msg_to_user();
$createMessages = Messages::createMessages();

include_once 'app/views/contact_view.php';
