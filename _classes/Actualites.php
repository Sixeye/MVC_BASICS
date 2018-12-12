<?php

class Actualites{
    
    public $id;
    public $title;
    public $sentence;
    public $content;
    public $date;
    public $author;
    public $category;


/**
* Actualites constructor.
* @param $id
*/

    function __construct($id){
        global $db;

        $id = str_secur($id);

        $reqActualite = $db->prepare('
            SELECT ac.*, au.firstname, au.lastname, c.name AS category
            FROM actualites ac
            INNER JOIN authors au ON au.id = ac.author_id
            INNER JOIN categories c ON c.id = ac.category_id
            WHERE ac.id = ?
            ');
        $reqActualite->execute([$id]);
        $data = $reqActualite->fetch();

        $this->id = $id;
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->sentence = $data['date'];
        $this->date = $data['date'];
        $this->author = $data['firstname'] . ' ' . $data['lastname'];
        $this->category = $data['category'];

    }

/**
* Sends all Actualites.
* @return array
*/

  static function getAllActualites() {

        global $db;

        $reqActualites = $db->prepare('
            SELECT a.*, au.firstname, au.lastname, c.name AS category
            FROM actualites a 
            INNER JOIN authors au ON au.id = a.author_id
            INNER JOIN categories c ON c.id = a.category_id
        ');
        $reqActualites->execute([]);
        return $reqActualites->fetchAll();

    }
}

?>