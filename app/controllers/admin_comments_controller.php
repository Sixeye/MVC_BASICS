<?php

    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/repository/CommentRepository.php');
    require ('app/models/entity/Comment.php');
    require ('app/models/entity/Author.php');

    AuthorRepository::login();

    $repComm = new CommentRepository();
    $getReportedComments = $repComm->getReportedComment();

    if (isset($_POST['commentDelete']))
    {
        $id = ($_POST['commentDelete']);

        $delComm = new CommentRepository();
        $commDel = $delComm->deleteComment($id);
    }

    if (isset($_POST['commentValidate']))
    {
        $id = ($_POST['commentValidate']);

        $valComm = new CommentRepository();
        $commVal = $valComm->validateComment($id);
    }

    ob_start();
    include_once 'app/views/admin_comments_view.php';
    ob_end_flush();