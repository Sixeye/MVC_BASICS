<?php

    require ('app/services/LogoutService.php');

    LogoutService::logout();

    //session_destroy();
    //session_commit();
    //session_start();
    //$_SESSION['id'] = null;
    //$_SESSION['secret'] = null;
    //$_SESSION = [];

    ob_start();
    include_once 'app/views/admin_gate_view.php';
    ob_end_flush();