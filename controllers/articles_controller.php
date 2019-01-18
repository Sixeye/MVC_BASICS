<?php

$allArticles      = Articles::getAllArticles();
$createComment    = Comments::createComment();
$reportedComments = Comments::reportedComments();

$getComments = [];
foreach ($allArticles as $article) {
    $getComments[$article['id']] = Comments::getComments($article['id']);
}


?>