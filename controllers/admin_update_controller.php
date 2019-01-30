<?php

$verify_session   = Session::verify_session();
$allArticles      = Articles::getAllArticles();
$fillArticles     = Articles::fillArticles();
$updateArticles   = Articles::updateArticles();