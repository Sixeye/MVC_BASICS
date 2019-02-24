<?php
    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-16
     * Time: 15:17
     */

    use entity\Article;

    require ('AbstractRepository.php');

    class ArticleRepository extends AbstractRepository
    {
        /**
         * Sends two last articles.
         * return an array of the two last articles
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
         * return an array from the DB
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
         * return datas to the DB
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
         * retrieve datas from the DB
         */
         public function deleteArticle($post_id)
         {
                $reqArticle = $this->conn->prepare('DELETE FROM articles WHERE id = :post_id');
                $reqArticle->bindValue(':post_id', $post_id, PDO::PARAM_INT);
                $reqArticle->execute();

                $comRequest = $this->conn->prepare('DELETE FROM commentaires WHERE article_id = :post_id');
                $comRequest->bindValue(':post_id', $post_id, PDO::PARAM_INT);
                $comRequest->execute();

                header("Location: admin_posts");
         }

        /**
         * Fill an article in update page thanks to the ID in admin posts section.
         * return datas from the DB
         */
         public function fillArticle(Article $idUp)
         {
                $reqArticle = $this->conn->prepare("SELECT * FROM articles WHERE id = :idUp");
                $reqArticle->bindParam(':idUp', $idUp->getId(), PDO::PARAM_INT);
                $reqArticle->execute();

                $articleFill = $reqArticle->fetch();
                return $articleFill;
         }


        /**
         * Updates an article thanks to an ID. Go back to the posts page.
         * return datas to the DB
         */
         public function updateArticle(Article $updatedArticle)
         {
                $udArticles = $this->conn->prepare('UPDATE articles set title = :title, sentence = :sentence, content = :content, date = :date, author_id = :author_id WHERE id = :id');

                $udArticles->bindValue(':title', $updatedArticle->getTitle(), PDO::PARAM_STR);
                $udArticles->bindValue(':sentence', $updatedArticle->getSentence(), PDO::PARAM_STR);
                $udArticles->bindValue(':content', $updatedArticle->getContent(), PDO::PARAM_STR);
                $udArticles->bindValue(':date', $updatedArticle->getDate());
                $udArticles->bindValue(':author_id', $updatedArticle->getAuthor(), PDO::PARAM_INT);
                $udArticles->bindValue(':id', $updatedArticle->getId(), PDO::PARAM_INT);

                $udArticles->execute();
                header("Location: admin_posts");
         }
     }