<?php

class Authors{

public $id;
public $firstname;
public $lastname;

/**
 * Authors constructor.
 * @param $id
 */
function __construct($id){
    global $db;

    $id = str_secur($id);

    $reqAuthor = $db->prepare('SELECT * FROM authors WHERE id = ?');
    $reqAuthor->execute([$id]);
    $data = $reqAuthor->fetch();

    $this->id = $id;
    $this->firstname = $data['firstname'];
    $this->lastname = $data['lastname'];
}

/**
 * Send all authors
 * @return array
 */
static function getAllAuthors(){

    global $db;

    $reqAuthors = $db->prepare('SELECT * FROM authors');
    $reqAuthors->execute([]);
    return $reqAuthors->fetchAll();

    }

//////////////////////////// SESSION

static function verify_author(){
    if(isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['login2019'])){
        global $db;
        
        $mail  = str_secur($_POST['inputEmail']);
        $pWord = str_secur($_POST['inputPassword']);

        //
        $pWord = "jf".sha1($pWord."975")."31";
        $reqAuthor = $db->prepare('SELECT * FROM authors WHERE email = ? AND password = ?');
        $reqAuthor->execute([$mail, $pWord]);
        while($author = $reqAuthor->fetch()){
          
            if($pWord = $author['password'] && $mail = $author['email']){
                if($author['email'] == 'srinath@srinath.fr' ){
                $secret = sha1(sha1($mail).rand());
                $reqAuthor1 = $db->prepare("UPDATE authors SET secret = ? WHERE id = ?");
                $reqAuthor1->execute([$secret, '1']);
                $author_id = 1;
                session_start();
                $_SESSION['id'] = $author_id;
                $_SESSION['secret'] = $secret;
                echo ('Connecté');
                header("Location: admin_posts");                
            } 
                elseif($author['email'] == 'veejayseye@gmail.com') {
                $secret = sha1(sha1($mail) . rand());
                $reqAuthor1 = $db->prepare("UPDATE authors SET secret = ? WHERE id = ?");
                $author_id = 2;
                $reqAuthor1->execute([$secret, '2']);
                session_start();
                $_SESSION['id'] = $author_id;
                $_SESSION['secret'] = $secret;
                echo ('Connecté');
                header("Location: admin_news");
            }
            }
            else{
                /* Essayez un try catch ou une gestion d'erreur en tous cas
                */    
                header('Location: admin_gate');
                echo('Une erreur est survenue.');
                }
        }

    }
}

}

?>