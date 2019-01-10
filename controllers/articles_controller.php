<?php

$allArticles    = Articles::getAllArticles();
$createComment  = Comments::createComment();
$getComments = [];
foreach ($allArticles as $article) {
    $getComments[$article['id']] = Comments::getComments($article['id']);
}


?>