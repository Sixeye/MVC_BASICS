<?php

    namespace entity;

    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-24
     * Time: 14:19
     */
    abstract class AbstractEntity
    {
        public function __construct($data = [])
        {
            if (!empty($data)) // If data are declared, hydrate the object.
            {
                $this->hydrate($data);
            }
        }

        // Hydrate
        public function hydrate(array $data)
        {
            foreach ($data as $key => $value)
            {
                $method = 'set'.ucfirst($key);

                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }

    }