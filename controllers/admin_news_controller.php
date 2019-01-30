<?php

$verify_session   = Session::verify_session();
$allActualites    = Actualites::getAllActualites();
$createActualites = Actualites::createActualites();
$deleteActualites = Actualites::deleteActualites();
