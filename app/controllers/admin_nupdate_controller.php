<?php

    use entity\Actualite;

    require ('app/models/repository/ActualiteRepository.php');
    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/entity/Actualite.php');
    require ('app/models/entity/Author.php');

    AuthorRepository::login();

    if (isset($_POST['nupdate']))
    {
        $idUp = (int)($_POST['nupdate']);
        $actualiteToUpdate = new Actualite();
        $actualiteToUpdate->setId($idUp);

        $fillAct = new ActualiteRepository();
        $actualiteFill = $fillAct->fillActualite($actualiteToUpdate);
    }

    if (isset($_POST['nUpdated_post']))
    {
        $nupdated_id = (int)(SecurityService::str_secur($_POST['nu_id']));
        $nupdated_title = SecurityService::str_secur($_POST['nu_title']);
        $nupdated_sentence = SecurityService::str_secur($_POST['nu_sentence']);
        $nupdated_content = $_POST['nu_content'];
        $nupdated_author_id = (int)(SecurityService::str_secur($_POST['nu_author_id']));
        $nupdated_category_id = (int)(SecurityService::str_secur($_POST['nu_category_id']));
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $nupdatedArticle = new Actualite();
        $nupdatedArticle->setId($nupdated_id);
        $nupdatedArticle->setTitle($nupdated_title);
        $nupdatedArticle->setSentence($nupdated_sentence);
        $nupdatedArticle->setContent($nupdated_content);
        $nupdatedArticle->setAuthor($nupdated_author_id);
        $nupdatedArticle->setCategory($nupdated_category_id);

        $nupArt = new ActualiteRepository();
        $artNup = $nupArt->updateActualite($nupdatedArticle);
    }

    AuthorRepository::login();

    ob_start();
    include_once 'app/views/admin_nupdate_view.php';
    ob_end_flush();