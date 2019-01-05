<?php

$verify_session   = Session::verify_session();
$allArticles      = Articles::getAllArticles();
$createArticles   = Articles::createArticles();
$deleteArticles   = Articles::deleteArticles();

?>
