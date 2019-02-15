<?php

    include_once 'app/models/Session.php';

    $logout = Session::logout();

    include_once 'app/views/logout_view.php';
