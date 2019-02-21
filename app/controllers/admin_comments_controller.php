<?php
    use entity\Comment;
    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/repository/CommentRepository.php');
    require ('app/models/entity/Comment.php');
    require ('app/models/entity/Author.php');

    AuthorRepository::login();

    $repComm = new CommentRepository();
    $getReportedComments = $repComm->getReportedComment();


//    $deleteComment       = Comments::deleteComment();
//    $getReportedComments = Comments::getReportedComments();
//    $validateComment     = Comments::validateComment();

    ob_start();
    include_once 'app/views/admin_comments_view.php';
    ob_end_flush();