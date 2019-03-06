<?php

    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-19
     * Time: 20:04
     */
     class LogoutService
     {
        static function logout()
        {
            session_destroy();
            session_commit();
            session_start();
            $_SESSION['id'] = null;
            $_SESSION['secret'] = null;
            $_SESSION = [];
        }
}