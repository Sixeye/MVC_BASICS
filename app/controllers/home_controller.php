<?php

    require('app/models/repository/ArticleRepository.php');

    ob_start();

    $articleRep = new ArticlesRepository();
    $allArticles = $articleRep->getLastArticles();

    include_once 'app/views/home_view.php';

    ob_end_flush();