<?php
    use entity\Author;
    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/entity/Author.php');
//    include_once 'app/models/Actualites.php';

//    $verify_session   = Session::verify_session();
//    $allActualites    = Actualites::getAllActualites();
//    $createActualites = Actualites::createActualites();
//    $deleteActualites = Actualites::deleteActualites();

    AuthorRepository::login();

    ob_start();
    include_once 'app/views/admin_news_view.php';
    ob_end_flush();