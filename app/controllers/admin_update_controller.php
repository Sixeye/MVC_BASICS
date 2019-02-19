<?php
    use entity\Author;
    use entity\Article;

    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/repository/ArticleRepository.php');
    require ('app/models/entity/Article.php');
    require ('app/models/entity/Author.php');


//    $allArticles      = Articles::getAllArticles();
//    $fillArticles     = Articles::fillArticles();
//    $updateArticles   = Articles::updateArticles();

    AuthorRepository::login();

    ob_start();
    include_once 'app/views/admin_update_view.php';
    ob_end_flush();