<?php
    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-16
     * Time: 15:17
     */

     include_once ('app/models/Database.php');
     use entity\Article;

     class ArticleRepository
     {
        private $conn;
        public $id;

        /**
         * ArticlesRepository constructor.
         */
         public function __construct()
         {
            $this->conn = Database::getConnection();
         }

        /**
         * Sends two last articles.
         * @return array
         */
         public function getLastArticles()
         {
            $reqArticles = $this->conn->prepare('
                    SELECT a.*, au.firstname, au.lastname, c.name AS category
                    FROM articles a 
                    INNER JOIN authors au ON au.id = a.author_id
                    INNER JOIN categories c ON c.id = a.category_id
                    ORDER BY id DESC
                    LIMIT 2
                ');
            $reqArticles->execute([]);
            return $reqArticles->fetchAll();
         }

        /**
         * Sends all articles.
         * @return array
         */
         public function getAllArticles()
         {
            $reqArticles = $this->conn->prepare('
                SELECT a.*, au.firstname, au.lastname, c.name AS category
                FROM articles a 
                INNER JOIN authors au ON au.id = a.author_id
                INNER JOIN categories c ON c.id = a.category_id
                ORDER BY id DESC
            ');
            $reqArticles->execute([]);
            return $reqArticles->fetchAll();
         }


        /**
         * Creates a new article thanks to the admin posts section.
         * @return datas to the DB
         */
         public function createArticles()
         {
            if (isset($_POST['create_post'])){

                $post_title = str_secur($_POST['title']);
                $post_sentence = str_secur($_POST['sentence']);
                $post_content = $_POST['content'];
                $post_author_id = str_secur($_POST['author_id']);
                $post_category_id = str_secur($_POST['category_id']);
                $date = (now);

                $reqArticles = $this->conn->prepare('INSERT INTO articles(title, sentence, content, date, author_id, category_id) VALUES(?, ?, ?, ?, ?, ?)');

                $reqArticles->bindParam('1', $post_title);
                $reqArticles->bindParam('2', $post_sentence);
                $reqArticles->bindParam('3', $post_content);
                $reqArticles->bindParam('4', (date('Y-m-d H:i:s')));
                $reqArticles->bindParam('5', $post_author_id);
                $reqArticles->bindParam('6', $post_category_id);

                $reqArticles->execute();
                header("Location: admin_posts");
            }
         }

        /**
         * Deletes an article thanks to the admin posts section.
         * @return datas to the DB
         */
         public function deleteArticles()
         {
            if (isset($_POST['delete'])){
                $id = ($_POST['delete']);
                $reqArticles = "
                DELETE FROM articles WHERE id= $id LIMIT 1
                ";
                $this->conn->query($reqArticles);
                header("Location: admin_posts");
            }
         }

        /**
         * Fill an article in update page thanks to the ID in admin posts section.
         * @return datas to the DB
         */
         public function fillArticles()
         {
            global $updateId;
            global $updateTitle;
            global $updateSentence;
            global $updateContent;
            global $updateAuthor;
            global $updateCategory;

            if (isset($_POST['update'])){
                $id = (int)($_POST['update']);
                $reqArticles = $this->conn->prepare("SELECT * FROM articles WHERE id = $id");
                $reqArticles->execute();
                $article_update = $reqArticles->fetch(PDO::FETCH_ASSOC);
                $updateId = $article_update['id'];
                $updateTitle = $article_update['title'];
                $updateSentence = $article_update['sentence'];
                $updateContent = $article_update['content'];
                $updateAuthor = $article_update['author_id'];
                $updateCategory = $article_update['category_id'];
            }
         }

        /**
         * Updates an article thanks to an ID. Go back to the posts page.
         * @return datas to the DB
         */
         public function updateArticles()
         {
            if (isset($_POST['updated_post'])){

                $updated_id = (int)(SecurityService::str_secur($_POST['u_id']));
                $updated_title = SecurityService::str_secur($_POST['u_title']);
                $updated_sentence = SecurityService::str_secur($_POST['u_sentence']);
                $updated_content = $_POST['u_content'];
                $updated_author_id = SecurityService::str_secur($_POST['u_author_id']);
                $updated_category_id = SecurityService::str_secur($_POST['u_category_id']);
                $date = (now);

                $udArticles = $this->conn->prepare('UPDATE articles set title = ?, sentence = ?, content = ?, date = ?, author_id = ?, category_id = ? WHERE id = ?');

                $udArticles->bindValue('1', $updated_title, PDO::PARAM_STR);
                $udArticles->bindValue('2', $updated_sentence, PDO::PARAM_STR);
                $udArticles->bindValue('3', $updated_content, PDO::PARAM_STR);
                $udArticles->bindValue('4', (date('Y-m-d H:i:s')));
                $udArticles->bindValue('5', $updated_author_id, PDO::PARAM_INT);
                $udArticles->bindValue('6', $updated_category_id, PDO::PARAM_INT);
                $udArticles->bindValue('7', $updated_id, PDO::PARAM_INT);

                $udArticles->execute();
                header("Location: admin_posts");
            }
         }
     }