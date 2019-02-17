<?php

    //include_once 'app/models/Articles.php';
    //require('app/models/Article.php');
    require('app/models/ArticleRepository.php');
    //require ('app/models/Database.php');

    ob_start();

    //$conn = Database::getConnection();

    $articleRep = new ArticlesRepository();
    $allArticles = $articleRep->getLastArticles();

    include_once 'app/views/home_view.php';
    ob_end_flush();