<?php

$verify_session   = Session::verify_session();
$allActualites    = Actualites::getAllActualites();
$fillActualites   = Actualites::fillActualites();
$updateActualites = Actualites::updateActualites();

?>
