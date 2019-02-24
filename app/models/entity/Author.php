<?php

     /**
      * Created by PhpStorm.
      * User: srinathchristophersamarasinghe
      * Date: 2019-02-19
      * Time: 12:30
      */

     namespace entity;

     class Author
     {
         private  $firstname;
         private  $lastname;
         private  $mail;
         private  $pWord;
         private  $id;
         private  $secret;

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
         public function getFirstname()
         {
             return $this->firstname;
         }

         /**
          * @param mixed $firstname
          */
         public function setFirstname($firstname): void
         {
             $this->firstname = $firstname;
         }

         /**
          * @return mixed
          */
         public function getLastname()
         {
             return $this->lastname;
         }

         /**
          * @param mixed $lastname
          */
         public function setLastname($lastname): void
         {
             $this->lastname = $lastname;
         }

         /**
          * @return mixed
          */
         public function getMail()
         {
             return $this->mail;
         }

         /**
          * @param mixed $mail
          */
         public function setMail($mail): void
         {
             $this->mail = $mail;
         }

         /**
          * @return mixed
          */
         public function getPWord()
         {
             return $this->pWord;
         }

         /**
          * @param mixed $pWord
          */
         public function setPWord($pWord): void
         {
             $this->pWord = $pWord;
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

         /**
          * @return mixed
          */
         public function getSecret()
         {
             return $this->secret;
         }

         /**
          * @param mixed $secret
          */
         public function setSecret($secret): void
         {
             $this->secret = $secret;
         }
     }