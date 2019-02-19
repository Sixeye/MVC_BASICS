<?php
    use entity\Author;
    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/entity/Author.php');
//    include_once 'app/models/Actualites.php';

//    $allActualites    = Actualites::getAllActualites();
//    $fillActualites   = Actualites::fillActualites();
//    $updateActualites = Actualites::updateActualites();

    AuthorRepository::login();

    ob_start();
    include_once 'app/views/admin_nupdate_view.php';
    ob_end_flush();