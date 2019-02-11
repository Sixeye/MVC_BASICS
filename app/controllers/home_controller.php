<?php
include_once 'app/models/home_model.php';

$allArticles = Articles::getLastArticles();

include_once 'app/views/home_view.php';