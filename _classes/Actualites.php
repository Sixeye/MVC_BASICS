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
            ORDER BY id DESC
        ');
        $reqActualites->execute([]);
        return $reqActualites->fetchAll();

    }

  /**
* Creates a news thanks to the admin news section.
* @return datas to the DB
*/

    
    static function createActualites() 
    {
        global $db;
       
        if (isset($_POST['create_news'])) {
    
            $post_title = str_secur($_POST['ntitle']);
            $post_sentence = str_secur($_POST['nsentence']);
            $post_content = $_POST['content'];
            $post_author_id = str_secur($_POST['nauthor_id']);
            $post_category_id = str_secur($_POST['ncategory_id']);
            $date = (now);

            $reqActualites = $db->prepare('INSERT INTO actualites(title, sentence, content, date, author_id, category_id) VALUES(?, ?, ?, ?, ?, ?)');
            
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

    static function deleteActualites(){
        global $db;
        if (isset($_POST['n_delete'])){
        $id = ($_POST['n_delete']);
            $reqActualites = "
            DELETE FROM actualites WHERE id= $id LIMIT 1
            ";
        $db->query($reqActualites);
        header("Location: admin_news");
        }
    }
  
/**
* Fill an news in update page thanks to the ID in admin news section.
* @return datas to the DB
*/


    static function fillActualites(){
     
        global $db;
        global $nupdateId;
        global $nupdateTitle;
        global $nupdateSentence;
        global $nupdateContent;
        global $nupdateAuthor;
        global $nupdateCategory;

        if (isset($_POST['nupdate'])){
            $id = (int)($_POST['nupdate']);
            $reqActualites = $db->prepare("SELECT * FROM actualites WHERE id = $id");
            $reqActualites->execute();
            $actualite_update = $reqActualites->fetch(PDO::FETCH_ASSOC);
            $nupdateId = $actualite_update['id'];            
            $nupdateTitle = $actualite_update['title'];
            $nupdateSentence = $actualite_update['sentence'];
            $nupdateContent = $actualite_update['content'];
            $nupdateAuthor = $actualite_update['author_id'];
            $nupdateCategory = $actualite_update['category_id'];
        }
    }

/**
* Updates an news thanks to an ID. Go back to the posts page.
* @return datas to the DB
*/

    static function updateActualites(){
            global $db;
            if (isset($_POST['nUpdated_post'])){

            $nupdated_id = (int)(str_secur($_POST['nu_id']));
            $nupdated_title = str_secur($_POST['nu_title']);
            $nupdated_sentence = str_secur($_POST['nu_sentence']);
            $nupdated_content = $_POST['nu_content'];
            $nupdated_author_id = (int)(str_secur($_POST['nu_author_id']));
            $nupdated_category_id = (int)(str_secur($_POST['nu_category_id']));
            $date = (now);

            $udActualites = $db->prepare('UPDATE actualites set title = ?, sentence = ?, content = ?, date = ?, author_id = ?, category_id = ? WHERE id = ?');
            
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

