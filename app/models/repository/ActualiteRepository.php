<?php
     /**
      * Created by PhpStorm.
      * User: srinathchristophersamarasinghe
      * Date: 2019-02-19
      * Time: 08:46
      */

    use entity\Actualite;

    require_once ('AbstractRepository.php');


    class ActualiteRepository extends AbstractRepository
    {
        /**
         * Sends all Actualites.
         * returns an array
         */
         public function getAllActualites()
         {
             $reqActualites = $this->conn->prepare('
              SELECT a.*, au.firstname, au.lastname, c.name AS category
              FROM actualites a 
              INNER JOIN authors au ON au.id = a.author_id
              INNER JOIN categories c ON c.id = a.category_id
              ORDER BY id DESC
            ');
             $reqActualites->execute([]);
             return $reqActualites->fetchAll();
         }

         /**
          * Creates a news thanks to the admin news section added inputs.
          * return datas to the DB
          */
         public function createActualite(Actualite $actualiteCreated)
         {
                 $reqActualite = $this->conn->prepare('INSERT INTO actualites(title, sentence, content, date, author_id, category_id) VALUES(:post_title, :post_sentence, :post_content, :date, :post_author_id, :post_category_id)');

                 $reqActualite->bindParam(':post_title', $actualiteCreated->getTitle(), PDO::PARAM_STR);
                 $reqActualite->bindParam(':post_sentence', $actualiteCreated->getSentence(), PDO::PARAM_STR);
                 $reqActualite->bindParam(':post_content', $actualiteCreated->getContent(), PDO::PARAM_STR);
                 $reqActualite->bindParam(':date', $actualiteCreated->getDate());
                 $reqActualite->bindParam(':post_author_id', $actualiteCreated->getAuthor(), PDO::PARAM_INT);
                 $reqActualite->bindParam(':post_category_id', $actualiteCreated->getCategory(), PDO::PARAM_INT);

                 $reqActualite->execute();
                 header("Location: admin_news");
         }

         /**
          * Deletes a news thanks to the admin news section delete button.
          * retrieves datas from the DB
          */
         public function deleteActualite($post_id)
         {
             $reqActualite = $this->conn->prepare('DELETE FROM actualites WHERE id = :post_id');
             $reqActualite->bindValue(':post_id', $post_id, PDO::PARAM_INT);
             $reqActualite->execute();

             header("Location: admin_news");
         }

         /**
          * Fill an news in update page thanks to the ID in admin news section.
          * return datas from the DB
          */
         public function getActualite(Actualite $idUp)
         {
                 $reqActualite = $this->conn->prepare("SELECT * FROM actualites WHERE id = :idUp");
                 $reqActualite->bindParam(':idUp', $idUp->getId(), PDO::PARAM_INT);
                 $reqActualite->execute();

                 $actualiteFill = $reqActualite->fetch();
                 return $actualiteFill;
         }

         /**
          * Updates an news thanks to an ID. Getting back to the admin posts page when done.
          * return datas to the DB
          */
         public function updateActualite(Actualite $nupdateActualite)
         {
                 $udActualite = $this->conn->prepare('UPDATE actualites set title = :title, sentence = :sentence, content = :content, date = :date, author_id = :author, category_id = :category WHERE id = :id');

                 $udActualite->bindValue(':title', $nupdateActualite->getTitle(), PDO::PARAM_STR);
                 $udActualite->bindValue(':sentence', $nupdateActualite->getSentence(), PDO::PARAM_STR);
                 $udActualite->bindValue(':content', $nupdateActualite->getContent(), PDO::PARAM_STR);
                 $udActualite->bindValue(':date', $nupdateActualite->getDate());
                 $udActualite->bindValue(':author', $nupdateActualite->getAuthor(), PDO::PARAM_INT);
                 $udActualite->bindValue('category', $nupdateActualite->getCategory(), PDO::PARAM_INT);
                 $udActualite->bindValue(':id', $nupdateActualite->getId(), PDO::PARAM_INT);

                 $udActualite->execute();
                 header("Location: admin_news");
         }
     }