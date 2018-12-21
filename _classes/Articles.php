<?php

class Articles{
    
    public $id;
    public $title;
    public $sentence;
    public $content;
    public $date;
    public $author;
    public $category;


/**
* Articles constructor.
* @param $id
*/

    function __construct($id){
        global $db;

        $id = str_secur($id);

        $reqArticle = $db->prepare('
            SELECT a.*, au.firstname, au.lastname, c.name AS category
            FROM articles a
            INNER JOIN authors au ON au.id = a.author_id
            INNER JOIN categories c ON c.id = a.category_id
            WHERE a.id = ?
            ');
        $reqArticle->execute([$id]);
        $data = $reqArticle->fetch();

        $this->id = $id;
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->sentence = $data['date'];
        $this->date = $data['date'];
        $this->author = $data['firstname'] . ' ' . $data['lastname'];
        $this->category = $data['category'];

    }

/**
* Sends all articles.
* @return array
*/

  static function getAllArticles() {

        global $db;

        $reqArticles = $db->prepare('
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
* Sends two last articles.
* @return array
*/

    static function getLastArticles() {

        global $db;

        $reqArticles = $db->prepare('
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
* Creates a new article thanks to the admin section.
* @return datas to the DB
*/

    
    static function createArticles() {
        global $db;

        if (isset($_POST['create_post'])){
            
            $post_title = str_secur($_POST['title']);
            $post_sentence = str_secur($_POST['sentence']);
            $post_content = str_secur($_POST['content']);
            $post_author_id = str_secur($_POST['author_id']);
            $post_category_id = str_secur($_POST['category_id']);
            $date = (now);

            $reqArticles = $db->prepare('INSERT INTO articles(title, sentence, content, date, author_id, category_id) VALUES(?, ?, ?, ?, ?, ?)');
            
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
    
    static function deleteArticles(){
        global $db;
        if (isset($_POST['delete'])){
        $id = ($_POST['delete']);
            $reqArticles = "
            DELETE FROM articles WHERE id= $id LIMIT 1
            ";
        $db->query($reqArticles);
        header("Location: admin_posts");
        }
    }
}

?>
