<?php
    require ('_config/config.php');
    require ('services/SecurityService.php');
    // Current page definition
    if (isset($_GET['page']) and !empty($_GET['page']))
    {
        $page = rtrim(strtolower($_GET['page']));
    } else {
        $page = 'home';
    }

    //Array with all pages
    $allPages = scandir('app/controllers/');

    // One verifies if the page exists
    if (in_array($page . '_controller.php', $allPages))
    {
        // Includes the asked page
        include_once 'app/controllers/' . $page . '_controller.php';
    } else {
        // One shows the 404 page
        include_once('controllers/nothing_controller.php');
    }














    ////////////////////////////////// OLD ROUTER

    // Current page definition
    //if (isset($_GET['page']) and !empty($_GET['page']))
    //    {
    //        $page = rtrim(strtolower($_GET['page']));
    //    } else {
    //        $page = 'home';
    //    }

    // Array with all pages
    //$allPages = scandir('app/controllers/');

    // One verifies if the page exists
    //if (in_array($page . '_controller.php', $allPages))
    //    {
    //        // Includes the asked page
    //        include_once 'app/controllers/' . $page . '_controller.php';
    //    } else {
    //        // One shows the 404 page
    //        include_once('app/controllers/404_controller.php');
    //    }
