<?php

    require ('app/_services/LogoutService.php');

    LogoutService::logout();

    ob_start();
    include_once 'app/views/admin_gate_view.php';
    ob_end_flush();