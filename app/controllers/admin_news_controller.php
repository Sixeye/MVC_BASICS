<?php

    include_once 'app/models/Db.php';
    include_once 'app/models/Session.php';
    include_once 'app/models/Actualites.php';

    $verify_session   = Session::verify_session();
    $allActualites    = Actualites::getAllActualites();
    $createActualites = Actualites::createActualites();
    $deleteActualites = Actualites::deleteActualites();

    include_once 'app/views/admin_news_view.php';