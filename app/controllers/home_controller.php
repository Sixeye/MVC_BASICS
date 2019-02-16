<?php

    include_once 'app/models/Db.php';
    include_once 'app/models/Articles.php';

    $allArticles = Articles::getLastArticles();

    ob_start();
    include_once 'app/views/home_view.php';
    ob_end_flush();