<?php
     namespace entity;

     /**
      * Created by PhpStorm.
      * User: srinathchristophersamarasinghe
      * Date: 2019-02-18
      * Time: 11:02
      */
      class Comment
      {
          private $content;
          private $date;
          private $nom;
          private $article_id;
          private $approved;

          public function __construct($data = [])
          {
              if (!empty($data)) // If data were declared, hydrate the object.
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
          public function getArticleId()
          {
              return $this->article_id;
          }

          /**
           * @param mixed $article_id
           */
          public function setArticleId($article_id): void
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
          public function setApproved($approved): void
          {
              $this->approved = $approved;
          }
      }