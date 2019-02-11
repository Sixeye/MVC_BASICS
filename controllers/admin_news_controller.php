<?php

include_once 'models/admin_news_model.php';

$verify_session   = Session::verify_session();
$allActualites    = Actualites::getAllActualites();
$createActualites = Actualites::createActualites();
$deleteActualites = Actualites::deleteActualites();

include_once 'views/admin_news_view.php';