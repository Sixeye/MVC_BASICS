<?php
    // Include basic functions
    include_once 'app/_classes/Functions.php';
    // Load Config
    include_once 'app/_config/config.php';

    // Current page definition
    if (isset($_GET['page']) and !empty($_GET['page']))
        {
            $page = rtrim(strtolower($_GET['page']));
        } else {
            $page = 'home';
        }

    // Array with all pages
    $allPages = scandir('app/controllers/');

    // Verifies if the page exists
    if (in_array($page . '_controller.php', $allPages))
        {
            // Includes the asked page
            include_once 'app/controllers/' . $page . '_controller.php';
        } else {
            include_once('app/controllers/404_controller.php');
        }
