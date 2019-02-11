<?php

include_once 'models/admin_update_model.php';

$verify_session   = Session::verify_session();
$allArticles      = Articles::getAllArticles();
$fillArticles     = Articles::fillArticles();
$updateArticles   = Articles::updateArticles();

include_once 'views/admin_update_view.php';