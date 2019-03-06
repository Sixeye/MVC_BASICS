<?php

    use entity\Article;

    require_once ('app/models/repository/ArticleRepository.php');
    require_once ('app/models/repository/AuthorRepository.php');
    require_once ('app/models/entity/Article.php');
    require_once ('app/models/entity/Author.php');

    AuthorRepository::login();

    if (isset($_POST['update']))
    {
        $idUp = (int)($_POST['update']);
        $articleToUpdate = new Article();
        $articleToUpdate->setId($idUp);

        $fillArt = new ArticleRepository();
        $articleFill = $fillArt->fillArticle($articleToUpdate);
    }

    if (isset($_POST['updated_post']))
    {
        $updated_id = (int)(SecurityService::str_secur($_POST['u_id']));
        $updated_title = SecurityService::str_secur($_POST['u_title']);
        $updated_sentence = SecurityService::str_secur($_POST['u_sentence']);
        $updated_content = $_POST['u_content'];
        $updated_author_id = SecurityService::str_secur($_POST['u_author_id']);
        $updated_category_id = SecurityService::str_secur($_POST['u_category_id']);
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $updatedArticle = new Article();
        $updatedArticle->setId($updated_id);
        $updatedArticle->setTitle($updated_title);
        $updatedArticle->setSentence($updated_sentence);
        $updatedArticle->setContent($updated_content);
        $updatedArticle->setAuthor($updated_author_id);
        $updatedArticle->setDate($date);

        $updArt = new ArticleRepository();
        $artUpd = $updArt->updateArticle($updatedArticle);
    }

    ob_start();
    include_once 'app/views/admin_update_view.php';
    ob_end_flush();