<?php

include_once 'models/admin_posts_model.php';

$verify_session   = Session::verify_session();
$allArticles      = Articles::getAllArticles();
$createArticles   = Articles::createArticles();
$deleteArticles   = Articles::deleteArticles();

include_once 'views/admin_posts_view.php';