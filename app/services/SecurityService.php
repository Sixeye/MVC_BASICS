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

        static function str_secur($string)
        {
            return trim(htmlspecialchars($string));
        }
     }