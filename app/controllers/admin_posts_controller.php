<?php

    use entity\Author;
    use entity\Article;

    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/repository/ArticleRepository.php');
    require ('app/models/entity/Article.php');
    require ('app/models/entity/Author.php');

//$checkSession = new AuthorRepository();
    //$sessionCheck = $checkSession->verify_session();

    $showArticle = new ArticleRepository();
    $allArticles = $showArticle->getAllArticles();
////////////////////////////////////////LOGINSERVICE
    if (isset($_SESSION['id']) && isset($_SESSION['secret']))
    {
        $id     = $_SESSION['id'];
        $secret = $_SESSION['secret'];

        $Author = new Author();
        $Author->setId($id);
        $Author->setSecret($secret);
        $checkAuthor = new AuthorRepository();
        $Author = $checkAuthor->verify_session($Author);
    } elseif(!isset($_SESSION['id']) && !isset($_SESSION['secret'])) {
        header('Location: admin_gate');
    }
////////////////////////////////////////
    //include_once 'app/models/Database.php';
    //include_once 'app/models/Session.php';
    //include_once 'app/models/Articles.php';

   // $verify_session   = Session::verify_session();
    //$allArticles      = Articles::getAllArticles();
    //$createArticles   = Articles::createArticles();
    //$deleteArticles   = Articles::deleteArticles();

    ob_start();
    include_once 'app/views/admin_posts_view.php';
    ob_end_flush();