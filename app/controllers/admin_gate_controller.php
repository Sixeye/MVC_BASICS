<?php

    include_once 'app/models/Database.php';
    include_once 'app/models/Session.php';
    include_once 'app/models/Authors.php';

    $verify_session_gate = Session::verify_session_gate();
    $verify_author       = Authors::verify_author();

    ob_start();
    include_once 'app/views/admin_gate_view.php';
    ob_end_flush();