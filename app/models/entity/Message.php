<?php
    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-24
     * Time: 10:15
     */

     namespace entity;

     class message
     {
        protected $nom;
        protected $email;
        protected $phone;
        protected $message;
        protected $date;
        protected $id;

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

         /**
          * @return mixed
          */
         public function getNom()
         {
             return $this->nom;
         }

         /**
          * @param mixed $nom
          */
         public function setNom($nom): void
         {
             $this->nom = $nom;
         }

         /**
          * @return mixed
          */
         public function getEmail()
         {
             return $this->email;
         }

         /**
          * @param mixed $email
          */
         public function setEmail($email): void
         {
             $this->email = $email;
         }

         /**
          * @return mixed
          */
         public function getPhone()
         {
             return $this->phone;
         }

         /**
          * @param mixed $phone
          */
         public function setPhone($phone): void
         {
             $this->phone = $phone;
         }

         /**
          * @return mixed
          */
         public function getMessage()
         {
             return $this->message;
         }

         /**
          * @param mixed $message
          */
         public function setMessage($message): void
         {
             $this->message = $message;
         }

         /**
          * @return mixed
          */
         public function getDate()
         {
             return $this->date;
         }

         /**
          * @param mixed $date
          */
         public function setDate($date): void
         {
             $this->date = $date;
         }

         /**
          * @return mixed
          */
         public function getId()
         {
             return $this->id;
         }

         /**
          * @param mixed $id
          */
         public function setId($id): void
         {
             $this->id = $id;
         }

     }