<?php

    /**
     * 2 functions str_secur secures string in input
     * debug is a clear var_dump
     */

    class Utility
    {
    /**
     * Allows to secure strings
     * @param $string
     * @return string
     */

        function str_secur($string)
        {
            return trim(htmlspecialchars($string));
        }

        /**
         * Many var debug made easier to read
         * @param $var
         */
        function debug($var)
        {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
            die();
        }
     }