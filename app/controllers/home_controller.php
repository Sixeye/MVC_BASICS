<?php

    require('app/models/repository/ArticleRepository.php');

    $articleLast = new ArticleRepository();
    $allArticles = $articleLast->getLastArticles();

    ob_start();
    include_once 'app/views/home_view.php';
    ob_end_flush();