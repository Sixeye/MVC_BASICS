<?php
include_once 'models/admin_nupdate_model.php';

$verify_session   = Session::verify_session();
$allActualites    = Actualites::getAllActualites();
$fillActualites   = Actualites::fillActualites();
$updateActualites = Actualites::updateActualites();

include_once 'views/admin_nupdate_view.php';