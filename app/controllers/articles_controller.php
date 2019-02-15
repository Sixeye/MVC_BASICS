<?php

include_once 'app/models/Db.php';

include_once 'app/models/Articles.php';

include_once 'app/models/Comments.php';

$allArticles      = Articles::getAllArticles();
$createComment    = Comments::createComment();
$reportedComments = Comments::reportedComments();

$getComments      = [];
foreach ($allArticles as $article) {
    $getComments[$article['id']] = Comments::getComments($article['id']);
}

include_once 'app/views/articles_view.php';