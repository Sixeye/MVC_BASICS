<?php
    include_once 'models/logout_model.php';

    $logout = Session::logout();

    include_once 'views/logout_view.php';
