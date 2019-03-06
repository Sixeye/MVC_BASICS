<?php

    require_once ('app/models/entity/Actualite.php');
    require_once ('app/models/repository/ActualiteRepository.php');

    $actualiteAll  = new ActualiteRepository();
    $allActualites = $actualiteAll->getAllActualites();

    ob_start();
    include_once 'app/views/actualites_view.php';
    ob_end_flush();