<?php

     namespace entity;

    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-24
     * Time: 10:15
     */

     require_once ('app/models/entity/AbstractEntity.php');

     class message extends AbstractEntity
     {
        protected $nom;
        protected $email;
        protected $phone;
        protected $message;
        protected $date;
        protected $id;

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
         public function setNom($nom)
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
         public function setEmail($email)
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
         public function setPhone($phone)
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
         public function setMessage($message)
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
         public function setDate($date)
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
         public function setId($id)
         {
             $this->id = $id;
         }

     }