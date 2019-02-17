<?php

    require ('app/models/Article.php');
    require ('app/models/ArticleRepository.php');
    require ('app/models/Database.php');

    $allArticles      = Articles::getAllArticles();
    $createComment    = Comments::createComment();
    $reportedComments = Comments::reportedComments();

    $getComments      = [];

    foreach($allArticles as $article)
    {
        $getComments[$article['id']] = Comments::getComments($article['id']);
    }

    ob_start();
    include_once 'app/views/articles_view.php';
    ob_end_flush();