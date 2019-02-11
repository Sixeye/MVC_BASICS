<?php
    include_once 'app/models/logout_model.php';

    $logout = Session::logout();

    include_once 'app/views/logout_view.php';
