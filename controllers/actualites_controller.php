<?php
include_once 'models/actualites_model.php';

$allActualites = Actualites::getAllActualites();

include_once 'views/actualites_view.php';