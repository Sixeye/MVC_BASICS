<?php
// Current page definition
if (isset($_GET['page']) AND !empty($_GET['page'])){
    $page = trim(strtolower($_GET['page']));
} else {
    $page ='home';
}

// Array with all pages
$allPages = scandir('controllers/');

if (in_array($page.'_controller.php', $allPages)) {

    // Include the page
    include_once 'models/'.$page.'_model.php';
    include_once 'controllers/'.$page.'_controller.php';
    include_once 'views/'.$page.'_view.php';
    } else 
    {
    echo "Erreur 404";
    }

?>