<?php
include_once 'app/models/admin_nupdate_model.php';

$verify_session   = Session::verify_session();
$allActualites    = Actualites::getAllActualites();
$fillActualites   = Actualites::fillActualites();
$updateActualites = Actualites::updateActualites();

include_once 'app/views/admin_nupdate_view.php';