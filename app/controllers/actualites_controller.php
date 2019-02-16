<?php

    include_once 'app/models/Db.php';

    include_once 'app/models/Actualites.php';

    $allActualites = Actualites::getAllActualites();

    ob_start();
    include_once 'app/views/actualites_view.php';
    ob_end_flush();