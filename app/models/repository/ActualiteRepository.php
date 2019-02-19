<?php
    require ('app/models/Database.php');
    use entity\Article;

    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-19
     * Time: 08:46
     */
     class ActualiteRepository
     {
         private $conn;

         public function __construct()
         {
             $this->conn = Database::getConnection();
         }

         /**
          * Sends all Actualites.
          * @return array
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
          * Creates a news thanks to the admin news section.
          * @return datas to the DB
          */
         public function createActualites()
         {
             if (isset($_POST['create_news']))
             {
                 $post_title       = SecurityService::str_secur($_POST['ntitle']);
                 $post_sentence    = SecurityService::str_secur($_POST['nsentence']);
                 $post_content     = SecurityService::$_POST['content'];
                 $post_author_id   = SecurityService::str_secur($_POST['nauthor_id']);
                 $post_category_id = SecurityService::str_secur($_POST['ncategory_id']);
                 $date = (now);

                 $reqActualites = $this->conn->prepare('INSERT INTO actualites(title, sentence, content, date, author_id, category_id) VALUES(?, ?, ?, ?, ?, ?)');

                 $reqActualites->bindParam('1', $post_title);
                 $reqActualites->bindParam('2', $post_sentence);
                 $reqActualites->bindParam('3', $post_content);
                 $reqActualites->bindParam('4', (date('Y-m-d H:i:s')));
                 $reqActualites->bindParam('5', $post_author_id);
                 $reqActualites->bindParam('6', $post_category_id);

                 $reqActualites->execute();
                 header("Location: admin_news");
             }
         }

         /**
          * Deletes a news thanks to the admin news section.
          * @return datas to the DB
          */
         public function deleteActualites()
         {
             if (isset($_POST['n_delete']))
             {
                 $id = ($_POST['n_delete']);
                 $reqActualites = "
                DELETE FROM actualites WHERE id= $id LIMIT 1
                ";
                 $this->conn->query($reqActualites);
                 header("Location: admin_news");
             }
         }

         /**
          * Fill an news in update page thanks to the ID in admin news section.
          * @return datas to the DB
          */
         public function fillActualites()
         {
             global $nupdateId;
             global $nupdateTitle;
             global $nupdateSentence;
             global $nupdateContent;
             global $nupdateAuthor;
             global $nupdateCategory;

             if (isset($_POST['nupdate']))
             {
                 $id = (int)($_POST['nupdate']);
                 $reqActualites = $this->conn->prepare("SELECT * FROM actualites WHERE id = $id");
                 $reqActualites->execute();
                 $actualite_update = $reqActualites->fetch(PDO::FETCH_ASSOC);
                 $nupdateId        = $actualite_update['id'];
                 $nupdateTitle     = $actualite_update['title'];
                 $nupdateSentence  = $actualite_update['sentence'];
                 $nupdateContent   = $actualite_update['content'];
                 $nupdateAuthor    = $actualite_update['author_id'];
                 $nupdateCategory  = $actualite_update['category_id'];
             }
         }

         /**
          * Updates an news thanks to an ID. Go back to the posts page.
          * @return datas to the DB
          */
         public function updateActualites()
         {
             if (isset($_POST['nUpdated_post']))
             {
                 $nupdated_id = (int)(SecurityService::str_secur($_POST['nu_id']));
                 $nupdated_title = SecurityService::str_secur($_POST['nu_title']);
                 $nupdated_sentence = SecurityService::str_secur($_POST['nu_sentence']);
                 $nupdated_content = $_POST['nu_content'];
                 $nupdated_author_id = (int)(SecurityService::str_secur($_POST['nu_author_id']));
                 $nupdated_category_id = (int)(SecurityService::str_secur($_POST['nu_category_id']));
                 $date = (now);

                 $udActualites = $this->conn->prepare('UPDATE actualites set title = ?, sentence = ?, content = ?, date = ?, author_id = ?, category_id = ? WHERE id = ?');

                 $udActualites->bindValue('1', $nupdated_title, PDO::PARAM_STR);
                 $udActualites->bindValue('2', $nupdated_sentence, PDO::PARAM_STR);
                 $udActualites->bindValue('3', $nupdated_content, PDO::PARAM_STR);
                 $udActualites->bindValue('4', (date('Y-m-d H:i:s')));
                 $udActualites->bindValue('5', $nupdated_author_id, PDO::PARAM_INT);
                 $udActualites->bindValue('6', $nupdated_category_id, PDO::PARAM_INT);
                 $udActualites->bindValue('7', $nupdated_id, PDO::PARAM_INT);

                 $udActualites->execute();
                 header("Location: admin_news");
             }
         }
     }