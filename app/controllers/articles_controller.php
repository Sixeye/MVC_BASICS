<?php

    //use entity\Article;
    use entity\Comment;

    require('app/models/repository/ArticleRepository.php');
    require('app/models/repository/CommentRepository.php');


    $articleChap  = new ArticlesRepository();
    $articles = $articleChap->getAllArticles();

    //$createComment    = Comments::createComment();
    //$reportedComments = Comments::reportedComments();

    if (isset($_POST['comment_post']) && !empty($_POST['comment_content']) && !empty($_POST['nom']))
    {
        $post_content = SecurityService::str_secur($_POST['comment_content']);
        $post_nom = SecurityService::str_secur($_POST['nom']);
        $post_articleId = $_POST['comment_post'];
        $date = (now);
        $approved = 1;

        $Comment = new Comment();
        $Comment->setContent($post_content);
        $Comment->setNom($post_nom);
        $Comment->setArticleId($post_articleId);
        $Comment->setDate($date);
        $Comment->setApproved($approved);

        $createComment = new CommentRepository();
        $commentCreate = $createComment->createComment();
    }

    if(isset($_POST['signaler'])){
        $signal = $_POST['signaler'];
        $commentRep = new CommentRepository();
        $repComment = $commentRep->reportedComments($signal);
    }

    //$getComments      = [];

    //foreach($allArticles as $article)
    //{
    //    $getComments[$article['id']] = Comments::showComments($article['id']);
    //}


    ob_start();
    include_once 'app/views/articles_view.php';
    ob_end_flush();