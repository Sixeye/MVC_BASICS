<?php

    use entity\Author;
    use entity\Article;

    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/repository/ArticleRepository.php');
    require ('app/models/entity/Article.php');
    require ('app/models/entity/Author.php');

    $showArticle = new ArticleRepository();
    $allArticles = $showArticle->getAllArticles();

    AuthorRepository::login();

   // $verify_session   = Session::verify_session();
    //$allArticles      = Articles::getAllArticles();
    //$createArticles   = Articles::createArticles();
    //$deleteArticles   = Articles::deleteArticles();

    ob_start();
    include_once 'app/views/admin_posts_view.php';
    ob_end_flush();