<?php
    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-16
     * Time: 15:25
     */
     class ArticleEntity
     {
         private  $id;
         private  $title;
         private  $sentence;
         private  $content;
         private  $date;
         private  $author;
         private  $category;

         /**
          * @return mixed
          */
         public function getId()
         {
             return $this->id;
         }

         /**
          * @return mixed
          */
         public function getTitle()
         {
             return $this->title;
         }

         /**
          * @return mixed
          */
         public function getSentence()
         {
             return $this->sentence;
         }

         /**
          * @return mixed
          */
         public function getContent()
         {
             return $this->content;
         }

         /**
          * @return mixed
          */
         public function getDate()
         {
             return $this->date;
         }

         /**
          * @return mixed
          */
         public function getAuthor()
         {
             return $this->author;
         }

         /**
          * @return mixed
          */
         public function getCategory()
         {
             return $this->category;
         }

     }