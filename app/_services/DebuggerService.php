<?php
   /**
    * Created by PhpStorm.
    * User: srinathchristophersamarasinghe
    * Date: 2019-02-16
    * Time: 14:29
    */
    class DebuggerService
    {
    /**
     * Many var debug made easier to read
     * @param $var
     */
        static function debug($var)
        {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
            die();
        }
     }