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
         public function createArticles(Article $ArticleCreated)
         {
                $reqArticles = $this->conn->prepare('INSERT INTO articles(title, sentence, content, date, author_id, category_id) VALUES(:post_title, :post_sentence, :post_content, :date, :post_author_id, :post_category_id)');

                $reqArticles->bindValue(':post_title', $ArticleCreated->getTitle(), PDO::PARAM_STR);
                $reqArticles->bindValue(':post_sentence', $ArticleCreated->getSentence(), PDO::PARAM_STR);
                $reqArticles->bindValue(':post_content', $ArticleCreated->getContent(), PDO::PARAM_STR);
                $reqArticles->bindValue(':date', $ArticleCreated->getDate());
                $reqArticles->bindValue(':post_author_id', $ArticleCreated->getAuthor(), PDO::PARAM_INT);
                $reqArticles->bindValue(':post_category_id', $ArticleCreated->getCategory(), PDO::PARAM_INT);

                $reqArticles->execute();
                header("Location: admin_posts");
         }


        /**
         * Deletes an article thanks to the admin posts section.
         * @return datas to the DB
         */
         public function deleteArticles(Article $post_id)
         {
                $reqArticles = $this->conn->prepare('DELETE FROM articles WHERE id = :post_id LIMIT 1');
                $reqArticles->bindValue(':post_id', $post_id->getId(), PDO::PARAM_INT);

                $reqArticles->execute();
                header("Location: admin_posts");

                //////////////DELETE RELATED COMMENT ALSO
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