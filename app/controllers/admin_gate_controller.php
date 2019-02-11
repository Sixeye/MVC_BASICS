<?php
include_once 'app/models/admin_gate_model.php';

$verify_session_gate = Session::verify_session_gate();
$verify_author       = Authors::verify_author();

include_once 'app/views/admin_gate_view.php';