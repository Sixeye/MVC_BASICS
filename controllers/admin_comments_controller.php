<?php

include_once 'models/admin_comments_model.php';

$verify_session      = Session::verify_session();
$deleteComment       = Comments::deleteComment();
$getReportedComments = Comments::getReportedComments();
$validateComment     = Comments::validateComment();

include_once 'views/admin_comments_view.php';