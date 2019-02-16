<?php

    include_once 'app/models/Session.php';

    $logout = Session::logout();

    ob_start();
    include_once 'app/views/logout_view.php';
    ob_end_flush();