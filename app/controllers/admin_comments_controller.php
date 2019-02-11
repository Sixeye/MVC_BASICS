<?php

include_once 'app/models/admin_comments_model.php';

$verify_session      = Session::verify_session();
$deleteComment       = Comments::deleteComment();
$getReportedComments = Comments::getReportedComments();
$validateComment     = Comments::validateComment();

include_once 'app/views/admin_comments_view.php';