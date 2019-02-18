<?php

    use entity\Article;

    require('app/models/repository/ArticleRepository.php');

    $articleRep  = new ArticlesRepository();
    $articles = $articleRep->getAllArticles();
    //$createComment    = Comments::createComment();
    //$reportedComments = Comments::reportedComments();

    $getComments      = [];

    //foreach($allArticles as $article)
    //{
    //    $getComments[$article['id']] = Comments::getComments($article['id']);
    //}

    ob_start();
    include_once 'app/views/articles_view.php';
    ob_end_flush();