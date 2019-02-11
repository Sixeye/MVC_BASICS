<?php
include_once 'models/home_model.php';

$allArticles = Articles::getLastArticles();

include_once 'views/home_view.php';