<?php

     namespace entity;

     /**
      * Created by PhpStorm.
      * User: srinathchristophersamarasinghe
      * Date: 2019-02-19
      * Time: 08:30
      */

     class Actualite
     {
         private $id;
         private $title;
         private $sentence;
         private $content;
         private $date;
         private $author;
         private $category;

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
         public function getTitle()
         {
             return $this->title;
         }

         /**
          * @param mixed $title
          */
         public function setTitle($title): void
         {
             $this->title = $title;
         }

         /**
          * @return mixed
          */
         public function getSentence()
         {
             return $this->sentence;
         }

         /**
          * @param mixed $sentence
          */
         public function setSentence($sentence): void
         {
             $this->sentence = $sentence;
         }

         /**
          * @return mixed
          */
         public function getContent()
         {
             return $this->content;
         }

         /**
          * @param mixed $content
          */
         public function setContent($content): void
         {
             $this->content = $content;
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
         public function getAuthor()
         {
             return $this->author;
         }

         /**
          * @param mixed $author
          */
         public function setAuthor($author): void
         {
             $this->author = $author;
         }

         /**
          * @return mixed
          */
         public function getCategory()
         {
             return $this->category;
         }

         /**
          * @param mixed $category
          */
         public function setCategory($category): void
         {
             $this->category = $category;
         }

     }