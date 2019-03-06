<?php

// --------------------------- //
//       ERRORS DISPLAY        //
// --------------------------- //

//!\\ A enlever lors du déploiement
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', true);


// --------------------------- //
//          SESSIONS           //
// --------------------------- //

ini_set('session.cookie_lifetime', false);
session_start();


// --------------------------- //
//         CONSTANTS           //
// --------------------------- //

// Paths
define("PATH_REQUIRE", substr($_SERVER['SCRIPT_FILENAME'], 0, -9)); // For functions, -9 for taking out index.php
define("PATH", substr($_SERVER['PHP_SELF'], 0, -9)); // For every files, -9 for taking out index.php

// Website informations
define("WEBSITE_TITLE", "BLOG ROMAN BILLET POUR L ALASKA");
define("WEBSITE_NAME", "ROMAN ALASKA FORTEROCHE");
define("WEBSITE_URL", "https://wwww.srinath-pro.com/MVC_BASICS");
define("WEBSITE_DESCRIPTION", "Description du site");
define("WEBSITE_KEYWORDS", "");
define("WEBSITE_LANGUAGE", "FRANCAIS");
define("WEBSITE_AUTHOR", "");
define("WEBSITE_AUTHOR_MAIL", "");

// Facebook Open Graph tags
define("WEBSITE_FACEBOOK_NAME", "");
define("WEBSITE_FACEBOOK_DESCRIPTION", "");
define("WEBSITE_FACEBOOK_URL", "");
define("WEBSITE_FACEBOOK_IMAGE", "");

// DataBase informations
define("DATABASE_HOST", "localhost");
define("DATABASE_NAME", "test");
define("DATABASE_USER", "root");
define("DATABASE_PASSWORD", "root");
