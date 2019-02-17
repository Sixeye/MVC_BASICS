<?php

    /**
     * a function str_secur secures string in input
     */
    class SecurityService
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