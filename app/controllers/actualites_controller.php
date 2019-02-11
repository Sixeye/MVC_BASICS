<?php
include_once 'app/models/actualites_model.php';

$allActualites = Actualites::getAllActualites();

include_once 'app/views/actualites_view.php';