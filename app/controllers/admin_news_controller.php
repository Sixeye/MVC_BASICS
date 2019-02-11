<?php

include_once 'app/models/admin_news_model.php';

$verify_session   = Session::verify_session();
$allActualites    = Actualites::getAllActualites();
$createActualites = Actualites::createActualites();
$deleteActualites = Actualites::deleteActualites();

include_once 'app/views/admin_news_view.php';