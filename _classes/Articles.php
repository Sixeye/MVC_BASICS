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

}

?>