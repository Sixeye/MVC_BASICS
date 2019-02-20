<?php

    use entity\Comment;

    require_once('app/models/entity/Article.php');
    require_once('app/models/entity/Comment.php');
    require_once('app/models/repository/ArticleRepository.php');
    require_once('app/models/repository/CommentRepository.php');


    $articleChap  = new ArticleRepository();
    $articles = $articleChap->getAllArticles();


    if (isset($_POST['comment_post']) && !empty($_POST['comment_content']) && !empty($_POST['nom']))
    {
        $post_content = SecurityService::str_secur($_POST['comment_content']);
        $post_nom = SecurityService::str_secur($_POST['nom']);
        $post_articleId = $_POST['comment_post'];
        $date = new \DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $approved = 1;

        $Comment = new Comment();
        $Comment->setContent($post_content);
        $Comment->setNom($post_nom);
        $Comment->setArticleId($post_articleId);
        $Comment->setDate($date);
        $Comment->setApproved($approved);

        $createdComment = new CommentRepository();
        $commentCreate = $createdComment->createComment($Comment);
        echo $post_nom. ', nous vous remercions pour votre commentaire.';
    }

    if(isset($_POST['signaler']))
    {
        $signal = $_POST['signaler'];
        $commentRep = new CommentRepository();
        $repComment = $commentRep->reportedComments($signal);
    }

    foreach ($articles as $article)
    {
        $commentShow  = new CommentRepository();
        $showComment[$article['id']] = $commentShow->showComments($article['id']);
    }

    ob_start();
    include_once 'app/views/articles_view.php';
    ob_end_flush();