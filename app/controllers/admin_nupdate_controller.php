<?php

    include_once 'app/models/Session.php';
    include_once 'app/models/Actualites.php';

    $verify_session   = Session::verify_session();
    $allActualites    = Actualites::getAllActualites();
    $fillActualites   = Actualites::fillActualites();
    $updateActualites = Actualites::updateActualites();

    include_once 'app/views/admin_nupdate_view.php';