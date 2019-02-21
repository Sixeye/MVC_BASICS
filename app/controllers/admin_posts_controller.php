<?php

    use entity\Article;

    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/repository/ArticleRepository.php');
    require ('app/models/entity/Article.php');
    require ('app/models/entity/Author.php');

    AuthorRepository::login();

    $showArticle = new ArticleRepository();
    $allArticles = $showArticle->getAllArticles();

    if (isset($_POST['create_post']))
    {
        $post_title = SecurityService::str_secur($_POST['title']);
        $post_sentence = SecurityService::str_secur($_POST['sentence']);
        $post_content = ($_POST['content']);
        $post_author_id = SecurityService::str_secur($_POST['author_id']);
        $post_category_id = SecurityService::str_secur($_POST['category_id']);
        $date = new \DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $ArticleCreated = new Article();
        $ArticleCreated->setTitle($post_title);
        $ArticleCreated->setSentence($post_sentence);
        $ArticleCreated->setContent($post_content);
        $ArticleCreated->setAuthor($post_author_id);
        $ArticleCreated->setCategory($post_category_id);
        $ArticleCreated->setDate($date);

    $createArticle = new ArticleRepository();
    $articleCreate = $createArticle->createArticles($ArticleCreated);
    }

    if (isset($_POST['delete']))
    {
        $post_id = $_POST['delete'];;

        $deleteArticle = new ArticleRepository();
        $articleDelete = $deleteArticle->deleteArticle($post_id);
    }

    ob_start();
    include_once 'app/views/admin_posts_view.php';
    ob_end_flush();