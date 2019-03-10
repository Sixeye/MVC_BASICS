<?php

     namespace entity;

    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-18
     * Time: 11:02
     */

     require_once ('app/models/entity/AbstractEntity.php');

     class Comment extends AbstractEntity
     {
         private $content;
         private $date;
         private $nom;
         private $article_id;
         private $approved;

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
          public function setContent($content)
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
          public function setDate($date)
          {
              $this->date = $date;
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
          public function setNom($nom)
          {
              $this->nom = $nom;
          }

          /**
           * @return mixed
           */
          public function getArticleId()
          {
              return $this->article_id;
          }

          /**
           * @param mixed $article_id
           */
          public function setArticleId($article_id)
          {
              $this->article_id = $article_id;
          }

          /**
           * @return mixed
           */
          public function getApproved()
          {
              return $this->approved;
          }

          /**
           * @param mixed $approved
           */
          public function setApproved($approved)
          {
              $this->approved = $approved;
          }
      }