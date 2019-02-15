<?php
    include_once 'app/models/Articles.php';

    $allArticles = Articles::getLastArticles();

    include_once 'app/views/home_view.php';