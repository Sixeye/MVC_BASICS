<?php

/*
*Reset Session id and session, Destroys the session
*
*/ 

function logout() {
    session_destroy();
    session_commit();
    session_start();
    $_SESSION['id'] = null;
    $_SESSION['secret'] = null;
    $_SESSION = [];
    };

logout();

header('Location: ../admin_gate');

?>