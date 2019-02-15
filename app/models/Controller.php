<?php
/*
*Base controller
*One can load the concerned model and view
*/

    class Controller{
        //model loading
        public function model($page){
            //Require the asked model page
            require_once '../app/models/' . $page . '_model.php';
        }
    }