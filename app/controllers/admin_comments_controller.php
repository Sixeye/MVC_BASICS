<?php
    use entity\Author;
    require ('app/models/repository/AuthorRepository.php');
    require ('app/models/entity/Author.php');

//    include_once 'app/models/Comments.php';

//    $deleteComment       = Comments::deleteComment();
//    $getReportedComments = Comments::getReportedComments();
//    $validateComment     = Comments::validateComment();

    AuthorRepository::login();

    ob_start();
    include_once 'app/views/admin_comments_view.php';
    ob_end_flush();