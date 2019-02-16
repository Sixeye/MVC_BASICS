<?php
    include_once 'app/models/Db.php';
    include_once 'app/models/Session.php';
    include_once 'app/models/Articles.php';

    $verify_session   = Session::verify_session();
    $allArticles      = Articles::getAllArticles();
    $createArticles   = Articles::createArticles();
    $deleteArticles   = Articles::deleteArticles();

    ob_start();
    include_once 'app/views/admin_posts_view.php';
    ob_end_flush();