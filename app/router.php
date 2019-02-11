<?php
// Load Config
require_once 'app/_config/config.php';
// Include basic functions
include_once 'app/_functions/functions.php';

// Autoload Classes, to do when models are correct with their own classes.
// spl_autoload_register(function ($className) {
//     require_once '_classes/' . $className . '.php';
// });

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
        echo "Erreur 404";
    }
