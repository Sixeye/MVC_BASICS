<?php

    include_once 'app/models/Db.php';

    include_once 'app/models/Actualites.php';

    $allActualites = Actualites::getAllActualites();

    include_once 'app/views/actualites_view.php';