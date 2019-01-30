<?php

$verify_session      = Session::verify_session();
$deleteComment       = Comments::deleteComment();
$getReportedComments = Comments::getReportedComments();
$validateComment     = Comments::validateComment();