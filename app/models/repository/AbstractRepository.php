<?php

    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-24
     * Time: 14:21
     */

    require ('app/models/Database.php');

    abstract class AbstractRepository
    {
        protected $conn;

        public function __construct()
        {
            $this->conn = Database::getConnection();
        }
    }

