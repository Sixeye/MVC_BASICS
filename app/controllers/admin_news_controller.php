<?php
    use entity\Actualite;
    require ('app/models/repository/ActualiteRepository.php');
    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/entity/Actualite.php');
    require ('app/models/entity/Author.php');

    AuthorRepository::login();

    $actualiteAll  = new ActualiteRepository();
    $allActualites = $actualiteAll->getAllActualites();

    if (isset($_POST['create_news']))
    {
        $post_title = SecurityService::str_secur($_POST['ntitle']);
        $post_sentence = SecurityService::str_secur($_POST['nsentence']);
        $post_content = $_POST['content'];
        $post_author_id = SecurityService::str_secur($_POST['nauthor_id']);
        $post_category_id = SecurityService::str_secur($_POST['ncategory_id']);
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $actualiteCreated = new Actualite();
        $actualiteCreated->setTitle($post_title);
        $actualiteCreated->setSentence($post_sentence);
        $actualiteCreated->setContent($post_content);
        $actualiteCreated->setDate($date);
        $actualiteCreated->setAuthor($post_author_id);
        $actualiteCreated->setCategory($post_category_id);

        $createActualite = new ActualiteRepository();
        $actualiteCreate = $createActualite->createActualite($actualiteCreated);

    }

    if (isset($_POST['n_delete']))
    {
        $post_id = $_POST['n_delete'];

        $deleteActualite = new ActualiteRepository();
        $actualiteDelete = $deleteActualite->deleteActualite($post_id);
    }

    //    $deleteActualites = Actualites::deleteActualites();


    ob_start();
    include_once 'app/views/admin_news_view.php';
    ob_end_flush();