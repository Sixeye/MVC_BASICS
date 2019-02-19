<?php
     /**
      * Created by PhpStorm.
      * User: srinathchristophersamarasinghe
      * Date: 2019-02-19
      * Time: 12:32
      */

     use entity\Author;
     include_once ('app/models/Database.php');

     function test(){echo ('That ThING');};

     class AuthorRepository
     {
         private $conn;

         /**
          * ArticlesRepository constructor.
          */
          public function __construct()
          {
             $this->conn = Database::getConnection();
          }

         /**
          * Verify which author is trying to login or reject invalid entries
          * @return session_start
          */
          public function verify_author($Author)
          {
                 $reqAuthor = $this->conn->prepare('SELECT * FROM authors WHERE email = :mail AND password = :pWord');
                 $reqAuthor->bindValue(':mail', $Author->getMail(), PDO::PARAM_STR);
                 $reqAuthor->bindValue(':pWord', $Author->getPWord(), PDO::PARAM_STR);
                 $reqAuthor->execute();

                 while($author = $reqAuthor->fetch())
                 {
                     if($pWord = $author['password'] && $mail = $author['email'])
                     {
                         if($author['email'] == 'srinath@srinath.fr' )
                         {
                             $secret = sha1(sha1($mail).rand());
                             $reqAuthor1 = $this->conn->prepare("UPDATE authors SET secret = ? WHERE id = ?");
                             $reqAuthor1->execute([$secret, '1']);
                             $author_id = 1;
                             session_start();
                             $_SESSION['id'] = $author_id;
                             $_SESSION['secret'] = $secret;
                             header('Location: admin_posts');
                         }
                         elseif($author['email'] == 'veejayseye@gmail.com')
                         {
                             $secret = sha1(sha1($mail) . rand());
                             $reqAuthor1 = $this->conn->prepare("UPDATE authors SET secret = ? WHERE id = ?");
                             $author_id = 2;
                             $reqAuthor1->execute([$secret, '2']);
                             session_start();
                             $_SESSION['id'] = $author_id;
                             $_SESSION['secret'] = $secret;
                             header('Location: admin_news');
                         }
                     }

                     else{
                         header('Location: admin_gate');
                         echo('Une erreur est survenue.');
                     }
                 }
          }

         /**
          * Verification if a session is open and if it is conform in all pages but not in the gate.
          * @return datas from the DB and compares them
          */
         public function verify_session($Author)
         {
                 $reqAuthor = $this->conn->prepare('SELECT * FROM authors WHERE id = :id AND secret = :secret');
                 $reqAuthor->bindValue(':id', $Author->getId(), PDO::PARAM_INT);
                 $reqAuthor->bindValue(':secret', $Author->getsecret(), PDO::PARAM_STR);
                 $reqAuthor->execute();
                 while ($author = $reqAuthor->fetch())
                 {
                     if ($id = $author['id'] && $secret = $author['secret'])
                     {

                     } else {
                         $_SESSION = [];
                         header('Location: admin_gate');
                     }
                 }
         }

         /**
          * Verification if a session is open and if it is conform, specific to the gate.
          * @return datas from the DB and compares them
          */
         public function verify_session_gate()
         {
             if (isset($_SESSION['id']) && isset($_SESSION['secret'])) {

                 $id = $_SESSION['id'];
                 $secret = $_SESSION['secret'];

                 $reqAuthor = $this->conn->prepare('SELECT * FROM authors WHERE id = ? AND secret = ?');
                 $reqAuthor->execute([$id, $secret]);
                 while ($author = $reqAuthor->fetch())
                 {
                     if ($id = $author['id'] && $secret = $author['secret'])
                     {
                         header('Location: admin_posts');
                     } else {
                         echo ('Connectez-vous');
                     }
                 }
             } else {
                 echo ('Connectez-vous');
             }
         }
     }